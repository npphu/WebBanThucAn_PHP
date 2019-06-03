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
                    <a href="../ctv/thongtin-ctv.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood-CTV</h3>
                    <p>Sửa thông tin cộng tác viên</p>                                      
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">SỬA THÔNG TIN CỘNG TÁC VIÊN</h3>
                            <?php
                                $idctv = $_SESSION['IdCTV'];
                                require_once '../DBconnect.php';
                                 $conn = new DbConnect();
                                $name=$conn->query("set names 'utf8'");
                                $ctv = $conn->query("SELECT * from congtacvien where idctv='$idctv'" );
                                $row= mysqli_fetch_array($ctv);
                            ?>
                            <form action="sua-thongtinctv.php" method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">                                       
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập họ tên" value="<?php echo $row['HoTen']; ?>" name="txtHoTen" required=""/>
                                        </div>   
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập CMND" value="<?php echo $row['CMND']; ?>" name="txtCMND" required=""/>
                                        </div> 
                                         <div class="form-group">
                                            <select class="form-control" name="GioiTinh">
                                                <option class="hidden"  selected disabled>Giới tính</option>
                                                <?php
                                                    if($row['GioiTinh'] == 1)
                                                    {
                                                        echo '<option value="'.$row['GioiTinh'].'" selected>Nữ</option>';
                                                    }
                                                    if($row['GioiTinh'] == 0)
                                                    {
                                                        echo '<option value="'.$row['GioiTinh'].'" selected>Nam</option>';
                                                    }
                                                    else 
                                                    {
                                                        echo '<option value="1">Nữ</option>
                                                <option value="0">Nam</option>';
                                                    }
                                                ?>
                                                                                              
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Nhập email" value="<?php echo $row['Email']; ?>" name="txtEmail" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Địa chỉ" value="<?php echo $row['DiaChi']; ?>" name="txtDiaChi" required=""/>
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
            
            //$ctv = $_POST['txtTenTaiKhoan'];
           // $pass = $_POST['txtMatKhau'];
            //$password = md5($pass);
            //$passnhaplai = $_POST['txtNhapLaiMatKhau'];
            $ten = $_POST['txtHoTen'];
            $cmnd = $_POST['txtCMND'];
           // $ngaysinh = $_POST['txtNgaySinh'];
            $mail = $_POST['txtEmail'];
            $diachi = $_POST['txtDiaChi'];
            $dienthoai = $_POST['txtDienThoai']; 
            $gioitinh = $_POST['GioiTinh'];          
          //  $quangcao = $_POST['QuangCao'];
           // $ngayhethan = $_POST['txtNgayHetHanQC'];
                     
                $conn = new DbConnect();
                $name = $conn->query("set names 'utf8'");
                $conn->query("UPDATE `congtacvien` SET `HoTen`='$ten',`CMND`='$cmnd',`Email`='$mail',`DiaChi`='$diachi',`DienThoai`='$dienthoai',`GioiTinh`='$gioitinh' WHERE IdCtv = '$idctv'"); 
                 echo '<script>alert("Update thành công."); </script>'; 
                 echo '<script>window.location = "thongtin-ctv.php"; </script>';
        }
        ?>
    </body>
</html>















