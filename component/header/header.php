<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../../project2/component/header/header.css">
    <script src="../../../project2/assets/js/main.js"></script>
</head>
<body>
    <div class="container">
        <a href="../../../project2/index.php" class="header-logo">
            <img src="../../../project2/assets/images/general/logo.png" alt="Logo 3CE Lipsticks" height="80px">
        </a>

        <div class="header-search-container">
            <input type="search" class="search-field" placeholder="Nhập tên sản phẩm...">

            <button class="search-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>

        <div class="header-user-actions">
            <div class="user-out">
                <button class="login" onclick="handleLogin()">
                    <i class="fa-solid fa-right-to-bracket"></i> <span>Đăng nhập</span>
                </button>
                <div id="handleLogin" style="display: none; position:fixed; left:0 ;z-index: 30"> 
                    <form action="" id="wapper_login">
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
                    </form>
                </div>

                <button class="register" onclick="handleRegister()">
                    <i class="fa-solid fa-user-plus"></i> <span>Đăng ký</span>
                </button>
                <div id="handleRegister" style="display: none; position:fixed ; left:0;z-index: 30">
                    <form id="wapper_register" >
                        <div class="register-container" style="position: relative;">
                            <div onclick="closeHandle()" class="close-button">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            <!-- WELCOME SECTION -->
                            <div class="welcome-section">
                                <h1>Chào mừng bạn!</h1>
                                <div class="logo">
                                    <img src="../../../project2/assets/images/general/logo1.png" alt="Logo 3CE Lipsticks">
                                </div>
                                <p>
                                    Bạn có phải là thành viên? 
                                    <a href="../../../project2/model/login/login.php">Đăng nhập</a>
                                </p>
                            </div>

                            <!-- REGISTER-SECTION -->
                            <div class="register-section">
                                <h2>Đăng kí</h2>
                                <form>
                                    <div class="register">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" required>
                                        <label for="user">Tên người dùng</label>
                                        <input type="text" id="user" name="user" required>
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" id="password" name="password" required>
                                        <label for="repassword">Nhập lại mật khẩu</label>
                                        <input type="password" id="repassword" name="repassword" required>
                                    </div>

                                    <div class="keep-logged-in">
                                        <input type="checkbox" id="keep-logged-in" name="keep-logged-in">
                                        <label for="keep-logged-in">Chấp nhận các điều khoản</label>
                                    </div>

                                    <div class="sub">
                                    <button type="submit">Đăng kí</button>
                                    </div>
                                </form>

                                <div class="social-register">
                                    <p>Hoặc đăng kí với</p>
                                    <button class="google">G</button>
                                    <button class="facebook">f</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <button class="user" onclick="handleLogin()">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>Bạn chưa đăng nhập</span>
                </button>
            </div>

            <div class="user-in">
                <button class="cart-btn">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="count">0</span>
                </button>
                <button class="user">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>Xin chào Bích Nhân</span>
                </button>
                <button class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i> <span>Đăng xuất</span>
                </button>
            </div>
        </div>
    </div>
    <script src="../../../project2/assets/js/main.js"></script>
</body>
</html>