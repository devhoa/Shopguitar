<?php 
    include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id=$_GET["id"];
        $a = $_GET["a"];

        $sql = "UPDATE DonDatHang SET MaTinhTrang = $a WHERE MaDonDatHang=$id";
        DataProvider::ExecuteQuery($sql);

        if($a==4)
        {
            $sql="SELECT MaSanPham,SoLuong FROM ChiTietDonDatHang WHERE MaDonDatHang=$id ";
            $result = DataProvider::ExecuteQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                $soLuong =$row["SoLuong"];
                $maSanPham =$row["MaSanPham"];
                $sql = "UPDATE SanPham SET SoLuongTon = SoLuongTon +$soLuong where MaSanPham=$maSanPham";
                DataProvider::ExecuteQuery($sql);
            }
        }

    }
    DataProvider::ChangeURL("../../index.php?c=5");
?>