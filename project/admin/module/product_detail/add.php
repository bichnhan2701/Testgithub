<div class="add-container">
    <h3 class="title">Thêm sản phẩm</h3>
    <table style="width: 90%;">
        <form method="POST" action="../../../project/admin/module/product_detail/handle.php" enctype="multipart/form-data">
            <tr>
                <td class="title1">Tên sản phẩm</td>
                <td> 
                    <select name="idProduct">
                        <?php 
                            $sql_product = "SELECT * FROM sanpham ORDER BY idProduct DESC";
                            $query_product = $conn->query($sql_product);
                            while ($row_product = $query_product->fetch(PDO::FETCH_ASSOC)) {                            
                        ?>
                        <option value="<?php echo $row_product['idProduct'] ?>"><?php echo $row_product['idProduct'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="title1">Mô tả tổng quan</td>
                <td><textarea name="describeProduct" cols="30" rows="3"></textarea></td>
            </tr>
            <tr>
                <td class="title1">Mô tả chi tiết</td>
                <td><textarea name="descDetail" cols="30" rows="7"></textarea></td>
            </tr>
            <tr>
                <td class="title1">Thành phần </td>
                <td><textarea name="ingredient" cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
                <td class="title1">Mô tả bảng màu</td>
                <td><textarea name="descColorTable" cols="30" rows="3"></textarea></td>
            </tr>
            <tr>
                <td class="title1">Mô tả màu 1</td>
                <td><textarea name="descColor1" cols="30" rows="3"></textarea></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 1</td>
                <td><input type="file" name="img_color1"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 1 hover</td>
                <td><input type="file" name="img_hover_color1"></td>
            </tr>
            <tr>
                <td class="title1">Mô tả màu 2</td>
                <td><textarea name="descColor2" cols="30" rows="3"></textarea></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 2</td>
                <td><input type="file" name="img_color2"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 2 hover</td>
                <td><input type="file" name="img_hover_color2"></td>
            </tr>
            <tr>
                <td class="title1">Mô tả màu 3</td>
                <td><textarea name="descColor3" cols="30" rows="3"></textarea></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 3</td>
                <td><input type="file" name="img_color3"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 3 hover</td>
                <td><input type="file" name="img_hover_color3"></td>
            </tr>
            <tr>
                <td class="title1">Mô tả màu 4</td>
                <td><textarea name="descColor4" cols="30" rows="3"></textarea></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 4</td>
                <td><input type="file" name="img_color4"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh màu 4 hover</td>
                <td><input type="file" name="img_hover_color4"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh bảng màu</td>
                <td> <input type="file" name="img_colorTable"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh thông tin</td>
                <td> <input type="file" name="img_inf"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh thành phần</td>
                <td> <input type="file" name="img_ingredient"></td>
            </tr>
            <tr> 
                <td class="btn" colspan="1"><input type="submit" value="Thêm" name="addProductDetail"></td> 
            </tr>
        </form>
    </table>
</div>