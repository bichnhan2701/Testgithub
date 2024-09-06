<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- css link -->
    
    <!-- js link -->
    
</head>
<body>
    <main>
        <form action="" id="wapper_login">
            <div class="login-container" style="position: relative;">
                <div onclick="closeHandle()" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                
                <div class="welcome-section">
                    <h1>Chào mừng bạn!</h1>
                    <div class="logo"> 
                        <img src="../../../project/assets/images/general/logo1.png">
                    </div>
                    <p>
                        Bạn chưa phải là thành viên? 
                        <button onclick="handleRegister()"> Đăng kí </button>
                    </p>
                </div>

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
        </form>
    </main>
    <script src="../../../project/assets/js/main.js"></script>
</body>
</html>