<?php
    include "../../../lib/DataProvider.php";

    if(isset($_POST["id"]))
    {   
        $id = $_POST["id"];
        $ten = $_POST["txtTen"];
        $hang = $_POST["cmbHang"];
        $loai = $_POST["cmbLoai"];
        $hinh = $_FILES['fHinh']['name'];
        $gia = $_POST["txtGia"];
        $slton = $_POST["txtTon"];
        $slban = $_POST["txtBan"];
        $mota = $_POST["txtMoTa"];
        /*date_default_timezone_get("Asia/Ho_Chi_Minh");*/
        $ngayNhap = date("Y-m-d H:i:s");

        $sql ="UPDATE SanPham set TenSanPham='$ten',MaHangSanXuat ='$hang',MaLoaiSanPham='$loai',
        HinhURL='$hinh',NgayNhap='$ngayNhap',GiaSanPham='$gia',SoLuongTon='$slton',SoLuongBan='$slban' where MaSanPham=$id ";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=2");
?>