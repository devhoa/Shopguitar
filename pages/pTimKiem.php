<div class="tieudeSanPhamBanChay">
    <h2>SẢN PHẨM TÌM KIẾM</h2>
</div>
<div class="container">
    <?php
        if(isset($_POST["txtTimKiem"]))
            $tk = $_POST["txtTimKiem"];
        else   
            DataProvider::ChangeURL("index.php?a=404");

        $sql = "SELECT * FROM SanPham WHERE BiXoa = 0 and TenSanPham like '%$tk%' ";
        $result = DataProvider::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result))
        {
            ?>
                <div class="col-xs-12 col-sm-4 col-md-4 ">
                    <div class="khung">
                        <img src="images/<?php echo $row["HinhURL"]; ?>" />
                        <div class="pname"><?php echo $row["TenSanPham"]; ?></div>
                        <div class="pprice">Giá: <?php echo $row["GiaSanPham"]; ?>đ</div>
                        <div class="action">
                            <a href="index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>">Chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
</div>