<?php

    require_once '../DBConnect.php';
    $conn = new DbConnect();

    if (isset($_GET['IdKhuVuc'])) 
    {
        $idkhuvuc = $_GET['IdKhuVuc'];
    } 
    else 
    {
        echo '<script> alert("Không có mã món ăn.");<script>';
    }
    $monan = $conn->query("Select * from MonAn where monan.IdKhuVuc= $idkhuvuc ");                                                   
    $soluongmonan = mysqli_num_rows($monan);
    if($soluongmonan > 0)
    {
         echo '<script>window.location = "tb-xoa-khuvuc.php"; </script>';         
    }
    else {
    $conn = new DbConnect();
    $name = $conn->query("set names 'utf8'");
    $conn->query("DELETE from khuvuc where IdKhuVuc='$idkhuvuc'");
    echo '<script> alert("Xóa thành công");<script>';
    header("Location: khuvuc.php");   
}
       
?>

