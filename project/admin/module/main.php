<div class="main-container">
    <?php 
        if (isset($_GET['page']) && $_GET['query']) {
            $temp = $_GET['page'];
            $query = $_GET['query'];
        } else {
            $temp = '';
            $query = '';
        }

        if ($temp == 'quanlydanhmuc' && $query=='add') {
            require_once("module/category/add.php");
            require_once("module/category/list.php");
        } else if ($temp == 'quanlydanhmuc' && $query=='modify') {
            require_once("module/category/modify.php");
        } else if ($temp == 'quanlysanpham' && $query=='add') {
            require_once("module/product/add.php");
            require_once("module/product/list.php");
        } else if ($temp == 'quanlysanpham' && $query=='modify') {
            require_once("module/product/modify.php");
        } else if ($temp == 'quanlydonhang') {
            // require_once("");
        } else {
            require_once("module/dashboard.php");
        }
    ?>
</div>
<div class="clear"></div>