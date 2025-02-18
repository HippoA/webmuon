<?php
    include("homechinh.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1924 THE COFFEE</title>
    <link rel="stylesheet" href="http://localhost/baocaoweb/css/dangky.css?v=<?=time();?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var repass = document.getElementById("repass").value;
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
            
            if (!regex.test(password)) {
                alert("Mật khẩu phải có ít nhất 6 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.");
                return false;
            }
            
            if (password !== repass) {
                alert("Mật khẩu và xác nhận mật khẩu không khớp.");
                return false;
            }
            
            return true;
        }
</script>
<body>
    <div class="signup-container">
        <form action="codedk.php" name="frmdangky" method="POST" onsubmit="return validatePassword()">
            <h1>ĐĂNG KÝ</h1>
            <h4 style="color: red;">
                <?php if (isset($_SESSION['mess'])) {
                    echo $_SESSION['mess'];
                    unset($_SESSION['mess']); 
                }?>
            </h4>
            <input type="text" name="hoten" id="hoten" placeholder="Họ tên" required>
            <input type="text" name="sdt" id="sdt" placeholder="Số điện thoại" required>
            <input type="text" name="diachi" id="diachi" placeholder="Địa chỉ" required>
            <div class="password-container">
                <input type="password" name="pass" id="password" placeholder="Mật khẩu phải có ít nhất 6 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt." required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password', this)">
                    <i id="eye-icon" class="fa-regular fa-eye"></i>
                </span>
            </div>
            <div class="password-container">
                <input type="password" name="repass" id="repass" placeholder="Nhập lại mật khẩu" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('repass', this)">
                    <i id="eye-icon" class="fa-regular fa-eye"></i>
                </span>
            </div>
                <button type="submit" name="submit" class="signup">ĐĂNG KÝ</button>
            <div class="link">
                Bạn đã có tài khoản?&nbsp;<a href="index.php?page_layout=dangnhap">Đăng nhập</a>
            </div>
        </form> 
    </div><br>  .
    <script src="http://localhost/baocaoweb/script/dn.js"></script>
</body>
</html>