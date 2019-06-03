<!DOCTYPE html>
<?php
    session_start();
    if(isset($_POST['btnCapNhat']))
    {
        foreach ($_POST['soluong'] as $key => $value)
        {
            if(($value == 0) and (is_numeric($value)))
            {
                unset ($_SESSION['GioHang'][$key]);
            }
            elseif (($value > 0)  and (is_numeric($value)))
            {
                $_SESSION['GioHang'][$key] = $value;            
            }
        }
        header("location: giohang.php");
    }
?>
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
                <img class="pageBanner" src="images/LogoBanner/banner_drink.png" alt="New products" >         
            </section>
            <section class="main-content">				
                <div class="row">
                    <div class="span12">					
                        <h4 class="title"><span class="text"><strong>Giỏ</strong> hàng</span></h4>
                        <table  class="table  table-striped table-hover">
                <thead>
                    <tr class="center">
                        <th style="vertical-align:middle">Xóa</th>                    
                        <th style="vertical-align:middle">Ảnh</th>    
                         <th style="vertical-align:middle">Tên món ăn</th>
                        <th style="vertical-align:middle"> Số lượng</th>
                        <th style="vertical-align:middle">Giá bán</th>
                        <th style="vertical-align:middle">Thành tiền</th>
                        
                    </tr>
                </thead>
           <form action="giohang.php" method="post">
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
                                        <td style="vertical-align:middle"><a href="./user/xoagiohang.php?IdMonAn='.$row['IdMonAn'].'"><img src="images/icon/icon-delete.png" style="height:40px; width:40px" title="Xóa món ăn khỏi giỏ hàng" alt=""/></a></td>
                                        <td style="vertical-align:middle"><a href="index.php"><img src="images/MonAn/'.$row["AnhBia"].'" style="height:200px; width:250px" alt=""/></a></td>
                                        <td style="vertical-align:middle">'.$row['TenMonAn'].'</td>
                                        <td style="vertical-align:middle"><input type="text" placeholder="1" name="soluong['.$row['IdMonAn'].']" value="'.$sl.'" class="input-mini"></td>
                                        <td style="vertical-align:middle">'.number_format($row['GiaBan'],0).' VNĐ</td>
                                        <td style="vertical-align:middle">'.number_format($_SESSION['GioHang'][$row['IdMonAn']] * $row['GiaBan'],0).' VNĐ</td>
                                    </tr>';                 
                            $tong += $_SESSION['GioHang'][$row['IdMonAn']]*$row['GiaBan'];
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
                        
                            <p class="buttons left">				
                                <input type="submit" name="btnCapNhat" class="btn btn-success" value="Cập nhật"/>                                                       
                            </p>
                            <p class="buttons right">
                                <a href="dathang.php"><img src="images/icon/icon-check.png" style="height:60px; width:60px" title="Check out" alt=""/></a>
                                
                                <a href="./user/xoagiohang.php?IdMonAn=0" title="BCDONLINE CONFIRM YES/ NO" onclick="return confirmAction()"><img src="images/icon/icon-xoa-gio-hang.png" style="height:60px; width:60px" title="Xóa giỏ hàng" alt=""/></a>
                                <a href="index.php"><img src="images/icon/icon-home.png" style="height:60px; width:60px" title="Tiếp tục mua hàng" alt=""/></a>
                            </p>                        
                        </form>                				
                    </div>
                </div>
            </section>			
            
            <section id="copyright">
                 <span>Copyright  <?php $date = getdate(); echo "(".$date['year'].")"?> Nguyễn Phước Phú</span>
            </section>
        </div>
        <SCRIPT LANGUAGE="JavaScript">
              function confirmAction() {
                return confirm("Bạn có chắc muốn xóa không ?")
              }
        </SCRIPT>
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