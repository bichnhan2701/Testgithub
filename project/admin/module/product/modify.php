<?php
    $sql_modify = "SELECT * FROM loaisanpham WHERE idType = :idType LIMIT 1";
    $query_modify = $conn->prepare($sql_modify);
    $query_modify->bindParam(':idType', $_GET['idType']);
    $query_modify->execute();
?>
<div class="add-container">
    <h3 class="title">Sửa loại sản phẩm</h3>
    <table style="width: 90%;">
        <form method="POST" action="../../../project/admin/module/category/handle.php?idType=<?php echo $_GET['idType'];?>">
            <?php  while ($row = $query_modify->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td class="title1">Mã loại</td>
                <td> <input type="text" name="idType" placeholder="Nhập mã loại" value="<?php echo $row['idType']?>"></td>
            </tr>
            <tr>
                <td class="title1">Tên loại</td>
                <td> <input type="text" name="nameType" placeholder="Nhập tên loại" value="<?php echo $row['nameType']?>"></td>
            </tr>
            <tr>
                <td class="title1">Số lượng</td>
                <td> <input type="text" name="quantityType" placeholder="Nhập số lượng" value="<?php echo $row['quantityType']?>"></td>
            </tr>
            <tr> <td class="btn" colspan="1"><input type="submit" value="Sửa" name="modifyType"></td> </tr>
            <?php } ?>
        </form>
    </table>
</div>