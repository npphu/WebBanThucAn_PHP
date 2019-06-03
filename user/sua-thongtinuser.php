<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['NguoiDung'])) {
    echo '<script>window.location = "../user/dangnhap.php"; </script>';
}
$iduser = $_SESSION['IDNguoiDung'];
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sfood</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css-js/bootstrap/css/singup.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <a href="../user/thongtin-user.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood</h3>
                    <p>Sửa thông tin User</p>                                      
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">SỬA THÔNG TIN USER</h3>
                            <?php
                                $iduser = $_SESSION['IDNguoiDung'];
                                require_once '../DBconnect.php';
                                 $conn = new DbConnect();
                                $name=$conn->query("set names 'utf8'");
                                $ctv = $conn->query("SELECT * from nguoidung where iduser='$iduser'" );
                                $row= mysqli_fetch_array($ctv);
                            ?>
                            <form action="sua-thongtinuser.php" method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">                                       
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập họ tên" value="<?php echo $row['HoTen']; ?>" name="txtHoTen" required=""/>
                                        </div> 
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Nhập email" value="<?php echo $row['Email']; ?>" name="txtEmail" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Địa chỉ giao hàng" value="<?php echo $row['DiaChi']; ?>" name="txtDiaChi" required=""/>
                                        </div>                                        
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="txtDienThoai" class="form-control" placeholder="Nhập số điện thoại" value="<?php echo $row['DienThoai']; ?>" />
                                        </div>                                       
                                                                                                                                                          
                                        <input type="submit" tabindex="1" class="btnRegister"  value="Save" name="btnDangKy"/>
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
            
           
            $ten = $_POST['txtHoTen'];        
            $mail = $_POST['txtEmail'];
            $diachi = $_POST['txtDiaChi'];
            $dienthoai = $_POST['txtDienThoai']; 
          
                $conn = new DbConnect();
                $name = $conn->query("set names 'utf8'");
                $conn->query("UPDATE `nguoidung` SET `HoTen`='$ten',`Email`='$mail',`DiaChi`='$diachi',`DienThoai`='$dienthoai' WHERE IdUser = '$iduser'"); 
                 echo '<script>alert("Update thành công."); </script>'; 
                 echo '<script>window.location = "thongtin-user.php"; </script>';
        }
        ?>
    </body>
</html>

















