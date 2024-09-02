            <link rel="stylesheet" href="../../../project/component/menu/menu.css">
            
            
            <div class="container">

                <ul class="menu-category-list">
                    <li class="menu-category">
                        <a href="../../../project/index.php" class="menu-title">trang chủ</a>
                    </li>

                    <li class="menu-category">
                        <a href="../../../project/page/about.php" class="menu-title">Giới thiệu</a>
                    </li>

                    <li class="menu-category">
                        <a href="../../../project/page/product/product.php" class="menu-title">Sản phẩm</a>

                        <ul class="dropdown-list">
                        <?php 
                            $sql_type = "SELECT * FROM loaisanpham ORDER BY idType DESC";
                            $query_type = $conn->query($sql_type);
                            while ($row_type = $query_type->fetch(PDO::FETCH_ASSOC)) {                      
                        ?>
                            <li class="dropdown-title">
                                <a href="../../../project/page/product/product.php?id=<?php echo $row_type['idType']?>"><?php echo $row_type['nameType'] ?></a>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>

                    <li class="menu-category">
                        <a href="../../../project/page/contact.php" class="menu-title">Liên hệ</a>
                    </li>
                </ul>

            </div>