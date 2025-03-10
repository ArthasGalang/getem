<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_password = trim($_POST['password']);
    
    // Check if the password is correct
    if ($admin_password === '123') {
        $_SESSION['admin'] = true;
        header('Location: admindashboard/dashboard.php');
        exit();
    } else {
        $error = "Invalid password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo"><a href="../index.php" style="color: #fff; text-decoration: none;">Gen T. De Leon</a></div>
    </div>
    <div class="content">
        <div class="form-container">
            <h2>Admin Login</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="adminlogin.php" method="post">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
