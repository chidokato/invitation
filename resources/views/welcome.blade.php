<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Thiệp Mời Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style type="text/css">
        body{ background:#06182d; padding-bottom: 50px}
        .img{ text-align:center; }
        .img img{ width:180px;}
        .decs{ color:#fff; text-align:center; }
        .decs h1{ margin-bottom:30px }
        label{ color:#fff; margin-bottom:5px }
        .red{ color:#d51515 }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="img">
                    <img src="images/logo.png">
                </div>
                <div class="decs">
                    <h1>TẠO THIỆP MỜI ONLINE</h1>
                    <!-- <p>Refresh lại trang (F5) để có cập nhật mới nhất</p> -->
                    <p>ĐÊM TIỆC GALA “MỪNG INDOCHINE LÊN BA”</p>
                </div>
                <form action="generate_1620062025" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- <div class="form-group mb-3">
                        <label>Danh xưng <span class="red">(*)</span></label>
                        <select class="form-control" name="danh-xung" required>
                            <option value="">-- Vui lòng chọn --</option>
                            <option value="Mr.">Mr</option>
                            <option value="Ms.">Ms</option>
                        </select>
                    </div> -->

                    <div class="form-group mb-3">
                        <label>Họ & Tên <span class="red">(*)</span></label>
                        <input class="form-control" type="text" name="username" required placeholder="Nhập Họ & Tên">
                    </div>

                    <div class="form-group mb-3">
                        <label>Chức danh</label>
                        <input class="form-control" type="text" name="chuc-danh" placeholder="Nhập chức danh">
                    </div>

                    <!-- <div class="form-group mb-3">
                        <label>Avatar <span class="red">(*)</span></label>
                        <input class="form-control" type="file" name="img" required>
                    </div> -->

                    <!-- <div class="form-group mb-3">
                        <div> <label>Sự kiện</label> </div>
                        <label>
                            <input checked class="" type="radio" name="event" required> <span>Sự kiện YEP 2024 "The Rise Era - Bừng sáng kỷ nguyên thịnh vượng"</span>
                        </label>
                    </div> -->
                    
                    <button type="submit" class="btn btn-primary">TẠO THIỆP MỜI</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
