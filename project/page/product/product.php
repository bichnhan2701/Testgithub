<?php 
    include("../../../project/component/connect/config.php"); 
    if (isset($_GET['page'])) {
        $temp = $_GET['page'];
    } else {
        $temp = '';
    }
    if ($temp == 'search'){
        require_once("searchProduct.php");
    } else {
        require_once("main.php"); 
    }
?>
<div class="container-main-product">
        <div class="category-container">
            <?php require_once("category.php"); ?>
        </div>
        
        <div class="main-container">
            <?php require_once("main.php");  ?>
        </div>

        <div class="sidebar-container">
            <?php require_once("sidebar.php"); ?>
        </div>
</div>