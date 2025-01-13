<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư Mời</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 10px;
            background: #000;
        }
        img {
            max-width: 600px;
            height: auto;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <img src="{{ $imagePath }}" alt="Thư Mời">
    <br>
    <a href="{{ route('download') }}" class="btn">Tải Xuống</a>
</body>
</html>
