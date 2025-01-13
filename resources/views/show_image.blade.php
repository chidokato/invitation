<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Thư Mời</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 20px;
            background: #000;
        }
        img {
            max-width: 600px;
            height: auto;
        }

        @media (max-width: 769px) {
            img {
                max-width: 95%;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <img src="{{ $imagePath }}" alt="Thư Mời">
    <br>
    <a href="{{ route('download', ['fileName' => $fileName]) }}" class="btn btn-success">Tải ảnh xuống</a>
    <a href="{{ asset('') }}" class=" btn-warning btn">Tạo ảnh khác</a>

</body>
</html>
