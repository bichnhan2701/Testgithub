<?php
session_start();
// require_once("/xampp/htdocs/3CEWEB/project/component/connect/config.php");

if (isset($_POST['register'])) {
    $username = trim($_POST['user']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['number']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    
    if ($password !== $repassword) {
        $_SESSION['message'] = "Mật khẩu nhập lại không khớp.";
        header('Location: ../../../project/model/register/register.php');
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
    $stmt = $conn->prepare("INSERT INTO taikhoan(user_name, email, user_number, user_address, pass) 
                VALUES (:username, :email, :phone, :address, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':password', $hashedPassword); 

    if ($stmt->execute()) {
        $_SESSION['message'] = "Bạn đã đăng ký thành công!";
        $_SESSION['login'] = $username; 
    } else {
        echo '<script type="text/javascript">
            window.onload = function () { alert("Đăng ký không thành công"); }
        </script>';
        header('Location: ../../../project/model/register/register.php');
        exit(); 
    }
    echo '<script type="text/javascript">
            window.onload = function () { alert("Đăng ký thành công"); }
        </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="../../../project/model/register/register.css">
    <link rel="stylesheet" href="../../../project/assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
    
    <script src="../../../project/assets/js/main.js"></script>
</head>
<body>
    <main>
        <form id="wapper_register" action="" method="POST" onsubmit="return checkFormRegister()">
            <div class="register-container" style="position: relative;">
                <div onclick="closeHandle()" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="welcome-section">
                    <h1>Chào mừng bạn!</h1>
                    <div class="logo">
                        <img src="../../../project/assets/images/general/logo1.png" alt="Logo 3CE Lipsticks">
                    </div>
                    <p>
                        Bạn có phải là thành viên? 
                        <button type="button" onclick="handleLogin()"> Đăng nhập </button>
                    </p>
                </div>

                <div class="register-section">
                    <h2>Đăng kí</h2>
                    <div class="register">
                        <label for="user">Họ và tên</label>
                        <input type="text" id="user" name="user" required>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                        <label for="number">Điện thoại</label>
                        <input type="text" id="number" name="number" required>
                        <label for="address">Địa chỉ</label>
                        <input type="text" id="address" name="address" required>
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password" required>
                        <label for="repassword">Nhập lại mật khẩu</label>
                        <input type="password" id="repassword" name="repassword" required>
                    </div>

                    <div class="keep-logged-in">
                        <input type="checkbox" id="keep-logged-in" required>
                        <label for="keep-logged-in">Chấp nhận các điều khoản</label>
                    </div>

                    <div class="sub">
                        <button type="submit" name="register">Đăng kí</button>
                    </div>
                    <div class="social-register">
                        <p>Hoặc đăng kí với</p>
                        <button class="google">G</button>
                        <button class="facebook">f</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <script src="../../../project/assets/js/main.js"></script>
    <script>
        function checkFormRegister() {
            // Lấy giá trị từ các trường nhập liệu
            var name = document.getElementById("user").value.trim();
            var email = document.getElementById("email").value.trim();
            var number = document.getElementById("number").value.trim();
            var password = document.getElementById("password").value.trim();
            var repassword = document.getElementById("repassword").value.trim();
            var error = false;

            // Kiểm tra tên
            if (name === "") {
                document.getElementById("error-name").innerHTML = "Bạn chưa nhập tên tài khoản"; 
                error = true;
            } else {
                document.getElementById("error-name").innerHTML = ""; 
            }

            // Kiểm tra email
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (email === "") {
                document.getElementById("error-email").innerHTML = "Bạn chưa nhập email"; 
                error = true;
            } else if (!emailPattern.test(email)) {
                document.getElementById("error-email").innerHTML = "Email không hợp lệ, phải có định dạng như @abc.com"; 
                error = true;
            } else {
                document.getElementById("error-email").innerHTML = ""; 
            }

            // Kiểm tra số điện thoại
            if (number === "") {
                document.getElementById("error-number").innerHTML = "Bạn chưa nhập số điện thoại"; 
                error = true;
            } else if (!/^\d{10}$/.test(number)) {
                document.getElementById("error-number").innerHTML = "Số điện thoại phải là 10 chữ số"; 
                error = true;
            } else {
                document.getElementById("error-number").innerHTML = ""; 
            }

            // Kiểm tra mật khẩu
            if (password === "") {
                document.getElementById("error-password").innerHTML = "Bạn chưa nhập mật khẩu"; 
                error = true;
            } else if (password.length > 8) {
                document.getElementById("error-password").innerHTML = "Mật khẩu không được quá 8 ký tự"; 
                error = true;
            } else {
                document.getElementById("error-password").innerHTML = ""; 
            }

            // Kiểm tra nhập lại mật khẩu
            if (repassword === "") {
                document.getElementById("error-repassword").innerHTML = "Bạn chưa nhập lại mật khẩu"; 
                error = true;
            } else if (password !== repassword) {
                document.getElementById("error-repassword").innerHTML = "Mật khẩu không trùng khớp"; 
                error = true;
            } else {
                document.getElementById("error-repassword").innerHTML = ""; 
            }

            return !error; // Trả về true nếu không có lỗi, ngược lại trả về false
        }
    </script>
</body>
</html>