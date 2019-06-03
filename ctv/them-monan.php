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
                    <a href="../ctv/monan.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood-CTV</h3>
                    <p>Thêm món ăn</p>                                      
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">THÔNG TIN MÓN ĂN</h3>
                            <form action="them-monan.php" method="post" enctype="multipart/form-data">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập tên món ăn" name="txtTenMonAn" value="" required autofocus/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Nhập giá bán" name="txtGiaBan" value="" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <textarea  class="form-control"  placeholder="Nhập mô tả" name="txtMoTa" value="" required=""></textarea>
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">                                     
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập phí giao hàng" value="" name="txtPhiGiao" required=""/>
                                        </div>
                                         <div class="form-group">
                                            <select class="form-control" name="KhuVuc">
                                                <option class="hidden"  selected disabled>Chọn khu vực</option>
                                                <?php
                                                require_once '../DBConnect.php';
                                                $conn = new DbConnect();
                                                $name = $conn->query("set names 'utf8'");
                                                $ds = $conn->query('Select * from KhuVuc');
                                                 while ($row = $ds -> fetch_assoc())            
                                                 {
                                                     echo '<option value="'.$row['IdKhuVuc'].'">'.$row['TenKhuVuc'].'</option>';
                                                                                                   
                                                 } 
                                            ?>                                                                                           
                                            </select>
                                        </div>                                         
                                         <div class="form-group">
                                            <select class="form-control" name="Loai">
                                                <option class="hidden"  selected disabled>Chọn loại</option>
                                                <?php
                                                require_once '../DBConnect.php';
                                                $conn = new DbConnect();
                                                $name = $conn->query("set names 'utf8'");
                                                $ds = $conn->query('Select * from LoaiMonAn');
                                                 while ($row = $ds -> fetch_assoc())            
                                                 {
                                                     echo '<option value="'.$row['IdLoai'].'">'.$row['TenLoai'].'</option>';
                                                                                                   
                                                 } 
                                            ?>                                                                                           
                                            </select>                                           
                                        </div>  
                                          <div class="form-group">
                                             <input type="file" class="form-control"  name="txtAnh" value="" required=""/>
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
            
            $ten = $_POST['txtTenMonAn'];
            $giaban = $_POST['txtGiaBan'];
            $mota = $_POST['txtMoTa'];
            $file = $_FILES['txtAnh'];
            if(!isset($_FILES['txtAnh']))
            {
                echo '<script>alert("Lỗi."); </script>';  
            }
            move_uploaded_file($file['tmp_name'], '../images/MonAn/'.$file['name']);
            
            $ngaycapnhap = date('Y-m-d H:i:s');
            $phigiao = $_POST['txtPhiGiao'];
            $idkhuvuc = $_POST['KhuVuc'];
            $idloai = $_POST['Loai'];
            $idCtv = $_SESSION['IdCTV'];
            
                $conn = new DbConnect();
                $name = $conn->query("set names 'utf8'");
                $conn->ThemMonAn($ten, $giaban, $mota, $file['name'], $ngaycapnhap, $phigiao, $idkhuvuc, $idloai, $idCtv);
                echo '<script>alert("Thêm món ăn thành công."); </script>';
                echo '<script>window.location = "monan.php"; </script>';
            }       
        ?>
    </body>
</html>







