<?php
session_start();
include "../lib/DataProvider.php";

if (!isset($_SESSION["MaLoaiTaiKhoan"]) || $_SESSION["MaLoaiTaiKhoan"] != 2) {
    DataProvider::ChangeURL("../modules/mDangNhap.php");
}

$c = 0;
if (isset($_GET["c"]))
    $c = $_GET["c"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" type="text/css" />

    <title>ADMIN</title>
</head>

<body>
    <div id="header">
        <a href="index.php">
            ADMIN MANAGE
        </a>
    </div>
    <div id="menu">
        <?php
        include "modules/mMenu.php";
        include "modules/mLogin.php";
        ?>
    </div>
    <div id="content">
        <?php
        switch ($c) {
            case 0:
                include "pages/pIndex.php";
                break;
            case 1:
                include "pages/qlTaiKhoan/pIndex.php";
                break;
            case 2:
                include "pages/qlSanPham/pIndex.php";
                break;
            case 3:
                include "pages/qlLoai/pIndex.php";
                break;
            case 4:
                include "pages/qlHang/pIndex.php";
                break;
            case 5:
                include "pages/qlDonDatHang/pIndex.php";
                break;
            default:
                include "pages/pError.php";
                break;
        }
        ?>
    </div>
    <div id="footer">
        &copy; Design by HoaTrinh
    </div>
</body>

</html>