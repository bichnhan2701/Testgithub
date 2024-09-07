<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- css link -->
    <link rel="stylesheet" href="../../../project/model/login/login.css">
    <link rel="stylesheet" href="../../../project/assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
    
    <!-- js link -->
    <script src="../../../project/assets/js/main.js"></script>
</head>
<body>
    <main>
        <form action="" id="wapper_login" method="post" onsubmit="return checkFormLogin()">
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
                    <div class="login">
                        <label for="user_input">Email hoặc Tên hoặc Điện thoại</label>
                        <input type="text" id="user_input" name="user_input" required>
                        <span id="error-user-input" style="color:red;"></span>

                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="pass" required>
                        <span id="error-password" style="color:red;"></span>
                    </div>

                    <div class="keep-logged-in">
                        <input type="checkbox" id="keep-logged-in" name="keep-logged-in">
                        <label for="keep-logged-in">Lưu mật khẩu</label>
                    </div>

                    <div class="sub">
                        <button type="submit">Đăng nhập</button>
                        <input type="hidden" name="login" value="1">
                    </div>

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
    <script>
        function checkFormLogin() {
            // Lấy giá trị từ các trường nhập liệu
            var userInput = document.getElementById("user_input").value.trim();
            var password = document.getElementById("password").value.trim();
            var error = false;

            // Kiểm tra trường nhập liệu "Email hoặc Tên hoặc Điện thoại"
            if (userInput === "") {
                document.getElementById("error-user-input").innerHTML = "Bạn chưa nhập Email hoặc Tên hoặc Điện thoại"; 
                error = true;
            } else {
                document.getElementById("error-user-input").innerHTML = ""; 
            }

            // Kiểm tra trường mật khẩu
            if (password === "") {
                document.getElementById("error-password").innerHTML = "Bạn chưa nhập mật khẩu"; 
                error = true;
            } else {
                document.getElementById("error-password").innerHTML = ""; 
            }
            return !error; // Trả về true nếu không có lỗi, ngược lại trả về false
        }
    </script>
</body>
</html>