<?php
if (isset($_GET['sdt'])) {
    $sdt = $_GET['sdt'];

    // Retrieve existing account information
    $sql_get_account = "SELECT * FROM taikhoan WHERE sdt='$sdt'";
    $query_get_account = mysqli_query($conn, $sql_get_account);
    $account = mysqli_fetch_assoc($query_get_account);

    // Retrieve existing customer information
    $sql_get_customer = "SELECT * FROM khachhang WHERE sdt='$sdt'";
    $query_get_customer = mysqli_query($conn, $sql_get_customer);
    $customer = mysqli_fetch_assoc($query_get_customer);
}

if (isset($_POST["submit"])) {
    $pass = $_POST['pass'];
    $quyen = $_POST['quyen'];
    $tenkh = $_POST['tenkh'];
    $diachi = $_POST['diachi'];

    // Update account information
    $sql_update_account = "UPDATE taikhoan SET pass='$pass', quyen='$quyen' WHERE sdt='$sdt'";
    $query_update_account = mysqli_query($conn, $sql_update_account);

    // Update customer information
    $sql_update_customer = "UPDATE khachhang SET tenkh='$tenkh', diachi='$diachi' WHERE sdt='$sdt'";
    $query_update_customer = mysqli_query($conn, $sql_update_customer);

    if ($query_update_account && $query_update_customer) {
        echo "<script>alert('Cập nhật thông tin thành công.'); window.location.href='index.php?page_layout=danhsachtaikhoan';</script>";
    } else {
        echo "<script>alert('Lỗi khi cập nhật thông tin.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Sửa Tài Khoản</title>
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
    height: 330px; /* Adjust height if needed */
}
h1 {
    color: rgb(9, 162, 111);
    margin-bottom: 20px;
}
input {
    width: 90%;
    height: 25px;
}
button {
    height: 35px;
    width: 100px;
    color:white;
    background-color: rgb(9, 162, 111);
    border: none;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
}
#close {
    height: 25px;
    width: 50px;
    color:white;
    background-color: rgb(9, 162, 111);
    border: none;
    font-weight: bold;
    font-size: 15px;
    margin: 0px;
    padding: 0px;
    transform: translate(-800%, 50%);
    cursor: pointer;
}
</style>
<body>
    <div class="add-container">
        <button id="close" onclick="window.location.href='index.php?page_layout=danhsachtaikhoan'"><i class="fa-solid fa-arrow-left"></i></button>
        <h1>SỬA TÀI KHOẢN</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <th style="width:15%;">Tên khách hàng</th>
                    <td style="width:35%;">
                        <input type="text" name="tenkh" id="tenkh" value="<?php echo isset($customer['tenkh']) ? $customer['tenkh'] : ''; ?>" required>
                    </td>
                    <th style="width:13%;">Số điện thoại</th>
                    <td style="width:35%;"><input type="text" name="sdt" id="sdt" value="<?php echo $sdt; ?>" readonly></td>
                </tr>
                <tr>
                    <th>Mật khẩu</th>
                    <td>
                        <input type="text" name="pass" id="pass" value="<?php echo isset($account['pass']) ? $account['pass'] : ''; ?>" required>  
                    </td>
                    <th>Địa chỉ</th>
                    <td><input type="text" name="diachi" id="diachi" value="<?php echo isset($customer['diachi']) ? $customer['diachi'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <th>Quyền</th>
                    <td>
                        <select style="height:30px;" name="quyen" id="quyen" required>
                            <option value="none">---Chọn quyền---</option>
                            <option value="0" <?php echo (isset($account['quyen']) && $account['quyen'] == 0) ? 'selected' : ''; ?>>0</option>
                            <option value="1" <?php echo (isset($account['quyen']) && $account['quyen'] == 1) ? 'selected' : ''; ?>>1</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" name="submit">Cập nhật</button>
            <button type="reset">Làm lại</button>
        </form>
    </div>
</body>
</html>