<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id= $_GET["id"];
        $sql = "SELECT COUNT(*) FROM SanPham where MaHangSanXuat = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);

        if($row[0]==0)
        {
            $sql = "DELETE FROM HangSanXuat where MaHangSanXuat = $id";
        }
        else{
            $sql = "UPDATE HangSanXuat set BiXoa = 1- BiXoa where MaHangSanXuat = $id";
        }
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=4");
?>