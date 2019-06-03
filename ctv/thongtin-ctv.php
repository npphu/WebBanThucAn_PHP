
<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['CTV'])) {
    echo '<script>window.location = "../admin/dangnhap-admin.php"; </script>';
}
 $idCtv = $_SESSION['IdCTV'];
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sfood-CTV</title>
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
                    <a href="index.php"><img src="../images/LogoBanner/logo-sfood.png" style="height:55px; width:193px" alt=""></a>
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
                                <h4 class="center">THÔNG TIN CỘNG TÁC VIÊN</h4>
                                <p class="container right">
                                    <a href="sua-thongtinctv.php?IdCtv=<?php echo $idCtv; ?>">  <img src="../images/icon/icon-update.png" style="width: 50px; height: 50px" title="Sửa" alt=""/> </a>                             
                                </p>
                                <table class="table table-bordered table-hover table-striped" style="font-size:14px">
                                    <thead style="background-color:orange">                                       
                                    </thead>
                                                <?php
                                                    $idCtv = $_SESSION['IdCTV'];
                                                    require_once '../DBConnect.php';
                                                    $conn = new DbConnect();
                                                    $name=$conn->query("set names 'utf8'");                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                                                    $ctv = $conn->query("Select * from CongTacVien WHERE CongTacVien.IdCtv = '$idCtv'");                                            
                                                    while($row= mysqli_fetch_array($ctv))
                                                    {
                                                        echo '<tr>
                                                                <th class="center">
                                                                    Họ tên
                                                                </th>
                                                                <td class="center" style="vertical-align: middle">
                                                                        '.$row['HoTen'].'
                                                                 </td>
                                                              </tr>
                                                              <tr>
                                                                     <th class="center">
                                                                        CMND
                                                                     </th>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        '.$row['CMND'].'
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                     <th class="center">
                                                                             Ngày sinh
                                                                    </th>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        '.$row['NgaySinh'].'
                                                                    </td>
                                                                 </tr>
                                                                 <tr>
                                                                     <th class="center">
                                                                           Email
                                                                    </th>
                                                                    <td class="center" style="vertical-align: middle">
                                                                       '.$row['Email'].'
                                                                    </td>
                                                                  </tr>
                                                                  <tr>
                                                                   <th class="center">
                                                                            Địa chỉ
                                                                    </th>
                                                                    <td class="center" style="vertical-align: middle">
                                                                       '.$row['DiaChi'].'
                                                                    </td>
                                                                   </tr>
                                                                   <tr>
                                                                    <th class="center">
                                                                            Điện thoại
                                                                    </th>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        '.$row['DienThoai'].'
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
</body>
</html>



