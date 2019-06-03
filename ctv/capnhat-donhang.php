<?php

    require_once '../DBConnect.php';
    $conn = new DbConnect();

    if (isset($_GET['IdDatHang'])) 
    {
        $iddh = $_GET['IdDatHang'];
    } 
    $conn = new DbConnect();
    $name = $conn->query("set names 'utf8'");
    $conn->query("UPDATE `dathang` SET `TinhTrangGiao`=1,`TinhTrangThanhToan`=1 WHERE IdDatHang = '$iddh' ");
    echo '<script> alert("Update thành công");<script>';
    header("Location: donhang.php");         
?>





