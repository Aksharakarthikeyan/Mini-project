<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
            text-align: center;
        }
        .image {
            display: inline-block;
            margin: 50px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to CH 360</h1>
    </header>
    <div class="container">
        <a href="http://localhost/test/notice.php">
        <img src="computer.png" alt="Image 1" class="image" width="200" height="200">
        </a>
        <a href="http://localhost/test/food.php">
        <img src="diet.png" alt="Image 2" class="image" width="200" height="200">
        </a>
        <a href="http://localhost/test/attendance.php">
        <img src="notice.png" alt="Image 3" class="image" width="200" height="200">
        </a>
        <a href="http://localhost/test/suggestion.php">
        <img src="suggestion-box.png" alt="Image 4" class="image" width="200" height="200">
        </a>
    </div>
</body>
</html>
