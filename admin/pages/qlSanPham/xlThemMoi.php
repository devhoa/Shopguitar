<?php
    include "../../../lib/DataProvider.php";

    if(isset($_POST["txtTen"]))
    {
        $ten = $_POST["txtTen"];
        $hang = $_POST["cmbHang"];
        $loai = $_POST["cmbLoai"];
        $hinh = $_FILES['fHinh']['name'];
        $gia = $_POST["txtGia"];
        $ton = $_POST["txtTon"];
        $mota = $_POST["txtMoTa"];
        /*date_default_timezone_get("Asia/Ho_Chi_Minh");*/
        $ngayNhap = date("Y-m-d H:i:s");

        $sql = "INSERT INTO SanPham(TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,
        SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat) 
        values('$ten','$hinh',$gia,'2012-10-06 00:00:00','$ton',0,0,'$mota',0,$loai,$hang)";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=2");
?>