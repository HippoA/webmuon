<?php
    include "homechinh.php";
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
    * {
    font-family: Helvetica;
    }
    .them{
        background-color:rgb(9, 162, 111);
        color:white;

    }
    /* table,th,td{
        border:1px solid black;
    } */
    table,th,td{
        border-collapse:collapse;
    }
    th{
        height:40px;
        background-color:rgb(9, 162, 111);
        color:white;
        font-size:17px;
        text-align:center;
    }
    td{
        height:40px;
        text-align:center;
    }
    td{
        padding-top:15px;
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
    margin-bottom: 15px; /* Khoảng cách bên phải */
    margin-right:115px;
    }

    .btn:hover {
        background-color: rgb(50, 219, 163); 
    }
    .container {
    display: flex; 
    justify-content: flex-end;
    align-items: center; 
    height: 100%; 
}
</style>
<body>
    <?php
        $sql = "
            SELECT taikhoan.sdt, taikhoan.pass, taikhoan.quyen, khachhang.tenkh
            FROM taikhoan
            INNER JOIN khachhang ON taikhoan.sdt = khachhang.sdt
        ";
        $query=mysqli_query($conn,$sql);

    ?>
    <h1 style="color:rgb(9, 162, 111);text-align: center;margin-bottom:0px;">DANH SÁCH TÀI KHOẢN</h1>
    <div class="container">
        <a href="index.php?page_layout=themtaikhoan" class="btn">
            <i class="fa-solid fa-plus"></i> Thêm Mới
        </a>
    </div>
    <table style="width:80%;margin-left:120px;">
        <tr>
            <th style="width:5%">TT</th>
            <th style="width:25%">Tên khách hàng</th>
            <th style="width:20%">Số điện thoại</th>
            <th style="width:20%">Password</th>
            <th>Quyền</th>
            <th style="width:10%">Sửa</th>
            <th style="width:10%">Xóa</th>
        </tr>
        <?php 
            $i = 1;
            while($row = mysqli_fetch_assoc($query)) {  ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['tenkh']; ?></td>
                    <td><?php echo $row['sdt']; ?></td>
                    <td><?php echo $row['pass']; ?></td>
                    <td><?php echo $row['quyen']; ?></td>
                    <td>
                    <a href="index.php?page_layout=suataikhoan&sdt=<?php echo $row['sdt']; ?>">Sửa</a>
                    </td>
                    <td>
                    <a href="index.php?page_layout=xoataikhoan&sdt=<?php echo $row['sdt']; ?>" onclick="return Del('<?php echo $row['sdt']; ?>');">Xóa</a>
                    </td>
                </tr>
        <?php } ?>
    </table>

</body>
<script>
    function Del(sdt){
        return confirm("Bạn có chắc chắn muốn xóa tài khoản có số điện thoại: "+sdt+" ?");
    }
</script>