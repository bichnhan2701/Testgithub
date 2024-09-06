<?php 
session_start();
include("../../component/connect/config.php");

if (isset($_POST['login'])) {
    $taikhoan = trim($_POST['username']);
    $matkhau = trim($_POST['password']);
    
    // Prepared statement to prevent SQL Injection
    $stmt = $conn->prepare("SELECT * FROM tk_admin WHERE admin_name = :taikhoan AND pass = :matkhau LIMIT 1");
    $stmt->bindParam(':taikhoan', $taikhoan);
    $stmt->bindParam(':matkhau', $matkhau);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        // Set session for logged-in user
        $_SESSION['login'] = $admin['admin_name']; // Store the admin's name
        header('Location:../../admin/index.php');
        exit();
    } else {
        // Incorrect username or password
        $_SESSION['message'] = "Tài khoản hoặc mật khẩu sai. Vui lòng nhập lại!";
        header('Location:../../admin/model/login.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>
    <!-- css link -->
    <link rel="stylesheet" href="../../../project/assets/css/admin/login.css">
    <link rel="stylesheet" href="../../../project/assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
</head>
<body>
    <main>
        <div id="wapper_login">
            <form action="" autocomplete="off" method="POST" class="login-container" style="position: relative;">
                <div onclick="closeHandle()" class="close-button">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <!-- WELCOME SECTION -->
                <div class="welcome-section">
                    <h1>Chào mừng bạn!</h1>
                    <div class="logo"> 
                        <img src="../../../project/assets/images/general/logo1.png" alt="Logo">
                    </div>
                    <!-- <p>
                        Bạn chưa phải là thành viên quản lý? 
                        <a href="../../../project/admin/model/register.php">Đăng kí</a>
                    </p> -->
                    <p>
                        Bạn là khách hàng? 
                        <a href="../../../project/index.php">Đến trang chủ</a>
                    </p>
                </div>

                <!-- LOGIN SECTION -->
                <div class="login-section">
                    <h2>Đăng nhập admin</h2>
                    <div>
                        <div class="login">
                            <label for="username">Tài khoản*</label>
                            <input type="text" id="username" name="username" required>
                            <label for="password">Mật khẩu*</label>
                            <input type="password" id="password" name="password" required>
                        </div>

                        <div class="sub">
                            <input type="submit" name="login" value="Đăng nhập">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>