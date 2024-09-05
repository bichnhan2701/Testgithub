<?php
    session_start();
    include("../../project/component/connect/config.php");
?>
<!-- <p>Giỏ hàng</p> -->
<?php
    // if (isset($_SESSION['cart'])) {
    //     echo '<pre>';
    //     print_r($_SESSION['cart']); // Print the cart for debugging
    //     echo '<pre>';
    // } else {
    //     echo "Error: Can't add product.";
    // }
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
                <div class="top-cart">
                    <h3>GIỎ HÀNG</h3>
                    <!-- <span>(12 sản phẩm )</span> -->
                </div>
                    
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
                                                $i = 0;
                                                $totalprice=0;
                                                foreach($_SESSION['cart'] as $cart_item) {
                                                    $total = $cart_item['price']*$cart_item['quantity'];
                                                    $totalprice += $total;
                                                    $i++;
                                        ?>
                                            <tr style="position: relative;">
                                                <td class="maincart_product_img" style="width: 20%"><img src="../../project/admin/module/product/uploads/<?php echo $cart_item['img']?>" 
                                                width="100px" style="display: block; margin-left: auto; margin-right: auto;"></td>
                                                <td style="width: 20%"><?php echo $cart_item['nameProduct']?></td>
                                                <td class="price" style="width: 20%"><?php echo number_format($cart_item['price'], 0, ',', '.');?>₫</td>
                                                <td class="quantity-product" style="display: block; margin-left: auto; margin-right: auto; position:absolute; top: 32px; width: 20%">
                                                    <input class="decrement" onclick="changeQuantity(this,-1)" type="button" value="-">
                                                    <?php echo $cart_item['quantity']?>
                                                    <input class="increment" onclick="changeQuantity(this,1)" type="button" value="+">
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
                                                    <button>THANH TOÁN</button>
                                                    <button>CHỌN THÊM</button>
                                                    <button><a href="../../project/page/addToCart.php?deleteAll=1" style="color: #fff">XÓA TẤT CẢ</a></button>
                                                </td>
                                            </tr>
                                        <?php   } else { ?>
                                            <tr>
                                                <td colspan="6" style="font-size: 30px; padding-top: 30px; color: #000;">Hiện tại giỏ hàng đang trống!</td>
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