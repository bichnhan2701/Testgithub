<?php
    include '../../../project/component/connect/config.php';
    $sql_product = "SELECT * FROM sanpham, loaisanpham WHERE sanpham.idType = loaisanpham.idType 
        AND sanpham.idType = '$_GET[id]' LIMIT 1";
    $product = $conn->query($sql_product);
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
                                        <?=$product['desc-detail']?>
                                    </p>
                                    <p><img src="../../../project<?=$product['inf-img']?>"></p>
                                </div>
                            </div>

                            <div class="layout-inf" id="bangmau">
                                <div class="inf-title"> Bảng màu </div>
                                <p>
                                    <span>
                                        <?=$product['desc-color1']?>
                                    </span>
                                    <br>
                                    <img src="../../../project<?=$product['color-img1']?>">
                                    <span>
                                        <?=$product['desc-color2']?>
                                    </span>
                                </p>
                                <div class="inf-content-container">
                                    <p class="inf-content">
                                        <span>
                                            <br>
                                            <?=$product['desc-color3']?>
                                        </span>
                                        <img src="../../../project<?=$product['color-inf-img1']?>">
                                    </p>
                                    <p class="inf-content">
                                        <img src="../../../project<?=$product['color-inf-img2']?>">
                                        <span>
                                            <br>
                                            <?=$product['desc-color4']?>
                                        </span>
                                    </p>
                                    <p class="inf-content">
                                        <span>
                                            <br>
                                            <?=$product['desc-color5']?>
                                        </span>
                                        <img src="../../../project<?=$product['color-inf-img3']?>">
                                    </p>
                                    <p class="inf-content">
                                        <img src="../../../project<?=$product['color-inf-img4']?>">
                                        <span>
                                            <br>
                                            <?=$product['desc-color6']?>
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div class="layout-inf" id="thanhphan">
                                <div class="inf-title"> Thành phần </div>
                                <div class="inf-content">
                                    <p>
                                        <?=$product['ingredient']?>
                                    </p>
                                    <p>
                                        <img src="../../../project/<?=$product['ingredient-img']?>">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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