<?php
include '../../../project/component/connect/config.php';

$types = isset($_POST['types']) ? explode(',', $_POST['types']) : [];
$prices = isset($_POST['prices']) ? explode(',', $_POST['prices']) : [];

$whereClauses = [];

if (!empty($types)) {
    $typePlaceholders = implode(',', array_fill(0, count($types), '?'));
    $whereClauses[] = "sanpham.idType IN ($typePlaceholders)";
}

if (!empty($prices)) {
    $priceConditions = [];
    foreach ($prices as $price) {
        switch ($price) {
            case '1':
                $priceConditions[] = "sanpham.price < 5000000";
                break;
            case '2':
                $priceConditions[] = "sanpham.price BETWEEN 5000000 AND 10000000";
                break;
            case '3':
                $priceConditions[] = "sanpham.price BETWEEN 10000000 AND 15000000";
                break;
            case '4':
                $priceConditions[] = "sanpham.price > 15000000";
                break;
        }
    }
    if (!empty($priceConditions)) {
        $whereClauses[] = '(' . implode(' OR ', $priceConditions) . ')';
    }
}

$whereSql = !empty($whereClauses) ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

$sql = "SELECT sanpham.*, loaisanpham.* 
        FROM sanpham 
        INNER JOIN loaisanpham ON sanpham.idType = loaisanpham.idType 
        $whereSql";

try {
    $stmt = $conn->prepare($sql);

    // Bind the type parameters only if there are types selected
    if (!empty($types)) {
        $stmt->execute($types);
    } else {
        $stmt->execute();
    }

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        echo '<div class="showcase">
                <div class="showcase-banner">
                    <img src="../../../project' . $product['img2'] . '" alt="' . $product['name'] . '" class="product-img default">
                    <img src="../../../project' . $product['img1'] . '" alt="' . $product['name'] . '" class="product-img hover">
                    
                    <div class="showcase-actions">
                        <button class="btn-action" onclick="addToCart(\'' . $product['id'] . '\')">
                            <i class="fa-solid fa-cart-plus"></i>
                        </button>
                        <button class="buy-btn">
                            <a href="#">Mua</a>
                        </button>
                    </div>
                </div>
                <div class="showcase-content">
                    <a href="#" class="showcase-category">' . $product['type'] . '</a>
                    <a href="../page/product-detail-' . $product['id'] . '.php">
                        <h3 class="showcase-title">' . $product['name'] . '</h3>
                    </a>
                    <div class="showcase-rating">
                        <i class="fa-solid fa-star star"></i>
                        <i class="fa-solid fa-star star"></i>
                        <i class="fa-solid fa-star star"></i>
                        <i class="fa-solid fa-star star"></i>
                        <i class="fa-solid fa-star star"></i>
                    </div>
                    <div class="price-box">
                        <p class="price">$' . $product['price'] . '</p>
                        <del>$200.00</del>
                    </div>
                </div>
            </div>';
    }
} catch (Exception $e) {
    die("Lỗi thực thi SQL: " . $e->getMessage());
}
?>