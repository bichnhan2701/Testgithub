<?php 
    if (isset($_GET['key'])) {
        $tukhoa = $_GET['key'];
        $sql = "SELECT * FROM loaisanpham, sanpham WHERE loaisanpham.idType = sanpham.idType
                AND sanpham.nameProduct LIKE '%".$tukhoa."%' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!-- PRODUCT -->
<div class="container">
    <div class="product-main">
        <h2 class="title">Sản phẩm tìm kiếm theo từ khóa: '<?php echo $tukhoa ?>'</h2>
        <div class="product-grid">
            <?php
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
            <?php }?>
        </div>
    </div>
</div>
