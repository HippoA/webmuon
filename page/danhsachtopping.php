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
        /* border:none; */
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
    justify-content: flex-end; /* Di chuyển nội dung sang bên phải */
    align-items: center; 
    height: 100%; 
}
</style>
<body>
    <?php
        $sql="SELECT * FROM topping";
        $query=mysqli_query($conn,$sql);

    ?>
    <h1 style="color:rgb(9, 162, 111);text-align: center;margin-bottom:0px;">DANH SÁCH TOPPING</h1>
    <div class="container">
        <a href="index.php?page_layout=themtopping" class="btn">
            <i class="fa-solid fa-plus"></i> Thêm Mới
        </a>
    </div>
    <table style="width:80%;margin-left:120px;">
        <tr>
            <th style="width:5%">TT</th>
            <th style="width:20%">Mã topping</th>
            <th style="width:35%">Tên topping</th>
            <th>Giá</th>
            <th style="width:10%">Sửa</th>
            <th style="width:10%">Xóa</th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_assoc($query)){  ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['matopping'] ?></td>
                    <td><?php echo $row['tentopping'] ?></td>
                    <td><?php echo $row['giatopping'] ?></td>
                    <td>
                        <a href="index.php?page_layout=suatopping&matopping=<?php echo $row['matopping'];?>">Sửa</a>
                    </td>
                    <td>
                        <a onclick="return Del('<?php echo $row['matopping'];?>')" href="index.php?page_layout=xoatopping&matopping=<?php echo $row['matopping'];?>">Xóa</a>
                    </td>
                </tr>
        <?php } ?>

    </table>
</body>
<script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: "+name+" ?");
    }
</script>