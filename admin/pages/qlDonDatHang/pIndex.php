<h1 >Quản Lý Đơn Đặt Hàng </h1>
<?php 
    $a=1 ;
    if(isset($_GET["a"]))
       $a =$_GET["a"];
    switch($a){
        case 1 :
            include "pages/qlDonDatHang/pDanhSach.php";
            break;
        case 2:
            include "pages/qlDonDatHang/pChiTietDonDatHang.php";
            break;
        case 3:
            include "pages/qlDonDatHang/pThemMoi.php";
            break;
        case 4:
            include "pages/qlDonDatHang/pTimKiem.php";
            break;
        default : 
             include "pages/pError.php";
             break;
    }
?>