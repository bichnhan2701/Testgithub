<?php
    $sql_modify = "SELECT * FROM sanpham WHERE idProduct = :idProduct LIMIT 1";
    $query_modify = $conn->prepare($sql_modify);
    $query_modify->bindParam(':idProduct', $_GET['idProduct']);
    $query_modify->execute();
?>
<div class="add-container">
    <h3 class="title">Sửa sản phẩm</h3>
    <table style="width: 90%;">
        <form method="POST" action="../../../project/admin/module/product/handle.php?idProduct=<?php echo $_GET['idProduct'];?>" enctype="multipart/form-data">
            <?php  while ($row = $query_modify->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td class="title1">Mã sản phẩm</td>
                <td> <input type="text" name="idProduct" placeholder="Nhập mã sản phẩm" value="<?php echo $row['idProduct']?>"></td>
            </tr>
            <tr>
                <td class="title1">Tên sản phẩm</td>
                <td> <input type="text" name="nameProduct" placeholder="Nhập tên sản phẩm" value="<?php echo $row['nameProduct']?>"></td>
            </tr>
            <!-- <tr>
                <td class="title1">Mã loại</td>
                <td> <input type="text" name="idType" placeholder="Nhập mã loại" value="<?php echo $row['idType']?>"></td>
            </tr> -->
            <tr>
                <td class="title1">Loại</td>
                <td> 
                    <select name="idType" id="">
                        <?php 
                            $sql_type = "SELECT * FROM loaisanpham ORDER BY idType DESC";
                            $query_type = $conn->query($sql_type);
                            while ($row_type = $query_type->fetch(PDO::FETCH_ASSOC)) {
                                if ($row_type['idType'] == $row['idType']) {
                        ?>
                            <option value="<?php echo $row_type['idType'] ?>" selected><?php echo $row_type['nameType'] ?></option>
                            <?php } else {?>
                            <option value="<?php echo $row_type['idType'] ?>"><?php echo $row_type['nameType'] ?></option>
                            <?php  } ?>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="title1">Giá </td>
                <td> <input type="text" name="price" placeholder="Nhập giá" value="<?php echo $row['price']?>"></td>
            </tr>
            <tr>
                <td class="title1">Giá đã giảm</td>
                <td> <input type="text" name="price_del" placeholder="Nhập giá" value="<?php echo $row['price_del']?>"></td>
            </tr>
            <tr>
                <td class="title1">Số lượng</td>
                <td> <input type="text" name="quantity_product" placeholder="Nhập số lượng" value="<?php echo $row['quantity_product']?>"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh 1</td>
                <td> 
                    <input type="file" name="img_poster1">
                    <img src="module/product/uploads/<?php echo $row['img_poster1']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Ảnh 2</td>
                <td> 
                    <input type="file" name="img_poster2">
                    <img src="module/product/uploads/<?php echo $row['img_poster2']?>" width="150px">
                </td>
            </tr>
            <tr> <td class="btn" colspan="1"><input type="submit" value="Sửa" name="modifyProduct"></td> </tr>
            <?php } ?>
        </form>
    </table>
</div>