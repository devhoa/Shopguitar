<div id="quanlygiohang">
    <h1>Quản lý giỏ hàng</h1>
    <table>
        <tr>
            <th width="100">STT</th>
            <th width="200">Tên sản phẩm</th>
            <th width="100">Hình</th>
            <th width="100">Giá</th>
            <th width="100">Số lượng</th>
            <th width="100">Thao tác</th>
        </tr>
        <?php
            $tongGia=0;
            if(isset($_SESSION["GioHang"]))
            {
                $soSanPham = count($gioHang->listProduct);
                for($i =0; $i<$soSanPham; $i++){
                    $id= $gioHang->listProduct[$i]->id;
                    $sql = "SELECT * FROM SanPham where MaSanPham = $id";
                    $result = DataProvider::ExecuteQuery($sql);
                    $row = mysqli_fetch_array($result);

                    ?>
                    <form name="frmGioHang" action ="pages/GioHang/xlCapNhatGioHang.php" method="post">
                        <tr>
                            <td>1</td>
                            <td>
                                <?php echo $row["TenSanPham"]; ?>
                            </td>
                            <td align="center">
                                <img src="images/<?php echo $row["HinhURL"];?>" width="50">
                            </td>
                            <td>
                               <?php echo $row["GiaSanPham"];?> 
                            </td>
                            <td>
                                <input type="text" name="txtSL" value="<?php echo $gioHang->listProduct[$i]->num;?>" width="45" size="5">
                                <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id;?>">
                            </td>
                            <td>
                                <input type="submit" value="Cập nhật số lượng">
                            </td>
                        </tr>
                    </form>
                    <?php
                    $tongGia += $row["GiaSanPham"] *$gioHang->listProduct[$i]->num;
                }
            }
            $_SESSION["TongGia"] = $tongGia;
        ?>
    </table>
    <div class="pprice">
            Tổng thành tiền: <?php echo $tongGia; ?>đ
    </div>
    <a href="pages/GioHang/xlDatHang.php">
        <img src="img/dathang.png" width="100">
    </a>
</div>