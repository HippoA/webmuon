<?php
$conn = new mysqli("localhost","root","","qlbh3");

// Check connection
if ($conn->connect_error) {
    echo "Kết nối SQL lỗi" . $mysqli -> connect_error;
    exit();
}
?>