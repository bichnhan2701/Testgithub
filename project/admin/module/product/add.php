<div class="add-container">
    <h3 class="title">Thêm loại sản phẩm</h3>
    <table style="width: 90%;">
        <form method="POST" action="../../../project/admin/module/product/handle.php">
            <tr>
                <td class="title1">Mã sản phẩm</td>
                <td> <input type="text" name="id" placeholder="Nhập mã sản phẩm"></td>
            </tr>
            <tr>
                <td class="title1">Tên sản phẩm</td>
                <td> <input type="text" name="name" placeholder="Nhập tên sản phẩm"></td>
            </tr>
            <tr>
                <td class="title1">Mã loại</td>
                <td> <input type="text" name="idType" placeholder="Nhập mã loại"></td>
            </tr>
            <tr>
                <td class="title1">Tên loại</td>
                <td> <input type="text" name="nameType" placeholder="Nhập tên loại"></td>
            </tr>
            <tr>
                <td class="title1">Giá</td>
                <td> <input type="text" name="price" placeholder="Nhập giá"></td>
            </tr>
            <tr>
                <td class="title1">Số lượng</td>
                <td> <input type="text" name="quantity-product" placeholder="Nhập số lượng"></td>
            </tr>
            <tr>
                <td class="title1">Mô tả tổng quan</td>
                <td> 
                    <textarea rows="5" name="describe" id="">

                    </textarea>
                </td>
            </tr>
            <tr>
                <td class="title1">Mô tả chi tiết</td>
                <td> 
                    <textarea rows="5" name="desc-detail" id="">

                    </textarea>
                </td>
            </tr>
            <tr>
                <td class="title1">Ảnh 1</td>
                <td> <input type="file" name="img-poster1"></td>
            </tr>
            <tr>
                <td class="title1">Ảnh 2</td>
                <td> <input type="file" name="img-poster2"></td>
            </tr>
            <!-- <tr>
                <td class="title1">Tình trạng</td>
                <td> 
                    <select name="" id="">
                        <option value="">Hiển thị</option>
                        <option value="">Ẩn</option>
                    </select>
                </td>
            </tr> -->
            <tr> <td class="btn" colspan="1"><input type="submit" value="Thêm" name="addType"></td> </tr>
        </form>
    </table>
</div>