<?php
    $sql_modify = "SELECT * FROM chitietsanpham WHERE idProduct = :idProduct LIMIT 1";
    $query_modify = $conn->prepare($sql_modify);
    $query_modify->bindParam(':idProduct', $_GET['idProduct']);
    $query_modify->execute();
?>
<div class="add-container">
    <h3 class="title">Sửa sản phẩm</h3>
    <table style="width: 90%;">
        <form method="POST" action="../../../project/admin/module/product_detail/handle.php?idProduct=<?php echo $_GET['idProduct'];?>" enctype="multipart/form-data">
            <?php  while ($row = $query_modify->fetch(PDO::FETCH_ASSOC)) { ?>    
            <tr>
                <td class="title1">Tên sản phẩm</td>
                <td> 
                    <select name="idProduct">
                        <?php 
                            $sql_product = "SELECT * FROM sanpham ORDER BY idProduct DESC";
                            $query_product = $conn->query($sql_product);
                            while ($row_product = $query_product->fetch(PDO::FETCH_ASSOC)) {   
                                if ($row_product['idProduct'] == $row['idProduct']) {                         
                        ?>
                            <option value="<?php echo $row_product['idProduct'] ?>" selected><?php echo $row_product['idProduct'] ?></option>
                            <?php } else {?>
                            <option value="<?php echo $row_product['idProduct'] ?>"><?php echo $row_product['idProduct'] ?></option>
                        <?php } 
                        }
                        ?>                       
                    </select>
                </td>
            </tr>
            <tr>
                <td class="title1">Mô tả tổng quan</td>
                <td><textarea name="describeProduct" cols="30" rows="3"><?php echo $row['describeProduct'] ?></textarea></td>
            </tr>
            <tr>
                <td class="title1">Mô tả chi tiết</td>
                <td><textarea name="descDetail" cols="30" rows="7"> <?php echo $row['descDetail'] ?> </textarea></td>
            </tr>
            <tr>
                <td class="title1">Thành phần </td>
                <td><textarea name="ingredient" cols="30" rows="5"> <?php echo $row['ingredient'] ?> </textarea></td>
            </tr>
            <tr>
                <td class="title1">Mô tả bảng màu</td>
                <td><textarea name="descColorTable" cols="30" rows="3"> <?php echo $row['descColorTable'] ?> </textarea></td>
            </tr>
            <tr>
                <td class="title1">Mô tả màu 1</td>
                <td><textarea name="descColor1" cols="30" rows="3"> <?php echo $row['descColor1'] ?> </textarea></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 1</td>
                <td>
                    <input type="file" name="img_color1">
                    <img src="module/product_detail/uploads/<?php echo $row['img_color1']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 1 hover</td>
                <td>
                    <input type="file" name="img_hover_color1">
                    <img src="module/product_detail/uploads/<?php echo $row['img_hover_color1']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Mô tả màu 2</td>
                <td><textarea name="descColor2" cols="30" rows="3"> <?php echo $row['descColor2'] ?> </textarea></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 2</td>
                <td>
                    <input type="file" name="img_color2">
                    <img src="module/product_detail/uploads/<?php echo $row['img_color2']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 2 hover</td>
                <td>
                    <input type="file" name="img_hover_color2">
                    <img src="module/product_detail/uploads/<?php echo $row['img_hover_color2']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Mô tả màu 3</td>
                <td><textarea name="descColor3" cols="30" rows="3"><?php echo $row['descColor3'] ?></textarea></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 3</td>
                <td>
                    <input type="file" name="img_color3">
                    <img src="module/product_detail/uploads/<?php echo $row['img_color3']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 3 hover</td>
                <td>
                    <input type="file" name="img_hover_color3">
                    <img src="module/product_detail/uploads/<?php echo $row['img_hover_color3']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Mô tả màu 4</td>
                <td><textarea name="descColor4" cols="30" rows="3"><?php echo $row['descColor4'] ?></textarea></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 4</td>
                <td>
                    <input type="file" name="img_color4">
                    <img src="module/product_detail/uploads/<?php echo $row['img_color4']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 4 hover</td>
                <td>
                    <input type="file" name="img_hover_color4">
                    <img src="module/product_detail/uploads/<?php echo $row['img_hover_color4']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Ảnh bảng màu</td>
                <td> 
                    <input type="file" name="img_colorTable">
                    <img src="module/product_detail/uploads/<?php echo $row['img_colorTable']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Ảnh thông tin</td>
                <td> 
                    <input type="file" name="img_inf">
                    <img src="module/product_detail/uploads/<?php echo $row['img_inf']?>" width="150px">
                </td>
            </tr>
            <tr>
                <td class="title1">Ảnh thành phần</td>
                <td> 
                    <input type="file" name="img_ingredient">
                    <img src="module/product_detail/uploads/<?php echo $row['img_ingredient']?>" width="150px">
                </td>
            </tr>
            <tr> 
                <td class="btn" colspan="1"><input type="submit" value="Sửa" name="modifyProductDetail"></td> 
            </tr>
            <?php } ?>
        </form>
    </table>
</div>