
<section class="main-content">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <h4 class="title">
                        <span class="pull-left"><span class="text"><span class="line">Món ăn theo<strong> Khu vực</strong></span></span></span>
                    </h4>
                    <div id="myCarousel-2" class="myCarousel carousel slide">
                        <div class="carousel-inner">
                            <div class="active item">
                                <ul class="thumbnails">												                                                                                                
                                    <?php
                                    require_once 'DBConnect.php';
                                    $conn = new DbConnect();
                                    $name = $conn->query("set names 'utf8'");                                                                        
                                    if(isset($_GET['IdKhuVuc']))
                                    {
                                         $id=$_GET['IdKhuVuc'];
                                          $monantheoloai = $conn->query("Select * from MonAn, khuvuc WHERE MonAn.IdKhuVuc = khuvuc.IdKhuVuc and MonAn.IdKhuVuc = $id");
                                        while ($row = mysqli_fetch_array($monantheoloai)) {
                                            echo '<li class="span3">
                                                        <div class="product-box">
                                                            <span class="sale_tag"></span>
                                                            <p><a href="index.php?view=chitietmonan&IdMonAn=' . $row["IdMonAn"] . '"><img src="images/MonAn/' . $row["AnhBia"] . '" style="height:200px; width:370px" alt=""/></a></p>                                                       
                                                            <a href="product_detail.html" class="title">' . $row["TenMonAn"] . '</a><br/>                      
                                                            <a href="products.html" class="category"> ' . number_format($row['GiaBan'], 0) . ' VNĐ</a> <br/>
                                                            <a href="products.html" class="category"><img src="images/icon/icon-add.png" title="Thêm vào giỏi hàng." style="height:40px; width:40px" alt=""/></a><br/>
                                                            <b><a href="product_detail.html" class="category">Khu vực: ' . $row["TenKhuVuc"] . '</a></b>
                                                        </div>
                                                        </li>';
                                        }
                                             
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


