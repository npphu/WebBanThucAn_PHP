
<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['Admin'])) {
    echo '<script>window.location = "../admin/dangnhap-admin.php"; </script>';
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin-CTV</title>
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
                            if (isset($_SESSION['Admin'])) {
                                echo '<li><a href="index.php">Trang chủ</a></li> <li><a>Chào ' . $_SESSION['Admin'] . '</a></li>';
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
                                <h4 class="center">DANH SÁCH CỘNG TÁC VIÊN</h4>
                                <p class="container left">
                                    <a href="them-ctv.php">  <img src="../images/icon/icon-add_1.png" style="width: 50px; height: 50px" title="Thêm mới" alt=""/> </a>                             
                                </p>
                                <table class="table table-bordered table-hover table-striped" style="font-size:14px">
                                    <thead style="background-color:orange">
                                        <tr>
                                            <th class="center">
                                                Họ tên
                                            </th>
                                            <th class="center">
                                                CMND
                                            </th>
                                            <th class="center">
                                                Email
                                            </th>
                                            <th class="center">
                                                Địa chỉ
                                            </th>
                                            <th class="center" >
                                                Điện thoại
                                            </th>
                                            <th class="center">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                                <?php
                                                    require_once '../DBConnect.php';
                                                    $conn = new DbConnect();
                                                    $name=$conn->query("set names 'utf8'");                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                                                    $ctv = $conn->query("Select * from CongTacVien");                                            
                                                    while($row= mysqli_fetch_array($ctv))
                                                    {
                                                        echo '<tr>
                                                                <td class="center" style="vertical-align: middle">
                                                                        '.$row['HoTen'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        '.$row['CMND'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                       '.$row['Email'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                       '.$row['DiaChi'].'
                                                                    </td>
                                                                    <td class="center" style="vertical-align: middle">
                                                                        '.$row['DienThoai'].'
                                                                    </td>

                                                                   <td class="center" style="vertical-align: middle">
                                                                        <a href="sua-ctv.php?IdCtv='.$row['IdCtv'].'">  <img src="../images/icon/icon-update.png" style="width: 40px; height: 40px" title="Sửa món ăn" alt=""/> </a>                          
                                                                        <a href="xoa-ctv.php?IdCtv='.$row['IdCtv'].'" title="BCDONLINE CONFIRM YES/ NO" onclick="return confirmAction()">  <img src="../images/icon/icon-delete.png" style="width: 40px; height: 40px" title="Xóa món ăn" alt=""/> </a>                                           
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

