<?php 
session_start(); 
// if (!isset($_SESSION['login'])) {
//     header('Location: ../../../project/admin/model/login.php');  
//     exit();  
// }
if (isset($_GET['page']) && $_GET['page'] == 'dangxuat') {
    unset($_SESSION['user_login']);
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
            <?php if (isset($_SESSION['user_login'])) { 
                $admin = $_SESSION['user_login']; 
            ?>
                <i class="fa-solid fa-user"></i>
                <?php echo htmlspecialchars($admin); ?>
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