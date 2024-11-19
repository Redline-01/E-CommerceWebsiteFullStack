 
 var modal = document.getElementById("myModal");

 
 var span = document.getElementsByClassName("close")[0];

 
 var buyButtons = document.querySelectorAll("#buybtn");
 buyButtons.forEach(function(btn) {
     btn.addEventListener("click", function() {
         
         var productName = this.parentNode.querySelector(".product-name").textContent;
         var productPrice = this.parentNode.querySelector(".price").textContent;
         var checkoutInfo = document.getElementById("checkoutInfo");
         checkoutInfo.innerHTML = "<h2>Checkout</h2><p>Product: " + productName + "</p><p>Price: " + productPrice + "</p>";
         
         modal.style.display = "block";
     });
 });

 
 span.onclick = function() {
     modal.style.display = "none";
 };

 
 window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
     }
 };

 
/*
 const openShopping = document.querySelector(".shopping");
 const closeShopping = document.querySelector(".closeShopping");
 const list = document.querySelector(".list");
 const listCard = document.querySelector("listCard");
 const total = document.querySelector(".total");
 const body = document.querySelector("body");
 const quantity = document.querySelector(".quantity");


 openShopping.addEventListener("click", () => {
    body.classList.add("item")
 })
 closeShopping.addEventListener("click", () =>{
    body.classList.remove("active")
 })

 let products = [
    {
        id: 1,
        name :"HyperX Cloud Red II Headset",
        images:"images/images/hyperxcloud2red.webp",
        price:"&euro; 99.99"

    },
]

let listCards = [];

const initApp = () => {
    products.forEach((value, key) => {
        let newDiv = document.createElement("div");
        newDiv.classList.add("item");
        newDiv.innerHTML = `
          <img src ="img/${value.images}">
          <div class="title">${value.name}</div>
          <div class="price">${value.price.toLocaleString()}</div>
          <button onclick="addToCard(${key})"Add To Card</button>
        `
        list.appendChild(newDiv)
    })
}
initApp()


const addToCard = (key) => {
    if(listCards[key] == null){
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1
    }

    reloadCard();
}
const reloadCard = () => {
    listCard.innerHTML = "";
    let count = 0;
    let totalPrice = 0;

    listCards.forEach((value, key) => {
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;

        if(value != null){
            let newDiv = document.createElement("li");
            newDiv.innerHTML = `
            <div><img src="img/${value,image}"></div>
            <div class="cardTitle">${value.name}</div>
            <div class="cardPrice">${value.price.toLocaleString()}</div

            <div>
                <button style="background-color: #cc6600"
                class="cardButton" onclick = "changeQuantity(${key},
                ${value.quantity - 1})">-</button>
                <div class ="count">${count}</div
                <button style="background-color: #cc6600"
                class="cardButton" onclick = "changeQuantity(${key},
                ${value.quantity + 1})">+</button>
            </div
            
            `
            listCard.appendChild(newDiv);
        }

        total.innerText = totalPrice.toLocaleString();
        quantity.innerText = count;
    })
}

const changeQuantity = (key, quantity) => {
    if(quantity == 0){
        delete listCards[key]
    }
    else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price
    }

    reloadCard()

}

 */