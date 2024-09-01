<div class="add-container">
    <h3 class="title">Thêm loại sản phẩm</h3>
    <table style="width: 90%;">
        <form method="POST" action="../../../project/admin/module/product/handle.php" enctype="multipart/form-data">
            <tr>
                <td class="title1">Mã sản phẩm</td>
                <td> <input type="text" name="idProduct" placeholder="Nhập mã sản phẩm"></td>
            </tr>
            <tr>
                <td class="title1">Tên sản phẩm</td>
                <td> <input type="text" name="nameProduct" placeholder="Nhập tên sản phẩm"></td>
            </tr>
            <tr>
                <td class="title1">Mã loại</td>
                <td> <input type="text" name="idType" placeholder="Nhập mã loại"></td>
            </tr>
            <tr>
                <td class="title1">Giá </td>
                <td> <input type="text" name="price" placeholder="Nhập giá"></td>
            </tr>
            <tr>
                <td class="title1">Giá đã giảm</td>
                <td> <input type="text" name="price" placeholder="Nhập giá"></td>
            </tr>
            <tr>
                <td class="title1">Số lượng</td>
                <td> <input type="text" name="quantity_product" placeholder="Nhập số lượng"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh 1</td>
                <td> <input type="file" name="img_poster1"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh 2</td>
                <td> <input type="file" name="img_poster2"></td>
            </tr>
            <!-- <tr>
                <td class="title1">Tình trạng</td>
                <td> 
                    <select name="status" id="">
                        <option value="1">Hiển thị</option>
                        <option value="2">Ẩn</option>
                    </select>
                </td>
            </tr> -->
            <tr> <td class="btn" colspan="1"><input type="submit" value="Thêm" name="addProduct"></td> </tr>
        </form>
    </table>
</div>