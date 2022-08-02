<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
    <script src="../../js/jquery.passwordstrength.js"></script>
</head>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Đăng ký</h1>
            <div class="account-wall">
                <form class="form-signin" action="xlTaoTaiKhoan.php" method="POST" onsubmit="return KiemTra()">
                <input type="text" name="uname" class="form-control" placeholder="Tên đăng nhập" required autofocus>
                <input type="password" class="form-control" id="password" name="psw" placeholder="Mật khẩu" required>
                <input type="password" class="form-control" name="rpsw" placeholder="Nhập lại mật khẩu" required>
                <input type="text" name="tht" class="form-control" placeholder="Tên hiển thị" required autofocus>
                <input type="text" name="dc" class="form-control" placeholder="Địa chỉ" required autofocus>
                <input type="text" name="dt" class="form-control" placeholder="Điện thoại" required autofocus>
                <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_GET["err"]))
    {
        include "pages/TaoTaiKhoan/pTaoTaiKhoan.php";
    }
?>

<script type="text/javascript">
    $(function() {
        $("#password").passwordStrength();                
    });
    function KiemTra()
    {
        var co = true;

        var control = document.getElementById('us');
        var err = document.getElementById('eUS');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Tên đăng nhập không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById('ps');
        err = document.getElementById('ePS');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Mật khẩu không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById('rps');
        err = document.getElementById('eRPS');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Nhập lại mật khẩu không trùng";
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById('name');
        err = document.getElementById('eNAME');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Tên hiển thị không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById('add');
        err = document.getElementById('eADD');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Địa chỉ không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById('tel');
        err = document.getElementById('eTEL');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Số điện thoại không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }

        control = document.getElementById('mail');
        err = document.getElementById('eMail');
        if(control.value == "")
        {
            co = false;
            err.innerHTML = "Email không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }

        return co;
    }
</script>
