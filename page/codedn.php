<?php
    session_start();
    include "connect.php";

    if(isset($_POST['submit'])) {
        $sdt = mysqli_real_escape_string($conn, $_POST['sdt']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);     

        $sql = "SELECT * FROM taikhoan WHERE sdt = '$sdt' AND pass = '$pass' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($query) > 0) {
            foreach ($query as $data) {
                $quyen = $data['quyen'];
            }

            $khachhang_sql = "SELECT * FROM khachhang WHERE sdt = '$sdt'";
            $khachhang_query = mysqli_query($conn, $khachhang_sql);
            $khachhang_data = mysqli_fetch_assoc($khachhang_query);
            $tenkh = $khachhang_data['tenkh']; 
            $makh = $khachhang_data['makh'];
            
            $_SESSION['tenkh'] = $tenkh;
            $_SESSION['makh'] = $makh;
            $_SESSION['auth'] = true;
            $_SESSION['sdt'] = $sdt;
            $_SESSION['auth_role'] = $quyen;
            unset($_SESSION['giohang']);

            header("Location: trangchu.php");
            exit(0);
        }
        else {
            $_SESSION['mess'] = "Tài khoản hoặc mật khẩu không đúng!";
            header("Location: dangnhap.php");
            exit(0);
        }
    }
    else {
        $_SESSION['mess'] = "Bạn không thể đăng nhập!";
        header("Location: dangnhap.php");
        exit(0);
    }
    
?>