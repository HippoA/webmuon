<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
.shop {
    background-color: rgb(9,162,111);
    width: 50px;
    height: 50px;
    position: fixed; 
    bottom: 28px; 
    right: 28px; 
    z-index: 1000;
    border-radius: 50%; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
}
.shop:hover {
    transform: scale(1.15); 
}
.shop i {
    font-size: 28px;
}
</style>
<body>
    <div id="shop" class="shop">
        <a href="dat_hang.php">
        <i style="color: white;" class="fa-solid fa-bag-shopping"></i>
        </a>
    </div>
</body>
</html>