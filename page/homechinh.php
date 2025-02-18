<?php
    session_start();
    include("icon.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1924 The Coffee</title>
    <link rel="stylesheet" href="http://localhost/baocaoweb/css/headerchinh2.css?v=<?=time();?>">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <nav class="container">
                <ul id="main-menu">
                    <li><a href="index.php?page_layout=trangchu">Trang chủ</a></li>
                    <li><a href="index.php?page_layout=gioithieu">Giới thiệu</a></li>
                    <li><a href="index.php?page_layout=khuyenmai">Khuyến mãi</a></li>
                    <li><a href="">Thực đơn</a>
                        <ul class="sub-menu">
                            <li><a href="index.php?page_layout=caphe">Cà phê</a></li>
                            <li><a href="index.php?page_layout=trasua">Trà sữa</a></li>
                            <li><a href="index.php?page_layout=tra">Trà</a></li>
                            <li><a href="index.php?page_layout=trangmieng">Tráng miệng</a></li>
                            <li><a href="index.php?page_layout=khac">Khác</a></li>
                        </ul>
                    </li>   
                </ul>
                <ul id="menu2">
                    <form action="timkiem.php" method="POST">
                        <input type="search" name="timkiem" id="timkiem" placeholder="Tìm kiếm...">
                        <button type="submit">Tìm kiếm</button></a>
                    </form>
                    <?php if(isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == '0' && isset($_SESSION['tenkh'])) : 
                        ?>
                        <li><a href=""><?php echo $_SESSION['tenkh']; ?></a>
                            <ul class="sub-menu">
                                <li>
                                    <form action="ttkh.php" method="POST">
                                        <input type="hidden" name="tenkh" value="<?php echo $_SESSION['tenkh']; ?>">
                                        <a href="index.php?page_layout=hoso">Hồ sơ của tôi</a>
                                    </form>
                                </li>
                                <li>
                                    <form action="codedx.php" method="POST">
                                        <input type="submit" name="logout" class="logout" value="Đăng xuất">
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php elseif (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == '1'):
                         ?>
                        <li><a href="">Admin</a>
                            <ul class="sub-menu">
                                <li><a href="index.php?page_layout=lsbh">Lịch sử bán hàng</a></li>
                                <li><a href="index.php?page_layout=danhsachsanpham">Quản lý sản phẩm</a></li>
                                <li><a href="index.php?page_layout=danhsachtopping">Quản lý topping</a></li>
                                <li><a href="index.php?page_layout=danhsachtaikhoan">Quản lý tài khoản</a></li>
                                <li>
                                    <form action="codedx.php" method="POST">
                                        <input type="submit" name="logout" class="logout" value="Đăng xuất">
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="index.php?page_layout=dangnhap" class="login-btn">Đăng nhập</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
   </div>
</body>
</html>