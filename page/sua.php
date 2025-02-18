<?php
$id = $_GET['id'];

$sql_menu = "SELECT * FROM MENU";
$query_menu = mysqli_query($conn, $sql_menu);

$sql_up = "SELECT * FROM menu WHERE masp = '$id'";
$query_up = mysqli_query($conn, $sql_up);

if (!$query_up) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

$row_up = mysqli_fetch_assoc($query_up);

if (!$row_up) {
    die("Không tìm thấy sản phẩm.");
}

if (isset($_POST["submit"])) {
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $loai = $_POST['loai'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $size = $_POST['size'];

    if ($_FILES['anh']['name'] != '') {
        $anh = $_FILES['anh']['name'];
        $anh_tmp = $_FILES['anh']['tmp_name'];
        move_uploaded_file($anh_tmp, 'D:/xampp/htdocs/baocaoweb/anh/' . $anh); 
    } else {
        $anh = $row_up['anh']; 
    }

    $sql_check = "SELECT * FROM menu WHERE masp = '$masp' AND masp != '$id'";
    $query_check = mysqli_query($conn, $sql_check);
    
    if (mysqli_num_rows($query_check) > 0) {
        echo "Mã sản phẩm đã tồn tại.";
    } else {
        $sql = "UPDATE menu SET tensp='$tensp', loai='$loai', gia='$gia', mota='$mota', size='$size', anh='$anh' WHERE masp='$masp'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("location: index.php?page_layout=danhsachsanpham");
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
table {
    width: 100%; 
    border-spacing: 10px;
    margin-bottom: 28px;
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
    height: 400px;
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
        <button id="close" onclick="window.location.href='index.php?page_layout=trove'"><i class="fa-solid fa-arrow-left"></i></button>
        <h1>SỬA SẢN PHẨM</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <th style="width:15%;">Mã sản phẩm</th>
                    <td style="width:35%"><input type="text" readonly name="masp" required value="<?php echo $row_up['masp'] ?>" ></td>
                    <th style="width:7%;">Loại</th>
                    <td style="width:45%">
                    <select style="height:30px;" name="loai">
                        <option value="none">---Chọn loại---</option>
                        <option value="caphe" <?php if ($row_up['loai'] === 'caphe') echo 'selected'; ?>>Cà phê</option>
                        <option value="trasua" <?php if ($row_up['loai'] === 'trasua') echo 'selected'; ?>>Trà sữa</option>
                        <option value="trangmieng" <?php if ($row_up['loai'] === 'trangmieng') echo 'selected'; ?>>Tráng miệng</option>
                        <option value="tra" <?php if ($row_up['loai'] === 'tra') echo 'selected'; ?>>Trà</option>
                        <option value="khac" <?php if ($row_up['loai'] === 'khac') echo 'selected'; ?>>Khác</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>Tên sản phẩm</th>
                    <td><input type="text" name="tensp" required value="<?php echo $row_up['tensp'] ?>"></td>
                    <th>Size</th>
                    <td>
                        <select name="size" style="height:30px;" id="size">
                            <option value="none">---Chọn size---</option>
                            <option value="M" <?php if ($row_up['size'] === 'M') echo 'selected'; ?>>M</option>
                            <option value="L" <?php if ($row_up['size'] === 'L') echo 'selected'; ?>>L</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th style="vertical-align:top; padding-top: 7px; height: 1px">Giá</th>
                    <td class="hang3"><input type="number" name="gia" required value="<?php echo $row_up['gia'] ?>"></td>
                    <th class="hang3" rowspan="2">Mô tả</th>
                    <td class="hang3" rowspan="2" style="height: 100px;"><input type="text" name="mota" style="height:100px;" value="<?php echo $row_up['mota'] ?>"></td>
                </tr>
                <tr>
                    <th colspan="2" style="vertical-align:top; padding-top: 7px;"><input type="file" name="anh"></th>
                </tr>
            </table>
            <button input="submit" name="submit">Sửa</button>
            <button type="reset">Làm lại</button>
        </form>
    </div>
</body>
</html>