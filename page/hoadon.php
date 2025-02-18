<?php
    include("homechinh.php");
    include("connect.php");
    include("icon.php");

    if (isset($_POST['muangay'])) {
    if (!isset($_SESSION['makh'])) {
        echo "Không thể truy cập vào giỏ hàng!";
        exit();
    }

    $makh = $_SESSION['makh'];

    if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngaymua = date('Y-m-d H:i:s');
        $tong = $_SESSION['tong'];

        $stmt = $conn->prepare("INSERT INTO hoadon (ngaymua, tongtien, makh) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $ngaymua, $tong, $makh);
        $stmt->execute();
        $mahd = $stmt->insert_id; 

        $detailIds = []; 
        $stmt_lsubanhang = $conn->prepare("INSERT INTO lsbanhang (mahd, makh) VALUES (?, ?)");
        $stmt_lsubanhang->bind_param("si", $mahd, $makh);
        if (!$stmt_lsubanhang->execute()) {
            die("Lỗi khi thêm vào cơ sở dữ liệu: " . $stmt_lsubanhang->error);
        }

        foreach ($_SESSION['giohang'] as $item) {
            $tensp = $item[1]; 
            $size = $item[2]; 
            $sl = $item[3]; 

            $stmt_product = $conn->prepare("SELECT masp FROM menu WHERE tensp = ? AND (size = ? OR size IS NULL)");
            $stmt_product->bind_param("ss", $tensp, $size);
            $stmt_product->execute();
            $result_product = $stmt_product->get_result();

            if ($result_product->num_rows === 0) {
                die("Lỗi: Không tìm thấy sản phẩm '$tensp' với kích thước '$size'.");
            }

            $product_data = $result_product->fetch_assoc();
            $masp = $product_data['masp']; 

            $gia_query = $conn->prepare("SELECT gia FROM menu WHERE masp = ?");
            $gia_query->bind_param("s", $masp);
            $gia_query->execute();
            $gia_result = $gia_query->get_result();
            $gia_data = $gia_result->fetch_assoc();
            $gia = $gia_data['gia']; 

            $stmt_detail = $conn->prepare("INSERT INTO chitiethd (soluong, mahd, masp, gia) VALUES (?, ?, ?, ?)");
            $stmt_detail->bind_param("iisi", $sl, $mahd, $masp, $gia);
            if (!$stmt_detail->execute()) {
                die("Lỗi khi thêm chi tiết hóa đơn: " . $stmt_detail->error);
            }

            $detailIds[] = $stmt_detail->insert_id;
        }


        $stmt = $conn->prepare("UPDATE hoadon SET tongtien = ? WHERE mahd = ?");
        $stmt->bind_param("di", $tong, $mahd);
        $stmt->execute();

        if (isset($_SESSION['topping_details']) && !empty($_SESSION['topping_details'])) {
            $toppingDetails = $_SESSION['topping_details'];
        
            foreach ($toppingDetails as $index => $topping) {
                if (isset($detailIds[$index])) {
                    $matopping = isset($topping['matopping']) ? $topping['matopping'] : null; 
                    $sltopping = isset($topping['soluong']) ? $topping['soluong'] : 0;
                    $giatopping = isset($topping['giatopping']) ? $topping['giatopping'] : 0; 
        
                    if ($matopping !== null) {
                        $stmt_topping = $conn->prepare("INSERT INTO chitiettopping (mact, matopping, soluong, giatopping) VALUES (?, ?, ?, ?)");
                        $stmt_topping->bind_param("isii", $detailIds[$index], $matopping, $sltopping, $giatopping);
                        if (!$stmt_topping->execute()) {
                            die("Lỗi khi thêm chi tiết topping: " . $stmt_topping->error);
                        }
                    }
                }
            }
        } 

        foreach ($_SESSION['giohang'] as $item) {
            $tensp = $item[1];
            $size = $item[2];

            if ($size) {
                $stmt = $conn->prepare("DELETE FROM giohang WHERE tensp = ? AND size = ?");
                $stmt->bind_param("ss", $tensp, $size);
            } else {
                $stmt = $conn->prepare("DELETE FROM giohang WHERE tensp = ? AND size IS NULL");
                $stmt->bind_param("s", $tensp);
            }
            $stmt->execute();
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
    body {
        background-color: #f4f4f4;
        display: flex; 
        flex-direction: column;
        align-items: center;
        height: 100vh;
        overflow-y: auto;
    }
    .hoadon {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        width: 800px; 
        text-align: center;
        margin-top: 56px;
    }
    table {
        width: 90%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px;
        border: 1px solid #ddd;
    }
    #btndat {
        background-color: rgb(9, 162, 111);
        border: none;
        width: 250px;
        height: 35px;
        font-size: 17px;
        color: white;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
    }
    #btndat:hover {
        background-color: rgb(50, 219, 163);
    }
</style>
<body>
    <div class="hoadon">
        <h2>1924 THE COFFEE</h2>
        <p style="margin-top: -10px;">
            823 đường Phạm Thái Bường, phường 4, tp.Vĩnh Long, tỉnh Vĩnh Long<br>
            Liên hệ: 1800 123 4567
        </p>
        <h2 style="margin-top: -5px;">HÓA ĐƠN THANH TOÁN</h2>
        <h4 style="margin-top: -13px;">Số hóa đơn: <?php echo $mahd; ?></h4>
        <h4 style="margin-top: -13px;">Ngày: <?php echo $ngaymua; ?></h4>
        <table align="center" width="100%">
            <tr>
                <th width="7%" style="font-size: 15px; text-align:center;">TT</th>
                <th width="25%" style="font-size: 15px; text-align:center;">Tên món</th>
                <th width="7%" style="font-size: 15px; text-align:center;">Size</th>
                <th width="9%" style="font-size: 15px; text-align:center;">Số lượng</th>
                <th style="font-size: 15px; text-align:center;">Topping</th>
                <th width="15%" style="font-size: 15px; text-align:center;">Giá</th>
            </tr>
            <?php foreach ($_SESSION['giohang'] as $index => $item): 
                $tensp = $item[1];
                $size = $item[2]; 
                $sl = $item[3]; 
                $gia = $item[5]; 
                $topping = isset($item[4]) ? $item[4] : ''; 
            ?>
            <tr>
                <td style="font-size: 15px;"><?php echo $index + 1; ?></td>
                <td style="font-size: 15px;"><?php echo $tensp; ?></td>
                <td style="font-size: 15px;"><?php echo $size; ?></td>
                <td style="font-size: 15px;"><?php echo $sl; ?></td>
                <td style="font-size: 15px;"><?php echo $topping; ?></td>
                <td style="font-size: 15px;"><?php echo $gia; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="5" style="font-size: 15px; text-align: right;">Tổng tiền: </th>
                <td style="font-size: 15px;"><?php echo $_SESSION['tong']; ?></td>
            </tr>
        </table>
        <button type="button" id="btndat" onclick="TB()">XÁC NHẬN THANH TOÁN</button>
    </div>
    <?php 
            unset($_SESSION['giohang']);
            unset($_SESSION['topping_details']);
            } else {
                header('location:dat_hang.php');
            }
        }
        $conn->close();
    ?>
</body>
<script>
    function TB() {
        alert("Bạn đã thanh toán thành công!");
        window.location.href = "trangchu.php";  
    }
</script>
</html>