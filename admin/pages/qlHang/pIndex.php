<h1 >Quản Lý Hảng Sản Xuất </h1>
<?php 
    $a=1 ;
    if(isset($_GET["a"]))
       $a =$_GET["a"];
    switch($a){
        case 1 :
            include "pages/qlHang/pDanhSach.php";
            break;
        case 2:
            include "pages/qlHang/pCapNhat.php";
            break;
        case 3:
            include "pages/qlHang/pThemMoi.php";
            break;
        case 4:
            include "pages/qlHang/pTimKiem.php";
            break;
        default : 
             include "pages/pError.php";
             break;
    }
?>