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
                <th>Ảnh thành phần</th>
                <th>Thao tác</th>
            </thead>

            <tbody>
                <?php
                    while ($row = $query_list->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr has-scrollbar>
                    <td><?php echo $row['nameProduct']?></td>
                    <td><?php echo $row['describeProduct']?></td>
                    <td><?php echo $row['descDetail']?></td>
                    <td><?php echo $row['ingredient']?></td>
                    <td><?php echo $row['descColorTable']?></td>
                    <td><?php echo $row['descColor1']?></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_color1']?>"></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_hover_color1']?>"></td>
                    <td><?php echo $row['descColor2']?></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_color2']?>"></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_hover_color2']?>"></td>
                    <td><?php echo $row['descColor3']?></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_color3']?>"></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_hover_color3']?>"></td>
                    <td><?php echo $row['descColor4']?></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_color4']?>"></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_hover_color4']?>"></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_colorTable']?>"></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_inf']?>"></td>
                    <td> <img src="module/product_detail/uploads/<?php echo $row['img_ingredient']?>"></td>
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