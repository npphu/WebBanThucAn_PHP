
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
        <title>CTV-Món ăn</title>
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
                    <a href="monan.php"><img src="../images/LogoBanner/logo-sfood.png" style="height:55px; width:193px" alt=""></a>
                    <nav id="menu" class="pull-right">
                        <ul>
                            <?php
                            if (isset($_SESSION['CTV'])) {
                                echo '<li><a href="index.php">Trang chủ</a></li> <li><a>Chào ' . $_SESSION['CTV'] . '</a></li>';
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
                                <h4 class="center">DANH SÁCH MÓN ĂN</h4>
                                <p class="container left">
                                    <a href="them-monan.php">  <img src="../images/icon/icon-add_1.png" style="width: 60px; height: 60px" title="Thêm mới" alt=""/> </a>                             
                                </p>
                                <table class="table table-bordered table-hover table-striped" style="font-size:14px">
                                    <thead style="background-color:orange">
                                        <tr>
                                            <th class="center">
                                                Tên món ăn
                                            </th>
                                            <th class="center">
                                                Ảnh
                                            </th>
                                            <th class="center">
                                                Giá bán
                                            </th>
                                            <th class="center">
                                                Khu vực
                                            </th>
                                            <th class="center" >
                                                Loại
                                            </th>
                                            <th class="center">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                                <?php
                                                    require_once '../DBConnect.php';
                                                    $conn = new DbConnect();
                                                    $name=$conn->query("set names 'utf8'");  
                                                    $idctv = $_SESSION['IdCTV'];
                                                    $ctv = $conn->query("SELECT IdMonAn, TenMonAn, AnhBia, GiaBan, TenKhuVuc, TenLoai "
                                                            . "FROM monan, congtacvien, khuvuc, loaimonan "
                                                            . "WHERE monan.IdCtv='$idctv' AND monan.IdKhuVuc = khuvuc.IdKhuVuc and monan.IdLoai = loaimonan.IdLoai "
                                                            . "GROUP BY TenMonAn order by monan.IdMonAn desc");                                            
                                                    while($row= mysqli_fetch_array($ctv))
                                                    {
                                                        echo '<tr>
                                                                <td class="center" style="vertical-align: middle">
                                                                        '.$row['TenMonAn'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        <img src="../images/MonAn/'.$row['AnhBia'].'" style="width:190px" />
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                       '.$row['GiaBan'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                       '.$row['TenKhuVuc'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        '.$row['TenLoai'].'
                                                                    </td>

                                                                    <td class="center" style="vertical-align: middle">
                                                                        <a href="sua-monan.php?IdMonAn='.$row['IdMonAn'].'">  <img src="../images/icon/icon-update.png" style="width: 40px; height: 40px" title="Sửa món ăn" alt=""/> </a>                          
                                                                        <a href="xoa-monan.php?IdMonAn='.$row['IdMonAn'].'" title="BCDONLINE CONFIRM YES/ NO" onclick="return confirmAction()">  <img src="../images/icon/icon-delete.png" style="width: 40px; height: 40px" title="Xóa món ăn" alt=""/> </a>                                           
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
                return confirm("Bạn có chắc muốn xóa món ăn này không ?")
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


