<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sfood-Index</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        
        <link href="./css-js/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="./css-js/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

        <link href="./css-js/themes/css/bootstrappage.css" rel="stylesheet"/>

        <!-- global styles -->
        <link href="./css-js/themes/css/flexslider.css" rel="stylesheet"/>
        <link href="./css-js/themes/css/main.css" rel="stylesheet"/>

        <!-- scripts -->
        <script src="./css-js/themes/js/jquery-1.7.2.min.js"></script>
        <script src="./css-js/bootstrap/js/bootstrap.min.js"></script>				
        <script src="./css-js/themes/js/superfish.js"></script>	
        <script src="./css-js/themes/js/jquery.scrolltotop.js"></script>        
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'/>
        <link href="./css-js/bootstrap/css/phantrang.css" rel="stylesheet" type="text/css"/>   
        <link href="./css-js/bootstrap/css/giohang.css" rel="stylesheet" type="text/css"/>
        <link href="css-js/bootstrap/css/singup.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
   
    <div id="fb-root"></div>
    <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=464148744394498&autoLogAppEvents=1"></script>

  
      <div id="top-bar" class="container">
            <div class="row">
                <div class="span4">
                    <form method="POST" action="timkiem.php" class="search_form">
                        <input type="text" name="txtKey" class="input-block-level search-query" Placeholder="Nhập tên món ăn và ấn Enter...">                     
                    </form>                 
                </div>             
                <div class="span8">
                    <div class="account pull-right">
                        <ul class="user-menu">                                           
                            <?php                               
                                if(!isset($_SESSION['NguoiDung']))
                                {
                                    echo '<li><a href="user/dangnhap.php">Đăng nhập</a></li>					
                                     <li><a href="user/dangky.php">Đăng ký</a></li>	';
                                }
                                else 
                                {
                                    echo '<li><a href="dangnhap.php">Chào '.$_SESSION['NguoiDung'].'</a></li>					
                                     <li><a href="user/thongtin-user.php">Thông tin</a></li>
                                     <li><a href="user/doimatkhau-user.php">Đổi mật khẩu</a></li>
                                     <li><a href="user/lichsumuahang.php">Lịch sử mua hàng</a></li>
                                     <li><a href="user/dangxuat.php">Thoát</a></li>';
                                }
                            ?>
                            <li><a href="about.php">About</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>    
        <div id="wrapper" class="container">
            <section class="navbar main-menu">
                <div class="navbar-inner main-menu">				
                    <a href="index.php" class="logo pull-left"><img src="images/LogoBanner/logo-sfood.png" style="height:55px; width:193px" class="site_logo" alt="Home"></a>
                    <nav id="menu" class="pull-right">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a  href="#">Loại</a>					
                                <ul>
                                    <li>
                                        <?php
                                            require_once 'DBConnect.php';
                                            $conn = new DbConnect();
                                            $name = $conn->query("set names 'utf8'");
                                            $ds = $conn->query('Select * from LoaiMonAn order by LoaiMonAn.TenLoai asc');
                                             while ($row = $ds -> fetch_assoc())            
                                            {
                                                 echo '<a href="index.php?view=monantheoloai&IdLoai='.$row["IdLoai"].'">'.$row['TenLoai'].'</a>';   
                                            }                                     
                                        ?>                                      
                                    </li>									                                 									
                                </ul>
                            </li>															                            			
                            <li><a href="#">Khu vực</a>
                                <ul>									
                                    <li>
                                        <?php
                                            require_once 'DBConnect.php';
                                            $conn = new DbConnect();
                                            $name = $conn->query("set names 'utf8'");
                                            $ds = $conn->query('Select * from KhuVuc order by KhuVuc.TenKhuVuc asc ');
                                             while ($row = $ds -> fetch_assoc())            
                                            {
                                                 echo '<a href="index.php?view=monantheokhuvuc&IdKhuVuc='.$row["IdKhuVuc"].'">'.$row['TenKhuVuc'].'</a>';                                           
                                            }                                     
                                        ?>                                      
                                    </li>	
                                </ul>
                            </li>							                           
                        </ul>
                    </nav>
                </div>
            </section>
            <section  class="homepage-slider" id="home-slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>             
                            <img src="images/LogoBanner/banner_dish.png" style="height: 200px" alt=""/>
                        </li>
                         <li>             
                            <img src="images/LogoBanner/banner_fastfood.png" style="height: 200px" alt=""/>
                        </li>
                        <li>                          
                            <img src="images/LogoBanner/banner_drink.png" style="height: 200px" alt=""/>
                            <div class="intro">
                                <h1>Mid season sale</h1>
                                <p><span>Up to 50% Off</span></p>
                                <p><span>On selected items online and in stores</span></p>
                            </div>
                        </li>
                    </ul>
                </div>			
            </section>            
            <?php if(isset($_GET['IdLoai'])) require_once './user/monantheoloai.php'; ?>
            <?php if(isset($_GET['IdKhuVuc'])) require_once './user/monantheokhuvuc.php'; ?>
            <?php if(isset($_GET['IdMonAn'])) require_once './user/chitietsanpham.php'; ?>
            
             <section class="main-content">
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span12">
                                <h4 class="title">
                                    <span class="pull-left"><span class="text"><span class="line">Món ăn <strong>Mới</strong></span></span></span>
                                </h4>
                                <div id="myCarousel-2" class="myCarousel carousel slide">
                                    <div class="carousel-inner">
                                        <div class="active item">
                                            <ul class="thumbnails">												                                                                                                
                                                <?php
                                                    require_once 'DBConnect.php';
                                                    $conn = new DbConnect();
                                                    $name=$conn->query("set names 'utf8'");
                                                    
                                                    $page = 1;
                                                    $limit = 8;
                                                    
                                                    
                                                    $ds = $conn->query('Select * from MonAn');
                                                    
                                                    $soluongmonan = mysqli_num_rows($ds);
                                                    $tongsotrang = ceil($soluongmonan/$limit);
                                                    
                                                    if(isset($_GET["page"]))
                                                        $page=$_GET["page"];
                                                    if($page<1)
                                                        $page=1;
                                                    if($page > $tongsotrang)
                                                        $page=$tongsotrang;
                                                    
                                                    $start = ($page - 1) * $limit;
                                                    
                                                    $monan = $conn->query("Select * from MonAn order by IdMonAn desc limit  $start,$limit ");                                            
                                                    while($row= mysqli_fetch_array($monan))
                                                    {
                                                        echo '<li class="span3">
                                                        <div class="product-box">
                                                            <span class="sale_tag"></span>
                                                            <p><a href="index.php?view=chitietsanpham&IdMonAn='.$row["IdMonAn"].'"><img src="images/MonAn/'.$row["AnhBia"].'" style="height:200px; width:370px" alt=""/></a></p>                                                       
                                                            <a href="index.php?view=chitietsanpham&IdMonAn='.$row["IdMonAn"].'" class="title">'.$row["TenMonAn"].'</a><br/>
                                                            <a  class="category"> '.number_format($row['GiaBan'],0).' VNĐ</a>';
                                                     
                                                        $km = $conn->query("SELECT * from khuyenmai" );
                                                        while ($khuyenmai= mysqli_fetch_array($km))
                                                        {
                                                            if($khuyenmai['IdMonAn'] == $row['IdMonAn'])
                                                            {
                                                                echo '<a  class="category"> (-'.$khuyenmai['GiamGia'].'%)</a>';
                                                            }
                                                        }                                                   
                                                        echo '</br><a href="./user/themgiohang.php?item='.$row['IdMonAn'].'" class="category"><img src="images/icon/icon-add.png" title="Thêm vào giỏi hàng." style="height:40px; width:40px" alt=""/></a>
                                                        </div>
                                                        </li>';
                                                    }                                                                                                     
                                                 ?>                                                 
                                            </ul>                                           
                                    </div>							
                                </div>
                            </div>						
                            </div>                                      
                    </div>				
                </div>
            </section>            
            <div id="container">
                <div class="pagination">     
                    <a href="index.php?page=1" class="page">Đầu trang</a>
                    <?php for($i=1;$i<=$tongsotrang;$i++) { ?>
                    <?php
                        if($page == $i)
                        {
                            echo '<a href="index.php?page='.$i.'" class="page active">'.$i.'</a>' ;  
                        }
                        else 
                        {
                            echo '<a href="index.php?page='.$i.'" class="page">'.$i.'</a>' ;  
                        }
                    ?>
                    <?php } ?>                                  
                    <a href="index.php?page=<?php echo $tongsotrang;?>"class="page">Cuối trang</a>
                </div>    
            </div>          
            <?php
            $ok = 1;
            if (isset($_SESSION['GioHang'])) {
                foreach ($_SESSION['GioHang'] as $k => $v) {
                    if (isset($v)) {
                        $ok = 2;
                    }
                }
            }
            if ($ok != 2) {
                // '<li><a href="#">Giỏ hàng(0)</a></li>';
            } else {
                $items = $_SESSION['GioHang'];            
                echo '<div id = "wrapper">
                <div class = "cart-tab visible">
                <a href = "#"  class = "cart-link">
                <span class = "amount"><img src="images/icon/cart-icon.png" title="Thêm vào giỏi hàng." style="height:40px; width:40px" alt=""/>('.count($items).')</span>              
                </a>                
                <div class = "cart">
                <div class = "cart-items">
                <ul>
                <li class = "clearfix">
                            
                <span class = "quantity">Có '.count($items).' sản phẩm trong giỏ hàng.</span>
                </li>             
                </ul>
                </div><!--@end .cart-items -->
                <a href = "giohang.php" class = "checkout">Giỏ Hàng</a>
                </div><!--@end .cart -->
                </div><!--@end .cart-tab -->';                             
            }
            ?>            
            <section id="footer-bar">
                <div class="row">
                    <div class="span3">  
                         <h3></h3>
                        <ul class="nav">                          
                            <li><a href="about.php">About</a></li>
                            <li><a href="about.php">Liên hệ</a></li>
                            <li><a href="giohang.php">Giỏ hàng</a></li>
                            <li><a href="/user/dangnhap.php">Đăng nhập</a></li>							
                        </ul>					
                    </div>
                    <div class="span4"> 
                        <h3></h3>
                        <ul class="nav">
                            <li><a href="/user/thongtin-user.php">Tài khoản</a></li>
                            <li><a href="/user/lichsumuahang.php">Lịch sử mua hàng</a></li>
                            <li><a href="/user/dangky.php">Đăng ký</a></li>
                            <li><a href="iindex.php">Home</a></li>
                        </ul>
                    </div>
                    <div class="span5">
                        <p class="logo"><img src="images/LogoBanner/logo-sfood.png" class="site_logo" alt=""></p>
                        <p></p>
                        <br/>
                    </div>					
                </div>	
            </section>
            <section id="copyright">
                <span>Copyright  <?php $date = getdate(); echo "(".$date['year'].")"?> Nguyễn Phước Phú</span>
            </section>
        </div>                
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
            <div class="zalo-chat-widget" data-oaid="3021233795120822301" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>

            <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    </body>
</html>