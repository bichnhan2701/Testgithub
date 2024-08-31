<?php
    $sql_list = "SELECT * FROM loaisanpham ORDER BY idType";
    $query_list = $conn->query($sql_list);
?>

<div class="list-container">
    <h3 class="title">Danh sách sản phẩm</h3>
    <table style="width: 90%; border-collapse: collapse; " border="1">
            <thead>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th> 
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Mô tả tổng quan</th>
                <th>Mô tả chi tiết</th>
                <th>Ảnh 1</th>
                <th>Ảnh 2</th>
                <!-- <th>Tình trạng</th> -->
                <th>Thao tác</th>
            </thead>

            <tbody>
                <?php
                    while ($row = $query_list->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['idType']?></td>
                    <td><?php echo $row['nameType']?></td>
                    <td><?php echo $row['price']?></td>
                    <td><?php echo $row['quantity-product']?></td>
                    <td><?php echo $row['describe']?></td>
                    <td><?php echo $row['desc-detail']?></td>
                    <td><?php echo $row['img-poster1']?></td>
                    <td><?php echo $row['img-poster2']?></td>
                    <td class="act">
                        <button>
                            <a href="module/category/handle.php?idType=<?php echo $row['idType'] ?>">Xóa</a>
                        </button>
                        <button>
                            <a href="?page=quanlydanhmuc&query=modify&idType=<?php echo $row['idType'] ?>">Sửa</a>
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
</div>