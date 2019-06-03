<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sfood-Đăng ký tài khoản</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css-js/bootstrap/css/singup.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <a href="../index.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood</h3>
                    <p>Đăng ký tài khoản</p>
                    <form action="dangnhap.php"><input type="submit"   name="" value="Đăng nhập"<br/></form>                       
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">THÔNG TIN TÀI KHOẢN</h3>
                            <form action="dangky.php" method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập tên tài khoản" name="txtTenTaiKhoan" value="" required autofocus/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="txtMatKhau" value="" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Nhập lại mật khẩu" name="txtNhapLaiMatKhau" value="" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập họ tên" value="" name="txtHoTen" required=""/>
                                        </div>                                                                             
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Địa chỉ giao hàng" value="" name="txtDiaChi" required=""/>
                                        </div>  
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Nhập email" value="" name="txtEmail" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="txtDienThoai" class="form-control" placeholder="Nhập số điện thoại" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="GioiTinh">
                                                <option class="hidden"  selected disabled>Giới tính</option>
                                                <option value="1">Nữ</option>
                                                <option value="0">Nam</option>                                              
                                            </select>
                                        </div>
                                        <input type="submit" tabindex="1" class="btnRegister"  value="Tạo tài khoản" name="btnDangKy"/>
                                    </div>
                                </div>
                            </form>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once '../DBConnect.php';
        if (isset($_POST['btnDangKy'])) {
            $user = $_POST['txtTenTaiKhoan'];
            $pass = $_POST['txtMatKhau'];
            $password = md5($pass);
            $passnhaplai = $_POST['txtNhapLaiMatKhau'];
            $ten = $_POST['txtHoTen'];
            $mail = $_POST['txtEmail'];
            $diachi = $_POST['txtDiaChi'];
            $dienthoai = $_POST['txtDienThoai'];
            $gioitinh = $_POST['GioiTinh'];

            if ($pass != $passnhaplai) {
                echo '<script>alert("Mật khẩu không trùng khớp, kiểm tra lại.")</script>';
            } else {
                $conn = new DbConnect();
                $name = $conn->query("set names 'utf8'");
                $conn->ThemNguoiDung($user, $password, $ten, $mail, $diachi, $dienthoai, $gioitinh);
                echo '<script>alert("Đặt ký tài khoản thành công."); </script>';
                echo '<script>window.location = "dangnhap.php"; </script>';
            }
        }
        ?>
    </body>
</html>



