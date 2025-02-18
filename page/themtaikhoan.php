<?php
if (isset($_POST["submit"])) {
    $sdt = $_POST['sdt'];
    $pass = $_POST['pass'];
    $quyen = $_POST['quyen'];
    $tenkh = $_POST['tenkh'];
    $diachi = $_POST['diachi'];

    // Kiểm tra số điện thoại đã tồn tại chưa trong bảng taikhoan
    $sql_check = "SELECT * FROM taikhoan WHERE sdt = '$sdt'";
    $query_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($query_check) > 0) {
        echo "<script>alert('Số điện thoại đã tồn tại trong hệ thống.');</script>";
    } else {
        // Thêm tài khoản vào bảng taikhoan
        $sql_insert_account = "INSERT INTO taikhoan (sdt, pass, quyen) VALUES ('$sdt', '$pass', '$quyen')";
        $query_insert_account = mysqli_query($conn, $sql_insert_account);

        if ($query_insert_account) {
            // Thêm khách hàng vào bảng khachhang
            $sql_insert_customer = "INSERT INTO khachhang (tenkh, diachi, sdt) VALUES ('$tenkh', '$diachi', '$sdt')";
            $query_insert_customer = mysqli_query($conn, $sql_insert_customer);

            if ($query_insert_customer) {
                echo "<script>alert('Thêm tài khoản và khách hàng thành công.'); window.location.href='index.php?page_layout=danhsachtaikhoan';</script>";
            } else {
                echo "<script>alert('Lỗi khi thêm khách hàng.');</script>";
            }
        } else {
            echo "<script>alert('Lỗi khi thêm tài khoản.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Thêm Tài Khoản</title>
</head>
<style>
* {
    font-family: Helvetica;
}
table {
    width: 100%; 
    border-spacing: 10px;
    margin-bottom: 28px;
    margin-left:10px;
}
th, td {
    height: 35px;
}
/* table,th,td{
    border:1px solid black;
} */
th {
    text-align: right;
}
td {
    width: 30%;
    text-align: left;
}
body {
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.add-container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    width: 900px;
    text-align: center;
    height: 330px;
}
h1 {
    color:  rgb(9, 162, 111);
    margin-bottom: 20px;
}
input {
    width: 90%;
    height: 25px;
}
.hang3 {
    vertical-align: top;
}
button{
    height: 35px;
    width: 100px;
    color:white;
    background-color: rgb(9, 162, 111);
    border: none;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
}
#close{
    height: 25px;
    width: 50px;
    color:white;
    background-color: rgb(9, 162, 111);
    border: none;
    font-weight: bold;
    font-size: 15px;
    margin:0px;
    padding:0px;
    transform: translate(-800%, 50%);
    cursor: pointer;
}
</style>
<body>
    <div class="add-container">
    <button id="close" onclick="window.location.href='index.php?page_layout=danhsachtaikhoan'"><i class="fa-solid fa-arrow-left"></i></button>
        <h1>THÊM TÀI KHOẢN</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <th style="width:15%;">Tên khách hàng</th>
                    <td style="width:35%;">
                        <input type="text" name="tenkh" id="tenkh" required>
                    </td>
                    <th style="width:13%;">Số điện thoại</th>
                    <td style="width:35%;"><input type="text" name="sdt" id="sdt" required></td>
                </tr>
                <tr>
                    <th>Mật khẩu</th>
                    <td>
                        <input type="text" name="pass" id="pass" required>  
                    </td>
                    <th>Địa chỉ</th>
                    <td><input type="text" name="diachi" id="diachi" required></td>
                </tr>
                <tr>
                <th>Quyền</th>
                    <td>
                        <select style="height:30px;" name="quyen" id="quyen" >
                            <option value="none">---Chọn quyền---</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" name="submit">Thêm</button>
            <button type="reset">Làm lại</button>
        </form>
    </div>
</body>

</html>

