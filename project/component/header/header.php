<?php
    session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../../project/component/header/header.css">
    <script src="../../../project/assets/js/main.js"></script>
</head>
<body>
    <div class="container">
        <a href="../../../project/index.php" class="header-logo">
            <img src="../../../project/assets/images/general/logo.png" alt="Logo 3CE Lipsticks" height="80px">
        </a>

        <div class="header-search-container">
            <form action="../../../project/page/product/index_product.php?page=search">
                <input type="search" class="search-field" placeholder="Nhập tên sản phẩm..." name="key">
                <input type="hidden" name="page" value="search">
                <button class="search-btn" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <div class="header-user-actions">
            <?php if (isset($_SESSION['user_login'])): ?>
                <!-- User is logged in -->
                <div class="user-in">
                    <button class="cart-btn">
                        <a href="../../../project/page/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                        <span class="count">0</span>
                    </button>
                    <button class="user">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>Xin chào, <?php echo htmlspecialchars($_SESSION['user_login']); ?>!</span> <!-- Display Username -->
                    </button>
                    <button class="logout">
                        <a href="../../../project/model/logout.php">
                            <i class="fa-solid fa-right-from-bracket"></i> <span>Đăng xuất</span>
                        </a>
                    </button>
                </div>
            <?php else: ?>
                <!-- User is not logged in -->
                <div class="user-out">
                    <button class="login" onclick="handleLogin()">
                        <i class="fa-solid fa-right-to-bracket"></i> <span>Đăng nhập</span>
                    </button>
                    <div id="handleLogin" style="display: none; position:fixed; left:0 ;z-index: 30"> 
                        <?php include($_SERVER['DOCUMENT_ROOT'] . "/project/model/login/login.php"); ?>
                    </div>

                    <button class="register" onclick="handleRegister()">
                        <i class="fa-solid fa-user-plus"></i> <span>Đăng ký</span>
                    </button>
                    <div id="handleRegister" style="display: none; position:fixed ; left:0;z-index: 30">
                        <?php include($_SERVER['DOCUMENT_ROOT'] . "/project/model/register/register.php"); ?>
                    </div>
                    
                    <button class="user">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>Bạn chưa đăng nhập</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="../../../project/assets/js/main.js"></script>
</body>
</html>