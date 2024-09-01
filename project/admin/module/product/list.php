<?php
    $sql_list = "SELECT * FROM sanpham ORDER BY idProduct";
    $query_list = $conn->query($sql_list);
?>

<div class="list-container has-scrollbar">
    <h3 class="title">Danh sách sản phẩm</h3>
    <table style="width: 90%; border-collapse: collapse; " border="1">
            <thead>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th> 
                <th>Mã loại</th>
                <th>Giá</th>
                <th>Giá đã giảm</th>
                <th>Số lượng</th>
                <th>Ảnh 1</th>
                <th>Ảnh 2</th>
                <th>Thao tác</th>
            </thead>

            <tbody>
                <?php
                    while ($row = $query_list->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['idProduct']?></td>
                    <td><?php echo $row['nameProduct']?></td>
                    <td><?php echo $row['idType']?></td>
                    <td><?php echo $row['price']?></td>
                    <td><?php echo $row['price_del']?></td>
                    <td><?php echo $row['quantity_product']?></td>
                    <td><?php echo $row['img_poster1']?></td>
                    <td><?php echo $row['img_poster2']?></td>
                    <td class="act">
                        <button>
                            <a href="module/category/handle.php?idType=<?php echo $row['idProduct'] ?>">Xóa</a>
                        </button>
                        <button>
                            <a href="?page=quanlydanhmuc&query=modify&idType=<?php echo $row['idProduct'] ?>">Sửa</a>
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
</div>