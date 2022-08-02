<h1 >Quản Lý Tài Khoản </h1>
<?php 
    $a=1 ;
    if(isset($_GET["a"]))
       $a =$_GET["a"];
    switch($a){
        case 1 :
            include "pages/qlTaiKhoan/pDanhSach.php";
            break;
        case 2:
            include "pages/qlTaiKhoan/pCapNhat.php";
            break;
        case 3:
            include "pages/qlTaiKhoan/pTimKiem.php";
            break;
        default : 
             include "pages/pError.php";
             break;
    }
?>