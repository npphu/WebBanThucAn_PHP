<?php
session_start();
if (!isset($_SESSION['NguoiDung'])) 
{
    echo '<script>window.location = "user/dangnhap.php"; </script>';
} 
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sfood-Giỏ hàng</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
        <!-- bootstrap -->
        <link href="./css-js/bootstrap/css/bootstrap.min.css" rel="stylesheet">      
        <link href="./css-js/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
        <link href="./css-js/themes/css/bootstrappage.css" rel="stylesheet"/>


        <link href="./css-js/themes/css/flexslider.css" rel="stylesheet"/>
        <link href="./css-js/themes/css/main.css" rel="stylesheet"/>


        <script src="./css-js/themes/js/jquery-1.7.2.min.js"></script>
        <script src="./css-js/bootstrap/js/bootstrap.min.js"></script>				
        <script src="./css-js/themes/js/superfish.js"></script>	
        <script src="./css-js/themes/js/jquery.scrolltotop.js"></script>

    </head>
    <body>		       
        <div id="wrapper" class="container">           	
            <section class="header_text sub">
                <img class="pageBanner" src="images/LogoBanner/banner_dish.png" alt="New products" >         
            </section>
            <section class="main-content">				
                <div class="row">
                    <div class="span12">					
                        <h4 class="title"><span class="text"><strong>Thông tin</strong> đơn hàng</span></h4>
                        <table  class="table  table-striped table-hover">
                <thead>
                    <tr class="center"> 
                        <th style="vertical-align:middle"></th> 
                        <th style="vertical-align:middle">Ảnh</th>    
                         <th style="vertical-align:middle">Tên món ăn</th>
                        <th style="vertical-align:middle"> Số lượng</th>
                        <th style="vertical-align:middle">Giá bán</th>
                        <th style="vertical-align:middle">Thành tiền</th>
                        
                    </tr>
                </thead>
                <form action="dathang.php" method="post">
                <?php
                    $ok=1;
                    if(isset($_SESSION['GioHang']))
                    {
                        foreach ($_SESSION['GioHang'] as $k => $v)
                        {
                            if(isset($k))
                            {
                                $ok=2;
                            }
                        }
                    }
                    if($ok == 2)
                    {
                        foreach ($_SESSION['GioHang'] as $key=>$value)
                        {
                            $items[] = $key;
                        }
                        
                        require_once 'DBConnect.php';
                        $str = implode(",", $items);
                        $conn = new DbConnect();
                        $name=$conn->query("set names 'utf8'");
                        $query = $conn->query("Select * from MonAn where IdMonAn in ($str)");
                        $tong = 0;
                        while ($row= mysqli_fetch_array($query))
                        {
                            $sl= $_SESSION['GioHang'][$row['IdMonAn']];
                        echo '<tbody>
                                <tr>
                                <td style="vertical-align:middle"></td>
                                    <td style="vertical-align:middle"><a href="index.php"><img src="images/MonAn/'.$row["AnhBia"].'" style="height:200px; width:250px" alt=""/></a></td>
                                    <td style="vertical-align:middle">'.$row['TenMonAn'].'</td>
                                    <td style="vertical-align:middle"><input type="text" readonly="true" placeholder="1" name="soluong['.$row['IdMonAn'].']" value="'.$sl.'" class="input-mini"></td>
                                    <td style="vertical-align:middle">'.number_format($row['GiaBan'],0).' VNĐ</td>
                                    <td style="vertical-align:middle">'.number_format($_SESSION['GioHang'][$row['IdMonAn']] * $row['GiaBan'],0).' VNĐ</td>
                                </tr>';                 
                        $tong += $sl*$row['GiaBan'];
                    }
                    echo '<tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong style="color: red">Tạm tính: '.number_format($tong,0).' VNĐ</strong></td>
                    </tr>';
                }
                else {echo '<script>alert ("Giỏ hàng của bạn đang trống."); window.location="index.php"; </script>';}
                ?>                  

                </tbody>
                        </table>                       
                        <hr>
                        <p class="cart-total right">
                            <strong>Tổng tiền: </strong><?php echo number_format($tong,0); ?> VNĐ<br>
                            <strong>Khuyến mại: </strong>0 VNĐ<br>
                            <strong>Vận chuyển: </strong>0 VNĐ<br>
                            <strong>Phải trả: </strong><?php echo number_format($tong,0); ?> VNĐ<br>
                        </p>
                        <hr/>
                        <p class="cart-total left">
                            <strong>THÔNG TIN GIAO HÀNG</strong><br>
                            <strong>Người nhận: </strong><?php echo $_SESSION['NguoiDung']; ?><br>
                            <strong>Điện thoại: </strong><?php echo $_SESSION['DTNguoiDung']; ?><br>
                            <strong>Địa chỉ: </strong><?php echo $_SESSION['DCNguoiDung']; ?><br>                          
                        </p>
                        <hr/>                       
                            <p class="buttons left">				
                                <input type="submit" name="btnDatHang" class="btn btn-success" value="Đặt hàng"/> 
                            
                            </p>
                            <p class="buttons right">
                                <a href="giohang.php"><img src="images/icon/icon-cart.png" style="height:60px; width:60px" title="Quayt lại giỏ hàng" alt=""/></a>
                                <a href="index.php"><img src="images/icon/icon-home.png" style="height:60px; width:60px" title="Tiếp tục mua hàng" alt=""/></a>                                       
                            </p>                        
                        </form>                				
                    </div>
                </div>
            </section>			
            <?php
            
            if (isset($_POST['btnDatHang'])) 
            {
                if (!isset($_SESSION['NguoiDung'])) 
                {
                    echo '<script>window.location = "user/dangnhap.php"; </script>';
                } 
                else 
                {
                    require_once 'DBConnect.php';
                    $conn = new DbConnect();
                    $name = $conn->query("set names 'utf8'");

                    $iduser = $_SESSION['IDNguoiDung'];
                    $thoigiandathang = date('Y-m-d H:i:s');
                    $diachigiao = $_SESSION['DCNguoiDung'];
                    $tinhtranggiao = FALSE;
                    $tinhtrangthanhtoan = FALSE;                   
                    $thanhtien = $tong;
                    
                    $conn->DatHang($iduser, $thoigiandathang, $diachigiao, $tinhtranggiao, $tinhtrangthanhtoan, $thanhtien);  
                    
                        $iddathang = $conn->GetId();                        
                        foreach ($_SESSION['GioHang'] as $key=>$value)
                        {
                            $idmonan = key($_SESSION['GioHang']);
                            $soluong = current($_SESSION['GioHang']);
                            $conn->DonHang($iddathang,$idmonan,$soluong);
                            next($_SESSION['GioHang']);
                        }                                                                                                                                                                            
                    echo '<script>alert("Đặt hàng thành công."); </script>';
                    unset($_SESSION['GioHang']);
                   echo '<script>window.location = "giohang.php"; </script>';  
                }
            }
            ?>
            <section id="copyright">
                <span>Copyright  <?php $date = getdate(); echo "(".$date['year'].")"?> Nguyễn Phước Phú </span>
            </section>
        </div>
        <script src="themes/js/common.js"></script>
        <script>
            $(document).ready(function () {
                $('#checkout').click(function (e) {
                    document.location.href = "checkout.html";
                })
            });
        </script>		
    </body>
</html>
