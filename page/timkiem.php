<?php
    include "homechinh.php";
    include "connect.php";
?><div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1924 THE COFFEE</title>
    <link rel="stylesheet" href="http://localhost/baocaoweb/css/card.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="form">
    <?php
  if (isset($_POST["timkiem"])) {
    $tukhoa = $_POST['timkiem'];
    
    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare("SELECT masp, tensp, anh, gia, size FROM menu WHERE tensp LIKE ?");
    $searchTerm = "%" . $tukhoa . "%"; // Sử dụng ký tự đại diện cho LIKE
    $stmt->bind_param("s", $searchTerm);
    
    // Thực thi câu lệnh
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $masp = $row['masp'];
            $tensp = $row['tensp'];
            $anh = $row['anh'];
            $gia = $row['gia'];
            $size = $row['size'];
            ?>
            <div class="card">
                <div class="card-top">
                    <img src="http://localhost/baocaoweb/anh/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
                </div>
                <div class="card-bottom">
                    <?php if ($size == NULL) { ?>
                        <label class="name"><?php echo $tensp; ?></label>
                    <?php } else { ?>
                        <label class="name"><?php echo $tensp?> (<?php echo $size ?>)</label>
                    <?php } ?>
                    <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                    <br>
                    <div class="card-bottom-btnmua">
                        <a href="order.php?masp=<?php echo $masp; ?>" class="order-button">
                            <i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Đặt hàng
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>Không có kết quả tìm kiếm.</p>";
    }
    }
    ?>
</div>
</body>
</html>