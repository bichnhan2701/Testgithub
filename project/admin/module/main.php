<div class="main-container">
    <?php 
        if (isset($_GET['page'])) {
            $temp = $_GET['page'];
        } else {
            $temp = '';
        }

        if ($temp == 'quanlydanhmuc') {
            include("module/category/add.php");
        } else if ($temp == 'quanlysanpham') {
            include("");
        } if ($temp == 'quanlydonhang') {
            include("");
        } else {
            include("module/dashboard.php");
        }
    ?>
</div>
<div class="clear"></div>