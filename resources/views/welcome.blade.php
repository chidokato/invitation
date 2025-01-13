<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Thiệp Mời Online</title>
    <style type="text/css">
        *{ color:#fff }
        body{ background:#06182d; text-align: center;}
        section{ width:40%; margin:0 auto; color:#fff }
        .img img{ width:200px }
        button{ width:420px; background:#3f51b5; padding:10px; margin-top:10px }
        input{ width:400px; padding: 10px; color:#000 }
        p{ margin:0 }
        :focus-visible {
            outline: none
        }
    </style>
</head>
<body>
    <section>
        <div class="img">
            <img src="images/logo.png">
        </div>
        <h1>TẠO THIỆP MỜI ONLINE</h1>
        <p>Refresh lại trang (F5) để có cập nhật mới nhất</p>
        <p>Nếu thiệp chưa được cập nhật > vui lòng liên hệ INDOCHINE</p>
        <br>
        <form action="generate" method="POST">
            @csrf
            <p><label for="username">Họ & Tên:</label></p>
            <p><input type="text" id="username" name="username" required></p>
            <p><button type="submit">Tạo thư mời</button></p>
        </form>
    </section>
    
</body>
</html>
