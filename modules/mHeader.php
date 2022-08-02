<div class="mHeader">
    <nav class="navbar">
        <div class="container-fluid">
            <span id="hotline">Hotline: 0923623681</span>
            <form name="frmTimKiem" method="post" action="index.php?a=6" enctype="multipart/form-data" onsubmit = "return ChuyenTrangTimKiem()">
                <input type="text" placeholder="Tìm kiếm ..." name="txtTimKiem" id="txtTimKiem"> 
                <input type="submit" value="Tìm kiếm" id="btnTimKiem">
                
            </form>
            <?php
                if(isset($_SESSION["MaTaiKhoan"]))
                {
                    ?>
                        <div id="tk">
                            Hello, <?php echo $_SESSION["TenHienThi"];?>&emsp;
                            <a href="modules/xlDangXuat.php">Đăng xuất</a>&emsp;
                            <a href="index.php?a=5">
                            <img src="img/manage_shopping.png" height="40">
                            </a>
                        </div>
                    <?php
                }
              else{
                    ?>
                    <div class="header-top-right">
                        <ul>
                            <li>
                                <a href="modules/mDangNhap.php">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Đăng nhập
                                </a>
                            </li>
                            <li>
                                <a href="pages/TaoTaiKhoan/pTaoTaiKhoan.php">                           
                                    <i class="fas fa-user-plus"></i>
                                    Đăng ký
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
                  }
              ?>
        </div>
    </nav>
</div>

<script type="text/javascript">
    function ChuyenTrangTimKiem(){
        location="index.php?a=5";
    }
</script>