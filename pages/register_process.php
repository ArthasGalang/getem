<?php
session_start();
include '../../database.php'; // Ensure this path is correct

function generateUserId($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = generateUserId();
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $business_id = rand(1000, 9999); // Generate a random business ID

    $sql = "INSERT INTO users (user_id, name, email, password, business_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $user_id, $name, $email, $password, $business_id);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $user_id;
        header("Location: ../sellerdashboard/dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
