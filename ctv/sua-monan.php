<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CTV-Sửa món ăn</title>
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
                    <p>Sửa món ăn</p>                                      
                </div>
                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">SỬA THÔNG TIN MÓN ĂN</h3>
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
                                $ctv = $conn->query("SELECT * from monan where idmonan='$idmonan'" );
                                $row= mysqli_fetch_array($ctv);
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập tên món ăn" name="txtTenMonAn" value="<?php echo $row['TenMonAn']; ?>" required autofocus/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Nhập giá bán" name="txtGiaBan" value="<?php echo $row['GiaBan']; ?>" required=""/>
                                        </div>
                                        <div class="form-group">
                                            <textarea  class="form-control"  placeholder="Nhập mô tả" name="txtMoTa" required=""><?php echo $row['MoTa']; ?></textarea>
                                        </div>                                       
                                    </div>
                                    <div class="col-md-6">                                     
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nhập phí giao hàng" value="<?php echo $row['PhiGiao']; ?>" name="txtPhiGiao" required=""/>
                                        </div>
                                         <div class="form-group">
                                            <select class="form-control" name="KhuVuc">
                                                <option class="hidden"  selected disabled>Chọn khu vực</option>
                                                <?php                                               
                                                require_once '../DBConnect.php';
                                                $conn = new DbConnect();
                                                $name = $conn->query("set names 'utf8'");
                                                $ds = $conn->query('Select * from KhuVuc');
                                                 while ($kv = $ds -> fetch_assoc())            
                                                 {
                                                     if($kv['IdKhuVuc'] == $row['IdKhuVuc'])
                                                     {
                                                         echo '<option value="'.$kv['IdKhuVuc'].'" selected>'.$kv['TenKhuVuc'].'</option>';
                                                     }
                                                     else {
                                                        echo '<option value="'.$kv['IdKhuVuc'].'">'.$kv['TenKhuVuc'].'</option>'; 
                                                     }                                                                                                                                                       
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
                                                 while ($loai = $ds -> fetch_assoc())            
                                                 {
                                                     if($loai['IdLoai'] == $row['IdLoai'])
                                                     {
                                                        echo '<option value="'.$loai['IdLoai'].'" selected>'.$loai['TenLoai'].'</option>';
                                                     }
                                                     else
                                                     {
                                                          echo '<option value="'.$loai['IdLoai'].'">'.$loai['TenLoai'].'</option>';
                                                     }                                                                                                                                                     
                                                 } 
                                            ?>                                                                                           
                                            </select>                                           
                                        </div>  
                                          <div class="form-group">
                                             <input type="file" class="form-control"  name="txtAnh" />
                                             <?php echo ' <img src="../images/MonAn/'.$row['AnhBia'].'" style="width:100px" />'; ?>
                                             <span>(Ảnh hiện tại)</span>
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
        if(isset($_GET['IdMonAn']))
        {
            $idmonan = $_GET['IdMonAn'];
        } 
        else 
        {
            echo '<script> alert("Không có mã món ăn.");<script>';
        }
        if (isset($_POST['btnDangKy'])) 
        {
            
            $ten = $_POST['txtTenMonAn'];
            $giaban = $_POST['txtGiaBan'];
            $mota = $_POST['txtMoTa'];
            $anhcu = $row['AnhBia'];
           
            if($_FILES['txtAnh']['name'])
            {
                 $anhmoi = $_FILES['txtAnh']['name'];
                 $file_path = $_FILES['txtAnh']['name'];
                 $new_path = "../images/MonAn/".$anhmoi;
                 $anhcu=$anhmoi;
                 move_uploaded_file($file_path, $new_path);               
            }
            else 
            {
                $anhcu=$anhcu;
            }                                 
            $ngaycapnhap = date('Y-m-d H:i:s');
            $phigiao = $_POST['txtPhiGiao'];
            $idkhuvuc = $_POST['KhuVuc'];
            $idloai = $_POST['Loai'];
            $idCtv = $_SESSION['IdCTV'];            
                $conn = new DbConnect();
                $name = $conn->query("set names 'utf8'");
                $conn->query("UPDATE `monan` SET `TenMonAn`='$ten',`GiaBan`='$giaban',`MoTa`='$mota',`AnhBia`= '$anhcu',`PhiGiao`='$phigiao',`IdKhuVuc`='$idkhuvuc',`IdLoai`='$idloai' WHERE monan.IdMonAn = '$idmonan'");
           echo '<script>alert("Sửa món ăn thành công."); </script>'; 
           echo '<script>window.location = "monan.php"; </script>';
        }       
        ?>
    </body>
</html>









