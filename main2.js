 
//  var modal = document.getElementById("myModal");

 
//  var span = document.getElementsByClassName("close")[0];

 
//  var buyButtons = document.querySelectorAll("#buybtn");
//  buyButtons.forEach(function(btn) {
//      btn.addEventListener("click", function() {
         
//          var productName = this.parentNode.querySelector(".product-name").textContent;
//          var productPrice = this.parentNode.querySelector(".price").textContent;
//          var checkoutInfo = document.getElementById("checkoutInfo");
//          checkoutInfo.innerHTML = "<h2>Checkout</h2><p>Product: " + productName + "</p><p>Price: " + productPrice + "</p>";
         
//          modal.style.display = "block";
//      });
//  });

 
//  span.onclick = function() {
//      modal.style.display = "none";
//  };

 
//  window.onclick = function(event) {
//      if (event.target == modal) {
//          modal.style.display = "none";
//      }
//  };

function openFavoriteModal(productName) {
    document.getElementById("favoriteTitle").textContent = 'Your product has been added to favourites successfully!'
    document.getElementById("favoriteMessage").textContent = `"${productName}" has been added to favorites!`;
  
    document.getElementById("favoriteModal").style.display = "block";
  }

  document.querySelector(".close").onclick = function() {
    document.getElementById("favoriteModal").style.display = "none";
  }
  
  window.onclick = function(event) {
    if (event.target === document.getElementById("favoriteModal")) {
      document.getElementById("favoriteModal").style.display = "none";
    }
  }

 
