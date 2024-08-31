<div class="add-container">
    <h3 class="title">Thêm loại sản phẩm</h3>
    <table style="width: 90%;">
        <form method="POST" action="../../../project/admin/module/category/handle.php">
            <tr>
                <td class="title1">Mã loại</td>
                <td> <input type="text" name="idType" placeholder="Nhập mã loại"></td>
            </tr>
            <tr>
                <td class="title1">Tên loại</td>
                <td> <input type="text" name="nameType" placeholder="Nhập tên loại"></td>
            </tr>
            <tr>
                <td class="title1">Số lượng</td>
                <td> <input type="text" name="quantityType" placeholder="Nhập số lượng"></td>
            </tr>
            <tr> <td class="btn" colspan="1"><input type="submit" value="Thêm" name="addType"></td> </tr>
        </form>
    </table>
</div>