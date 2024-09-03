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
                        <option value="<?php echo $row_product['idProduct'] ?>"><?php echo $row_product['nameProduct'] ?></option>
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
                <td class="title1">Số lượng màu</td>
                <td>
                    <textarea name="descColorQuantity" id="descColorQuantity" cols="30" rows="1" oninput="updateColorFields()"></textarea>
                </td>
            </tr>
            <tbody id="colorFieldsContainer">
                <!-- Dynamic color fields will be generated here -->
            </tbody>
            <tr>
                <td class="title1">Ảnh bảng màu</td>
                <td> <input type="file" name="img_colorTable"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh thông tin</td>
                <td> <input type="file" name="img_inf"></td>
            </tr>
            <tr> 
                <td class="btn" colspan="1"><input type="submit" value="Thêm" name="addProductDetail"></td> 
            </tr>
        </form>
    </table>
</div>

<script>
function updateColorFields() {
    // Read the number of colors from the input
    const colorQuantity = parseInt(document.getElementById('descColorQuantity').value) || 0;
    const colorFieldsContainer = document.getElementById('colorFieldsContainer');
    colorFieldsContainer.innerHTML = '';  // Clear previous fields

    // Generate dynamic fields based on the number of colors
    for (let i = 1; i <= colorQuantity; i++) {
        // Create textareas for color descriptions
        let descColorRow = `
            <tr>
                <td class="title1">Mô tả màu ${i}</td>
                <td><textarea name="descColor${i}" cols="30" rows="3"></textarea></td>
            </tr>
        `;
        colorFieldsContainer.insertAdjacentHTML('beforeend', descColorRow);

        // Create file inputs for color images
        let imgColorRow = `
            <tr>
                <td class="title1">Ảnh màu ${i}</td>
                <td><input type="file" name="img_color${i}"></td>
            </tr>
        `;
        colorFieldsContainer.insertAdjacentHTML('beforeend', imgColorRow);

        // Create file inputs for hover images
        let imgHoverColorRow = `
            <tr>
                <td class="title1">Ảnh màu ${i} hover</td>
                <td><input type="file" name="img_hover_color${i}"></td>
            </tr>
        `;
        colorFieldsContainer.insertAdjacentHTML('beforeend', imgHoverColorRow);
    }
}
</script>
