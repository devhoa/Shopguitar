<table cellspacing="0" border="1">
    <tr>
        <th width ="100">STT </th>
        <th width ="150">Mã Đơn Đặt Hàng </th>
        <th width ="100">Ngày lập</th>
        <th width ="200">Khách hàng</th>
        <th width ="100">Tình Trạng</th>
        <th width ="200">Thao tác</th>
        
    </tr>
    <?php 
        if(!isset($_POST["txtTim"]))
            DataProvider::ChangeURL("index.php?c=404");
        $id = $_POST["txtTim"];
        $sql ="SELECT d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, t.TenHienThi, tt.TenTinhTrang from
        DonDatHang d, TaiKhoan t,TinhTrang tt WHERE d.MaTaiKhoan=t.MaTaiKhoan AND d.MaTinhTrang=tt.MaTinhTrang ORDER BY d.MaTinhTrang,d.NgayLap and d.MaDonDatHang like '%$id%'";
        $result = DataProvider::ExecuteQuery($sql);
        $i =1 ;
        while ($row = mysqli_fetch_array($result))
        {
            $c= "";
            switch ($row["MaTinhTrang"])
            {
                case 2:
                    $c="classGiaoHang";
                    break;
                case 3:
                    $c="classThanhToan";
                    break;
                case 4:
                    $c="classHuy";
                    break;
            }
            ?>
                <tr class="<?php echo $c;?>">
                    <td><?php echo $i++?></td>
                    <td><?php echo $row["MaDonDatHang"];?></td>
                    <td><?php echo $row["NgayLap"];?></td>
                    <td><?php echo $row["TenHienThi"];?></td>
                    <td><?php echo $row["TenTinhTrang"];?></td>
                    <td>
                        <a href="index.php?c=5&a=2&id=<?php echo $row["MaDonDatHang"]?>">
                            <img src="images/edit.png"/>
                        </a>
                    </td>
                </tr>
                <?php
        }
    ?>
</table>