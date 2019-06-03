<?php
class DbConnect
{
    const host = 'localhost';
    const user = 'sfood';
    const pass = '18021997';
    const db='sfood';
    private $link;


    public function __construct()
    {
        
        $this->link = new mysqli(self::host, self::user, self::pass, self::db);
        if( mysqli_connect_errno())
            echo "Loi";
    }
    
     public function __destruct()
    {
          
        $link = NULL;
    }
    
    
    public function query($query) 
    {
  
        return $this->link->query($query);
    }
    
    public function ThemNguoiDung($user, $pass, $ten, $mail, $diachi, $dienthoai, $gioitinh) 
    {
               
        $query = "Insert into  nguoidung(tenuser, passuser, hoten, email, diachi, dienthoai, gioitinh) values (?,?,?,?,?,?,?)";
        

        
        $stmt = $this->link->prepare($query);
        
        $stmt->bind_param( 'ssssssi',$user, $pass, $ten, $mail, $diachi, $dienthoai, $gioitinh);
        
        return $stmt->execute();
    }
    
    public function DatHang($iduser, $thoigiandathang, $diachigiao, $tinhtranggiao, $tinhtrangthanhtoan, $thanhtien) 
    {     
        $query2="INSERT INTO `dathang`(`IdUser`, `ThoiGianDatHang`, `DiaChiGiaoHang`, `TinhTrangGiao`, `TinhTrangThanhToan`, `ThanhTien`) VALUES (?,?,?,?,?,?)";
                
        $stmt2 = $this->link->prepare($query2);
        
        $stmt2->bind_param( 'issiii',$iduser, $thoigiandathang, $diachigiao, $tinhtranggiao, $tinhtrangthanhtoan, $thanhtien);
        
        return $stmt2->execute();

    }
    
    public function GetId() {
        return $this->link->insert_id;
    }
      
    public function DonHang($iddathang, $idmonan, $soluong) 
    {

               
        $query3 = "Insert into  DonHang(IdDatHang, IdMonAn, SoLuong) values (?,?,?)";
               
        $stmt3 = $this->link->prepare($query3 );
        
        $stmt3->bind_param( 'iii',$iddathang, $idmonan, $soluong);
        
        return $stmt3->execute();
    }
    
     public function ThemCongTacVien($ctv, $pass, $ten, $cmnd, $ngaysinh, $mail, $diachi, $dienthoai, $gioitinh, $quangcao, $ngayhethan) 
    {
               
        $query4 = "INSERT INTO `congtacvien`(`TenCtv`, `PassCtv`, `HoTen`, `CMND`, `Email`, `DiaChi`, `DienThoai`, `NgaySinh`, `GioiTinh`, `IdQuangCao`, `NgayHetHanQuangCao`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
              
        $stmt4 = $this->link->prepare($query4);
        
        $stmt4->bind_param( 'ssssssssiis',$ctv, $pass, $ten, $cmnd, $mail, $diachi, $dienthoai, $ngaysinh,  $gioitinh, $quangcao, $ngayhethan);
        
        return $stmt4->execute();
    }
    
    public function ThemMonAn($ten, $giaban, $mota, $anh, $ngaycapnhap, $phigiao, $idkhuvuc, $idloai, $idCtv) 
    {
        $query5 = "INSERT INTO `monan`(`TenMonAn`, `GiaBan`, `MoTa`, `AnhBia`, `NgayCapNhat`, `PhiGiao`, `IdKhuVuc`, `IdLoai`, `IdCtv`) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt5 = $this->link->prepare($query5);
        $stmt5->bind_param('sisssiiii', $ten, $giaban, $mota, $anh, $ngaycapnhap, $phigiao, $idkhuvuc, $idloai, $idCtv);
        return $stmt5->execute();
    }
    
   public function ThemKhuyenMai($idmonan, $giamgia, $ngaybatdau, $ngaykethuc) 
    {
        $query5 = "INSERT INTO `khuyenmai`(`IdMonAn`, `GiamGia`, `NgayBatDau`, `NgayKetThuc`) VALUES (?,?,?,?)";
        $stmt5 = $this->link->prepare($query5);
        $stmt5->bind_param('iiss', $idmonan, $giamgia, $ngaybatdau, $ngaykethuc);
        return $stmt5->execute();
    }
          
}
?>


