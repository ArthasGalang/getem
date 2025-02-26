<?php
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

// SQL to drop table if it exists
$sql = "DROP TABLE IF EXISTS Shops";
if ($conn->query($sql) === TRUE) {
    echo "Table Shops dropped successfully. ";
} else {
    echo "Error dropping table: " . $conn->error;
}

// SQL to create table
$sql = "CREATE TABLE Shops (
    Shop_Id INT AUTO_INCREMENT PRIMARY KEY,
    Shop_Name VARCHAR(255) NOT NULL,
    Shop_Owner VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Verified BOOLEAN DEFAULT FALSE,
    Shop_Image VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Shops created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
