<html>
    <head>
        <meta charset="utf-8">
        <title>Kết quản tìm kiếm</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">

        <link href="css-js/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css-js/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

        <link href="css-js/themes/css/bootstrappage.css" rel="stylesheet"/>

        <!-- global styles -->
        <link href="css-js/themes/css/flexslider.css" rel="stylesheet"/>
        <link href="css-js/themes/css/main.css" rel="stylesheet"/>

        <!-- scripts -->
        <script src="css-js/themes/js/jquery-1.7.2.min.js"></script>
        <script src="css-js/bootstrap/js/bootstrap.min.js"></script>				
        <script src="css-js/themes/js/superfish.js"></script>	
        <script src="css-js/themes/js/jquery.scrolltotop.js"></script>        
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'/>
        <link href="css-js/bootstrap/css/phantrang.css" rel="stylesheet" type="text/css"/>   
        <link href="css-js/bootstrap/css/giohang.css" rel="stylesheet" type="text/css"/>
        <link href="css-js/bootstrap/css/singup.css" rel="stylesheet" type="text/css"/>
    </head> 
    <body>
        <div id="wrapper" class="container">
            <section class="header_text sub">
                <img class="pageBanner" src="images/LogoBanner/banner_drink.png" alt="New products" >         
            </section>
            <section class="main-content">
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span12">
                                <a href="index.php"><button class="btn btn-primary">Trang chủ</button></a>
                                <h4 class="title">
                                    <span class="pull-left"><span class="text"><span class="line">KẾT QUẢ <strong> TÌM KIẾM</strong></span></span></span>
                                </h4>
                                <div id="myCarousel-2" class="myCarousel carousel slide">
                                    <div class="carousel-inner">
                                        <div class="active item">
                                            <ul class="thumbnails">												                                                                                                
                                                <?php
                                                require_once 'DBConnect.php';
                                                $conn = new DbConnect();
                                                $name = $conn->query("set names 'utf8'");
                                                $tenmonan = $_POST['txtKey'];
                                                $monan = $conn->query("Select * from MonAn WHERE MonAn.TenMonAn like '%$tenmonan%'  ");

                                                $num = mysqli_num_rows($monan);

                                                if ($num > 0 && $tenmonan != NULL) {
                                                    echo ' <h4 class="center">CÓ ' . $num . ' KẾT QUẢ TÌM THẤY </h4>';
                                                    while ($row = mysqli_fetch_array($monan)) {
                                                        echo '<li class="span3">
                                                            <div class="product-box">
                                                                <span class="sale_tag"></span>
                                                                <p><a href="index.php?view=chitietsanpham&IdMonAn=' . $row["IdMonAn"] . '"><img src="images/MonAn/' . $row["AnhBia"] . '" style="height:200px; width:370px" alt=""/></a></p>                                                       
                                                                <a href="index.php?view=chitietsanpham&IdMonAn=' . $row["IdMonAn"] . '" class="title">' . $row["TenMonAn"] . '</a><br/>
                                                                <a  class="category"> ' . number_format($row['GiaBan'], 0) . ' VNĐ</a>';
                                                        $km = $conn->query("SELECT * from khuyenmai");
                                                        while ($khuyenmai = mysqli_fetch_array($km)) {
                                                            if ($khuyenmai['IdMonAn'] == $row['IdMonAn']) {
                                                                echo '<a  class="category"> (-' . $khuyenmai['GiamGia'] . '%)</a>';
                                                            }
                                                        }
                                                        echo '</br><a href="./user/themgiohang.php?item=' . $row['IdMonAn'] . '" class="category"><img src="images/icon/icon-add.png" title="Thêm vào giỏi hàng." style="height:40px; width:40px" alt=""/></a>
                                                            </div>
                                                            </li>';
                                                    }
                                                } else {
                                                    echo '<script>alert("Không tim thấy sản phẩm"); </script>';
                                                    echo '<script>window.location = "index.php"; </script>';
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
        </div>
    </body>
</html>


