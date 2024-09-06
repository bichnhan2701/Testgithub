<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3CE Lipsticks</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/home.css">

    <!-- icon -->
    <link rel="stylesheet" href="assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <?php 
                include ("component/header/header.php");
            ?>
        </header>

        <div class="menu">
            <?php include("../project/component/connect/config.php"); ?>
            <?php include "component/menu/menu.php" ?>
        </div>

        <main>
            <div class="banner-container">
                <?php include "page/home/banner.php" ?>
            </div>

            <div class="main-container">
                <?php include "page/home/main.php" ?>
            </div>
            
            <div class="sidebar-container">
                <div class="container">
                    <div class="banner-sidebar">
                        <img src="../project/assets/images/general/banner/banner-0.png" width="100%">
                    </div>
                </div>
            </div>

            <div class="intro-container">
                <?php include "page/home/intro.php" ?>
            </div>

            <div class="blog-container">
                <?php include "page/home/blog.php" ?>
            </div>
        </main>

        <footer>
            <?php include "component/footer/footer.php" ?>
        </footer>
    </div>
</body>
</html>