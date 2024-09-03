<?php
    $sql_list = "SELECT * FROM chitietsanpham, sanpham WHERE chitietsanpham.idProduct = sanpham.idProduct";
    $query_list = $conn->query($sql_list);
?>

<div class="list-container has-scrollbar detail-product">
    <h3 class="title">Danh sách chi tiết sản phẩm</h3>
    <table style="width: 90%; border-collapse: collapse; " border="1">
            <thead>
                <th>Tên sản phẩm</th> 
                <th>Mô tả tổng quan</th>
                <th>Mô tả chi tiết</th>
                <th>Thành phần</th>
                <th>Mô tả bảng màu</th>
                <th>Số lượng màu</th>            
                <th>Mô tả màu 1</th>
                <th>Ảnh màu 1</th>
                <th>Ảnh màu 1 hover</th>               
                <th>Mô tả màu 2</th>
                <th>Ảnh màu 2</th>
                <th>Ảnh màu 2 hover</th>               
                <th>Mô tả màu 3</th>
                <th>Ảnh màu 3</th>
                <th>Ảnh màu 3 hover</th>               
                <th>Mô tả màu 4</th>
                <th>Ảnh màu 4</th>
                <th>Ảnh màu 4 hover</th>
                <th>Ảnh bảng màu</th>
                <th>Ảnh thông tin</th>
                <th>Thao tác</th>
            </thead>

            <tbody>
                <?php
                    while ($row = $query_list->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['nameProduct']?></td>
                    <td><?php echo $row['describeProduct']?></td>
                    <td><?php echo $row['descDetail']?></td>
                    <td><?php echo $row['ingredient']?></td>
                    <td><?php echo $row['descColorTable']?></td>
                    <td><?php echo $row['descColorQuantity']?></td>

                    <!-- Dynamic color fields based on the number of colors -->
                    <?php
                    $colorQuantity = (int)$row['descColorQuantity'];
                    for ($i = 1; $i <= $colorQuantity; $i++) {
                        $descColor = $row['descColor' . $i];
                        $img_color = $row['img_color' . $i];
                        $img_hover_color = $row['img_hover_color' . $i];
                    ?>
                    <!-- Check if the description, image, and hover image are not NULL -->
                    <td><?php echo $descColor !== null ? $descColor : ''; ?></td>
                    <td>
                        <?php if ($img_color !== null) { ?>
                            <img src="module/product_detail/uploads/<?php echo $img_color; ?>" alt="Màu <?php echo $i; ?>">
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($img_hover_color !== null) { ?>
                            <img src="module/product_detail/uploads/<?php echo $img_hover_color; ?>" alt="Màu <?php echo $i; ?> hover">
                        <?php } ?>
                    </td>
                    <?php } ?>

                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_colorTable']?>"></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_inf']?>"></td>
                    <td class="act">
                        <button>
                            <a href="module/product_detail/handle.php?idProduct=<?php echo $row['idProduct'] ?>">Xóa</a>
                        </button>
                        <button>
                            <a href="?page=quanlychitietsanpham&query=modify&idProduct=<?php echo $row['idProduct'] ?>">Sửa</a>
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
</div>

<?php
    $sql_list = "SELECT * FROM loaisanpham,sanpham WHERE loaisanpham.idType = sanpham.idType ORDER BY idProduct";
    $query_list = $conn->query($sql_list);
?>
