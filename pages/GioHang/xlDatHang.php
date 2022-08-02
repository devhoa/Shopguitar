<?php
    session_start();
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php";

    if(isset($_SESSION["GioHang"]))
    {
        $gioHang = unserialize($_SESSION["GioHang"]);
        $maTaiKhoan = $_SESSION["MaTaiKhoan"];

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $ngayLap = date("Y-m-d H:i:s");
        $ngayLapTam = date("Y-m-d");
        $maTinhTrang =1;
        $tongGia = $_SESSION["TongGia"];

        $sql = "SELECT MaDonDatHang from DonDatHang where NgayLap like '$ngayLapTam%'
        ORDER BY MaDonDatHang DESC LIMIT 1";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        $r = "081012003";
        $sttMaDonDatHang = 0;
        if($row != null)
        {
            $sttMaDonDatHang = substr($row["MaDonDatHang"],6,3);
        }
        $sttMaDonDatHang+=1;
        $sttMaDonDatHang = sprintf("%03s",$sttMaDonDatHang);

        $maDonDatHang = date("d").date("m").substr(date("Y"),2,2).$sttMaDonDatHang;

        $sql = "INSERT INTO DonDatHang(MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang )
        values ('$maDonDatHang','$ngayLap',$tongGia,$maTaiKhoan,$maTinhTrang) ";
        DataProvider::ExecuteQuery($sql);

        $soLuongSanPham = count($gioHang->listProduct);
        for($i=0;$i<$soLuongSanPham;$i++)
        {
            $id = $gioHang->listProduct[$i]->id;
            $sl = $gioHang->listProduct[$i]->num;

            $sql = "SELECT GiaSanPham, SoLuongTon from SanPham where MaSanPham = $id";
            $result = DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);

            $soLuongTonHienTai = $row["SoLuongTon"];
            $giaSanPham = $row["GiaSanPham"];

            $sttChiTietDonDatHang = sprintf("%02s",$i);
            $maChiTietDonDatHang = $maDonDatHang.$sttChiTietDonDatHang;

            $sql = "INSERT INTO ChiTietDonDatHang(MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham)
            values ('$maChiTietDonDatHang', $sl, $giaSanPham, $maDonDatHang,$id)";
            DataProvider::ExecuteQuery($sql);

            $soLuongTonMoi = $soLuongTonHienTai-$sl;
            $sql = "UPDATE SanPham set SoLuongTon = $soLuongTonMoi where MaSanPham=$id";
            DataProvider::ExecuteQuery($sql);
        }
        unset($_SESSION["GioHang"]);
        DataProvider::ChangeURL("../../index.php?a=5&sub=2");
    }
    else
        DataProvider::ChangeURL("../../index.php?a=404");
?>