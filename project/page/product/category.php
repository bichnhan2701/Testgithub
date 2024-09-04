            
            <!-- CATEGORY -->
            <div class="container">
                <h2 class="title">Danh mục</h2>
                
                <div class="category-item-container has-scrollbar">
                    <?php 
                        $sql_type = "SELECT * FROM loaisanpham ORDER BY idType DESC";
                        $query_type = $conn->query($sql_type);
                        while ($row_type = $query_type->fetch(PDO::FETCH_ASSOC)) {                      
                    ?>
                    <div class="category-item">
                        <div class="category-img-box">
                            <img src="../../../project/assets/images/general/lipstick-svgrepo-com.png" width="30px">
                        </div>

                        <div class="category-content-box">
                            <div class="category-content-flex">
                                <h3 class="category-item-title"><?php echo $row_type['nameType'] ?></h3>
                                <p class="category-item-amount">(<?php echo $row_type['quantityType'] ?>)</p>
                            </div>
                            <a href="../../../project/page/product/index_product.php?id=<?php echo $row_type['idType']?>" class="category-btn">Hiện tất cả</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>