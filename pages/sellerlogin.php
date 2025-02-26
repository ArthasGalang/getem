<?php
session_start();
if (isset($_SESSION['seller'])) {
    header('Location: sellerdashboard/dashboard.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "getem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT Shop_Id, Password, Verified FROM Shops WHERE Email = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($shop_id, $hashed_password, $verified);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        if ($verified) {
            $_SESSION['seller'] = $shop_id;
            header('Location: sellerdashboard/Dashboard.php');
        } else {
            echo "<script>
                    alert('Account under verification.');
                  </script>";
        }
    } else {
        echo "<script>
                alert('Invalid email or password.');
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: rgb(228, 228, 228);
        }
        .header {
            width: 100%;
            height: 80px;
            background-color: rgb(61, 143, 80);
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
        }
        .header .logo {
            font-size: 1.5em;
            font-weight: bold;
        }
        .content {
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 300px;
        }
        .form-container h2 {
            margin-top: 0;
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: rgb(70, 148, 88);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container input[type="submit"]:hover {
            background-color: #555;
        }
        .account {
            text-align: center;
            margin-top: 10px;
        }
        .account a {
            color: rgb(70, 148, 88);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo"><a href="../index.php" style="color: #fff; text-decoration: none;">Gen T. De Leon</a></div>
    </div>
    <div class="content">
        <div class="form-container">
            <h2>Login</h2>
            <form action="sellerlogin.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <input type="submit" value="Login">
            </form>
            <div class="account">
                <p><small>Don't have an account?</small>
                    <a href="sellerregister.php">Create an account</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>