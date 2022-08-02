<?php 
    if(!isset($_GET["id"]))
        DataProrvider::ChangeURL("index.php?c=404");
    $id=$_GET["id"];    
    $sql ="SELECT d.MaDonDatHang, d.NgayLap,d.TongThanhTien, t.TenHienThi, t.DiaChi,t.DienThoai, tt.MaTinhTrang ,tt.TenTinhTrang from
    DonDatHang d, TaiKhoan t,TinhTrang tt WHERE d.MaTaiKhoan=t.MaTaiKhoan AND d.MaTinhTrang=tt.MaTinhTrang AND MaDonDatHang=$id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>
<fieldset id="frmThongTinDatHang">
    <legend>Thông tin đơn đặt hàng 
    </legend>
    <div>
        <span>Mã đơn đặt hàng : <?php echo $row["MaDonDatHang"];?> </span>
        
    </div>
    <div>
        <span>   Ngày đặt hàng : <?php echo $row["NgayLap"];?> </span>
        
    </div>
    <div>
        <span>Tên khách hàng : <?php echo $row["TenHienThi"];?></span>
        
    </div>
    <div>
        <span>Số điện thoại : <?php echo $row["DienThoai"];?></span>
        
    </div>
    <div>
        <span>Địa chỉ giao hàng : <?php echo $row["DiaChi"];?></span>
        
    </div>
    <div>
        <span>Tổng thành tiền : <?php echo $row["TongThanhTien"];?></span>
        
    </div>
     <a href="pages/qlDonDatHang/xlDonDatHang.php?a=2&id=<?php echo $id;?>"class="btnGiaoHang">Giao hàng </a>
     <a href="pages/qlDonDatHang/xlDonDatHang.php?a=3&id=<?php echo $id;?>"class="btnThanhToan">Thanh Toán </a>
     <a href="pages/qlDonDatHang/xlDonDatHang.php?a=4&id=<?php echo $id;?>"class="btnHuy">Hủy đơn hàng </a>
     <a href="#" onclick="window.print();" class="btnInDonHang">In Đơn Hàng</a>
</fieldset>
<h2>Chi tiết đơn hàng</h2>
<table cellspacing="0" border="1">
    <tr>
        <th width ="100">STT</th>
        <th width ="150">Tên sản phẩm</th>
        <th width ="100">Hình</th>
        <th width ="100">Số lượng</th>
        <th width ="100">Giá bán</th>
    </tr>
    <?php 
        $sql ="SELECT s.TenSanPham,s.HinhURL, c.SoLuong, c.GiaBan FROM ChiTietDonDatHang c,SanPham s WHERE c.MaSanPham=s.MaSanPham
        AND c.MaDonDatHang =$id";
        $result = DataProvider::ExecuteQuery($sql);
        $i=1;
        while ($row=mysqli_fetch_array($result))
        {
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row["TenSanPham"];?></td>
                <td>
                    <img src="../images/<?php echo $row["HinhURL"];?>">
                </td>
                <td><?php echo $row["SoLuong"];?></td>
                <td><?php echo $row["GiaBan"];?></td>
            </tr>
            <?php
        }
        ?>
</table>
