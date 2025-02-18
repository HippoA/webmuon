<?php
    require_once 'connect.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                case 'caphe':
                    require_once 'caphe.php';
                    break;
                case 'trasua':
                    require_once 'trasua.php';
                    break;
                case 'tra':
                    require_once 'tra.php';
                    break;
                case 'trangmieng':
                    require_once 'trangmieng.php';
                    break;
                case 'khac':
                    require_once 'khac.php';
                    break;
                case 'trangchu':
                    require_once 'trangchu.php';
                    break;
                case 'danhsachsanpham':
                    require_once 'danhsachsanpham.php';
                    break;
                case 'themsanpham':
                    require_once 'them.php';
                    break;
                case 'xoa':
                    require_once 'xoa.php';
                    break;
                case 'sua':
                    require_once 'sua.php';
                    break;
                case 'timkiem':
                    require_once 'timkiem.php';
                    break;
                case 'trove':
                    require_once 'danhsachsanpham.php';
                    break;
                //topping
                case 'danhsachtopping':
                    require_once 'danhsachtopping.php';
                    break;
                case 'themtopping':
                    require_once 'themtopping.php';
                    break;
                case 'trovetopping':
                    require_once 'danhsachtopping.php';
                    break;
                case 'suatopping':
                    require_once 'suatopping.php';
                    break;
                case 'xoatopping':
                    require_once 'xoatopping.php';
                    break;
                case 'khuyenmai':
                    require_once 'khuyenmai.php';
                    break;
                case 'dangnhap':
                    require_once 'dangnhap.php';
                    break;
                case 'gioithieu':
                    require_once 'gioithieu.php';
                    break;
                case 'dangky':
                    require_once 'dangky.php';
                    break;
                case 'lsbh':
                    require_once 'lsubanhang.php';
                    break;
                case 'hoso':
                    require_once 'ttkh.php';
                    break;
                case 'danhsachtaikhoan':
                    require_once 'danhsachtaikhoan.php';
                    break;
                case 'themtaikhoan':
                    require_once 'themtaikhoan.php';
                    break;
                case 'suataikhoan':
                    require_once 'suataikhoan.php';
                    break;
                case 'xoataikhoan':
                    require_once 'xoataikhoan.php';
                    break;
                default:
                    require_once 'trangchu.php';
                    break;
            }
        }else{
            require_once 'trangchu.php';
        }
    ?>
</body>
</html>