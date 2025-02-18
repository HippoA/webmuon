<?php
include("connect.php");
session_start(); // Đảm bảo session được khởi động

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Thực hiện cập nhật vào cơ sở dữ liệu
    $sql = "UPDATE khachhang SET tenkh='$name', diachi='$address' WHERE sdt='$phone'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // Cập nhật lại session
        $_SESSION['tenkh'] = $name;
        $_SESSION['diachi'] = $address;

        // Chuyển hướng sau khi cập nhật thành công
        echo "<script>
            alert('Lưu thành công!');
            window.location.href = 'index.php?page_layout=hoso';
        </script>";
    } else {
        // Thông báo lỗi nếu có
        echo "Lỗi cập nhật: " . mysqli_error($conn);
    }
}
$conn->close();
?>
