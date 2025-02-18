<?php
include "connect.php";
include "homechinh.php";

if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];

if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    $index = $_GET['delid'];
    $tensp = $_SESSION['giohang'][$index][1];
    $size = $_SESSION['giohang'][$index][2];
    $topping = $_SESSION['giohang'][$index][4];

    $stmt = $conn->prepare("DELETE FROM giohang WHERE tensp = ? AND size = ? AND topping = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("sss", $tensp, $size, $topping);
    $stmt->execute();

    array_splice($_SESSION['giohang'], $index, 1);
}

if (isset($_POST['themgh'])) {
    $masp = $_POST['masp'];
    $sql = "SELECT * FROM menu WHERE masp = '$masp'";
    $query = mysqli_query($conn, $sql);
    
    if ($query && mysqli_num_rows($query) > 0) {
        $product = mysqli_fetch_assoc($query);
        $imagePath = $_POST['img'];
        $tensp = $product['tensp'];
        $size = $product['size'];
        $sl = $_POST['sl'];
        $topping = isset($_POST['topping']) ? $_POST['topping'] : '';   
        $gia = floatval($_POST['gia']);
        $sltopping = isset($_POST['topping_quantities']) ? floatval($_POST['topping_quantities']) : 0;
        $giatopping = isset($_POST['topping_price']) ? floatval($_POST['topping_price']) : 0;
        $flag = false;
        $tt = $gia * $sl + $giatopping; 

        if (isset($_POST['toppingarr']) && !empty($_POST['toppingarr'])) {
            $toppingJson = $_POST['toppingarr']; 
        
            $toppingDetails = json_decode($toppingJson, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                die("Lỗi: Không thể giải mã dữ liệu topping. Lỗi: " . json_last_error_msg());
            }
        } else {
            $toppingDetails = [];
        }
        
        $_SESSION['topping_details'] = $toppingDetails; 

        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            if ($_SESSION['giohang'][$i][1] == $tensp && $_SESSION['giohang'][$i][2] == $size) {
                if ($_SESSION['giohang'][$i][4] == $topping) {
                    $slmoi = $sl + $_SESSION['giohang'][$i][3];
                    $flag = true;
                    $_SESSION['giohang'][$i][3] = $slmoi; 

                    $stmt = $conn->prepare("UPDATE giohang SET sl = ? WHERE tensp = ? AND size = ? AND topping = ?");
                    if (!$stmt) {
                        die("Error preparing statement: " . $conn->error);
                    }
                    $stmt->bind_param("isss", $slmoi, $tensp, $size, $topping);
                    $stmt->execute();
                    break;
                }
            }
        }

        if ($flag == false) {
            $sp = [$imagePath, $tensp, $size, $sl, $topping, $tt]; 
            $_SESSION['giohang'][] = $sp;

            $stmt = $conn->prepare("INSERT INTO giohang (tensp, size, sl, topping, gia, giasp, gia_topping) VALUES (?, ?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                die("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("ssissii", $tensp, $size, $sl, $topping, $tt, $gia, $giatopping);
            $stmt->execute();
        }
    } else {
        echo "Sản phẩm không tồn tại.";
    }
}

function showgiohang($conn) {   
    if ($_SESSION['giohang'] && is_array($_SESSION['giohang'])) {
        $tong = 0;
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            $tt = $_SESSION['giohang'][$i][5] * $_SESSION['giohang'][$i][3];
            $tong += $tt;

            echo '<tr style="border-top: 0.1px solid rgba(0, 0, 0, 0.2);">
                    <td><img style="width:50px;height: 45px;" src="' . $_SESSION['giohang'][$i][0] . '" style="width: 50px; height: auto;"></td>
                    <td>' . $_SESSION['giohang'][$i][1] . '</td>
                    <td>' . $_SESSION['giohang'][$i][2] . '</td>
                    <td>' . $_SESSION['giohang'][$i][3] . '</td>
                    <td>' . $_SESSION['giohang'][$i][4] . '</td>
                    <td>' . $tt . '</td>
                    <td>
                        <a href="dat_hang.php?delid=' . $i . '" onclick="return Del(\'' . $_SESSION['giohang'][$i][1] . '\')">Xóa</a>  
                    </td>   
                  </tr>';
        }
        $_SESSION['tong'] = $tong;
        echo '<tr>
                <th colspan="5" style="text-align: right;">Tổng tiền:</th>
                <th colspan="2">' . $tong . '</th>
             </tr>';
    } else {
        echo '<tr><td colspan="7">Giỏ hàng trống.</td></tr>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1924 THE COFFEE</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <h1 style="color:rgb(9, 162, 111);text-align: center;margin-bottom:0px;">GIỎ HÀNG</h1>
    <table style="width:100%;margin-left:0px;">
        <tr>
            <th width="7%">Ảnh</th>
            <th width="25%">Tên món</th>
            <th width="1%">Size</th>
            <th width="10%">Số lượng</th>
            <th>Topping</th>
            <th width="10%">Giá</th>
            <th width="5%">Xóa</th>
        </tr>
        <?php showgiohang($conn); ?>
    </table>
    <h3 align="center"><?php 
        if (isset($_SESSION['mess'])) {
            echo $_SESSION['mess'];
            unset($_SESSION['mess']); 
        }
    ?></h3>
    <?php if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0): ?>
        <form action="hoadon.php" method="POST" onsubmit="return checkLogin(event);">
            <button type="submit" name="muangay" id="btndat">ĐẶT HÀNG</button>
        </form>
    <?php endif; ?>
</body>
<script>
    function checkLogin(event) {
        const isLoggedIn = <?php echo isset($_SESSION['auth_role']) ? 'true' : 'false'; ?>;
        if (!isLoggedIn) {
            event.preventDefault(); 
            const confirmLogin = confirm("Bạn cần đăng nhập để thực hiện đặt hàng. Bạn có muốn đến trang đăng nhập không?");
            if (confirmLogin) {
                window.location.href = "index.php?page_layout=dangnhap"; 
            }
        }
    }
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + " ?");
    }
</script>
<style>
    * {
        font-family: Helvetica;
    }
    table, th, td {
        border: none;
        border-collapse: collapse;
    }
    th {
        height: 40px;
        background-color: rgb(9, 162, 111);
        color: white;
        font-size: 17px;
        text-align: center;
    }
    td {
        height: 40px;
        text-align: center;
        padding-top: 15px;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: rgb(9, 162, 111); 
        color: white; 
        text-decoration: none; 
        border-radius: 5px; 
        transition: background-color 0.3s;
        font-family: Helvetica;
        margin-bottom: 15px;    
        border: none;
    }
    .btn:hover {
        background-color: rgb(50, 219, 163); 
    }
    #btndat {
        background-color: rgb(9, 162, 111);
        border: none;
        width: 120px;
        height: 35px;
        font-size: 17px;
        color: white;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 1088px;
    }
    #btndat:hover {
        background-color: rgb(50, 219, 163);
    }
</style>
</html>