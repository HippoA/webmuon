<?php
    include("homechinh.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1924 THE COFFEE</title>
    <link rel="stylesheet" href="http://localhost/baocaoweb/css/dangnhap.css?v=<?=time();?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h1>ĐĂNG NHẬP</h1>
        <form action="codedn.php" method="POST">
            <h4 style="color: red;">
                <?php 
                    if (isset($_SESSION['mess'])) {
                        echo $_SESSION['mess'];
                        unset($_SESSION['mess']); 
                    }
                    if (isset($_SESSION['alert'])) {
                        echo "<script> alert ('".$_SESSION['alert']."'); </script>";
                    }
                    unset($_SESSION["alert"]);
                ?>
            </h4>
            <input type="text" name="sdt" id="username" placeholder="Số điện thoại..." required>
            <div class="password-container">
                <input type="password" name="pass" id="password" placeholder="Mật khẩu..." required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password', this)">
                    <i id="eye-icon" class="fa-regular fa-eye"></i>
                </span>
                <a id="link2" href="" style="float:right; padding-right:23px; padding-bottom:10px">Quên mật khẩu?</a>
            </div>
            <button type="submit" name="submit">ĐĂNG NHẬP</button>
            <div class="link">
                Bạn chưa có tài khoản?&nbsp;<a id="link2" href="index.php?page_layout=dangky">Đăng ký</a>
            </div>
        </form>
    </div>
    <script src="http://localhost/baocaoweb/script/dn.js"></script>
</body>
</html>