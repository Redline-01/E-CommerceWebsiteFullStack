function toggleCart() {
    const cart = document.getElementById('shoppingCart');
    cart.classList.toggle('open');
}

function updateTotal() {
    const cartItems = document.querySelectorAll('.cart-item');
    let total = 0;

    cartItems.forEach(item => {
        const quantity = item.querySelector('input').value;
        const price = item.querySelector('input').dataset.price;
        total += quantity * price;
    });

    document.getElementById('cartTotal').textContent = `Total: $${total.toFixed(2)}`;
}

let cart = []; 


function addToCart(productName, productPrice) {

    let existingProduct = cart.find(item => item.name === productName);

    if (existingProduct) {
    
        existingProduct.quantity++;
    } else {
        
        cart.push({
            name: productName,
            price: parseFloat(productPrice),
            quantity: 1
        });
    }

    updateCart();
}


function updateCart() {
    const cartItemsContainer = document.querySelector('.cart-items');
    const cartTotal = document.getElementById('cartTotal');

  
    cartItemsContainer.innerHTML = '';


    let total = 0;
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        cartItemsContainer.innerHTML += `
            <div class="cart-item">
                <span>${item.name}</span>
                <span>$${item.price.toFixed(2)}</span>
                <input type="number" value="${item.quantity}" min="1" data-name="${item.name}" data-price="${item.price}" onchange="updateQuantity(event)">
            </div>
        `;
    });

    
    cartTotal.textContent = `Total: $${total.toFixed(2)}`;
}


function updateQuantity(event) {
    const input = event.target;
    const productName = input.dataset.name;
    const newQuantity = parseInt(input.value);

    
    let product = cart.find(item => item.name === productName);
    if (product) {
        product.quantity = newQuantity;
        updateCart();
    }
}