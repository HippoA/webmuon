<?php
if (isset($_GET['matopping'])) {  
    $id = $_GET['matopping'];
} else {
    echo "Không có mã topping nào được cung cấp.";
}

$sql_topping = "SELECT * FROM topping";
$query_topping = mysqli_query($conn, $sql_topping);

$sql_up = "SELECT * FROM topping WHERE matopping = '$id'";
$query_up = mysqli_query($conn, $sql_up);

if (!$query_up) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

$row_up = mysqli_fetch_assoc($query_up);

if (!$row_up) {
    die("Không tìm thấy sản phẩm.");
}

if (isset($_POST["submit"])) {
    $matopping = $_POST['matopping'];
    $tentopping = $_POST['tentopping'];
    $giatopping = $_POST['giatopping'];

    $sql_check = "SELECT * FROM topping WHERE matopping = '$matopping' AND matopping != '$id'";
    $query_check = mysqli_query($conn, $sql_check);
    
    if (mysqli_num_rows($query_check) > 0) {
        echo "Mã sản phẩm đã tồn tại.";
    } else {
        $sql = "UPDATE topping SET tentopping='$tentopping', giatopping='$giatopping' WHERE matopping='$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("location: index.php?page_layout=danhsachtopping");
            exit;
        } else {
            echo "Lỗi cập nhật: " . mysqli_error($conn);
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
    <title>1924 THE COFFEE</title>
</head>
<style>
* {
    font-family: Helvetica;
}
/* table,th,td{
    border:1px solid black;
} */
table {
    width: 100%; 
    border-spacing: 10px;
    margin-bottom: 28px;
}
th, td {
    height: 35px;
}
th {
    width:20%;
    text-align: right;
}
td {
    width:70%;
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
    width: 500px;
    text-align: center;
    height: 335px;
}
h1 {
    color: rgb(9, 162, 111);
    margin-bottom: 20px;
}
input {
    width: 95%;
    height: 25px;
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
    transform: translate(-400%, 60%);
    cursor: pointer;
}
</style>
<body>
    <div class="add-container">
    <button id="close" onclick="window.location.href='index.php?page_layout=trovetopping'"><i class="fa-solid fa-arrow-left"></i></button>
        <h1>SỬA TOPPING</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Mã topping</th>
                    <td><input type="text" name="matopping" required readonly value="<?php echo $row_up['matopping'] ?>"></td>
                </tr>
                <tr>
                    <th>Tên topping</th>
                    <td><input type="text" name="tentopping" required value="<?php echo $row_up['tentopping'] ?>"></td>
                </tr>
                <tr>
                    <th style="vertical-align:top; padding-top: 7px; height: 1px">Giá</th>
                    <td><input type="number" name="giatopping" required value="<?php echo $row_up['giatopping'] ?>"></td>
                </tr>
            </table>
            <button input="submit" name="submit">Sửa</button>
            <button type="reset">Làm lại</button>
        </form>
    </div>
</body>
</html>