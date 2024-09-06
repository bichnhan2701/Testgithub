<?php 
session_start(); // Start session at the beginning

if (isset($_GET['page']) && $_GET['page'] == 'dangxuat') {
    unset($_SESSION['login']);
    header('Location:../../../project/admin/model/login.php');
    exit();
}
?>
<header> 
    <div class="header-container">
        <div class="bar-icon">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="logo">
            <img src="../../../project/assets/images/general/logo.png" alt="Logo 3CELipsticks" style="height: 80px;">
        </div>
        <h3>Welcome </h3>
        <button class="user">
            <?php if (isset($_SESSION['login'])) { 
                $admin = $_SESSION['login']; // Get admin name from session
            ?>
                <i class="fa-solid fa-user"></i>
                <?php echo htmlspecialchars($admin); // Display admin name safely ?>
            <?php } ?>
        </button>
        <button class="logout">
            <a href="index.php?page=dangxuat">
                <i class="fa-solid fa-right-from-bracket"></i>
                Đăng xuất
            </a>
        </button>
    </div>
</header>