<?php
include "connect.php";
include "homechinh.php";

if (isset($_GET['masp'])) {
    $masp = $_GET['masp'];
    $sql = "SELECT * FROM menu WHERE masp = '$masp'";
    $query = mysqli_query($conn, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $product = mysqli_fetch_assoc($query);
        $_SESSION['masp'] = $masp; 
    } else {
        echo "Sản phẩm không tồn tại.";
        exit;
    }
}
$loai = $product['loai'] ?? '';

$imagePath = "http://localhost/baocaoweb/anhbcweb/";
$linkPath = "";
switch ($loai) {
    case 'trasua':
        $imagePath .= "trasua/{$product['anh']}";
        $linkPath = "topping_trasua.php?masp=$masp";
        break;
    case 'tra':
        $imagePath .= "tra/{$product['anh']}";
        $linkPath = "topping_tra.php?masp=$masp";
        break;
    case 'caphe':
        $imagePath .= "caphe/{$product['anh']}";
        $linkPath = "quantity_only.php?masp=$masp";
        break;
    case 'trangmieng':
        $imagePath .= "trangmieng/{$product['anh']}";
        $linkPath = "quantity_only.php?masp=$masp";
        break;
    default:
        $imagePath .= "khac/{$product['anh']}";
        $linkPath = "quantity_only.php?masp=$masp";
        break;
}

$showToppingOptions = in_array($loai, ['trasua', 'tra']);

$toppings = [];
if ($showToppingOptions) {
    $sqlTopping = "SELECT * FROM topping";
    $queryTopping = mysqli_query($conn, $sqlTopping);
    while ($row = mysqli_fetch_assoc($queryTopping)) {
        $toppings[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['tensp']; ?></title>
    <link rel="stylesheet" href="http://localhost/baocaoweb/css/nuoc.css?v=<?=time();?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="product-container">
    <h2 style="color: rgb(9, 162, 111); text-transform: uppercase;"><?php echo $product['tensp']; ?></h2>
    <div class="product-content">
        <div class="product-image">
            <a href="">
                <img src="<?php echo $imagePath; ?>" alt="<?php echo $product['tensp']; ?>" />
            </a>
        </div>
        <div class="product-details">
            <p><?php echo $product['mota']; ?></p>
            <div class="quantity-controls">
                <button class="quantity-button" onclick="changeDrinkQuantity('quantity', -1)">-</button>
                <span id="quantity-display" style="color: rgb(9, 162, 111)">1</span>
                <button class="quantity-button" onclick="changeDrinkQuantity('quantity', 1)">+</button>
            </div>
            <div class="topping-options">
                <?php if ($showToppingOptions): ?>
                    <h3 style="color: rgb(9, 162, 111);">Chọn Topping:</h3>
                    <?php
                    foreach ($toppings as $topping) {
                        echo "<div class='topping-option'>
                                <label for='{$topping['matopping']}'>{$topping['tentopping']} - " . number_format($topping['giatopping'], 0, ',', '.') . " VNĐ</label>
                                <div class='topping-quantity'>
                                    <button class='quantity-button' onclick=\"changeToppingQuantity('{$topping['matopping']}', {$topping['giatopping']}, -1)\">-</button>
                                    <span class='quantity-display' id='{$topping['matopping']}-qty'>0</span>
                                    <button class='quantity-button' onclick=\"changeToppingQuantity('{$topping['matopping']}', {$topping['giatopping']}, 1)\">+</button>
                                </div>
                            </div>";
                    }
                    ?>
                <?php endif; ?>
                <br><p class="price">Giá: <span id="total-price"><?php echo number_format($product['gia'], 0, ',', '.'); ?></span> VNĐ</p><br>

                <form action="dat_hang.php" method="POST">
                        <input type="hidden" name="masp" value="<?php echo $masp ?>">
                        <input type="hidden" name="sl" id="hidden-quantity" value="1">
                        <input type="hidden" name="img" value="<?php echo $imagePath ?>">
                        <input type="hidden" name="gia" value="<?php echo $product['gia']; ?>">
                        <input type="hidden" name="topping" id="hidden-topping" value="">
                        <input type="hidden" name="topping_price" id="hidden-topping-price" value="">
                        <input type="hidden" name="toppingarr" id="toppingarr" value="">
                        <button type="submit" name="themgh" class="buy-button">THÊM VÀO GIỎ HÀNG</button>
                </form>  
            </div>
        </div>
    </div>
</div>

<script>
let basePrice = <?php echo $product['gia']; ?>;
let toppingPrices = {};

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
<?php
    foreach ($toppings as $topping) {
        echo "toppingPrices['{$topping['matopping']}'] = {$topping['giatopping']};";
    }
?>

function changeToppingQuantity(topping, price, amount) {
    const qtyDisplay = document.getElementById(`${topping}-qty`);
    let currentQty = parseInt(qtyDisplay.textContent);
    currentQty = isNaN(currentQty) ? 0 : currentQty + amount;
    if (currentQty < 0) currentQty = 0;
    qtyDisplay.textContent = currentQty;

    updateTotalPrice();
}

function changeDrinkQuantity(elementId, amount) {
    const qtyDisplay = document.getElementById(elementId + '-display');
    let currentQty = parseInt(qtyDisplay.textContent);
    currentQty = isNaN(currentQty) ? 1 : currentQty + amount;
    if (currentQty < 1) currentQty = 1;
    qtyDisplay.textContent = currentQty;

    updateTotalPrice();
}

function updateTotalPrice() {
    let totalPrice = basePrice; 
    let totalToppingPrice = 0;

    let selectedToppings = [];
    for (let topping in toppingPrices) {
        const qty = parseInt(document.getElementById(`${topping}-qty`).textContent) || 0;
        if (qty > 0) {
            totalToppingPrice = totalToppingPrice + toppingPrices[topping] * qty;

            const toppingLabel = document.querySelector(`label[for='${topping}']`).textContent.split(' - ')[0];
            selectedToppings.push(`${toppingLabel} (x${qty})`); 
        }
    }

        let toppingDetails = [];

    for (let topping in toppingPrices) {
        const qty = parseInt(document.getElementById(`${topping}-qty`).textContent) || 0;
        if (qty > 0) {
            toppingDetails.push({
                matopping: topping,
                tentopping: document.querySelector(`label[for='${topping}']`).textContent.split(' - ')[0],
                soluong: qty,
                giatopping: toppingPrices[topping]
            });
        }
    }
    document.getElementById('toppingarr').value = JSON.stringify(toppingDetails);

    const quantity = parseInt(document.getElementById('quantity-display').textContent);
    totalPrice = (totalPrice + totalToppingPrice) * quantity; 

    document.getElementById('total-price').textContent = totalPrice.toLocaleString('vi-VN');

    document.getElementById('hidden-quantity').value = quantity;
    document.getElementById('hidden-topping').value = selectedToppings.join(', '); 
    document.getElementById('hidden-topping-price').value = totalToppingPrice; 

    let toppingQuantities = [];
    for (let topping in toppingPrices) {
        const qty = parseInt(document.getElementById(`${topping}-qty`).textContent) || 0;
        if (qty > 0) {
            toppingQuantities.push(`${topping} (x${qty})`);
        }
    }
}
</script>

</body>
</html>