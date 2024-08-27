<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- css link -->
    <link rel="stylesheet" href="../../../project2/model/login/login.css">
    <link rel="stylesheet" href="../../../project2/assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
    <!-- js link -->
    <script src="../../../project2/assets/js/main.js"></script>
</head>
<body>
    <main>
        <div id="wapper_login">
            <div class="login-container" style="position: relative;">
                <div onclick="closeHandle()" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <!-- WELCOME SECTION -->
                <div class="welcome-section">
                    <h1>Chào mừng bạn!</h1>
                    <div class="logo"> 
                        <img src="../../../project2/assets/images/general/logo1.png">
                    </div>
                    <p>
                        Bạn chưa phải là thành viên? 
                        <a href="../../../project2/model/register/register.php">Đăng kí</a>
                    </p>
                </div>

                <!-- LOGIN SECTION -->
                <div class="login-section">
                    <h2>Đăng nhập</h2>
                    <form>
                        <div class="login">
                            <label for="email">Email hoặc Tên người dùng</label>
                            <input type="text" id="email" name="email" required>
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" required>
                            <a href="#" class="forgot-password"> Quên mật khẩu?</a>
                        </div>

                        <div class="keep-logged-in">
                            <input type="checkbox" id="keep-logged-in" name="keep-logged-in">
                            <label for="keep-logged-in">Lưu mật khẩu</label>
                        </div>

                        <div class="sub">
                            <button type="submit" name="submit">Đăng nhập</button>
                        </div>
                    </form>

                    <div class="social-login">
                        <p>Hoặc đăng nhập bằng</p>
                        <button class="google">G</button>
                        <button class="facebook">f</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>