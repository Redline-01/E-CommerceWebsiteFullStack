function searchProducts() {
    const query = document.getElementById('searchInput').value.toLowerCase(); 
    const products = document.querySelectorAll('.buyShop'); 

    products.forEach(product => {
        const productName = product.getAttribute('data-name').toLowerCase();
        if (productName.includes(query)) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    });
}