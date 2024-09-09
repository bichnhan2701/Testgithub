<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// session_destroy();
include("../../project/component/connect/config.php");
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
if (empty($cart)) {
    echo "Your cart is empty.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check out</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/checkout.css">

    <!-- icon -->
    <link rel="stylesheet" href="../assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
</head>
<body>
    <div class="wrapper">
        <header> 
            <?php include "../component/header/header.php" ?>
        </header>

        <div class="menu">
            <?php include("../component/menu/menu.php") ?>
        </div>

        <main>
            <div class="checkout-container">
                <div class="left-panel">
                    <h3>Thông tin mua hàng</h3>
                    <form>
                        <div class="form-group">
                            <input type="email" id="email" placeholder="Email (tùy chọn)">
                        </div>
                        <div class="form-group">
                            <input type="text" id="name" placeholder="Họ và tên" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="phone" placeholder="Số điện thoại" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="address" placeholder="Địa chỉ cụ thể" required> 
                        </div>
                        <!-- <div class="form-group">
                            <select id="province">
                                <option value="">Tỉnh thành</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="district">
                                <option value="">Quận huyện</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="ward">
                                <option value="">Phường xã</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="other-address">
                            <label for="other-address">Giao hàng đến địa chỉ khác</label>
                        </div> -->
                        <div class="form-group">
                            <textarea id="note" placeholder="Ghi chú (tùy chọn)"></textarea>
                        </div>
                    </form>
                </div>

                <div class="middle-panel">
                    <h3>Vận chuyển</h3>
                    <div class="shipping-info">
                        <p>Vui lòng nhập thông tin giao hàng</p>
                    </div>
                    </br>
                    <h3>Thanh toán</h3>
                    <div class="form-group">
                        <input type="radio" id="bank-transfer" name="payment">
                        <label for="bank-transfer">Thông tin chuyển khoản</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="atm" name="payment">
                        <label for="atm">Thẻ ATM nội địa / Mobile banking / Ví điện tử</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="visa-mastercard" name="payment">
                        <label for="visa-mastercard">Thanh toán online qua thẻ Visa / MasterCard</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="paypal" name="payment">
                        <label for="paypal">Thanh toán quốc tế qua PayPal</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="cod" name="payment">
                        <label for="cod">Thanh toán khi nhận hàng (COD)</label>
                    </div>
                </div>

                <div class="right-panel">
                    <div class="order-summary">
                        <h3>Đơn hàng (<?php echo count($cart); ?> sản phẩm)</h3>
                        <div class="maincart_product">
                            <?php foreach ($cart as $product) { ?>
                                <div class="maincart_product_item">
                                    <div class="maincart_product_img">
                                        <img src="../admin/module/product/uploads/<?php echo $product['img']; ?>" width="70px" height="70px">
                                    </div>
                                    <div class="maincart_product_details">
                                        <a href="#"><?php echo $product['nameProduct']; ?></a>
                                        <span class="price" data-price="<?php echo $product['price']; ?>"><?php echo number_format($product['price'], 0, ',', '.'); ?>₫</span>
                                        <span class="quantity">x<?php echo $product['quantity']; ?></span>
                                    </div>   
                                </div>
                            <?php } ?>
                        </div>
                        <!-- <div class="form-group">
                            <input type="text" id="coupon" placeholder="Nhập mã giảm giá">
                            <button class="apply-button">Áp dụng</button>
                        </div> -->
                        <div class="total">
                            <?php 
                                $total = array_reduce($cart, function($carry, $product) {
                                    return $carry + ($product['price'] * $product['quantity']);
                                }, 0);
                                $shippingFee = 70000;
                                $totalprice = $total + $shippingFee;
                            ?>
                            <p>Tạm tính: <?= number_format($total, 0, ',', '.'); ?>đ</p>
                            <p>Phí vận chuyển: <?= number_format($shippingFee, 0, ',', '.'); ?>₫</p>
                            <h4>Tổng cộng: <?= number_format($totalprice, 0, ',', '.'); ?>đ</h4>
                        </div>
                    </div>
                    <button class="order-button">Đặt hàng</button>
                </div>       
            </div>
        </main>

        <footer>
            <?php include "../component/footer/footer.php" ?>
        </footer>
    </div>
</body>
</html>