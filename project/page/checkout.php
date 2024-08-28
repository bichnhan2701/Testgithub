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
            <?php include "../component/menu/menu.php" ?>
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
                            <input type="text" id="name" placeholder="Họ và tên">
                        </div>
                        <div class="form-group">
                            <input type="text" id="phone" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <input type="text" id="address" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
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
                        </div>
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
                        <h3>Đơn hàng (3 sản phẩm)</h3>
                        <div class="maincart_product">
                            <div class="maincart_product_item">
                                <div class="maincart_product_img">
                                    <img src="../assets/images/products/sonduong/duong1/duong-lip1-color-1-0.png" alt="3CE Shine Reflector">
                                </div>
                                <div class="maincart_product_details">
                                    <a href="#">3CE Shine Reflector</a>
                                    <span class="price" data-price="9000000">₫9.000.000</span>
                                    <span class="quantity">x1</span>
                                </div>   
                            </div>
                
                            <div class="maincart_product_item">
                                <div class="maincart_product_img">
                                    <img src="../assets/images/products/sonduong/duong1/duong-lip1-color-2-0.png" alt="3CE Shine Reflector">
                                </div>
                                <div class="maincart_product_details">
                                    <a href="#">3CE Shine Reflector</a>
                                    <span class="price" data-price="9000000">₫9.000.000</span>
                                    <span class="quantity">x1</span>
                                </div>
                                
                            </div>
                
                            <div class="maincart_product_item">
                                <div class="maincart_product_img">
                                    <img src="../assets/images/products/sonduong/duong1/duong-lip1-color-4-0.png" alt="3CE Shine Reflector">
                                </div>
                                <div class="maincart_product_details">
                                    <a href="#">3CE Shine Reflector</a>
                                    <span class="price" data-price="9000000">₫9.000.000</span>
                                    <span class="quantity">x1</span>
                                </div>
                                
                            </div>
                
                        </div>
                        <div class="form-group">
                            <input type="text" id="coupon" placeholder="Nhập mã giảm giá">
                            <button class="apply-button">Áp dụng</button>
                        </div>
                        <div class="total">
                            <p>Tạm tính: 27,000,000đ</p>
                            <p>Phí vận chuyển: -</p>
                            <h4>Tổng cộng: 27,000,000đ</h4>
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