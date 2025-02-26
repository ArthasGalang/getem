<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            box-sizing: border-box;
        }
        .form-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="file"] {
            width: calc(100% - 0px); 
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-container input[type="range"] {
            width: 100%;
            margin-bottom: 20px;
        }
        .form-container button {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div id="dynamic-content">
        <div class="form-container">
            <h2>Add Product</h2>
            <form action="submit-product.php" method="post" enctype="multipart/form-data">
                <label for="productImage">Image</label>
                <input type="file" id="productImage" name="productImage" accept="image/*" required>
                
                <label for="productName">Name</label>
                <input type="text" id="productName" name="productName" required>
                
                <label for="productPrice">Price</label>
                <input type="number" id="productPrice" name="productPrice" min="0" step="0.01" required>
            
                <input type="range" id="priceSlider" min="0" max="1000" step="0.01" oninput="document.getElementById('productPrice').value = this.value">
                
                <button type="submit">Add Product</button>
            </form>
        </div>
        <script>
            document.getElementById('priceSlider').addEventListener('input', function() {
                document.getElementById('productPrice').value = this.value;
            });
            document.getElementById('productPrice').addEventListener('input', function() {
                document.getElementById('priceSlider').value = this.value;
            });
        </script>
    </div>
</body>
</html>
