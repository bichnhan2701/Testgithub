<?php
    $sql_list = "SELECT * FROM loaisanpham ORDER BY idType";
    $query_list = $conn->query($sql_list);
?>

<div class="list-container">
    <h3 class="title">Danh sách loại sản phẩm</h3>
    <table style="width: 90%; border-collapse: collapse; " border="1">
            <thead> 
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Số lượng</th>
                <th>Thao tác</th>
            </thead>

            <tbody>
                <?php
                    while ($row = $query_list->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['idType']?></td>
                    <td><?php echo $row['nameType']?></td>
                    <td><?php echo $row['quantityType']?></td>
                    <td class="act">
                        <button>
                            <a href="?page=quanlydanhmuc&query=delete&idType=<?php echo $row['idType'] ?>">Xóa</a>
                        </button>
                        <button>
                            <a href="?page=quanlydanhmuc&query=modify">Sửa</a>
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
</div>