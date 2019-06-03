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
                    <a href="../index.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood</h3>
                    <p>Đổi mật khẩu</p>                                      
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">ĐỔI MẬT KHẨU USER</h3>
                            <?php
                               
                                require_once '../DBconnect.php';
                                 $conn = new DbConnect();
                                $name=$conn->query("set names 'utf8'");
                                $ctv = $conn->query("SELECT * from nguoidung where iduser='$iduser'" );
                                $row= mysqli_fetch_array($ctv);
                            ?>
                            <form action="doimatkhau-user.php" method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">                                       
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập tên đăng nhập"  value="<?php echo $row['TenUser']; ?>" name="txtHoTen" required=""/>
                                        </div>   
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Nhập Pass mới" value="" name="txtPassMoi" required=""/>
                                        </div>                                         
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Nhập lại Pass mới" value="" name="txtNhapLaiPass" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Nhập Pass củ" value="" name="txtPassCu" required=""/>
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
             $tenuser = $_POST['txtHoTen'];          
            $passmoi = md5($_POST['txtPassMoi']);            
            $passnhaplai = md5($_POST['txtNhapLaiPass']);
            $passcu = md5($_POST['txtPassCu']);
            
            if($passmoi != $passnhaplai)
            {
                echo '<script>alert("Mật khẩu không trùng khớp, kiểm tra lại.")</script>';
            }
            else 
            {
                if($row['PassUser'] == $passcu)
                {
                    $conn = new DbConnect();
                    $name = $conn->query("set names 'utf8'");
                    $conn->query("UPDATE `NguoiDung` SET `TenUser`='$tenuser',`PassUser`='$passmoi' WHERE IdUser = '$iduser'"); 
                    echo '<script>alert("Update thành công."); </script>'; 
                    echo '<script>window.location = "dangxuat.php"; </script>';
                }
                else 
                {
                     echo '<script>alert("Mật khẩu không đúng")</script>';
                }
            }
                      
        }
        ?>
    </body>
</html>


















