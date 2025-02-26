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
$sql = "DROP TABLE IF EXISTS Products";
if ($conn->query($sql) === TRUE) {
    echo "Table Products dropped successfully. ";
} else {
    echo "Error dropping table: " . $conn->error;
}

// SQL to create table
$sql = "CREATE TABLE Products (
    Product_Id INT AUTO_INCREMENT PRIMARY KEY,
    Shop_Id INT NOT NULL,
    Product_Name VARCHAR(255) NOT NULL,
    Product_Price DECIMAL(10, 2) NOT NULL,
    Product_Description VARCHAR(255) NOT NULL,
    Product_Image VARCHAR(255) NOT NULL,
    Verified BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (Shop_Id) REFERENCES Shops(Shop_Id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
