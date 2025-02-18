<?php
include("connect.php");
include("homechinh.php");
include("icon.php");

$filterDate = isset($_POST['filter_date']) ? $_POST['filter_date'] : '';

$sql = "
SELECT 
    ls.magd AS magd,
    ls.makh AS makh,
    kh.tenkh AS tenkh,
    ls.mahd AS mahd,
    hd.tongtien AS tongtien,
    hd.ngaymua AS ngaymua
FROM 
    lsbanhang ls
JOIN 
    khachhang kh ON ls.makh = kh.makh
JOIN 
    hoadon hd ON ls.mahd = hd.mahd
";

if ($filterDate) {
    $sql .= " WHERE DATE(hd.ngaymua) = '$filterDate'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Lịch Sử Bán Hàng</title>
    <style>
        body {
            overflow-y: auto;
        }
        .container2 {
            height: 100%; 
            margin-left: 150px;
        }
        table {
            margin-top: 20px;
        }
        table, th, td {
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
    </style>
</head>
<body>
    <div class="container2">
        <h1 style="color:rgb(9, 162, 111); margin-left:265px; margin-bottom: 0px;">LỊCH SỬ BÁN HÀNG</h1>

        <form method="POST" style="margin-bottom: 20px; margin-top: 20px; margin-left:285px;">
            <label for="filter_date">Chọn ngày:</label>
            <input style="height:27px; width:100px;" type="date" name="filter_date" id="filter_date" value="<?php echo htmlspecialchars($filterDate); ?>">
            <button type="submit" style="background-color:rgb(9, 162, 111); border:none; color:white; width:60px; height:30px;">Chọn</button>
        </form>

        <table width="800px">
            <tr>
                <th width="15%">Mã Giao Dịch</th>
                <th width="35%">Tên KH</th>
                <th width="12%">Tổng tiền</th>
                <th>Ngày mua</th>
            </tr>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['magd']) . "</td>
                        <td>" . htmlspecialchars($row['tenkh']) . "</td>
                        <td>" . htmlspecialchars($row['tongtien']) . "</td>
                        <td>" . htmlspecialchars($row['ngaymua']) . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
