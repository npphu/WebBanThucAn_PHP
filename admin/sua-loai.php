<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin-Sửa loại</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css-js/bootstrap/css/singup.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <a href="../admin/khuvuc.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood-Admin</h3>
                    <p>Sửa loại</p>                                      
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">SỬA THÔNG TIN LOẠI</h3>
                             <?php
                                require_once '../DBConnect.php';
                                  
                                if(isset($_GET['IdLoai']))
                                {
                                    $idkhuvuc = $_GET['IdLoai'];
                                }
                                else 
                                {
                                    echo '<script> alert("Không có mã loại.");<script>';
                                }
                                $conn = new DbConnect();
                                $name=$conn->query("set names 'utf8'");
                                $ctv = $conn->query("SELECT * from loaimonan where IdLoai=$idkhuvuc" );
                                $row= mysqli_fetch_array($ctv);
                            ?>
                            <form action="" method="post">
                                <div class="row register-form">
                                    <div class="col-md-12">
                                        <div class="form-group">                                         
                                            <input type="text" class="form-control" placeholder="Nhập tên khu vực" name="txtTenLoai" value="<?php echo $row['TenLoai']; ?>" required autofocus/>
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
                    $conn->query("UPDATE `loaimonan` SET `TenLoai`='$tenloai' WHERE IdLoai = $idkhuvuc");
                    echo '<script>alert("Update thành công."); </script>'; 
                     echo '<script>window.location = "loai.php"; </script>';
            }
            ?>
    </body>
</html>









