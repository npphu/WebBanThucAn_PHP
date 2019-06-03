<?php

    require_once '../DBConnect.php';
    $conn = new DbConnect();

    if (isset($_GET['IdLoai'])) 
    {
        $idkhuvuc = $_GET['IdLoai'];
    } 
    else 
    {
        echo '<script> alert("Không có mã món ăn.");<script>';
    }
    $monan = $conn->query("Select * from MonAn where monan.IdLoai= $idkhuvuc ");                                                   
    $soluongmonan = mysqli_num_rows($monan);
    if($soluongmonan > 0)
    {
         echo '<script>window.location = "tb-xoa-loai.php"; </script>';         
    }
    else {
    $conn = new DbConnect();
    $name = $conn->query("set names 'utf8'");
    $conn->query("DELETE from loaimonan where Idloai='$idkhuvuc'");
    echo '<script> alert("Xóa thành công");<script>';
    header("Location: loai.php");   
}
       
?>


