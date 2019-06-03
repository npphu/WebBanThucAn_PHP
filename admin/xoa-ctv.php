<?php

    require_once '../DBConnect.php';
    $conn = new DbConnect();

    if (isset($_GET['IdCtv'])) 
    {
        $idctv = $_GET['IdCtv'];
    }
    $monan = $conn->query("Select * from MonAn where monan.Idctv= $idctv ");                                                   
    $soluongmonan = mysqli_num_rows($monan);
    if($soluongmonan > 0)
    {
         echo '<script>window.location = "tb-xoa-ctv.php"; </script>';         
    }
 else {
     $conn = new DbConnect();
    $name = $conn->query("set names 'utf8'");
    $conn->query("DELETE from congtacvien where IdCtv='$idctv'");
    echo '<script> alert("Xóa thành công");<script>';
    header("Location: ctv.php");     
}
           
?>





