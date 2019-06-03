


<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['NguoiDung'])) {
    echo '<script>window.location = "../user/dangnhap.php"; </script>';
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sfood</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">

        <link href="../css-js/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="../css-js/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

        <link href="../css-js/themes/css/bootstrappage.css" rel="stylesheet"/>

        <!-- global styles -->
        <link href="../css-js/themes/css/flexslider.css" rel="stylesheet"/>
        <link href="../css-js/themes/css/main.css" rel="stylesheet"/>

        <!-- scripts -->
        <script src="../css-js/themes/js/jquery-1.7.2.min.js"></script>
        <script src="../css-js/bootstrap/js/bootstrap.min.js"></script>				
        <script src="../css-js/themes/js/superfish.js"></script>	
        <script src="../css-js/themes/js/jquery.scrolltotop.js"></script>
               
    </head>
    <body>
        <div id="wrapper" class="container">
            <section class="navbar main-menu">
                <div class="navbar-inner main-menu">
                    <a href="../index.php"><img src="../images/LogoBanner/logo-sfood.png" style="height:55px; width:193px" alt=""></a>
                    <nav id="menu" class="pull-right">
                        <ul>
                            <?php
                            if (isset($_SESSION['NguoiDung'])) 
                            {
                                echo '<li><a href="../index.php">Trang chủ</a></li>';
                            }
                            ?>                           
                        </ul>

                    </nav>
                </div>
            </section>
            <br />
            <br />
            <section class="main-content">
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span12">
                                <h4 class="title">
                                    <span class="pull-left"><span class="text"><span class="line">QUẢN <strong>LÝ</strong></span></span></span>
                                </h4>                               
                                <h4 class="center">LỊCH SỬ MUA HÀNG</h4> 
                                <p class="container left">
                                    <a href="../index.php">  <img src="../images/icon/icon-home.png" style="width: 60px; height: 60px" title="Thêm mới" alt=""/> </a>                             
                                </p>
                                <table class="table table-bordered table-hover table-striped" style="font-size:14px">
                                    <thead style="background-color:orange">
                                        <tr>
                                            <th class="center">
                                                Tên món ăn
                                            </th>
                                             <th class="center">
                                                Số lượng
                                            </th> 
                                            <th class="center">
                                                Giá bán
                                            </th> 
                                             <th class="center">
                                                Ngày mua
                                            </th>                                           
                                        </tr>
                                    </thead>
                                                <?php
                                                $iduser = $_SESSION['IDNguoiDung'];
                                                    require_once '../DBConnect.php';
                                                    $conn = new DbConnect();
                                                    $name=$conn->query("set names 'utf8'");                              
                                                    $ctv = $conn->query("SELECT * from donhang, dathang, monan,  nguoidung
                                                            WHERE nguoidung.IdUser=dathang.IdUser AND dathang.IdDatHang=donhang.IdDatHang AND monan.IdMonAn=donhang.IdMonAn AND dathang.IdUser = '$iduser'
                                                            GROUP BY dathang.IdDatHang 
                                                            ORDER BY dathang.IdDatHang DESC");                                            
                                                    while($row= mysqli_fetch_array($ctv))
                                                    {
                                                        echo '<tr>
                                                                <td class="center" style="vertical-align: middle">
                                                                        '.$row['TenMonAn'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        '.$row['SoLuong'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        '.$row['GiaBan'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        '.$row['ThoiGianDatHang'].'
                                                                    </td>                                                                  
                                                                </tr>';
                                                    }                                                  
                                                ?>                                                  
                                </table>                               
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</section>
        <SCRIPT LANGUAGE="JavaScript">
              function confirmAction() {
                return confirm("Bạn có chắc muốn xóa không ?")
              }
        </SCRIPT>
         <script src="./css-js/themes/js/common.js"></script>
        <script src="./css-js/themes/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript">
            $(function () {
                $(document).ready(function () {
                    $('.flexslider').flexslider({
                        animation: "fade",
                        slideshowSpeed: 3500,
                        animationSpeed: 600,
                        controlNav: false,
                        directionNav: true,
                        controlsContainer: ".flex-container" // the container that holds the flexslider
                    });
                });
            });
        </script>
</body>
</html>





