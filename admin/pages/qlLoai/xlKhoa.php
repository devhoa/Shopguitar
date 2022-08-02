<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id= $_GET["id"];
        $sql = "SELECT COUNT(*) FROM SanPham where MaLoaiSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);

        if($row[0]==0)
        {
            $sql = "DELETE FROM LoaiSanPham where MaLoaiSanPham = $id";
        }
        else{
            $sql = "UPDATE LoaiSanPham set BiXoa = 1 - BiXoa where MaLoaiSanPham = $id";
        }
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=3");
?>