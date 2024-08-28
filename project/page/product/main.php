        <?php
            include '../../../project/component/connect/config.php';
            try {
                $sql = "SELECT * FROM sanpham";
                $kq = $conn->query($sql);
            } catch (Exception $e) {
                die ("Lỗi thực thi SQL: " .$e->getMessage());
            }
        ?>

        <!-- PRODUCT -->
        <div class="container">
            <!-- PRODUCT MINIMAL -->
            <div class="product-minimal">
                <div class="product-showcase">
                    <h2 class="title">Hàng mới về</h2>
    
                    <div class="showcase-wrapper has-scrollbar">
                        <div class="showcase-container">
                            <div class="showcase">
                                <a href="#" class="showcase-img-box">
                                    <img src="../../assets/images/general/prod-minimal/prod-minimal1.png" alt="3CE Drop Glow Gel 4g Son bóng dạng gel rạng rỡ đôi môi" class="showcase-img">
                                </a>
            
                                <div class="showcase-content">
                                    <a href="#">
                                    <h4 class="showcase-title">3CE Drop Glow Gel 4g Son bóng dạng gel rạng rỡ đôi môi</h4>
                                    </a>
                                    <a href="#" class="showcase-category">Son bóng</a>
            
                                    <div class="price-box">
                                        <p class="price">₫318.750</p>
                                        <del>₫375.000</del>
                                    </div>
                                </div>
                            </div>
        
                            <div class="showcase">
                                <a href="#" class="showcase-img-box">
                                    <img src="../../assets/images/general/prod-minimal/prod-minimal2.png" alt="Son 3CE Hazy Lip Clay Kit chính hãng" class="showcase-img">
                                </a>
                                
                                <div class="showcase-content">
                                    <a href="#">
                                    <h4 class="showcase-title">Son 3CE Hazy Lip Clay Kit chính hãng</h4>
                                    </a>
                                    <a href="#" class="showcase-category">Son kem</a>
                                    <div class="price-box">
                                    <p class="price">₫655.500</p>
                                    <del>₫874.000</del>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="showcase-container">
                            <div class="showcase">
                                <a href="#" class="showcase-img-box">
                                    <img src="../../assets/images/general/prod-minimal/prod-minimal3.png" alt="3CE Lazy Pop Lip Stain Duo Kit Bộ đôi vết bẩn môi 3CE Lazy Pop" class="showcase-img">
                                </a>
                            
                                <div class="showcase-content">
                                    <a href="#">
                                        <h4 class="showcase-title">3CE Lazy Pop Lip Stain Duo Kit Bộ đôi vết bẩn môi 3CE Lazy Pop</h4>
                                    </a>
                            
                                    <a href="#" class="showcase-category">Son tint</a>
                                    <div class="price-box">
                                    <p class="price">$61.00</p>
                                    <del>$11.00</del>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="showcase">
                                <a href="#" class="showcase-img-box">
                                    <img src="../../assets/images/general/prod-minimal/prod-minimal4.png" alt="Bộ son môi 3CE lì nhám màu sắc thời trang phiên bản Smiley Blur Matte Lipstick Kit giới hạn" class="showcase-img">
                                </a>
                            
                                <div class="showcase-content">
                                    <a href="#">
                                    <h4 class="showcase-title">Bộ son môi 3CE lì nhám màu sắc thời trang phiên bản Smiley Blur Matte Lipstick Kit giới hạn</h4>
                                    </a>
                            
                                    <a href="#" class="showcase-category">Son thỏi</a>
                                    <div class="price-box">
                                    <p class="price">₫625.300</p>
                                    <del>₫962.000</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PRODUCT GRID -->
            <div class="product-main">
                <h2 class="title">Sản phẩm</h2>
                <!-- <div class="product-grid">
                    This section will be updated dynamically by the filter
                     
                </div> -->
                <div class="product-grid">
                    <?php foreach ($kq as $product) { ?>
                        <div class="showcase">
                            <div class="showcase-banner">
                                <img src="../../../project<?=$product['img-poster1']?>" alt="<?=$product['name']?>" class="product-img default">
                                <img src="../../../project<?=$product['img-poster2']?>" alt="<?=$product['name']?>" class="product-img hover">
                                
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
                                    <p class="price">₫<?=$product['price']?></p>
                                    <del>₫200.00</del>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>