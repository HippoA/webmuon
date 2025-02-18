<?php
    include "homechinh.php";
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
    table,th,td{
        border:none;
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
        $sql="SELECT * FROM menu";
        $query=mysqli_query($conn,$sql);

    ?>
    <h1 style="color:rgb(9, 162, 111);text-align: center;margin-bottom:0px;">DANH SÁCH SẢN PHẨM</h1>
    <div class="container">
        <a href="index.php?page_layout=themsanpham" class="btn">
            <i class="fa-solid fa-plus"></i> Thêm Mới
        </a>
    </div>
    <table style="width:100%;margin-left:0px;">
        <tr>
            <th style="width:5%">TT</th>
            <th style="width:15%">Mã sản phẩm</th>
            <th style="width:27%">Tên sản phẩm</th>
            <th style="width:12%">Loại</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Size</th>
            <th>Ảnh</th>
            <th style="width:7%">Sửa</th>
            <th style="width:7%">Xóa</th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_assoc($query)){ 
            $loai=$row['loai']; ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['masp'] ?></td>
                    <td><?php echo $row['tensp'] ?></td>
                    <td>
                        <?php 
                            if ($loai == "trasua") {
                                echo "Trà sữa";
                            } elseif ($loai == "caphe") {
                                echo "Cà phê";
                            } elseif ($loai == "tra") {
                                echo "Trà";
                            } elseif ($loai == "trangmieng") {
                                echo "Tráng miệng";
                            } elseif ($loai == "khac") {
                                echo "Khác";
                            }
                        ?>
                    </td>
                    <td><?php echo $row['gia'] ?></td>
                    <td><?php echo $row['mota'] ?></td>
                    <td><?php echo $row['size'] ?></td>
                    <td>
                        <?php 
                            echo '<img style="width:50px;height: 45px;" src="http://localhost/baocaoweb/anh/' . $row['anh'] . '">';
                        ?>
                    </td>
                    <td>
                        <a href="index.php?page_layout=sua&id=<?php echo $row['masp'];?>">Sửa</a>
                    </td>
                    <td>
                        <a onclick="return Del('<?php echo $row['masp'];?>')" href="index.php?page_layout=xoa&id=<?php echo $row['masp'];?>">Xóa</a>
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