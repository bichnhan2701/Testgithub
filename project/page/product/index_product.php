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
            <div class="container-main-product">
                <div class="category-container">
                    <?php require_once("category.php"); ?>
                </div>
                <?php 
                    include("../../../project/component/connect/config.php"); 
                    $temp = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : '';
                    
                ?>
                <div class="main-container">
                    <?php 
                        if ($temp == 'search'){
                            require_once("searchProduct.php");
                        } else if ($temp == 'filter') {
                            require_once("filterProduct.php");
                        } else {
                            require_once("main.php"); 
                        }  
                    ?>
                </div>

                <div class="sidebar-container">
                    <?php require_once("sidebar.php"); ?>
                </div>
            </div>
        </main>

        <footer>
            <?php include "../../component/footer/footer.php" ?>
        </footer>
    </div>
</body>
</html>