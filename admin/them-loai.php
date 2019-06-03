<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin-Thêm loại</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css-js/bootstrap/css/singup.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <a href="../admin/loai.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood-Admin</h3>
                    <p>Thêm loại</p>                                      
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">THÔNG TIN LOẠI</h3>
                            <form action="them-loai.php" method="post">
                                <div class="row register-form">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập tên loại" name="txtTenLoai" value="" required autofocus/>
                                            <input type="submit" tabindex="1" class="btnRegister"  value="Save" name="btnDangKy"/>
                                        </div>                                                                           
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require_once '../DBConnect.php';
            if (isset($_POST['btnDangKy'])) {

                $tenloai = $_POST['txtTenLoai'];                                
                    $conn = new DbConnect();
                    $name = $conn->query("set names 'utf8'");
                    $conn->query("INSERT INTO `loaimonan`(`TenLoai`) VALUES ('$tenloai')");
                    echo '<script>alert("Thêm thành công."); </script>';                
            }
            ?>
    </body>
</html>








