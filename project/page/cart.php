<?php
    // session_start();
    include("../../project/component/connect/config.php");
?>
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
            <?php include("../component/connect/config.php"); ?>
            <div class="cart-container">
                <!-- TOP CART -->
                <?php 
                if (isset($_SESSION['cart'])) {
                    $i=0;
                    foreach($_SESSION['cart'] as $cart_item) { $i++; }
                ?>
                <div class="top-cart">
                    <h3>GIỎ HÀNG</h3>
                    <span>(<?=$i?> sản phẩm )</span>
                </div>
                <?php } ?>   
                <!-- MAIN CART -->
                <div class="main-cart">
                    <div class="maincartproduct">
                        <!-- MAINCART PRODUCT -->
                        <div class="maincart_product">
                            <form method="post"> 
                                <table >
                                    <thead>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tạm tính</th>
                                        <th>Xóa</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if (isset($_SESSION['cart'])) {
                                                $totalprice=0;
                                                foreach($_SESSION['cart'] as $cart_item) {
                                                    $total = $cart_item['price']*$cart_item['quantity'];
                                                    $totalprice += $total;
                                        ?>
                                            <tr style="position: relative;">
                                                <td class="maincart_product_img" style="width: 20%"><img src="../admin/module/product/uploads/<?php echo $cart_item['img']?>" 
                                                width="100px" height="100px" style="display: block; margin-left: auto; margin-right: auto;"></td>
                                                <td style="width: 20%"><?php echo $cart_item['nameProduct']?></td>
                                                <td class="price" style="width: 20%"><?php echo number_format($cart_item['price'], 0, ',', '.');?>₫</td>
                                                <td class="quantity-product">
                                                    <a href="../../project/page/addToCart.php?minus=<?=$cart_item['id']?>"><i class="fa-regular fa-square-minus"></i></a>
                                                    <?=$cart_item['quantity']?>
                                                    <a href="../../project/page/addToCart.php?plus=<?=$cart_item['id']?>"><i class="fa-regular fa-square-plus"></i></a>
                                                </td>
                                                <td class="price"><?php echo number_format($total, 0, ',', '.') ?>₫</td>
                                                <td class="maincart_product_remove"> 
                                                    <a href="../../project/page/addToCart.php?delete=<?=$cart_item['id']?>"><i class="fa-solid fa-trash-can"></i></a>
                                                </td>   
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                                <!-- MAINCART TOTALPRICE -->
                                                <td class="maincart_totalprice" colspan="6">
                                                    <div class="maincart_totalprice_">
                                                        <p><b>Thành tiền:</b></p> 
                                                        <span><strong id="total" style="font-size: large; font-weight:bold;"><?php echo number_format($totalprice, 0, ',', '.') ?>₫</strong></span>
                                                    </div>
                                                    <button><a href="#" style="color: #fff">ĐẶT HÀNG</a></button>
                                                    <button><a href="../../project/page/product/index_product.php" style="color: #fff">CHỌN THÊM</a></button>
                                                    <button>
                                                        <a href="../../project/page/addToCart.php?deleteAll=1" style="color: #fff">
                                                            <i class="fa-solid fa-trash-can"></i>XÓA TẤT CẢ
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php   } else { ?>
                                            <tr class="empityCart">
                                                <td colspan="6" style="font-size: 30px; padding-top: 50px; color: pink;">
                                                    Hiện tại giỏ hàng đang trống! <br>
                                                    <button><a href="../../project/page/product/index_product.php" style="color: #fff">CHỌN THÊM</a></button>
                                                </td>
                                                
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
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