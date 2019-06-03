
<section class="main-content">
    <h4 class="title">
        <span class="pull-left"><span class="text"><span class="line">Chi tiết<strong> Sản phẩm</strong></span></span></span>
    </h4>
    <div class="row">						
        <div class="span9">
            <div class="row">
                <div class="span4">                   
                     <?php
                    require_once 'DBConnect.php';
                    $conn = new DbConnect();
                    $name = $conn->query("set names 'utf8'");
                    if (isset($_GET['IdMonAn'])) {
                        $id = $_GET['IdMonAn'];
                        $monan = $conn->query("Select * from MonAn, KhuVuc, LoaiMonAn, CongTacVien WHERE monan.IdMonAn = '$id' and monan.IdKhuVuc=khuvuc.IdKhuVuc and monan.IdLoai = loaimonan.IdLoai and monan.IdCtv=congtacvien.IdCtv");                     
                        $row = mysqli_fetch_array($monan); 
                        
                        $idloai = $row['IdLoai'];
                        $idctv = $row['IdCtv'];
                        
                        $ma = $conn->query("SELECT * from monan WHERE IdLoai='$idloai' limit 0,4");
                        $congtacvien = $conn->query("SELECT * from monan WHERE IdCtv='$idctv' limit 0,4");                                               
                    }                    
                    echo '<a href="#" class="thumbnail" data-fancybox-group="group1" title="' . $row['TenMonAn'] . '"><img alt="" src="images/MonAn/' . $row['AnhBia'] . '"></a>';
                    ?> 
                     <div class="fb-like" data-href="http://localhost/sfood/index.php" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                </div>
                <div class="span5">
                    <address>
                        <strong>Tên sản phẩm:</strong> <span><?php echo $row['TenMonAn']; ?></span><br>
                        <strong>Loại:</strong> <span><?php echo $row['TenLoai']; ?></span><br>
                        <strong>Khu vực:</strong> <span><?php echo  $row['TenKhuVuc']; ?></span><br>
                        <strong>Người bán:</strong> <span><?php echo  $row['HoTen']; ?></span><br>
                        <strong>Liên hệ:</strong> <span><?php echo  $row['DienThoai']; ?></span><br>
                    </address>									
                    <h4 style="color:red"><strong>Giá: <?php echo number_format($row['GiaBan'],0); ?> VNĐ</strong></h4>
                </div>
                <hr/>
                <div class="span5">                   
                    <a href="./user/themgiohang.php?item= <?php echo $row['IdMonAn']; ?>" class="category"><img src="images/icon/icon-add.png" title="Thêm vào giỏi hàng." style="height:40px; width:40px" alt=""/></a> 
                </div>
               
            </div>
            <div class="row">
                <div class="span9">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home">Mô tả</a></li>                      
                    </ul>							 
                    <div class="tab-content">
                        <div class="tab-pane active" id="home"><?php echo $row['MoTa']; ?></div>                       
                    </div>							
                </div>						
                <div class="span9">
                <br>
                <h4 class="title">
                    <span class="pull-left"><span class="text"><strong>MỜI BẠN</strong> NHẬN XÉT</span></span>                    
                </h4>
                <div class="fb-comments" data-href="http://localhost/sfood/index.php?view=chitietsanpham&IdMonAn=<?php echo $row['IdMonAn']; ?>" data-width="830" data-numposts="5"></div>                             
            </div>
            </div>
        </div>
        <div class="span3 col">
            <div class="block">	
                <ul class="nav nav-list">
                    <li class="nav-header">Món ăn cùng loại</li>
                    <?php
                        while ($loai= mysqli_fetch_array($ma))
                        {
                            echo '<li><a href="index.php?view=chitietsanpham&IdMonAn='.$loai["IdMonAn"].'">'.$loai['TenMonAn'].'</a></li>  ';
                        }
                    ?>
                                    
                </ul>
                <br/>
                <ul class="nav nav-list below">
                    <li class="nav-header">Cùng người bán <?php echo $row['HoTen']; ?></li>
                     <?php
                        while ($ctv= mysqli_fetch_array($congtacvien))
                        {
                            echo '<li><a href="index.php?view=chitietsanpham&IdMonAn='.$ctv["IdMonAn"].'">'.$ctv['TenMonAn'].'</a></li>  ';
                        }
                    ?>
                </ul>
            </div>                      
        </div>
    </div>
</section>
