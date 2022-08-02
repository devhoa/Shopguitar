<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        //Kiểm tra chi tiết đơn đặt hàng nào chứa sản phẩm muốn xóa không?
        $sql = "SELECT COUNT(*) FROM ChiTietDonDatHang WHERE MaSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);

        if($row[0] == 0)
        {
            //Thực hiện xóa loại sản phẩm này khổi DB
            $sql = "DELETE FROM SanPham WHERE MaSanPham = $id";
        }else
        {
            //Thực hiện khóa sản phẩm do đã có chi tiết đơn hàng chứa sản phẩm này

            $sql = "UPDATE SanPham SET BiXoa = 1 - BiXoa WHERE MaSanPham = $id";
        }

        DataProvider::ExecuteQuery($sql);
    }

    DataProvider::ChangeURL("../../index.php?c=2");
?>