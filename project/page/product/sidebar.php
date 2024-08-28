<div class="container">
    <div class="product-showcase">
        <h2 class="title">Lọc sản phẩm</h2>

        <div class="showcase-wrapper">
            <h4 class="cap">Loại</h4>

            <div class="ct"> 
                <label><input type="checkbox" class="loai" value="1">Son thỏi</label>
                <label><input type="checkbox" class="loai" value="2">Son kem</label>
                <label><input type="checkbox" class="loai" value="3">Son tint</label>
                <label><input type="checkbox" class="loai" value="4">Son bóng</label>
                <label><input type="checkbox" class="loai" value="5">Son dưỡng</label>
            </div>
        </div>

        <div class="showcase-wrapper">
            <h4 class="cap">Giá bán</h4>

            <div class="ct"> 
                <label><input type="checkbox" class="giaban" value="1">Dưới 5 triệu</label>
                <label><input type="checkbox" class="giaban" value="2">Từ 5 đến 10 triệu</label>
                <label><input type="checkbox" class="giaban" value="3">Từ 10 đến 15 triệu</label>
                <label><input type="checkbox" class="giaban" value="4">Trên 15 triệu</label>
            </div>
        </div>

        <button id="filterButton">Lọc</button>
    </div>
</div>

<script>
    document.getElementById('filterButton').addEventListener('click', function() {
        const selectedTypes = Array.from(document.querySelectorAll('.loai:checked')).map(cb => cb.value);
        const selectedPrices = Array.from(document.querySelectorAll('.giaban:checked')).map(cb => cb.value);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'filter.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.querySelector('.product-grid').innerHTML = xhr.responseText;
            }
        };

        xhr.send(`types=${selectedTypes.join(',')}&prices=${selectedPrices.join(',')}`);
    });
</script>
