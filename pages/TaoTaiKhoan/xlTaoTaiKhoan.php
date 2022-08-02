<?php
    session_start();
    include "../../lib/DataProvider.php";

    if(isset($_POST["uname"]))
    {
        $us = $_POST["uname"];
        $ps = $_POST["psw"];
        $name = $_POST["tht"];
        $add = $_POST["dc"];
        $tel = $_POST["dt"];
        $mail = $_POST["email"];

        $sql = "SELECT *FROM TaiKhoan where TenDangNhap = '$us'";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);

        if($row != null)
        {
            $curURL = $_SESSION["path"];
            ?>
            <script language="javascript">
                var t = "Tai khoan da ton tai";
                alert(t);
            </script>
            <?php
            DataProvider::ChangeURL("../TaoTaiKhoan/pTaoTaiKhoan.php");

        }
        else
        {
            $sql = "INSERT INTO TaiKhoan(TenDangNhap, MatKhau, TenHienThi, DiaChi, DienThoai, Email,MaLoaiTaiKhoan)
            value ('$us','$ps','$name','$add','$tel','$mail',1)";

            DataProvider::ExecuteQuery($sql);
            $sql = "SELECT MaTaiKhoan from TaiKhoan where TenDangNhap = '$us'
            and MatKhau = '$ps' ";
            $result = DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);
            $_SESSION["MaTaiKhoan"] = $row["MaTaiKhoan"];
            $_SESSION["MaLoaiTaiKhoan"] = 1;
            $_SESSION["TenHienThi"] = $name;

            DataProvider::ChangeURL("../../index.php");
        }
    }
    else{
        DataProvider::ChangeURL("../../index.php?a=404");
    }
?>