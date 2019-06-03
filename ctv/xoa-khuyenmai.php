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
    $name = $conn->query("set names 'utf8'");
    $conn->query("DELETE from khuyenmai where idmonan='$idmonan'");
    header("Location: khuyenmai.php");
?>

