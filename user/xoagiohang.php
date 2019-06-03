<?php
    session_start();
    $giohang = $_SESSION['GioHang'];
    $id=$_GET['IdMonAn'];
    if($id == 0)
    {
        unset($_SESSION['GioHang']);
        
    }
 else {
        unset($_SESSION['GioHang'][$id]);
}
header("location:../giohang.php");
exit();
?>


