<?php
    include '../../../project/component/connect/config.php';
    try {
        $sql = "SELECT * FROM sanpham";
        $kq = $conn->query($sql);
    } catch (Exception $e) {
        die ("Lỗi thực thi SQL: " .$e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiet</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../../../project/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../project/assets/css/product-detail.css">

    <!-- icon -->
    <link rel="stylesheet" href="../../../project/assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <?php include "../../component/header/header.php" ?>
        </header>

        <div class="menu">
            <?php include "../../component/menu/menu.php" ?>
        </div>

        <main>
            <div class="product-container">
                <div class="container">
                    <?php foreach ($kq as $product) { ?>
                        <div class="product-box">
                            <!-- PRODUCT FEATURED -->
                            <div class="product-featured">
                                <div class="showcase-container">
                                    <div class="showcase">
                                        <div class="showcase-banner">
                                            <div class="slideshow-container">
                                                <!-- Full-width images with number and caption text -->
                                                <div class="mySlides fade">
                                                    <img src="../../../project<?=$product['color-img2']?>" style="width:100%" class="default">
                                                    <img src="../../../project<?=$product['color-img-hover1']?>" style="width:100%" class="hover">
                                                </div>

                                                <div class="mySlides fade">
                                                    <img src="../../../project<?=$product['color-img3']?>" style="width:100%" class="default">
                                                    <img src="../../../project<?=$product['color-img-hover2']?>" style="width:100%" class="hover">

                                                </div>

                                                <div class="mySlides fade">
                                                    <img src="../../../project<?=$product['color-img4']?>" style="width:100%" class="default">
                                                    <img src="../../../project<?=$product['color-img-hover3']?>" style="width:100%" class="hover">
                                                </div>

                                                <div class="mySlides fade">
                                                    <img src="../../../project<?=$product['color-img5']?>" style="width:100%" class="default">
                                                    <img src="../../../project<?=$product['color-img-hover4']?>" style="width:100%" class="hover">
                                                </div>

                                                <!-- Next and previous buttons -->
                                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                            </div>
                                        </div>

                                        <div class="showcase-content">
                                            <a href="#"> <h3 class="showcase-title"><?=$product['name']?></h3> </a>
                                            <hr>
                                            <div class="price-box">
                                                <p class="price">₫384.800</p>

                                                <del>₫481.000</del>
                                            </div>
                                            <hr>
                                            <p class="showcase-desc">
                                                <!-- Dòng son thỏi 3CE Blur Matte mới với sự kết hợp hoàn hảo giữa sắc màu tươi tắn và hiệu ứng mờ mịn đỉnh cao, 
                                                dòng son này đã nhanh chóng thu hút sự chú ý và yêu thích của các tín đồ làm đẹp. -->
                                                <?=$product['describe']?>
                                            </p>

                                            <div class="showcase-color">
                                                <div class="content">Màu sắc <br> </div>
                                                <div class="showcase-image-color">
                                                    <a href="javascript:void(0);" onclick="currentSlide(1)" class="color-img">
                                                        <picture>
                                                            <img src="../../../project<?=$product['color-img2']?>" width="50px" height="50px">
                                                        </picture>
                                                    </a>

                                                    <a href="javascript:void(0);" onclick="currentSlide(2)" class="color-img">
                                                        <picture>
                                                            <img src="../../../project<?=$product['color-img3']?>" width="50px" height="50px">
                                                        </picture>
                                                    </a>

                                                    <a href="javascript:void(0);" onclick="currentSlide(3)" class="color-img">
                                                        <picture>
                                                            <img src="../../../project<?=$product['color-img4']?>" width="50px" height="50px">
                                                        </picture>
                                                    </a>

                                                    <a href="javascript:void(0);" onclick="currentSlide(4)" class="color-img">
                                                        <picture>
                                                            <img src="../../../project<?=$product['color-img5']?>" width="50px" height="50px">
                                                        </picture>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="showcase-quantity">
                                                <label for="quantity">Số lượng </label>
                                                <input class="quantity" type="number" name="quantity" value="1" min="1">
                                            </div>
                                            
                                            <div class="showcase-btn">
                                                <a href="../page/cart.html"><button class="add-cart-btn">Thêm vào giỏ hàng</button></a>
                                                <a href="../page/checkout.html"><button class="add-cart-btn">Mua ngay</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- PRODUCT INFORMATION -->
                            <div class="inf-container">
                                <h2 class="title">Thông tin sản phẩm</h2>
                            
                                <nav id="navbar-inf">
                                    <ul class="navbar-list">
                                        <li class="navbar-item">
                                            <a href="#motasanpham">Mô tả sản phẩm</a>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="#bangmau">Bảng màu</a>
                                        </li>
                                        <li class="navbar-item">
                                            <a href="#thanhphan">Thành phần</a>
                                        </li>
                                    </ul>
                                </nav>

                                <div class="layout-inf" id="motasanpham">
                                    <div class="inf-title"> Mô tả sản phẩm </div>
                                    <div class="inf-content">
                                        <p>
                                            <!-- <span>
                                                Son thỏi 3CE Blur Matte Lipstick là sự kết hợp hoàn hảo giữa thiết kế độc đáo và chất lượng sản phẩm. 
                                                Với hình dáng thỏi độc đáo và màu sắc đa dạng, sản phẩm mang đến sự lựa chọn phù hợp cho mọi phong cách trang điểm.
                                            </span>
                                            <br>
                                            <br>
                                            <span>
                                                Son có kết cấu mềm mịn, giúp đôi môi trở nên mềm mại và mịn màng như nhung. 
                                                Chất son lướt nhẹ trên môi, tạo lớp nền môi nhẹ thoáng, mịn lì, cảm giác như không đánh son.
                                                Với công thức đặc biệt từ bột đàn hồi silicon, son bám màu trung bình từ 3-5 tiếng, giúp màu son lên môi chuẩn và lâu trôi hơn. 
                                            </span>
                                            <br>
                                            <br>
                                            <span>
                                                Son cũng giúp che đi khuyết điểm môi một cách tự nhiên, không làm lộ vân môi và gây khô môi.
                                                Thiết kế hình thỏi Parabol độc đáo mang đến vẻ ngoài trẻ trung và sang trọng cho sản phẩm. 
                                            </span> -->
                                            <?=$product['desc-detail']?>
                                        </p>
                                        <p><img src="../../../project<?=$product['inf-img']?>"></p>
                                    </div>
                                </div>

                                <div class="layout-inf" id="bangmau">
                                    <div class="inf-title"> Bảng màu </div>
                                    <p>
                                        <span>
                                            <!-- Với 10 màu sắc khác nhau, từ các tông hồng, cam đến tím, giúp bạn thể hiện nhiều phong cách trang điểm và tạo điểm nhấn riêng cho đôi môi. -->
                                            <?=$product['desc-color1']?>
                                        </span>
                                        <br>
                                        <img src="../../../project<?=$product['color-img1']?>">
                                        <span>
                                            <!-- Hiện son thỏi 3CE Blur Matte Lipstick đang được phân phối tại 3CE Lipsticks với 4 màu: -->
                                            <?=$product['desc-color2']?>
                                        </span>
                                    </p>
                                    <div class="inf-content-container">
                                        <p class="inf-content">
                                            <span>
                                                <br>
                                                <!-- <strong>Apricot Filter: </strong> Màu cam san hô. Nếu tô nhẹ, sẽ có chút ánh hồng nude ngọt ngào. 
                                                Màu son nhẹ nhàng, nữ tính và thanh lịch, phù hợp với nhiều phong cách. -->
                                                <?=$product['desc-color3']?>
                                            </span>
                                            <img src="../../../project<?=$product['color-inf-img1']?>">
                                        </p>
                                        <p class="inf-content">
                                            <img src="../../../project<?=$product['color-inf-img2']?>">
                                            <span>
                                                <br>
                                                <!-- <strong>Peanut Beige: </strong>  Màu cam nude. 
                                                Chất son tone nude nhưng vẫn mượt mà và đều màu. Đây là màu son kén da, cần makeup nhẹ nhàng hoặc dùng làm màu base. -->
                                                <?=$product['desc-color4']?>
                                            </span>
                                        </p>
                                        <p class="inf-content">
                                            <span>
                                                <br>
                                                <!-- <strong>Pure Layer: </strong> Tone hồng san hô. Cần dưỡng môi để tránh tình trạng bị đọng son vào lòng môi. 
                                                Màu son này khá kén da, nhưng chỉ cần makeup nhẹ nhàng bạn sẽ có một màu son trong trẻo, tiểu thư ngọt ngào. -->
                                                <?=$product['desc-color5']?>
                                            </span>
                                            <img src="../../../project<?=$product['color-inf-img3']?>">
                                        </p>
                                        <p class="inf-content">
                                            <img src="../../../project<?=$product['color-inf-img4']?>">
                                            <span>
                                                <br>
                                                <!-- <strong>Misty Day: </strong> Sự pha trộn của Pure Layer với tông tím nude nhẹ, tạo nên tone màu hồng tím san hô hài hòa. 
                                                Màu son không quá kén da, mang đến sắc tím nhẹ giúp tone san hô sáng và trẻ trung hơn. -->
                                                <?=$product['desc-color6']?>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="layout-inf" id="thanhphan">
                                    <div class="inf-title"> Thành phần </div>
                                    <div class="inf-content">
                                        <p>
                                            <!-- <span>
                                                SDimethicone, Silica, Isoamyl Laurate, Synthetic Wax, Dimethicone/Vinyl Dimethicone Crosspolymer, 
                                                Isoeicosane, Barium Sulfate, Polyglyceryl-2 Triisostearate, Diisostearyl Malate, Dimethicone Crosspolymer, 
                                                Phytosteryl Macadamiate, Iron Oxides (CI 77491), Euphorbia Cerifera (Candelilla) Wax, 
                                                Microcrystalline Wax, Titanium Dioxide (CI 77891), Polyethylene, Iron Oxides (CI 77492), 
                                                Copernicia Cerifera (Carnauba) Wax, C10-18 Triglycerides, Sorbitan Isostearate, Diglyceryl Sebacate/Isopalmitate, 
                                                Phenyl Trimethicone, Polyhydroxystearic Acid, Candelilla Wax Esters, Polyglyceryl-2 Diisostearate, Ethylhexyl Palmitate, 
                                                Isopropyl Myristate, Isostearic Acid, Lecithin, Disteardimonium Hectorite, Polyglyceryl-3 Polyricinoleate, Magnesium Myristate, 
                                                Triethyl Citrate, Tocopherol, Iron Oxides (CI 77499), Red 7 Lake (CI 15850).
                                            </span>
                                            <span>
                                                Trong đó: <br>
                                            </span>
                                            <span>
                                                - Euphorbia Cerifera (Candelilla) Wax, Copernicia Cerifera (Carnauba) Wax, 
                                                Candelilla Wax Esters: Sáp từ cây Candelilla, Carnauba, giúp tạo độ bám và độ mềm cho son môi.
                                                <br>
                                                - Tocopherol: Vitamin E, có tác dụng dưỡng ẩm và chống oxy hóa cho son môi.
                                            </span> -->
                                            <?=$product['ingredient']?>
                                        </p>
                                        <p>
                                            <img src="../../../project/<?=$product['ingredient-img']?>">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>    
                </div>
            </div>
        </main>

        <footer>
            <?php include "../../component/footer/footer.php" ?>
        </footer>

        <script src="../../../project/assets/js/silder-product.js"></script>
    </div>
</body>
</html>