<?php 
    include("homechinh.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1924 THE COFFEE</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            overflow-y: auto;
        }

        .content {
            width: 100%;
            max-width: 1200px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            padding: 20px;
        }

        .content h1 {
            text-align: center;
            color:  rgb(9, 169, 119);
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .content .item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .content .item:hover {
            transform: scale(1.03);
        }

        .content .item img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-right: 1px solid #ddd;
        }

        .content .item .info {
            padding: 15px 20px;
        }

        .content .item .info h3 {
            margin: 0;
            font-size: 1.5rem;
            color: rgb(9, 169, 119);
        }

        .content .item .info p {
            margin: 10px 0;
            color: #555;
            font-size: 1rem;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>1924 THE COFFEE</h1>
        <video width="100%" height="600" controls>
            <source src="http://localhost/baocaoweb/anhbcweb/1924.mp4" type="video/mp4">
        </video>
        <h2 style="color: rgb(9, 162, 111); text-align: center;">CÀ PHÊ</h2>
        <div class="item">
            <img src="http://localhost/baocaoweb/anhbcweb/caphe/cappuccino.png" alt="Cappuccino">
            <div class="info">
                <h3>Cappuccino</h3>
                <p>
                Thức uống cà phê được trang trí đẹp mắt với bọt sữa mềm mịn. Cappuchino là một nghệ thuật tạo hình.
                    Được pha chế từ sự kết hợp hài hòa giữa espresso đậm đà và lớp sữa nóng, tạo nên hương vị mượt mà, quyến rũ
                    Một ly Capuchino hoàn hảo thường được điểm xuyết bằng bột ca cao hoặc nghệ thuật vẽ latte, làm say lòng bất cứ ai yêu thích cà phê
                </p>
            </div>
        </div>
        
        <div class="item">
            <img src="http://localhost/baocaoweb/anhbcweb/caphe/caphemuoi.jpg" alt="Cà phê muối">
            <div class="info">
                <h3>Cà phê muối</h3>
                <p>
                    Cà phê muối là một sự sáng tạo đầy bất ngờ, với sự pha trộn giữa vị đắng của cà phê và vị mặn nhẹ từ muối. 
                    Hương vị độc đáo này chắc chắn sẽ khiến bạn thích thú.
                </p>
            </div>
        </div>
        
        <div class="item">
            <img src="http://localhost/baocaoweb/anhbcweb/caphe/caphesua.jpg" alt="Cà phê sữa">
            <div class="info">
                <h3>Cà phê sữa</h3>
                <p>
                Cà phê sữa là sự kết hợp hoàn hảo giữa hương vị đậm đà của cà phê và vị ngọt dịu từ sữa, tạo nên thức uống thơm ngon, quen thuộc với người Việt Nam. 
                        Một ly cà phê sữa ngon là sự hòa quyện đầy tinh tế giữa cà phê rang xay truyền thống, cho hương thơm nồng nàn và sữa đặc mịn màng, béo ngậy.
                        Hương vị vừa đậm đà vừa ngọt ngào của cà phê sữa khiến mỗi ngụm thưởng thức trở nên một trải nghiệm trọn vẹn, đánh thức cả giác quan. Thức uống này 
                        không chỉ là một thói quen mỗi sáng mà còn là nét văn hóa không thể thiếu trong đời sống hàng ngày của nhiều người
                </p>
            </div>
        </div>
       
        <div class="item">
            <img src="http://localhost/baocaoweb/anhbcweb/caphe/caphedua.jpg" alt="Cà phê dừa">
            <div class="info">
                <h3>Cà phê dừa</h3>
                <p>
                Cà phê dừa là sự kết hợp giữa cà phê đậm đà và vị ngọt béo của dừa, tạo nên thức uống mát lạnh, thơm ngon và lạ miệng. Với nước cốt dừa hòa quyện cùng cà phê,
                hương vị độc đáo này mang đến cảm giác sảng khoái, vừa mạnh mẽ vừa ngọt dịu, hấp dẫn mọi giác quan.
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/caphe/capheden.jpg" alt="Cà phê đen">
            <div class="info">
                <h3>Cà phê đen</h3>
                <p>
                Cà phê đen là loại cà phê nguyên chất, không pha sữa hay đường, mang hương vị đậm đà và mạnh mẽ. Với mùi thơm nồng nàn và vị đắng đặc trưng, cà phê đen là lựa chọn yêu thích
                của những người thích sự tinh tế và trọn vẹn trong từng giọt cà phê.
                </p>
            </div>
        </div>

        <h2 style="color: rgb(9, 162, 111); text-align: center;">TRÀ</h2>
        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/tra/trachanh.jpg" alt="Trà chanh">
            <div class="info">
                <h3>Trà chanh</h3>
                <p>
                Trà chanh là thức uống đơn giản nhưng đầy sức hút, được kết hợp từ trà xanh hoặc trà đen thanh 
                        mát và nước cốt chanh tươi. Vị chua dịu của chanh hòa quyện cùng vị trà thơm nhẹ, mang đến cảm
                        giác sảng khoái và giải nhiệt hiệu quả. 
                        Đây là lựa chọn lý tưởng cho những ngày nóng bức hoặc khi cần chút thư giãn, tươi mới
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/tra/trachanhleodacthom.jpg" alt="Trà chanh leo đác thơm">
            <div class="info">
                <h3>Trà chanh leo đác thơm</h3>
                <p>
                Trà chanh leo đác thơm là sự hòa quyện độc đáo giữa hương vị tươi mát của trà, chua thanh của chanh 
                        leo, và ngọt dịu của thạch đác, tạo nên thức uống mát lạnh, hấp dẫn. Vị trà thanh mát hòa cùng chanh
                        leo tươi mới, kết hợp với những miếng đác giòn dai, cùng hương 
                        thơm đặc trưng của thơm (dứa) mang đến trải nghiệm giải khát trọn vẹn, sảng khoái và đầy năng lượng.
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/tra/trachanhxoai.jpg" alt="Trà chanh xoài">
            <div class="info">
                <h3>Trà chanh xoài</h3>
                <p>
                Trà chanh xoài là sự kết hợp tuyệt vời giữa trà mát lạnh và vị ngọt thanh của xoài tươi, tạo nên một 
                        thức uống giải nhiệt hấp dẫn. Vị chua nhẹ của chanh kết hợp với hương thơm ngọt ngào của xoài,
                         mang đến cảm giác sảng khoái, tươi mới. Đây là lựa chọn lý tưởng
                         cho những ai yêu thích sự kết hợp giữa trái cây nhiệt đới và trà, đặc biệt trong những ngày hè oi ả.
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/tra/tradao.jpg" alt="Trà đào">
            <div class="info">
                <h3>Trà đào</h3>
                <p>
                Trà đào là thức uống thanh mát, kết hợp giữa trà thơm nhẹ và vị ngọt, chua dịu của đào tươi. 
                        Với hương thơm đặc trưng của đào, trà đào mang đến cảm giác tươi mới và sảng khoái,
                         là lựa chọn lý tưởng để giải nhiệt trong những ngày nóng bức.
                         Thức uống này không chỉ thơm ngon mà còn mang đến sự thư giãn và dễ chịu cho người thưởng thức.
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/tra/tradau.jpg" alt="Trà dâu">
            <div class="info">
                <h3>Trà dâu</h3>
                <p>
                Trà dâu là một thức uống ngọt ngào và tươi mát, kết hợp giữa trà nhẹ nhàng và hương vị thơm ngon của dâu tây.
                         Vị chua ngọt tự nhiên của dâu tây hòa quyện cùng trà, tạo nên sự kết hợp thanh mát, giải nhiệt tuyệt vời. 
                        Trà dâu là lựa chọn lý tưởng cho những ai yêu thích sự nhẹ nhàng, tươi mới và ngọt ngào trong từng ngụm.
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/tra/tranhietdoi.jpeg" alt="Trà nhiệt đới">
            <div class="info">
                <h3>Trà nhiệt đới</h3>
                <p>
                Trà nhiệt đới là sự pha trộn tuyệt vời giữa trà và các loại trái cây nhiệt đới tươi ngon như dứa, 
                        xoài, chanh leo, hay cam, mang đến hương vị tươi mới, ngọt ngào và sảng khoái. Thức uống này không
                        chỉ giải nhiệt hiệu quả mà còn cung cấp một cảm giác tươi mát, đầy năng lượng, 
                        rất phù hợp cho những ngày hè oi ả hoặc khi bạn muốn thưởng thức một ly trà đầy màu sắc và hương vị.
                </p>
            </div>
        </div>

        <h2 style="color: rgb(9, 162, 111); text-align: center;">TRÀ SỮA</h2>
        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trasua/trasuasocola.jpg" alt="Trà sữa socola">
            <div class="info">
                <h3>Trà sữa socola</h3>
                <p>
                Trà sữa socola là thức uống kết hợp giữa trà đen hoặc trà xanh với socola ngọt ngào,
                         tạo nên một hương vị béo ngậy, đậm đà và hấp dẫn. Được pha chế với sữa tươi mịn màng 
                         và đôi khi kèm theo trân châu, trà sữa socola
                         là lựa chọn hoàn hảo cho những ai yêu thích sự kết hợp giữa vị trà thanh mát và socola ngọt ngào.
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trasua/trasuamatcha.jpg" alt="Trà sữa matcha">
            <div class="info">
                <h3>Trà sữa Matcha</h3>
                <p>
                Trà sữa matcha là một thức uống kết hợp giữa trà matcha Nhật Bản và sữa,
                         mang đến một hương vị đặc trưng của trà xanh đậm đà và béo ngậy từ sữa.
                          Matcha, với vị đắng nhẹ và màu xanh đặc trưng, hòa quyện hoàn hảo với 
                          sữa tạo ra một thức uống vừa thơm ngon vừa bổ dưỡng. Thường được phục vụ cùng đá viên và trân châu, trà sữa matcha là lựa chọn
                         lý tưởng cho những ai yêu thích sự thanh mát và bổ dưỡng của matcha kết hợp với sự mềm mại của sữa.
                </p>
            </div>
        </div>
        
        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trasua/trasuadau.jpg" alt="Trà sữa dâu">
            <div class="info">
                <h3>Trà sữa dâu</h3>
                <p>
                Ly trà sữa dâu mát lạnh với màu hồng nhạt bắt mắt, vị ngọt dịu của dâu tây
                 hòa quyện cùng vị béo của sữa và hương thơm trà. Đây chắc chắn là thức uống lý tưởng để thưởng thức vào những ngày nắng nóng!
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trasua/trasuathaido.jpg" alt="Trà sữa thái đỏ">
            <div class="info">
                <h3>Trà sữa thái đỏ</h3>
                <p>
                Trà Sữa Thái Đỏ là món thức uống lý tưởng cho những ai yêu thích sự mới lạ và đậm đà của trà.
                 Màu sắc nổi bật và hương vị ngọt ngào chắc chắn sẽ làm bạn mê mẩn ngay từ lần đầu thử
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trasua/trasuathaixanh.jpg" alt="Trà sữa thái xanh">
            <div class="info">
                <h3>Trà sữa thái xanh</h3>
                <p>
                Trà Sữa Thái Xanh là một lựa chọn tuyệt vời cho những ai yêu thích trà xanh và muốn thưởng thức một món trà sữa mới mẻ. 
                Với sự kết hợp hoàn hảo giữa trà xanh thanh mát và sữa ngọt ngào, món trà này chắc chắn sẽ làm bạn hài lòng ngay từ lần đầu thử!
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trasua/trasuavietquoc.jpg" alt="Trà sữa việt quốc">
            <div class="info">
                <h3>Trà sữa việt quốc</h3>
                <p>
                Mỗi ly trà sữa của Việt Quốc luôn đảm bảo chất lượng, hương vị thơm ngon và được chế biến từ nguyên liệu tươi ngon, an toàn.
                </p>
            </div>
        </div>
       
        <h2 style="color: rgb(9, 162, 111); text-align: center;">TRÁNG MIỆNG</h2>
        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trangmieng/banhmique.jpg" alt="Bánh mì que">
            <div class="info">
                <h3>Bánh mì que</h3>
                <p>
                Vỏ bánh được nướng giòn và thường được phủ một lớp mỡ hành thơm phức, thêm gia vị để tăng phần hấp dẫn.
                         Món bánh mì que thường được ăn kèm với các loại nhân như pate, chả, hoặc thịt nướng,
                          tạo nên một hương vị đặc biệt, thơm ngon và đậm đà. Đây là món ăn đơn giản nhưng rất
                         được yêu thích vì hương vị đặc trưng và dễ ăn, thích hợp làm món ăn nhẹ trong các bữa xế hoặc ăn chơi.
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trangmieng/donut.jpg" alt="Donut">
            <div class="info">
                <h3>Donut</h3>
                <p>
                Bánh có vỏ ngoài giòn, mềm bên trong và thường được phủ một lớp đường bột, chocolate, hoặc các loại topping khác như hạt, kem, hoặc kẹo
                </p>
            </div>
        </div>
   
        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trangmieng/mousse.jpg" alt="Mousset">
            <div class="info">
                <h3>Mousse</h3>
                <p>
                Mousse là một món tráng miệng có kết cấu mịn màng, nhẹ và xốp, thường được làm từ các nguyên liệu như kem tươi,
                trứng, đường và một số loại gia vị hoặc hương liệu như socola, trái cây, hoặc cà phê.
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trangmieng/panna cotta.jpg" alt="Pana cotta">
            <div class="info">
                <h3>Pana cotta</h3>
                <p>
                Panna Cotta mịn màng, béo ngậy tan chảy trong miệng, với lớp sốt trái cây ngọt nhẹ chua thanh là món tráng miệng hoàn hảo cho các bữa tiệc hoặc dịp đặc biệt. 
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trangmieng/sukem.jpeg" alt="SuKem">
            <div class="info">
                <h3>Bánh su kem</h3>
                <p>
                Bánh su kem giòn xốp bên ngoài, nhân kem mịn mượt, thơm ngậy bên trong. Một món ăn hoàn hảo để nhâm nhi cùng trà hoặc cà phê! ☕
                </p>
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trangmieng/tiramisu.jpg" alt="Tiramisu">
            <div class="info">
                <h3>Tiramisu</h3>
                <p>
                    Tiramisu mềm mịn với hương vị hài hòa giữa vị đắng nhẹ của cà phê, độ béo ngậy của kem mascarpone và vị ngọt vừa phải. Đây là món tráng miệng hoàn hảo cho các dịp đặc biệt!
                </p>
            </div>
        </div>

        <h2 style="color: rgb(9, 162, 111); text-align: center;">SẢN PHẨM VỪA RA MẮT</h2>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/khac/matchadaxay.jpg" alt="Matcha đá xay">
            <div class="info">
                <h3>Matcha đá xay</h3>
                <p>
                Matcha đá xay là thức uống kết hợp giữa bột matcha xanh đậm đà và đá xay mịn, tạo nên một ly trà xanh 
                        thơm ngon, mát lạnh. Với hương vị đặc trưng của matcha hòa quyện cùng sự tươi mát của đá xay, 
                        thức uống này mang đến cảm giác sảng khoái và thư giãn, 
                        rất phù hợp cho những ai yêu thích trà xanh nhưng muốn trải nghiệm một phong cách mới lạ và mát lạnh.
            </div>
        </div>

        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/trasua/Sua-tuoi-tran-chau-duong-den.jpg" alt="Sữa tươi trân châu đường đen">
            <div class="info">
                <h3>Sữa tươi trân châu đường đen</h3>
                <p>
                Sữa tươi trân châu đường đen là một món đồ uống nổi bật, kết hợp giữa sữa tươi béo ngậy và trân châu dai mềm, ngọt ngào từ đường đen. 
                Đặc biệt, đường đen mang lại hương vị đậm đà, màu sắc bắt mắt cho trân châu. Món này không chỉ có vị ngọt thanh, 
                thơm mát mà còn có sự kết hợp hoàn hảo giữa các thành phần, 
                tạo cảm giác sảng khoái và dễ chịu. Đây là lựa chọn lý tưởng cho những ai yêu thích trà sữa và đồ uống ngọt mát.
            </div>
        </div>

        <h2 style="color: rgb(9, 162, 111); text-align: center;">SẢN PHẨM ĐƯỢC MUA NHIỀU NHẤT</h2>
        <div class="item">
        <img src="http://localhost/baocaoweb/anhbcweb/caphe/cappuccino.png" alt="Cappuchino">
            <div class="info">
                <h3>Cappuchino</h3>
                <p>
                    Được yêu thích nhất tại 1924, món best seller của chúng tôi là sự hòa quyện 
                    hoàn hảo giữa hương vị truyền thống và phong cách hiện đại, khiến ai cũng phải
                    mê mẩn ngay từ lần thử đầu tiên. Với mỗi ngụm, bạn sẽ cảm nhận được sự tinh 
                    tế trong từng chi tiết - từ nguyên liệu tươi ngon, được chọn lọc kỹ lưỡng, 
                    cho đến kỹ thuật chế biến tỉ mỉ, mang đến một trải nghiệm vị giác tuyệt vời.
                    Hãy để món best seller này chinh phục bạn, một lần thưởng thức là một lần
                    say mê. </p>
            </div>
        </div>
        
        <div class="slider">
            <img src="http://localhost/baocaoweb/anhbcweb/anh/cf.jpg" class="active" alt="Slider Image 1">
        </div>
        <div class="slider">
            <img src="http://localhost/baocaoweb/anhbcweb/anh/a2.jpg" class="active" alt="Slider Image 2">
        </div>
            <h3 align="center" style="color: rgb(9, 162, 111)">Khám phá thêm nhiều món ăn tuyệt vời tại 1924 THE COFFEE!</h3>
        </div>
            </div>
        </div>
    </div>
    <div class="footer">
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
