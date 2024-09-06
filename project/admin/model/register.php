<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- css link -->
    <link rel="stylesheet" href="../../../project/model/register/register.css">
    <link rel="stylesheet" href="../../../project/assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
    
    <!-- js link -->
    <script src="../../../project/assets/js/main.js"></script>
</head>
<body>
    <main>
        <div id="wapper_register" >
            <div class="register-container" style="position: relative;">
                <div onclick="closeHandle()" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <!-- WELCOME SECTION -->
                <div class="welcome-section">
                    <h1>Chào mừng bạn!</h1>
                    <div class="logo">
                        <img src="../../../project/assets/images/general/logo1.png" alt="Logo 3CE Lipsticks">
                    </div>
                    <p>
                        Bạn đã đăng ký tài khoản quản lý? 
                        <a href="../../../project/admin/model/login.php">Đăng nhập</a>
                    </p>
                    <p>
                        Bạn là khách hàng? 
                        <a href="../../../project/index.php">Đến trang chủ</a>
                    </p>
                </div>

                <!-- REGISTER-SECTION -->
                <div class="register-section">
                    <h2>Đăng kí</h2>
                    <form>
                        <div class="register">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" required>
                            <label for="user">Tài khoản</label>
                            <input type="text" id="user" name="user" required>
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" required>
                            <label for="repassword">Nhập lại mật khẩu</label>
                            <input type="password" id="repassword" name="repassword" required>
                        </div>

                        <div class="keep-logged-in">
                            <!-- <input type="checkbox" id="keep-logged-in" name="keep-logged-in"> -->
                            <!-- <label for="keep-logged-in">Chấp nhận các điều khoản</label> -->
                        </div>

                        <div class="sub">
                        <button type="submit">Đăng kí</button>
                        </div>
                    </form>

                    <!-- <div class="social-register">
                        <p>Hoặc đăng kí với</p>
                        <button class="google">G</button>
                        <button class="facebook">f</button>
                    </div> -->
                </div>
            </div>
        </div>
    </main>
</body>
</html>