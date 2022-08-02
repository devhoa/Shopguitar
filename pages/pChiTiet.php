<h1> Thông tin chi tiết sản phẩm</h1>
<?php
    if(isset($_GET["id"]))
        $id = $_GET["id"];
    else   
        DataProvider::ChangeURL("index.php?a=404");

    $sql = "SELECT s.MaSanPham, s.TenSanPham, s.GiaSanPham, s.SoLuongTon, s.SoLuocXem, s.HinhURL, s.MoTa, h.TenHangSanXuat, l.TenLoaiSanPham,l.MaLoaiSanPham FROM
            SanPham s, HangSanXuat h, LoaiSanPham l WHERE s.BiXoa = 0 AND s.MaHangSanXuat = h.MaHangSanXuat AND s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaSanPham = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    $maloai = $row["MaLoaiSanPham"];
    if($row == null)
        DataProvider::ChangeURL("index.php?a=404");
?>
<div id="chitietsp">
    <div id="chitietleft">
        <img src="images/<?php echo $row["HinhURL"]; ?> " style="width:500px;">
    </div>
    <div id="chitietright">
        <div>
            <span id="label"></span>
            <span class="productname"><?php echo $row["TenSanPham"]; ?></span>
        </div>
        <div>
            <span id="label">Giá:</span>
            <span class="price"><?php echo $row["GiaSanPham"]; ?> đ</span> 
        </div>
        <div>
            <span id="label">Hãng sản xuất:</span>
            <span class="factory"><?php echo $row["TenHangSanXuat"]; ?></span>
        </div>
        <div>
            <span id="label">Loại sản phẩm:</span>
            <span class="data"><?php echo $row["TenLoaiSanPham"]; ?></span>
        </div>
        <div>
            <span id="label">Số lượng:</span>
            <span class="data"><?php echo $row["SoLuongTon"]; ?></span>
        </div>
        <div>
            <span id="label">Số lượt xem:</span>
            <span class="data"><?php echo $row["SoLuocXem"] + 1; ?></span>
        </div>
        <div class="giohang">
            <?php 
                if(isset($_SESSION["MaTaiKhoan"]))
                {
                    ?>
                        <a href="index.php?a=5&id=<?php echo $row["MaSanPham"]; ?>">
                            <img src="img/shopping_cart.png" width="38">
                        </a>
                    <?php
                }
            ?>
        </div>
        <div id="mota">
            <span id="label">Mô tả:</span>
            <?php echo $row["MoTa"]; ?>
        </div>
    </div>
    
</div>
<div class="tieudeSanPhamBanChay">
    <h2>SẢN PHẨM CÙNG LOẠI</h2>
</div>

<?php
    $sql1 = "SELECT * FROM SanPham WHERE BiXoa = 0 and MaLoaiSanPham = $maloai ";
    $result1 = DataProvider::ExecuteQuery($sql1);
    $dem = 0;
    while($row1 = mysqli_fetch_array($result1))
    {
        $dem = $dem +1;
        ?>
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="khung1">
                    <img src="images/<?php echo $row1["HinhURL"]; ?>" style="width:140px; height: 180px;"/> 
                    <div class="pname"><?php echo $row1["TenSanPham"]; ?></div>
                    <div class="pprice">Giá: <?php echo $row1["GiaSanPham"]; ?>đ</div>
                    <div class="action">
                        <a href="index.php?a=4&id=<?php echo $row1["MaSanPham"]; ?>">Chi tiết</a>
                    </div>
                </div>
            </div>
        <?php
        if($dem == 5)
        {
        break;
        }
    }
?>

<?php
    // Cap nhat lai so luoc xem vao CSDL
    $SoLuocXem = $row["SoLuocXem"] + 1;
    $sql = "UPDATE SanPham SET SoLuocXem = $SoLuocXem
            WHERE MaSanPham = $id";
    DataProvider::ExecuteQuery($sql);
?>