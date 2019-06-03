<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['CTV'])) {
    echo '<script>window.location = "../ctv/dangnhap-ctv.php"; </script>';
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sfood-CTV</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css-js/bootstrap/css/singup.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <a href="../ctv/index.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood-CTV</h3>
                    <p>Đổi mật khẩu</p>                                      
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">ĐỔI MẬT KHẨU CỘNG TÁC VIÊN</h3>
                            <?php
                                $idctv = $_SESSION['IdCTV'];
                                require_once '../DBconnect.php';
                                 $conn = new DbConnect();
                                $name=$conn->query("set names 'utf8'");
                                $ctv = $conn->query("SELECT * from congtacvien where idctv='$idctv'" );
                                $row= mysqli_fetch_array($ctv);
                            ?>
                            <form action="doimatkhau-ctv.php" method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">                                       
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập họ tên" disabled="true" value="<?php echo $row['TenCtv']; ?>" name="txtHoTen" required=""/>
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
                       
            $passmoi = md5($_POST['txtPassMoi']);            
            $passnhaplai = md5($_POST['txtNhapLaiPass']);
            $passcu = md5($_POST['txtPassCu']);
            
            if($passmoi != $passnhaplai)
            {
                echo '<script>alert("Mật khẩu không trùng khớp, kiểm tra lại.")</script>';
            }
            else 
            {
                if($row['PassCtv'] == $passcu)
                {
                    $conn = new DbConnect();
                    $name = $conn->query("set names 'utf8'");
                    $conn->query("UPDATE `congtacvien` SET `PassCtv`='$passmoi' WHERE IdCtv = '$idctv'"); 
                    echo '<script>alert("Update thành công."); </script>'; 
                    echo '<script>window.location = "dangxuat-ctv.php"; </script>';
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

















