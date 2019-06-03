<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CTV-Thêm món ăn</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css-js/bootstrap/css/singup.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <a href="../ctv/khuyenmai.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood-CTV</h3>
                    <p>Thêm khuyến mại</p>                                      
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">THÔNG TIN KHUYẾN MẠI</h3>
                            <?php
                                require_once '../DBConnect.php';
                                  
                                if(isset($_GET['IdMonAn']))
                                {
                                    $idmonan = $_GET['IdMonAn'];
                                }
                                else 
                                {
                                    echo '<script> alert("Không có mã món ăn.");<script>';
                                }
                                $conn = new DbConnect();
                                $name=$conn->query("set names 'utf8'");
                                $ctv = $conn->query("SELECT * from khuyenmai where idmonan='$idmonan'" );
                                $row= mysqli_fetch_array($ctv);
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row register-form">
                                    <div class="col-md-6">                          
                                        <div class="form-group">
                                            <select class="form-control" required="" name="TenMonAn">
                                                <option class="hidden"  selected disabled>Chọn món ăn</option>
                                                <?php
                                                require_once '../DBConnect.php';
                                                $conn = new DbConnect();
                                                $name = $conn->query("set names 'utf8'");
                                                $idctv = $_SESSION['IdCTV'];
                                                $ds = $conn->query("Select IdMonAn,TenMonAn from monan,congtacvien where monan.IdCTV = congtacvien.IdCtv and monan.IdCtv = '$idctv' ");
                                                 while ($ma = $ds -> fetch_assoc())            
                                                 {
                                                     if($row['IdMonAn'] == $_GET['IdMonAn'])
                                                     {
                                                         echo '<option  disabled="true" selected value="'.$ma['IdMonAn'].'">'.$ma['TenMonAn'].'</option>';
                                                     }                                                                                                                                                        
                                                 } 
                                            ?>                                                                                           
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Nhập % giảm giá" min="1" name="txtGiamGia" value="<?php echo $row['GiamGia']; ?>" required=""/>
                                        </div>
                                    </div>                                                
                                        
                                    <div class="col-md-6">                                     
                                        <div class="form-group">
                                            <span>Ngày bắt đầu</span>
                                            <input type="date" class="form-control"  placeholder="Nhập phí giao hàng" value="<?php echo $row['NgayBatDau']; ?>" name="txtNgayBatDau" required=""/>
                                        </div> 
                                        
                                         <div class="form-group">
                                            <span>Ngày kết thúc</span>
                                            <input type="date" class="form-control" placeholder="Nhập phí giao hàng" value="<?php echo $row['NgayKetThuc']; ?>" name="txtNgayKetThuc" required=""/>
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
            
            $idmonan = $_GET['IdMonAn'];
            $giamgia = $_POST['txtGiamGia'];
            $ngaybatdau = $_POST['txtNgayBatDau'];
            $ngaykethuc = $_POST['txtNgayKetThuc'];        
                                 
                $conn = new DbConnect();
                $name = $conn->query("set names 'utf8'");
                 $conn->query("UPDATE `khuyenmai` SET `GiamGia`='$giamgia',`NgayBatDau`='$ngaybatdau',`NgayKetThuc`='$ngaykethuc' WHERE IdMonAn = '$idmonan'");
                echo '<script>alert("Update thành công ."); </script>';
                echo '<script>window.location = "khuyenmai.php"; </script>';
            }       
        ?>
    </body>
</html>









