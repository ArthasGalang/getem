<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color:rgb(228, 228, 228);
        }
        .container {
            text-align: center;
        }
        .title {
            font-size: 2em;
            margin: 0;
            color: #28a745;
        }
        .nav {
            margin-top: 20px;
        }
        .nav a {
            text-decoration: none;
            color: #fff;
            font-size: 1.2em;
            font-weight: bold;
            padding: 15px 30px;
            background-color: #28a745;
            border: none;
            border-radius: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .nav a:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 30px; /* Increased padding */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            text-align: center;
            border-radius: 5px; /* Less curved */
        }
        .popup .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .popup button {
            padding: 15px 30px; /* Increased size */
            font-size: 1.2em; /* Increased font size */
            font-weight: bold;
            border: none;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
            border-radius: 5px; /* Less curved */
        }
        .popup button:hover {
            background-color: #218838;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('overlay').addEventListener('click', hidePopup);
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1><a href="index.php" style="color: #28a745; text-decoration: none;">Gen. T De leon</a>
                <br>
                E - Marketplace</h1>
        </div>
        <div class="nav">
            <a href="javascript:void(0);" onclick="showPopup()">Go to Dashboard</a>
        </div>
    </div>
    <div id="popup" class="popup">
        <div class="buttons">
            <button onclick="window.location.href='pages/sellerlogin.php'">Seller</button>
            <button onclick="window.location.href='pages/buyerdashboard/dashboard.php'">Buyer</button>
        </div>
    </div>
    <div id="overlay" class="overlay"></div>
</body>
</html>
