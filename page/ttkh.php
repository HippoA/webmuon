<?php
    include("connect.php");
    include("homechinh.php");
    if (!isset($_SESSION['tenkh'])) {
        header("Location: trangchu.php");
        exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Khách Hàng</title>
    <style>
        body { 
            background-color: #f4f4f4;
            display: flex; 
            flex-direction: column;
            align-items: center;
            height: 100vh;
            overflow-y: auto;
        }
        .container1 { 
            margin-top: 30px;
            max-width: 600px; 
            padding: 20px; 
            background-color: #fff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        input[type=text], input[type=number] { 
            width: 97%; 
            padding: 10px; 
            margin: 5px 0 10px 0; 
            border: 1px solid #ccc; 
            border-radius: 4px;
        }
        .button { 
            width: 95px;
            padding: 10px; 
            margin-top: 7px; 
            margin-right: 10px;
            border: none; 
            border-radius: 4px;
            background-color: rgb(9, 162, 111); 
            color: #fff; 
            cursor: pointer; 
            font-weight: bold;
            font-size: 15px;
        }
        .button:hover { 
            background-color: rgb(7, 130, 89); 
        }
        h1 { 
            color: rgb(9, 162, 111);
        }
        .success-message {
            color: rgb(9, 162, 111); 
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container1">
        <h1 align="center">THÔNG TIN KHÁCH HÀNG</h1>
        <?php
        $sdt = $_SESSION['sdt'];
        $sql = "SELECT * FROM khachhang WHERE sdt='$sdt' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="" method="POST">
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" value="<?php echo $_SESSION['tenkh']; ?>" disabled>
                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $row['sdt']; ?>" readonly>
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" value="<?php echo $row['diachi']; ?>" disabled>
                
                <!-- Nút hiển thị khi vừa vào trang -->
                <button type="button" id="editButton" class="button" onclick="Edit()">Chỉnh sửa</button>
                <button type="submit" name="del" id="deleteButton" class="button">Xóa</button>
                <button type="button" id="exitButton" class="button">Thoát</button>

                <!-- Nút hiển thị khi chỉnh sửa -->
                <button type="button" id="saveButton" style="display:none;" class="button" onclick="updateInfo()">Lưu</button>
                <button type="button" id="cancelButton" style="display:none;" class="button" onclick="Cancel()">Hủy</button>
            </form>

            <script>
                // Lưu trữ giá trị ban đầu
                const originalName = "<?php echo $_SESSION['tenkh']; ?>";
                const originalAddress = "<?php echo $row['diachi']; ?>";

                function Edit() {
                    // Ẩn nút "Chỉnh sửa", "Xóa", "Thoát"
                    document.getElementById('editButton').style.display = 'none';
                    document.getElementById('deleteButton').style.display = 'none'; // Ẩn nút xóa
                    document.getElementById('exitButton').style.display = 'none'; // Ẩn nút thoát

                    // Hiện nút "Lưu" và "Hủy"
                    document.getElementById('saveButton').style.display = 'inline';
                    document.getElementById('cancelButton').style.display = 'inline';
                    
                    // Kích hoạt trường nhập liệu
                    document.getElementById('name').disabled = false;
                    document.getElementById('address').disabled = false;
                }

                function Cancel() {
                    // Khôi phục giá trị ban đầu
                    document.getElementById('name').value = originalName;
                    document.getElementById('address').value = originalAddress;

                    // Hiện lại nút "Chỉnh sửa", "Xóa", "Thoát"
                    document.getElementById('editButton').style.display = 'inline';
                    document.getElementById('deleteButton').style.display = 'inline'; // Hiện nút xóa
                    document.getElementById('exitButton').style.display = 'inline'; // Hiện nút thoát

                    // Ẩn nút "Lưu" và "Hủy"
                    document.getElementById('saveButton').style.display = 'none';
                    document.getElementById('cancelButton').style.display = 'none';

                    // Vô hiệu hóa trường nhập liệu
                    document.getElementById('name').disabled = true;
                    document.getElementById('address').disabled = true;
                }

                document.getElementById('exitButton').addEventListener('click', function() {
                    window.location.href = 'trangchu.php'; 
                });

                function updateInfo() {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'updatetk.php'; // Đường dẫn đến tệp xử lý

                    // Thêm các trường dữ liệu từ form hiện tại vào form ẩn
                    var nameInput = document.createElement('input');
                    nameInput.type = 'hidden';
                    nameInput.name = 'name';
                    nameInput.value = document.getElementById('name').value;
                    form.appendChild(nameInput);

                    var addressInput = document.createElement('input');
                    addressInput.type = 'hidden';
                    addressInput.name = 'address';
                    addressInput.value = document.getElementById('address').value;
                    form.appendChild(addressInput);

                    var phoneInput = document.createElement('input');
                    phoneInput.type = 'hidden';
                    phoneInput.name = 'phone';
                    phoneInput.value = document.getElementById('phone').value;
                    form.appendChild(phoneInput);

                    // Thêm form vào DOM và gửi đi
                    document.body.appendChild(form);
                    form.submit();
                }

            </script>
            <?php
        } else {
            echo "Không có thông tin khách hàng nào trong cơ sở dữ liệu.";
        }

        if (isset($_POST["del"])) {
            echo "<script>
                if (confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')) {
                    window.location.href = 'xoatk.php?sdt=$sdt';
                } else {
                    window.location.href = 'index.php?page_layout=trangchu';
                }
            </script>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>