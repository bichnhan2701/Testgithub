<?php
if (isset($_GET['flter'])){
    $loai = isset($_GET['loai']) ? array_map('intval', $_GET['loai']) : [];
    $giaban = isset($_GET['giaban']) ? array_map('intval', $_GET['giaban']) : [];
    
    // Construct the SQL query based on filters
    $sql = "SELECT * FROM sanpham WHERE 1=1";
    
    // Filter by product type
    if (!empty($loai)) {
        $loai_str = implode(',', array_map('intval', $loai)); // Convert to string with commas
        $sql .= " AND idType IN ($loai_str)";
    }
    // Filter by price range
    if (!empty($giaban)) {
        $price_conditions = [];
        foreach ($giaban as $price_option) {
            switch ($price_option) {
                case '1':
                    $price_conditions[] = "price < 200000";
                    break;
                case '2':
                    $price_conditions[] = "price >= 200000 AND price <= 300000";
                    break;
                case '3':
                    $price_conditions[] = "price >= 300000 AND price <= 400000";
                    break;
                case '4':
                    $price_conditions[] = "price > 400000";
                    break;
            }
        }
        if (!empty($price_conditions)) {
            $sql .= " AND (" . implode(' OR ', $price_conditions) . ")";
        }
    }
    
    $query = $conn->query($sql);
    $kq = $query->fetchAll(PDO::FETCH_ASSOC);
    
    // Pass the filtered products to filterProduct.php
    // include 'filterProduct.php';
}
?>
<!-- PRODUCT -->
<div class="container">
    <div class="product-main">
        <h2 class="title">Sản phẩm lọc theo tiêu chí</h2>
        <div class="product-grid">
            <?php
                if (!empty($kq)) {
                    foreach ($kq as $product) {
            ?>
                    <div class="showcase">
                        <div class="showcase-banner">
                            <img src="../../admin/module/product/uploads/<?=$product['img_poster1']?>" alt="<?=$product['nameProduct']?>" class="product-img default">
                            <img src="../../admin/module/product/uploads/<?=$product['img_poster2']?>" alt="<?=$product['nameProduct']?>" class="product-img hover">
                            <div class="showcase-actions">
                                <button class="btn-action" name="addToCart">
                                    <a href="../addToCart.php?id=<?php echo $product['idProduct'] ?>">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </a>
                                </button>
                                <button class="buy-btn">
                                    <a href="#">Mua</a>
                                </button>
                            </div>
                        </div>
                        <div class="showcase-content">
                            <p class="showcase-category"><?=$product['nameType']?></p>
                            <a href="../../../project/page/product/product-detail.php?id=<?php echo $product['idProduct']?>">
                                <h3 class="showcase-title"><?=$product['nameProduct']?></h3>
                            </a>
                            <div class="showcase-rating">
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                            </div>
                            <div class="price-box">
                                <p class="price"><?=number_format($product['price'], 0, ',', '.')?>₫</p>
                                <del><?=number_format($product['price_del'], 0, ',', '.')?>₫</del>
                            </div>
                        </div>
                    </div>
            <?php 
                    } 
                } else {
                    echo "<p>Không tìm thấy sản phẩm phù hợp với tiêu chí lọc.</p>";
                }
            ?>
        </div>
    </div>
</div>