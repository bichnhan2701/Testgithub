<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/contact.css">

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
            <div class="contact-container">
                <div class="contact-header">
                    <h1>LIÊN HỆ CHÚNG TÔI</h1>
                    <p>Nếu có thắc mắc, vui lòng liên hệ chúng tôi qua khung chat trong khoảng thời gian từ 9:00 - 17:00 (Thứ Hai - Thứ Sáu)</p>
                    <p>Nếu bạn có nhận xét, mối quan tâm hoặc đề xuất khác, vui lòng chia sẻ chúng bằng cách điền vào biểu mẫu bên dưới.</p>
                </div>

                <form id="contact-form">
                    <div class="form-group">
                        <input type="text" id="first-name" name="first-name" placeholder="Tên*" required>
                        <input type="text" id="last-name" name="last-name" placeholder="Họ*" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email*" required>
                        <input type="tel" id="phone" name="phone" placeholder="Số điện thoại*" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="street-name" name="street-name" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <input type="text" id="order-id" name="order-id" placeholder="Mã đơn hàng liên quan">
                    </div>
                    <div class="form-group">
                        <textarea id="message" name="message" placeholder="Tin nhắn của bạn*" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">GỬI TIN NHẮN</button>
                    </div>
                </form>
            </div>
        </main>

        <footer>
            <?php include "../component/footer/footer.php" ?>
        </footer>
    </div>
</body>
</html>