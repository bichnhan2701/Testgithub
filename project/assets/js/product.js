
let listProductHTML = document.querySelector('.listProduct');

let listProducts = [];

const addDataToHTML = () => {
    listProductHTML.innerHTML = '';
    if (listProducts.length > 0) {
        listProducts.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('item');
            newProduct.innerHTML = `
                <div class="showcase" id="thoi thoi-lip1">
            
                    <div class="showcase-banner">
    
                        <img src="${product.image}" width="300" class="product-img default">
                        <img src="../assets/images/products/sonthoi/thoi1/thoi-lip1-color-3-3.jpeg" alt="Son Thỏi 3CE Blur Matte Lipstick" width="300" class="product-img hover">
    
                        <p class="showcase-badge">15%</p>
    
                        <div class="showcase-actions">
    
                            <button class="btn-action">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                
                        </div>
    
                    </div>

                    <div class="showcase-content">
    
                        <a href="#" class="showcase-category">son thỏi</a>
    
                        <a href="../page/product-detail-sonthoi-lip1.html">
                            <h3 class="showcase-title">${product.name}</h3>
                        </a>
    
                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                        </div>
    
                        <div class="price-box">
                            <p class="price">${product.price}</p>
                            <del>$200.00</del>
                        </div>
    
                    </div>

                </div>
            `;
            listProductHTML.appendChild(newProduct);
        })
    }
}

listProductHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if (positionClick.classList.contains('btn-action')) {
        alert('1');
    }
})

const initApp = () => {
    fetch('product.json')
    .then(response => response.json())
    .then(data => {
        listProducts = data;
        addDataToHTML();
    })
}

initApp();