<?php
if (isset($_GET['page']) && $_GET['page'] == 'filter') {
    // Đảm bảo 'loai' là một mảng và lọc ra các giá trị rỗng
    $loai = isset($_GET['loai']) ? array_filter((array)$_GET['loai']) : [];
    
    // Đảm bảo 'giaban' là một mảng và lọc ra các giá trị rỗng
    $giaban = isset($_GET['giaban']) ? array_filter((array)$_GET['giaban']) : [];
    
    // Tạo câu lệnh SQL dựa trên bộ lọc
    $sql = "SELECT sanpham.*, loaisanpham.nameType FROM sanpham 
            JOIN loaisanpham ON sanpham.idType = loaisanpham.idType 
            WHERE 1=1";
    
    // Lọc theo loại sản phẩm
    if (!empty($loai)) {
        // Chuyển đổi thành chuỗi với các giá trị được bao quanh bởi dấu ngoặc đơn
        $loai_str = implode("','", array_map(function($item) {
            return addslashes($item); 
        }, $loai));
        $sql .= " AND loaisanpham.idType IN ('$loai_str')";
    }
    
    // Lọc theo khoảng giá
    if (!empty($giaban)) {
        $price_conditions = [];
        foreach ($giaban as $price_option) {
            switch ($price_option) {
                case 1:
                    $price_conditions[] = "sanpham.price < 200000";
                    break;
                case 2:
                    $price_conditions[] = "sanpham.price >= 200000 AND sanpham.price <= 300000";
                    break;
                case 3:
                    $price_conditions[] = "sanpham.price >= 300000 AND sanpham.price <= 400000";
                    break;
                case 4:
                    $price_conditions[] = "sanpham.price > 400000";
                    break;
            }
        }
        if (!empty($price_conditions)) {
            $sql .= " AND (" . implode(' OR ', $price_conditions) . ")";
        }
    }
    
    // Thực thi truy vấn
    try {
        $query = $conn->query($sql);
        $kq = $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Hiển thị thông báo lỗi
        $kq = [];
    }
} else {
    $kq = []; // Hoặc lấy tất cả sản phẩm nếu không có bộ lọc
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