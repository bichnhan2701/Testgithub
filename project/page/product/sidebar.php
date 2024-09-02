<div class="container">
    <div class="product-showcase">
        <h2 class="title">Lọc sản phẩm</h2>

        <div class="showcase-wrapper">
            <h4 class="cap">Loại</h4>

            <div class="ct"> 
                <?php 
                    $sql_type = "SELECT * FROM loaisanpham ORDER BY idType DESC";
                    $query_type = $conn->query($sql_type);
                    while ($row_type = $query_type->fetch(PDO::FETCH_ASSOC)) {                      
                ?>
                <label><input type="checkbox" class="loai" value="1"><?php echo $row_type['nameType'] ?></label>
                <?php } ?>
            </div>
        </div>

        <div class="showcase-wrapper">
            <h4 class="cap">Giá bán</h4>

            <div class="ct"> 
                <label><input type="checkbox" class="giaban" value="1">Dưới ₫200000</label>
                <label><input type="checkbox" class="giaban" value="2">Từ ₫200000 đến ₫300000</label>
                <label><input type="checkbox" class="giaban" value="3">Từ ₫300000 đến ₫400000</label>
                <label><input type="checkbox" class="giaban" value="4">Trên ₫400000</label>
            </div>
        </div>

        <button>Lọc</button>
    </div>
</div>