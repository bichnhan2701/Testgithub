<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/product.css">

    <!-- icon -->
    <link rel="stylesheet" href="../../assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <?php include "../../component/header/header.php" ?>
        </header>

        <div class="menu">
            <?php include("../../component/connect/config.php"); ?>
            <?php include "../../component/menu/menu.php" ?>
        </div>

        <main>
            <?php 
                include("../../component/connect/config.php"); 
                if (isset($_GET['page'])){
                    $tmp = $_GET['page'];
                } else {
                    $tmp = '';
                }
            ?>

                <div class="banner-container">
                    <?php include "banner.php" ?>
                </div>
    
                <div class="category-container">
                    <?php include "category.php" ?>
                </div>
                
                <div class="main-container">
                    <?php include "main.php" ?>
                </div>
                
                <div class="sidebar-container">
                    <?php include "sidebar.php" ?>
                </div>
        </main>

        <footer>
            <?php include "../../component/footer/footer.php" ?>
        </footer>
    </div>
</body>
</html>