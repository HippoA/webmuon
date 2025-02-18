<?php
    include "homechinh.php";
    $discount = 20;  
    $bonus_discount = 20;  
    $offer_end = "30 tháng 11 2024"; 
    $new_arrival_discount = 10;  
    $loyalty_program_info = "Mỗi lần bạn thưởng thức một ly nước tại quán, bạn sẽ nhận ngay một phiếu tích điểm. Tích lũy đủ 7 phiếu, bạn sẽ được thưởng một món nước size M bất kỳ mà bạn yêu thích, hoàn toàn miễn phí!";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương Trình Khuyến Mãi Siêu Khủng</title>
    <link href= ""rel="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        .footer {
            box-sizing: content-box; 
        }
        
        body {
            overflow-y: auto;
        }

        .container1 {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        h1 {
            font-size: 3rem;
            color: rgb(9,162,111);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .promotion {
            background-color: #f4f4f4;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            text-align: center;
            transition: transform 0.4s ease-in-out, box-shadow 0.4s;
        }

        .promotion:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .promotion h2 {
            color: rgb(9,162,111);
            font-size: 2.5rem;
            margin-bottom: 25px;
            font-weight: 700;
        }

        .promotion p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .promotion p strong {
            color: rgb(9,162,111);
            font-size: 1.5rem;
        }

        .additional-offers {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .offer-card {
            background-color: rgb(9,162,111);
            color: #fff;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            width: 48%;
        }

        .offer-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .offer-card h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .offer-card p {
            font-size: 1rem;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .cta {
            text-align: center;
            margin-top: 60px;
        }

        #dathang {
            background-color: rgb(9,162,111);
            color: #fff;
            font-size: 1.8rem;
            padding: 15px 35px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            text-transform: uppercase;
        }

        #dathang:hover {
            background-color: rgb(50, 219, 163);
            transform: scale(1.05);
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .promotion {
                padding: 30px;
            }

            .offer-card {
                width: 100%;
            }

            #dathang {
                font-size: 1.5rem;
                padding: 12px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container1">
        <header>
            <h1 style="margin-top:0px;">Chương Trình Khuyến Mãi Siêu Khủng</h1>
        </header>

        <section class="promotion">
            <h2>Giảm giá lên tới <?php echo $discount; ?>% cho tất cả sản phẩm vào các ngày 9 tháng 1 và 24 tháng 7 và các ngày lễ tết</h2>
            <p>Chúng tôi đem đến một chương trình giảm giá không thể bỏ qua! Nhận ngay ưu đãi lên đến <strong><?php echo $discount; ?>%</strong> cho tất cả các sản phẩm từ nay cho đến hết ngày <?php echo $offer_end; ?>.</p>
            <p>Đặc biệt, sản phẩm mới sẽ được giảm giá <?php echo $new_arrival_discount; ?>%, giúp bạn trải nghiệm những món đồ hot nhất với mức giá cực kỳ hấp dẫn.</p>
            <p><strong>Thời gian khuyến mãi:</strong> Chương trình chỉ kéo dài đến <?php echo $offer_end; ?>. Hãy nhanh tay để không bỏ lỡ cơ hội này!</p>
        </section>

        <section class="promotion">
            <h2>Chương trình tích điểm - thưởng đặc biệt cho khách hàng thân thiết</h2>
            <p><?php echo $loyalty_program_info; ?></p>
            <p>Tham gia chương trình ngay hôm nay và nhận phần quà miễn phí từ quán. Chỉ cần thưởng thức một ly nước mỗi lần ghé qua, bạn sẽ dần tích lũy điểm để đổi lấy những phần quà hấp dẫn.</p>
        </section>

        <section class="additional-offers">
            <div class="offer-card">
                <h3>Giảm Thêm <?php echo $bonus_discount; ?>% Cho Đơn Hàng Trên <?php echo number_format(200000); ?> VNĐ</h3>
                <p>Mua sắm càng nhiều, ưu đãi càng lớn! Đơn hàng trên <?php echo number_format(200000); ?> VNĐ sẽ được giảm <?php echo $bonus_discount; ?>%, đồng thời bạn sẽ nhận phiếu tích điểm cho mỗi giao dịch.</p>
            </div>
            <div class="offer-card">
                <h3>Giảm <?php echo $new_arrival_discount; ?>% Cho Sản Phẩm Mới</h3>
                <p>Khám phá sản phẩm mới nhất tại quán và nhận ưu đãi giảm giá <?php echo $new_arrival_discount; ?>% cho mỗi món đồ bạn chọn.</p>
            </div>
        </section>

        <section class="cta">
            <a href="trangchu.php" style="color: white; text-decoration: none;" id="dathang"> Đặt Hàng Ngay</a>
        </section>

     
            <p style="text-align: center;margin-top: 50px;color:rgb(9,162,111);">&copy; 1924 THE COFFEE là một gia đình. | Cảm ơn vì các bạn đã luôn đồng hành cùng chúng tôi</p>
     
    </div>
     <div class="footer" style=" height: 270px;">
        <img src="http://localhost/baocaoweb/anhbcweb/logo/3.png" alt="1924 THE COFFEE"
            style="float: left; width: 250px; height: 200px">
        <table width="90%" align="center">
            <tr>
                <th width="40%">ĐỊA CHỈ</th>
                <th>GIỚI THIỆU QUÁN</th>
            </tr>
            <tr>
                <td>823 đường Phạm Thái Bường, phường 4, thành phố Vĩnh Long, tỉnh Vĩnh Long.</td>
                <td>1924 The Coffee mang đến không gian hiện đại, lý tưởng để thưởng thức cà phê đặc biệt, trà và bánh ngọt. 
                Chúng tôi cam kết mang lại trải nghiệm thư giãn và dễ chịu cho khách hàng.</td>
            </tr>
            <tr>
                <th>DỊCH VỤ</th>
                <th>LIÊN HỆ</th>
            </tr>
            <tr>
                <td>
                    Cà phê nguyên chất, trà sữa, trà trái cây, bánh ngọt, v.v...<br>
                    Khu vực dành cho hội họp, sự kiện.
                </td>
                <td>
                    Hotline: 1800 123 4567<br>
                    <a href="mailto:contact@1924thecoffee.vn" style="color:white; ">
                        Email: contact@1924thecoffee.vn<br>
                    </a>
                    <a href="https://www.youtube.com/@FITVLUTE" target="_blank"
                    style="color:white; font-size:30px;">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="https://web.facebook.com/vlute.edu.vn" target="_blank"
                    style="color:white; font-size:30px;">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <i class="fa-brands fa-instagram" style="color:white; font-size:30px;"></i>
                </td>
            </tr>
            
        </table>
    </div>
</body>
</html>
