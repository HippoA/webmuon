<?php
    include "connect.php";
    session_start();
    
    if (isset($_POST['submit'])) {
        $hoten = mysqli_real_escape_string($conn, $_POST['hoten']);
        $sdt = mysqli_real_escape_string($conn, $_POST['sdt']);
        $diachi = mysqli_real_escape_string($conn, $_POST['diachi']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $repass = mysqli_real_escape_string($conn, $_POST['repass']);

        if ($pass == $repass) {
            $sql = "SELECT sdt FROM taikhoan WHERE sdt = '$sdt'";
            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
                $_SESSION['mess'] = "Số điện thoại này đã tồn tại!";
                header("Location: dangky.php");
                exit(0);
            } else {
                $taikhoan_sql = "INSERT INTO taikhoan (sdt, pass, quyen) VALUES ('$sdt', '$pass', 0)";
                $taikhoan_query = mysqli_query($conn, $taikhoan_sql);
                $khachhang_sql = "INSERT INTO khachhang (tenkh, diachi, sdt) VALUES ('$hoten', '$diachi', '$sdt')";
                $khachhang_query = mysqli_query($conn, $khachhang_sql);

                if ($taikhoan_query && $khachhang_query) {
                    $_SESSION['alert'] = "Bạn đã đăng ký tài khoản thành công!";
                    header("Location: dangnhap.php");
                    exit(0);
                }
                else {
                    $_SESSION['mess'] = "Không thế đăng ký tài khoản!";
                    header("Location: dangky.php");
                    exit(0);
                }
            }
        } else {
            $_SESSION['mess'] = "Mật khẩu nhập lại không chính xác!";
            header("Location: dangky.php");
            exit(0);
        } 
    }
    else {
        header("Location: dangky.php");
        exit(0);
    }
?>