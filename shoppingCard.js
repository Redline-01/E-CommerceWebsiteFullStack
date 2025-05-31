if (!localStorage.getItem('cart')) {
    localStorage.setItem('cart', JSON.stringify([]));
}

let cart = []; 


function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

if (localStorage.getItem('cart')) {
    cart = JSON.parse(localStorage.getItem('cart'));
    updateCart();
    updateNotificationDot();
}

function toggleCart() {
    const cart = document.getElementById('shoppingCart');
    const overlay = document.getElementById('overlay');

    cart.classList.toggle('open');
    overlay.classList.toggle('active');
   
};

function updateTotal() {
    const cartItems = document.querySelectorAll('.cart-item');
    let total = 0;

    cartItems.forEach(item => {
        const quantity = item.querySelector('input').value;
        const price = item.querySelector('input').dataset.price;
        total += quantity * price;
    });

    document.getElementById('cartTotal').textContent = `Total: $${total.toFixed(2)}`;
};



function addToCart(productName, productPrice, productImage) {
    let existingProduct = cart.find(item => item.name === productName);

    if (existingProduct) {
        existingProduct.quantity++;
    } else {
        cart.push({
            name: productName,
            price: parseFloat(productPrice),
            quantity: 1,
            image: productImage 
        });
    }

    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `name=${encodeURIComponent(productName)}&price=${encodeURIComponent(productPrice)}`,
    })
   
    saveCart();
    updateCart();
    updateNotificationDot();
}

function updateCart() {
    const cartItemsContainer = document.querySelector('.cart-items');
    const cartTotal = document.getElementById('cartTotal');

    cartItemsContainer.innerHTML = '';

    if (cart.length === null || cart.length === 0) {
        cartItemsContainer.innerHTML = '<p id="cartempty">Your cart is empty</p>';
        cartTotal.innerHTML = 'Total: $0.00';
        return;
    }

    let total = 0;
    cart.forEach((item, idx) => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        cartItemsContainer.innerHTML += `
            <div class="cart-item" style="display:flex;align-items:center;gap:18px;margin-bottom:15px;">
                <img src="${item.image || 'images/hyperx.png'}" class="cart-item-image" style="width:54px;height:54px;object-fit:cover;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.08);margin-right:8px;" onerror="this.onerror=null;this.src='images/hyperx.png';">
                <span class="cart-item-title" style="font-weight:600;font-size:1.08rem;min-width:110px;max-width:140px;white-space:normal;word-break:break-word;overflow-wrap:break-word;">${item.name}</span>
                <span class="cart-item-price" style="color:#333030;font-weight:500;min-width:60px;">&euro;${item.price.toFixed(2)}</span>
                <input type="number" value="${item.quantity}" min="1" data-name="${item.name}" data-price="${item.price}" onchange="updateQuantity(event)" style="width:48px;text-align:center;margin-left:8px;margin-right:8px;">
                <button class="removebtn" onclick="deleteItem(event, ${idx})" style="margin-left:8px;">X</button>
            </div>
        `;
    });
    cartTotal.innerHTML = `Total: &euro;${total.toFixed(2)}`;
};

function deleteItem(event, index) {
    event.preventDefault();
    event.stopPropagation();
    cart.splice(index, 1);

    saveCart();
    updateCart();
    updateNotificationDot();
  
}




function updateQuantity(event) {
    const input = event.target;
    const productName = input.dataset.name;
    const newQuantity = parseInt(input.value);

    
    let product = cart.find(item => item.name === productName);
    if (product) {
        product.quantity = newQuantity;
        updateCart();
        updateNotificationDot();
    }

    saveCart();
};

function updateNotificationDot() {
    const notificationDot = document.getElementById('notification-dot');
    
    
    const totalItems = cart.reduce((acc, item) => acc + item.quantity, 0);

    
    if (totalItems > 0) {
        notificationDot.style.display = 'block'; 
        notificationDot.textContent = totalItems; 
    } else {
        notificationDot.style.display = 'none'; 
    }
};

document.addEventListener('click', function(event) {
    const cart = document.getElementById('shoppingCart');
    const cartButton = document.getElementById('cartbutton');
    const overlay = document.getElementById('overlay');

    
    if (!cart.contains(event.target) && !cartButton.contains(event.target)) {
        cart.classList.remove('open');
        overlay.classList.remove('active');
    }
});



// const myDiv = document.getElementById('cartbutton');
//   const divOffsetTop = myDiv.offsetTop; 

//   window.addEventListener('scroll', () => {
//     if (window.scrollY >= divOffsetTop) {
//       myDiv.classList.add('fixed'); 
//     } else {
//       myDiv.classList.remove('fixed');
//     }
//   });


