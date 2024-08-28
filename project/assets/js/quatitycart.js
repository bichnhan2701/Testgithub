
function formatCurrency(value) {
    console.log(value)
    return value.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
}

function changeQuantity(button, amount){
    const quantityInput = button.parentElement.querySelector('.quantity');
    var currentQuantity = parseInt(quantityInput.value);
    
    currentQuantity+=amount;
    if (currentQuantity < 1) {
        currentQuantity=1;   
    }
    quantityInput.value=currentQuantity;
    updateTotalPrice();
}

function updateTotalPrice(){
    const quantityProducts = document.querySelectorAll('.quantity-product');
    var subtotal = 0;
    
    var price=parseInt(document.querySelector('.price').getAttribute('data-price'));
    quantityProducts.forEach(product => {
        const quantity = parseInt(product.querySelector('.quantity').value);
        subtotal += quantity * price;
    });
    console.log(formatCurrency(subtotal))
    document.getElementById('subtotal').innerText = formatCurrency(subtotal);
    document.getElementById('total').innerText = formatCurrency(subtotal);
}

updateTotalPrice();
