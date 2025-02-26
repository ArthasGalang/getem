<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <style>
        .button {
            display: block;
            width: 200px; /* Set a fixed width */
            padding: 15px;
            margin: 10px auto; /* Center the button */
            background-color: rgb(70, 148, 88);
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .button:hover {
            background-color: #555;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <h1>Settings</h1>
    <a href="javascript:void(0);" class="button">Account</a>
    <a href="javascript:void(0);" class="button">Help</a>
    <a href="javascript:void(0);" class="button">About</a>
    <a href="../../index.php" class="button">Logout</a> 
</body>
</html>
