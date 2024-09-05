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