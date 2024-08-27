<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/cart.css">

    <!-- icon -->
    <link rel="stylesheet" href="../assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
</head>
<body>
    <div class="wrapper">
        <header> 
            <?php include "../component/header/header.php" ?>
        </header>

        <div class="menu">
            <?php include "../component/menu/menu.php" ?>
        </div>

        <main>
            <div class="cart-container">
                <!-- TOP CART -->
                <div class="top-cart">
                    <h3>GIỎ HÀNG</h3>
                    <span>(12 sản phẩm )</span>
                </div>
                    
                <!-- MAIN CART -->
                <div class="main-cart">
                    <div class="maincartproduct">
                        <!-- MAINCART PRODUCT -->
                        <div class="maincart_product">
                            <form method="post">
                                <!-- <div class="title_maincart">
                                    <div>Anh san pham</div>
                                    <div>San pham</div>
                                    <div>Gia</div>
                                    <div>Tam tinh</div>
                                    <div>So luong</div>
                                    <div>Xoa</div>
                                </div> -->

                                <!-- <div class="maincart_product_">

                                    <div class="maincart_product__">

                                        <div class="maincart_product_img">

                                            <div> <img src="../assets/images/products/sonbong/bong1/bong-lip1-color-1-0.png" alt=""> </div>
                                        
                                        </div>

                                        <a href="">3CE Shine Reflector</a>
                                        
                                        <span class="price" data-price="9000000">₫9.000.000</span>
                                        
                                        <div>
                                            <div class="quantity-product">
                                                <input class="decrement" onclick="changeQuantity(this,-1)" type="button" value="-">
                                                <input class="quantity no-spinner" type="number" value="1" min="1" step="1" inputmode="numeric" autocomplete="off" >
                                                <input class="increment" onclick="changeQuantity(this,1)" type="button" value="+">
                                            </div>
                                        </div>

                                        <div class="maincart_product_remove">
                                            <a href=""> <i class="fa-solid fa-trash-can"></i></a> 
                                        </div>

                                    </div>

                                </div>  -->

                                <!-- <div class="maincart_product_">
                                    
                                    <div class="maincart_product__">

                                        <div class="maincart_product_img">
                                            <div><img src="../assets/images/products/sonduong/duong1/duong-lip1-color-2-0.png" alt=""></div>
                                        </div>

                                        <a href="">3CE Shine Reflector</a>
                                        
                                        <span class="price" data-price="9000000">₫9.000.000</span>
                                        
                                        <div>
                                            <div class="quantity-product">
                                                <input class="decrement" onclick="changeQuantity(this,-1)" type="button" value="-">
                                                <input class="quantity no-spinner" type="number" value="1" min="1" step="1" inputmode="numeric" autocomplete="off" >
                                                <input class="increment" onclick="changeQuantity(this,1)" type="button" value="+">
                                            </div>
                                        </div>
                                        
                                        <div class="maincart_product_remove">
                                            <a href=""> <i class="fa-solid fa-trash-can"></i></a> 
                                        </div>

                                    </div>

                                </div> 

                                <div class="maincart_product_">

                                    <div class="maincart_product__">
                                        <div class="maincart_product_img">
                                            <div><img src="../assets/images/products/sonduong/duong1/duong-lip1-color-4-0.png" alt=""> </div>
                                        </div>
                                        
                                        <a href="">3CE Shine Reflector</a>
                                        
                                        <span class="price" data-price="9000000">₫9.000.000</span>
                                        
                                        <div class="quantity-product">
                                            <input class="decrement" onclick="changeQuantity(this,-1)" type="button" value="-">
                                            <input class="quantity no-spinner" type="number" value="1" min="1" step="1" inputmode="numeric" autocomplete="off" >
                                            <input class="increment" onclick="changeQuantity(this,1)" type="button" value="+">
                                        </div>
                                        
                                        <div class="maincart_product_remove">
                                            <a href=""> <i class="fa-solid fa-trash-can"></i></a> 
                                        </div>
                                    </div>

                                </div>  -->
                            </form>
                        </div>
                    </div>

                    <!-- MAINCART TOTALPRICE -->
                    <div class="maincart_totalprice">

                        <!-- <div class="maincart_totalprice_">
                            <p>Tạm tính: </p><span id="subtotal"></span>
                        </div> -->

                        <div class="maincart_totalprice_">
                            <p>Thành tiền: </p><span><strong id="total" style="font-size: large; font-weight:bold;"></strong></span>
                        </div>

                        <a href="../page/checkout.php">
                            <button>THANH TOÁN</button>
                        </a>

                        <a href="../page/product.php">
                            <button>TIẾP TỤC CHỌN</button>
                        </a>
                        
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <?php include "../component/footer/footer.php" ?>
        </footer>
    </div>
</body>
</html>