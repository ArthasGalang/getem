<?php
session_start();

if (!isset($_SESSION['seller'])) {
    header('Location: ../sellerlogin.php');
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = mt_rand(1000000000, 9999999999); // Generate a random 10-digit number
    $shop_id = $_SESSION['seller']['shop_id']; // Ensure this is an array access
    $product_name = trim($_POST['productName']);
    $product_price = trim($_POST['productPrice']);
    $product_description = trim($_POST['productDescription']);
    $product_image = $_FILES['productImage']['name'];
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($product_image);

    // Upload the image
    if (move_uploaded_file($_FILES['productImage']['tmp_name'], $target_file)) {
        $query = "INSERT INTO Products (Product_Id, Shop_Id, Product_Name, Product_Price, Product_Description, Product_Image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("iisdss", $product_id, $shop_id, $product_name, $product_price, $product_description, $target_file);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Product added successfully!');
                    window.location.href = 'products-content.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error adding product: " . $stmt->error . "');
                    window.location.href = 'add-product.php';
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Error uploading image.');
                window.location.href = 'add-product.php';
              </script>";
    }
}

$conn->close();
?>
