<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../adminlogin.php');
    exit();
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify'])) {
    $shop_id = $_POST['shop_id'];
    $update_query = "UPDATE Shops SET Verified = TRUE WHERE Shop_Id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("i", $shop_id);
    $stmt->execute();
    $stmt->close();
}

$query = "SELECT Shop_Id, Shop_Name, Shop_Owner, Email FROM Shops WHERE Verified = FALSE";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            justify-content: space-between;
            box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
        }
        .header .logo {
            font-size: 1.5em;
            font-weight: bold;
        }
        .header .title {
            font-size: 1.5em;
        }
        .content {
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
        }
        .table-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 80%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: rgb(70, 148, 88);
            color: #fff;
        }
        .verify-button {
            background-color: rgb(70, 148, 88);
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .verify-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo"><a href="../../index.php" style="color: #fff; text-decoration: none;">Gen T. De Leon</a></div>
        <div class="title">Admin Dashboard</div>
    </div>
    <div class="content">
        <div class="table-container">
            <h2>Pending Verifications</h2>
            <table>
                <tr>
                    <th>Shop ID</th>
                    <th>Shop Name</th>
                    <th>Shop Owner</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Shop_Id']}</td>
                                <td>{$row['Shop_Name']}</td>
                                <td>{$row['Shop_Owner']}</td>
                                <td>{$row['Email']}</td>
                                <td>
                                    <form method='post' action='dashboard.php'>
                                        <input type='hidden' name='shop_id' value='{$row['Shop_Id']}'>
                                        <input type='submit' name='verify' value='Verify' class='verify-button'>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No pending verifications</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
