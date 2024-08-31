<div class="main-container">
    <?php 
        if (isset($_GET['page'])) {
            $temp = $_GET['page'];
        } else {
            $temp = '';
        }

        if ($temp == 'quanlydanhmuc') {
            require_once("module/category/add.php");
            require_once("module/category/list.php");
        } else if ($temp == 'quanlysanpham') {
            require_once("");
        } else if ($temp == 'quanlydonhang') {
            require_once("");
        } else {
            require_once("module/dashboard.php");
        }
    ?>
</div>
<div class="clear"></div>