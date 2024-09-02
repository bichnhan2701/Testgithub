<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../../project/assets/css/admin/styleadmin.css">
    <!-- icon -->
    <link rel="stylesheet" href="../../project/assets/css/font-icons/fontawesome-free-6.6.0-web/css/all.css">
</head>
<body>
    <div class="wrapper">
        <?php
            include("../../project/component/connect/config.php");
            include("module/header.php");
            include("module/sidebar.php");
            include("module/main.php");
            include("module/footer.php");
        ?>
    </div>
</body>
</html>