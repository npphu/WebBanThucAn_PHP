<?php
    session_start();
    $id = $_GET['item'];
    if(isset($_SESSION['GioHang'][$id]))
    {
        $soluong = $_SESSION['GioHang'][$id] + 1;
    }
    else 
    {
        $soluong = 1;
    }
    $_SESSION['GioHang'][$id] = $soluong;
    header("location:../index.php");
    exit();
?>

