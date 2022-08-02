<div class="header-navbar">
    <div class="container-fluid">
        <div class="header-logo">
            <a class="navbar-branch" href="index.php">
                <img src="img/logo_shop.png" height="150" style="margin-left: 10%;">
            </a>
        </div>
        <div class="header-menu" id="navbarResponsive">
            <nav id="menu" class="menu">
                <ul>

                    <?php // Ten Loai San Pham
                        $sql = "SELECT * FROM LoaiSanPham WHERE BiXoa = 0";
                        $result = DataProvider::ExecuteQuery($sql);
                        while($row = mysqli_fetch_array($result))
                        {
                            ?>
                                <li class="has-submenu">
                                    <a href="index.php?a=3&id3=<?php echo $row["MaLoaiSanPham"]?>">
                                        <?php echo $row["TenLoaiSanPham"]; ?>
                                        <i class="fas fa-chevron-down"></i>
                                    </a>
                                    <ul class="sub-menu">
                                        <?php // Hang san xuat
                                            $temp = $row["MaLoaiSanPham"];
                                            $sql1 = "SELECT distinct hsx.MaHangSanXuat, hsx.TenHangSanXuat FROM SanPham sp, HangSanXuat hsx WHERE
                                                    sp.BiXoa = 0 AND sp.MaLoaiSanPham = $temp
                                                    AND hsx.MaHangSanXuat = sp.MaHangSanXuat";
                                            $result1 = DataProvider::ExecuteQuery($sql1);
                                            while($row1 = mysqli_fetch_array($result1))
                                            {
                                               
                                                ?>
                                                    <li>
                                                        <a href="index.php?a=2&id1=<?php echo $row1["MaHangSanXuat"];?>&id2=<?php echo $temp;?>">
                                                            <?php echo $row1["TenHangSanXuat"]; ?>
                                                        </a>
                                                    </li>
                                                <?php
                                            }
                                        ?>                                      
                                    </ul>
                                </li>
                            <?php
                        }
                    ?>
                    <li class="has-submenu">
                        <a href="#" style="color:red;">
                           HÃNG GUITAR <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="sub-menu">
                            <?php
                                $sqlHSX = "SELECT hsx.MaHangSanXuat, hsx.TenHangSanXuat from HangSanXuat hsx";
                                $resultHSX = DataProvider::ExecuteQuery($sqlHSX);
                                while($rowHSX = mysqli_fetch_array($resultHSX))
                                {                        
                                    ?>
                                        <li>
                                            <a href="index.php?a=7&id3=<?php echo $rowHSX["MaHangSanXuat"]?>">
                                                <?php echo $rowHSX["TenHangSanXuat"]; ?>
                                            </a>
                                        </li>
                                    <?php
                                }
                            ?> 
                        </ul>
                    </li>
                </ul >
            </nav>
        </div>
    </div>
</div>