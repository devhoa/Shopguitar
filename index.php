<?php 
    session_start();
    include "lib/DataProvider.php";

    // luu lai duong dan hien tai
    $_SESSION["path"] = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE PUBLIC "-//W3C//DTD XHHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/957727ba9d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
        <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <base href="{{asset('')}}">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <title>Aucostic của tui</title>
    </head>
            <!------------- BODY --------------->
    <body>
        <div class="header">
            <?php 
                include "modules/mHeader.php";
                include "modules/mMenu.php";
            ?>
        </div>
        <div class="container-fluid padding">
            <div class="row text-center padding">
                <?php
                    $a=1;
                    if(isset($_GET["a"])==true)
                        $a = $_GET["a"];
                    switch($a){
                        case 1:
                            include "modules/mCarousel.php";
                            include "pages/pIndex.php";
                            break;
                        case 2: 
                            include "pages/pSanPhamTheoHangLoai.php";
                            break;
                        case 3:
                            include "pages/pSanPhamTheoLoai.php";
                            break;
                        case 4:
                            include "pages/pChiTiet.php";
                            break;
                        case  5:
                            include "pages/GioHang/pIndex.php";
                            break;
                        case 6:
                            include "pages/pTimKiem.php";
                            break;
                        case 7:
                            include "pages/pSanPhamTheoHang.php";
                            break;
                        default:
                            include "pages/pError.php";
                            break;
                    }
                ?>
            </div>
        </div>
        <?php include "modules/mFooter.php"; ?>
    </body>
</html>