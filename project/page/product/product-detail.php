<?php
    include '../../../project/component/connect/config.php';
    $sql = "SELECT * FROM chitietsanpham, sanpham WHERE sanpham.idProduct = chitietsanpham.idProduct
        AND chitietsanpham.idProduct = '$_GET[id]' LIMIT 1";
    $kq = $conn->query($sql);
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
                                <?php foreach($kq as $product) {?>
                                    <form class="showcase" method="POST" action="../../page/addToCart.php?id=<?php echo $product['idProduct']?>">
                                        <div class="showcase-banner">
                                            <div class="slideshow-container">
                                                <!-- Full-width images with number and caption text -->
                                                <div class="mySlides fade">
                                                    <img src="../../admin/module/product_detail/uploads/<?=$product['img_color1']?>" style="width:100%; min-width: 400px" class="default">
                                                    <img src="../../admin/module/product_detail/uploads/<?=$product['img_hover_color1']?>" style="width:100%; min-width: 400px" class="hover">
                                                </div>

                                                <div class="mySlides fade">
                                                    <img src="../../admin/module/product_detail/uploads/<?=$product['img_color2']?>" style="width:100%, min-width: 400px" class="default">
                                                    <img src="../../admin/module/product_detail/uploads/<?=$product['img_hover_color2']?>" style="width:100%, min-width: 400px" class="hover">
                                                </div>

                                                <div class="mySlides fade">
                                                    <img src="../../admin/module/product_detail/uploads/<?=$product['img_color3']?>" style="width:100%, min-width: 400px" class="default">
                                                    <img src="../../admin/module/product_detail/uploads/<?=$product['img_hover_color3']?>" style="width:100%, min-width: 400px" class="hover">
                                                </div>

                                                <div class="mySlides fade">
                                                    <img src="../../admin/module/product_detail/uploads/<?=$product['img_color4']?>" style="width:100%, min-width: 400px" class="default">
                                                    <img src="../../admin/module/product_detail/uploads/<?=$product['img_hover_color4']?>" style="width:100%, min-width: 400px" class="hover">
                                                </div>

                                                <!-- Next and previous buttons -->
                                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                            </div>
                                        </div>

                                        <div class="showcase-content">
                                            <a href="#"> <h3 class="showcase-title"><?=$product['nameProduct']?></h3> </a>
                                            <hr>
                                                <div class="price-box">
                                                <p class="price"><?=number_format($product['price'], 0, ',', '.')?>₫</p>

                                                <del><?=number_format($product['price_del'], 0, ',', '.')?>₫</del>
                                            </div>
                                            <hr>
                                            <p class="showcase-desc">
                                                <?=$product['describeProduct']?>
                                            </p>

                                            <div class="showcase-color">
                                                <div class="content">Màu sắc <br> </div>
                                                <div class="showcase-image-color">
                                                    <a href="javascript:void(0);" onclick="currentSlide(1)" class="color_img">
                                                        <picture>
                                                            <img src="../../admin/module/product_detail/uploads/<?=$product['img_color1']?>" width="50px" height="50px">
                                                        </picture>
                                                    </a>

                                                    <a href="javascript:void(0);" onclick="currentSlide(2)" class="color_img">
                                                        <picture>
                                                            <img src="../../admin/module/product_detail/uploads/<?=$product['img_color2']?>" width="50px" height="50px">
                                                        </picture>
                                                    </a>

                                                    <a href="javascript:void(0);" onclick="currentSlide(3)" class="color_img">
                                                        <picture>
                                                            <img src="../../admin/module/product_detail/uploads/<?=$product['img_color3']?>" width="50px" height="50px">
                                                        </picture>
                                                    </a>

                                                    <a href="javascript:void(0);" onclick="currentSlide(4)" class="color_img">
                                                        <picture>
                                                            <img src="../../admin/module/product_detail/uploads/<?=$product['img_color4']?>" width="50px" height="50px">
                                                        </picture>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="showcase-quantity">
                                                <label for="quantity">Số lượng </label>
                                                <input class="quantity" type="number" name="quantity" value="1" min="1">
                                                <label for="quantity">Số lượng còn <?php echo $product['quantity_product'] ?></label>
                                            </div>
                                            
                                            <div class="showcase-btn">
                                                <input class="add-cart-btn" type="submit" name="addToCart" value="Thêm vào giỏ hàng">
                                                <input class="add-cart-btn" type="submit" name="" value="Mua ngay">
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- PRODUCT INFORMATION -->
                        
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