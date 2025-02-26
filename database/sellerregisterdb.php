<?php
session_start();

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
    $shop_id = mt_rand(1000000000, 9999999999); // Generate a random 10-digit number
    $shop_name = trim($_POST['username']);
    $shop_owner = trim($_POST['owner']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $shop_image = $_FILES['shop_image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($shop_image);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the shop name already exists
    $check_shop_query = "SELECT * FROM Shops WHERE Shop_Name = ?";
    $stmt_check_shop = $conn->prepare($check_shop_query);
    if (!$stmt_check_shop) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt_check_shop->bind_param("s", $shop_name);
    $stmt_check_shop->execute();
    $stmt_check_shop->store_result();

    if ($stmt_check_shop->num_rows > 0) {
        echo "<script>
                alert('Shop already exists.');
                window.location.href = '../pages/sellerregister.php';
              </script>";
        exit();
    }
    $stmt_check_shop->close();

    // Check if the email already exists
    $check_email_query = "SELECT * FROM Shops WHERE Email = ?";
    $stmt_check_email = $conn->prepare($check_email_query);
    if (!$stmt_check_email) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $stmt_check_email->store_result();

    if ($stmt_check_email->num_rows > 0) {
        echo "<script>
                alert('Email already in use.');
                window.location.href = '../pages/sellerregister.php';
              </script>";
        exit();
    }
    $stmt_check_email->close();

    // Upload the image
    if (move_uploaded_file($_FILES['shop_image']['tmp_name'], $target_file)) {
        $query = "INSERT INTO Shops (Shop_Id, Shop_Name, Shop_Owner, Email, Password, Verified, Shop_Image) VALUES (?, ?, ?, ?, ?, FALSE, ?)";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("isssss", $shop_id, $shop_name, $shop_owner, $email, $hashed_password, $target_file);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Registration successful! Please wait for your account to be verified.');
                    window.location.href = '../pages/sellerlogin.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error registering account: " . $stmt->error . "');
                    window.location.href = '../pages/sellerregister.php';
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Error uploading image.');
                window.location.href = '../pages/sellerregister.php';
              </script>";
    }
}

$conn->close();
?>
