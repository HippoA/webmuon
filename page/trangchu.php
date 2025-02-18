<?php
    include "homechinh.php";
    include "connect.php";
    echo "<script>console.log(" . json_encode($_SESSION) . ");</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1924 THE COFFEE</title>
    <link rel="stylesheet" href="http://localhost/baocaoweb/css/tc.css?v=<?=time();?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>
    <!-------Slider------>
    <section class="slider">  
        <div class="container">
           <div class="slider-content">
               <div class="silder-content-left">
                    <div class="silder-content-left-top-container">
                        <div class="silder-content-left-top">
                            <a href=""><img src="http://localhost/baocaoweb/anhbcweb/caphe/ca.jpg" alt=""> </a>
                            <a href=""><img src="http://localhost/baocaoweb/anhbcweb/tra/peach.jpg" alt=""> </a>
                            <a href=""><img src="http://localhost/baocaoweb/anhbcweb/trangmieng/panna.jpg" alt=""></a>
                            <a href=""><img src="http://localhost/baocaoweb/anhbcweb/trasua/trasua.jpg" alt=""></a>
                            <a href=""><img src="http://localhost/baocaoweb/anhbcweb/khac/vietquoc.jpg" alt=""> </a>
                        </div>
                        <div class="silder-content-left-top-btn">
                            <i class="fas fa-chevron-left"></i>
                            <i class="fas fa-chevron-right"></i> 
                        </div>
                    </div>
                    <div class="sider-content-left-bottom">
                        <li class="active">Cà phê</li>
                        <li>Trà</li>
                        <li>Tráng miệng</li>
                        <li>Trà sữa</li>
                        <li>Khác</li>
                    </div>
               </div>
           </div>
        </div>   
    </section>
    <script src="http://localhost/baocaoweb/script/script.js"></script>

    <!-- --------------------card---------------------- -->
    <h1 style="color: rgb(9, 162, 111); text-align: center;">SẢN PHẨM NỔI BẬT</h1>
    <div class="form">
        <div>
            <div class="card">
               <div class="card-top">
                    <?php
                    $sql="SELECT masp,tensp,anh,gia FROM menu WHERE masp = 'bmq' ";
                    $query = mysqli_query($conn, $sql);
                        if ($query) {
                          while ($row = mysqli_fetch_assoc($query)) {
                              $masp = $row['masp'];
                              $tensp = $row['tensp'];
                              $anh = $row['anh'];
                              $gia = $row['gia'];
                            }
                        } ?>
                    <img src="http://localhost/baocaoweb/anhbcweb/trangmieng/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
               </div>
                <div class="card-bottom">
                    <label class="name"><?php echo $tensp?></label>
                    <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                    <br>
                    <div class="card-bottom-btnmua">
                        <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                        <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="trangmieng">Đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
            <div>
                <div class="card">
                    <div class="card-top">
                        <?php
                        $sql="SELECT masp,tensp,anh,gia,size FROM menu WHERE masp = 'sttcl' ";
                        $query = mysqli_query($conn, $sql);
                        // Kiểm tra nếu truy vấn thành công
                        $query = mysqli_query($conn, $sql);
                            if ($query) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                // Lấy dữ liệu từ cơ sở dữ liệu
                                $masp = $row['masp'];
                                $tensp = $row['tensp'];
                                $anh = $row['anh'];
                                $gia = $row['gia'];
                                $size = $row['size'];
                                }
                            } ?>
                        <img src="http://localhost/baocaoweb/anhbcweb/trasua/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
                    </div>
                        <div class="card-bottom">
                            <label class="name"><?php echo $tensp?> (<?php echo $size ?>)</label>
                            <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                            <br>
                            <div class="card-bottom-btnmua">
                                <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                                <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="trasua">Đặt hàng</a>
                            </div>
                        </div>
                </div>
            </div>
        <div>
            <div class="card">
            <div class="card-top">
                    <?php
                    $sql="SELECT masp,tensp,anh,gia FROM menu WHERE masp = 'cpsd' ";
                    $query = mysqli_query($conn, $sql);
                      // Kiểm tra nếu truy vấn thành công
                    $query = mysqli_query($conn, $sql);
                        if ($query) {
                          while ($row = mysqli_fetch_assoc($query)) {
                              // Lấy dữ liệu từ cơ sở dữ liệu
                              $masp = $row['masp'];
                              $tensp = $row['tensp'];
                              $anh = $row['anh'];
                              $gia = $row['gia'];
                            }
                        } ?>
                    <img src="http://localhost/baocaoweb/anhbcweb/caphe/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
               </div>
                <div class="card-bottom">
                    <label class="name"><?php echo $tensp?></label>
                    <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                    <br>
                    <div class="card-bottom-btnmua">
                        <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                        <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="caphe">Đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card">
                <div class="card-top">
                        <?php
                        $sql="SELECT masp,size,tensp,anh,gia FROM menu WHERE masp = 'daol' ";
                        $query = mysqli_query($conn, $sql);
                        // Kiểm tra nếu truy vấn thành công
                        $query = mysqli_query($conn, $sql);
                            if ($query) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                // Lấy dữ liệu từ cơ sở dữ liệu
                                $masp = $row['masp'];
                                $tensp = $row['tensp'];
                                $anh = $row['anh'];
                                $gia = $row['gia'];
                                $size = $row['size'];
                                }
                            } ?>
                        <img src="http://localhost/baocaoweb/anhbcweb/tra/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
                    </div>
                    <div class="card-bottom">
                        <label class="name"><?php echo $tensp?> (<?php echo $size ?>)</label>
                        <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                        <br>
                        <div class="card-bottom-btnmua">
                            <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                            <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="tra">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        <div>
            <div class="card">
                <div class="card-top">
                    <?php
                    $sql="SELECT masp,size,tensp,anh,gia FROM menu WHERE masp = 'ygxoai' ";
                    $query = mysqli_query($conn, $sql);
                        // Kiểm tra nếu truy vấn thành công
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {
                                    // Lấy dữ liệu từ cơ sở dữ liệu
                            $masp = $row['masp'];
                            $tensp = $row['tensp'];
                            $anh = $row['anh'];
                            $gia = $row['gia'];
                            $size = $row['size'];
                        }
                    } ?>
                    <img src="http://localhost/baocaoweb/anhbcweb/khac/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
                </div>
                <div class="card-bottom">
                    <label class="name"><?php echo $tensp?></label>
                    <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                    <br>
                    <div class="card-bottom-btnmua">
                    <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                    <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="khac">Đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="form">
        <!-- -----------------card hàng 2--------------------- -->
        <div>
            <div class="card">
               <div class="card-top">
                    <?php
                    $sql="SELECT masp,tensp,anh,gia FROM menu WHERE masp = 'tiramisu' ";
                    $query = mysqli_query($conn, $sql);
                      // Kiểm tra nếu truy vấn thành công
                    $query = mysqli_query($conn, $sql);
                        if ($query) {
                          while ($row = mysqli_fetch_assoc($query)) {
                              // Lấy dữ liệu từ cơ sở dữ liệu
                              $masp = $row['masp'];
                              $tensp = $row['tensp'];
                              $anh = $row['anh'];
                              $gia = $row['gia'];
                            }
                        } ?>
                    <img src="http://localhost/baocaoweb/anhbcweb/trangmieng/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
               </div>
                <div class="card-bottom">
                    <label class="name"><?php echo $tensp?></label>
                    <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                    <br>
                    <div class="card-bottom-btnmua">
                        <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                        <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="trangmieng">Đặt hàng</a>                    </div>
                </div>
            </div>
        </div>
            <div>
                <div class="card">
                    <div class="card-top">
                        <?php
                        $sql="SELECT masp,tensp,anh,gia,size FROM menu WHERE masp = 'tsdaul' ";
                        $query = mysqli_query($conn, $sql);
                        // Kiểm tra nếu truy vấn thành công
                        $query = mysqli_query($conn, $sql);
                            if ($query) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                // Lấy dữ liệu từ cơ sở dữ liệu
                                $masp = $row['masp'];
                                $tensp = $row['tensp'];
                                $anh = $row['anh'];
                                $gia = $row['gia'];
                                $size = $row['size'];
                                }
                            } ?>
                        <img src="http://localhost/baocaoweb/anhbcweb/trasua/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
                        
                    </div>
                        <div class="card-bottom">
                            <label class="name"><?php echo $tensp?> (<?php echo $size ?>)</label>
                            <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                            <br>
                            <div class="card-bottom-btnmua">
                                <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                                <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="trasua">Đặt hàng</a>
                            </div>
                        </div>
                </div>
            </div>
        <div>
            <div class="card">
            <div class="card-top">
                    <?php
                    $sql="SELECT masp,tensp,anh,gia FROM menu WHERE masp = 'cpm' ";
                    $query = mysqli_query($conn, $sql);
                      // Kiểm tra nếu truy vấn thành công
                    $query = mysqli_query($conn, $sql);
                        if ($query) {
                          while ($row = mysqli_fetch_assoc($query)) {
                              // Lấy dữ liệu từ cơ sở dữ liệu
                              $masp = $row['masp'];
                              $tensp = $row['tensp'];
                              $anh = $row['anh'];
                              $gia = $row['gia'];
                            }
                        } ?>
                    <img src="http://localhost/baocaoweb/anhbcweb/caphe/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
               </div>
                <div class="card-bottom">
                    <label class="name"><?php echo $tensp?></label>
                    <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                    <br>
                    <div class="card-bottom-btnmua">
                        <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                        <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="caphe">Đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card">
                <div class="card-top">
                        <?php
                        $sql="SELECT masp,size,tensp,anh,gia FROM menu WHERE masp = 'daul' ";
                        $query = mysqli_query($conn, $sql);
                        // Kiểm tra nếu truy vấn thành công
                        $query = mysqli_query($conn, $sql);
                            if ($query) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                // Lấy dữ liệu từ cơ sở dữ liệu
                                $masp = $row['masp'];
                                $tensp = $row['tensp'];
                                $anh = $row['anh'];
                                $gia = $row['gia'];
                                $size = $row['size'];
                                }
                            } ?>
                        <img src="http://localhost/baocaoweb/anhbcweb/tra/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
                    </div>
                    <div class="card-bottom">
                        <label class="name"><?php echo $tensp?> (<?php echo $size ?>)</label>
                        <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                        <br>
                        <div class="card-bottom-btnmua">
                            <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                            <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="tradao">Đặt hàng</a>

                             
                        </div>
                    </div>
                </div>
            </div>
        <div>
            <div class="card">
          
                <div class="card-top">
                    <?php
                    $sql="SELECT masp,size,tensp,anh,gia FROM menu WHERE masp = 'ygblue' ";
                    $query = mysqli_query($conn, $sql);
                        // Kiểm tra nếu truy vấn thành công
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {
                                    // Lấy dữ liệu từ cơ sở dữ liệu
                            $masp = $row['masp'];
                            $tensp = $row['tensp'];
                            $anh = $row['anh'];
                            $gia = $row['gia'];
                            $size = $row['size'];
                        }
                        
                    } ?>
                   
                   <img src="http://localhost/baocaoweb/anhbcweb/khac/<?php echo $anh; ?>" alt="<?php echo $tensp; ?>" class="card-top-img">
                </div>
                <div class="card-bottom">
                    <label class="name"><?php echo $tensp?></label>
                    <label class="price">Giá: <?php echo $gia?> <sup><u>đ</u></sup></label>
                    <br>
                    <div class="card-bottom-btnmua">
                        <i name="iconshop" class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                        <a href="order.php?masp=<?php echo $masp; ?>" name="dat" id="khac">Đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
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