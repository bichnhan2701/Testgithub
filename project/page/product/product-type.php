            <?php
                include '../../../project/component/connect/config.php';
                try {
                    $sql = "SELECT sanpham.*, loaisanpham.* 
                            FROM sanpham INNER JOIN loaisanpham 
                            ON sanpham.idType = loaisanpham.idType";
                    $kq = $conn->query($sql);
                } catch (Exception $e) {
                    die ("Lỗi thực thi SQL: " .$e->getMessage());
                }

                $productsByType = [];
                    foreach ($kq as $product) {
                        $productsByType[$product['idType']][] = $product;
                }
            ?>
            <div class="container">
                <div class="product-main">
                    <?php foreach ($productsByType as $idType => $products) { ?>
                        <h2 class="title"><?=$idType?></h2>
                        
                        <div class="product-grid">
                            <?php foreach ($products as $product) { ?>
                                <div class="showcase">
                                    <div class="showcase-banner">
                                        <img src="../../../project<?=$product['img2']?>" alt="<?=$product['name']?>" class="product-img default">
                                        <img src="../../../project<?=$product['img1']?>" alt="<?=$product['name']?>" class="product-img hover">
                                        
                                        <div class="showcase-actions">
                                            <button class="btn-action" onclick="addToCart('<?=$product['id']?>')">
                                                <i class="fa-solid fa-cart-plus"></i>
                                            </button>
                                            <button class="buy-btn">
                                                <a href="#">Mua</a>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="showcase-content">
                                        <a href="#" class="showcase-category"><?=$product['type']?></a>
                                        <a href="../page/product-detail-<?=$product['id']?>.php">
                                            <h3 class="showcase-title"><?=$product['name']?></h3>
                                        </a>
                                        <div class="showcase-rating">
                                            <i class="fa-solid fa-star star"></i>
                                            <i class="fa-solid fa-star star"></i>
                                            <i class="fa-solid fa-star star"></i>
                                            <i class="fa-solid fa-star star"></i>
                                            <i class="fa-solid fa-star star"></i>
                                        </div>
                                        <div class="price-box">
                                            <p class="price">$<?=$product['price']?></p>
                                            <del>$200.00</del>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php }?>
                </div>
            </div>