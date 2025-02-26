<?php
session_start();

?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
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
        }
        .sidebar {
            width: 250px; 
            background-color: rgb(43, 44, 44);
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 10px;
            box-shadow: 10px 0 6px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            text-decoration: none;
            color: #fff;
            padding: 15px; 
            background-color: rgb(70, 148, 88);
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #555;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
        .main-content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
    </style>
    <script>
        function loadContent(page) {
            fetch(page)
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.main-content').innerHTML = data;
                });
        }
        document.addEventListener('DOMContentLoaded', function() {
            loadContent('settings-content.php');
        });
    </script>
</head>
<body>
    <div class="header">
        <div class="logo"><a href="../../index.php" style="color: #fff; text-decoration: none;">Gen T. De Leon</a></div>
        <div class="title">Buyer Dashboard</div>
    </div>
    <div class="content">
        <div class="sidebar">
            <a href="javascript:void(0);" onclick="loadContent('settings-content.php')">Settings</a>
        </div>
        <div class="main-content">
            <!-- Content will be loaded here -->
        </div>
    </div>
</body>
</html>
