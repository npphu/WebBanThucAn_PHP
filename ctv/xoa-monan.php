<?php

    require_once '../DBConnect.php';

    if (isset($_GET['IdMonAn'])) 
    {
        $idmonan = $_GET['IdMonAn'];
    } 
    else 
    {
        echo '<script> alert("Không có mã món ăn.");<script>';
    }
    $conn = new DbConnect();
    $monan = $conn->query("Select * from DonHang where DonHang.IdMonAn= $idmonan ");                                                   
    $soluongmonan = mysqli_num_rows($monan);
    if($soluongmonan > 0)
    {
         echo '<script>window.location = "tb-xoa-monan.php"; </script>';         
    }
    else 
    {
        $conn = new DbConnect();
        $name = $conn->query("set names 'utf8'");
        $conn->query("DELETE from monan where idmonan='$idmonan'");
        header("Location: monan.php");
    }
   
?>


