<?php 
include_once('config.php');

if (empty($_SESSION['username'])) {
    header("Location: login.php");
}

// Initialize empty cart array for PHP fallback
$cartItems = [];
$totalPrice = 0;
?>

<script>
// Pass the current cart from localStorage to PHP
const cartFromStorage = JSON.parse(localStorage.getItem('cart')) || [];
document.cookie = "cartData=" + JSON.stringify(cartFromStorage) + "; path=/";
</script>

<?php
// check for the cookie data
if(isset($_COOKIE['cartData'])) {
    $cartItems = json_decode($_COOKIE['cartData'], true);
    foreach ($cartItems as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }
}
?>
 
 <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="images/hyperxfavicon.jpg">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kalnia">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Afacad">
	<link rel="stylesheet" href="CSS/style2.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"
>
<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Checkout</title>
	<style>
		#cartbutton {
	position: fixed;
	top: 145px;
	right: 15px;
    cursor: pointer;
    z-index: 1;
        }
		/* .fixed {
      position: fixed;
      top: 0;
      left: 0;
    } */
		.cart-button{
	   padding: 10px 20px;
       cursor: pointer;
       background-color: white;
       color: white;
       border: none;
       border-radius: 50px;
	   box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

		}
		.cart-button:hover{
			background-color: #f8f9fa;
		}

        .shopping-cart {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100%;
            background-color: #f8f9fa;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
            overflow-y: auto;
            transition: right 0.3s ease;
            z-index: 9999;
        }

        .shopping-cart.open {
            right: 0;
        }

        .shopping-cart-header {
            padding: 20px;
            background-color: #333030;
            color: white;
            font-size: 20px;
            text-align: center;
        }

        .cart-items {
            padding: 20px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .cart-item span {
            font-size: 16px;
        }

        .cart-item input {
            width: 63px;
            margin-left: 10px;
            text-align: center;
        }

        .cart-total {
            padding: 20px;
            border-top: 1px solid #ddd;
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }

        .continue-button {
            display: block;
            width: 95%;
            margin: 20px auto;
            padding: 10px;
            background-color: #333030;
            color: white;
            text-align: center;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
        }

        .close-cart {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
			color: white;
        }
		#notification-dot {
    position: absolute;
    top: -5px;
    right: -5px;
    width: 15px;
    height: 15px;
    background-color: red;
    color: white;
    font-size: 10px;
    font-weight: bold;
    border-radius: 50%;
    display: none; 
    text-align: center;
    line-height: 15px;
    z-index: 2;
} 

#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); 
    z-index: 9; 
    display: none; 
}
#overlay.active{
	display: block;
}
#cardempty{
	text-align: center;
}
.removebtn{
	background-color: #f8f9fa;
	color: red;
	border: 1px solid #f8f9fa;
	padding: 5px 10px;
	cursor: pointer;
	border-radius: 50px;
	font-size: 16px;
	margin-left: 10px;
	font-weight: bold;	
	box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.removebtn:hover{
	background-color: red;
	color: white;
	border: 1px solid red;
}

	</style>
    </head>
<body>
	<section id="section-1">
		<div class="header">
			<header>
				<a href="project.php"><img src="images/hyperx.png" width="200px" height="100px"></a>
				<div class="hamburger">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</div>
				<nav>
					<ul>
						<li id="usernameDB"><a href="dashboard.php"> <?php echo "Welcome, ".$_SESSION['username']; ?> </a></li>
						<div id="verline"></div>
						<li class="active"><a href="project.php">Home</a></li>
					<!--	<li><a href="products.php">Products</a></li>  -->
						<li><a href="shop.php">Shop</a></li>
						<li><a href="#section-footer">About</a></li>
						<li><a href="logout.php">Logout</a></li>
						<li><a href="#section-footer">Contact</a>
						
					    
						<ul class="dropdown">
							<li><a href="https://www.facebook.com/hyperxcommunity" target="_blank"><i class='bx bxl-facebook-circle' style='color:#316ff6'></i> Facebook</a></li>
							<li><a href="https://www.instagram.com/hyperx/" target="_blank"><i class='bx bxl-instagram '></i> Instagram</a></li>
							<li><a href="https://twitter.com/HyperX" target="_blank"><i class='bx bxl-twitter bx-tada' style='color:#1da1f2'></i> Twitter</a></li>
							<li><a href="https://www.youtube.com/@hyperx" target="_blank"><i class='bx bxl-youtube' style='color:#ff0000'  ></i> Youtube</a></li>
						</li>

						</ul>
					</ul>
				</nav>
        </div>
			
			</header>
			<script>
				hamburger = document.querySelector(".hamburger")
				hamburger.onclick = function() {
					nav = document.querySelector("nav");
					nav.classList.toggle("active");
				}
	
	
			</script>

	</section>

	<div id="overlay"></div>
<div class="shopping-cart" id="shoppingCart">
	<button class="close-cart" onclick="toggleCart()">&times;</button>
	<div class="shopping-cart-header">Your Cart</div>
	<div class="cart-items">
		<div class="cart-item">
			
			
		</div>
	</div>
	<div class="cart-total" id="cartTotal">Total: </div>
	<a href="checkout.php" class="continue-button">Continue to Checkout</a>
</div>


    <div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="images/hyperx.png" alt="" width="200" height="100">
        <h2>Checkout</h2>
    </div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
		<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">Your cart</span>
    <span class="badge badge-secondary badge-pill" style="color: black;" id="cartCount"><?= count($cartItems) ?></span>
</h4>
<ul class="list-group mb-3 sticky-top" id="cartList">
    <?php foreach ($cartItems as $item): ?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0"><?= htmlspecialchars($item['name']) ?></h6>
                <small class="text-muted">Quantity: <?= $item['quantity'] ?></small>
            </div>
            <span class="text-muted">€<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
        </li>
    <?php endforeach; ?>
    <li class="list-group-item d-flex justify-content-between">
        <span>Total (EUR)</span>
        <strong name="price">€<?= number_format($totalPrice, 2) ?></strong>
    </li>
</ul>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate="" action="checkoutInfo.php" method="POST">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Full name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="" name="client">
                        <div class="invalid-feedback"> Valid full name is required. </div>
                    </div>
                   
                </div>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="client" name="client" value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>" readonly required>
                        <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" required="">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                        <div class="invalid-feedback"> Please enter your country. </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                        <div class="invalid-feedback"> Please provide a valid city. </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required name="zip">
                        <div class="invalid-feedback"> Zip code required. </div>
                    </div>
                      <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" name="address">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
                </div>
                <hr class="mb-4">
                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback"> Name on card is required </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                        <div class="invalid-feedback"> Credit card number is required </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                        <div class="invalid-feedback"> Expiration date required </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                        <div class="invalid-feedback"> Security code required </div>
                    </div>
                </div>
                <input type="hidden" name="cart_data" id="cartDataInput">
<script>
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('cartDataInput').value = localStorage.getItem('cart');
    });
</script>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Finish Order</button>
            </form>
        </div>
    </div>










    <section id="section-footer" class="footer">
	<div class="footer-content">
		<img src="images/hyperx.png">
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        <p>&copy; 2024 HyperX. All rights reserved.</p>
		
		<div class="icons">
			<a href="https://www.facebook.com/hyperxcommunity" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
			<a href="https://www.instagram.com/hyperx/" target="_blank"><i class='bx bxl-instagram-alt' ></i></a>
			<a href="https://twitter.com/HyperX" target="_blank"><i class='bx bxl-twitter' ></i></a>
			<a href="https://www.youtube.com/@hyperx" target="_blank"><i class='bx bxl-youtube' ></i></a>
		</div>
	</div>

	<div class="footer-content">
		<h4>Main</h4>
		<li><a href="project.php">Home</a></li>
		<li><a href="products.php">Products</a></li>
		<li><a href="shop.php">Shop</a></li>
		<li><a href="#">Contact</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
	</div>

	<div class="footer-content">
		<h4>Products</h4>
		<li><a href="shop.php">HyperX Mouse</a></li>
		<li><a href="shop.php">HyperX Keyboard</a></li>
		<li><a href="shop.php">HyperX Headset</a></li>
		<li><a href="shop.php">HyperX Monitor</a></li>
	</div>

	<div class="footer-content">
	        <h4>Login/Sign Up</h4>
			<li><a href="login.php">Login</a></li>
			<li><a href="signup.php">Sign up</a></li>

		
	</div>
</section>




<form action="clientMessages3.php" method="POST">
<div class="chat-box" id="chat-box">
	<div class="chat-icon" onclick="toggleChat()">
	  <img src="images/chatbox.webp" alt="Chat Icon">
	</div>
	<div class="chat-window" id="chat-window">
	  <div class="header">Welcome to our support center! Do you need assistance with anything? Our team is here to help you resolve any issues or answer any questions you may have. Feel free to reach out to us and we'll do our best to assist you promptly. Your satisfaction is our top priority!</div>
	  
	  <div class="email-info">
		<input type="email" id="email" placeholder="Your Email" name="email">
	  </div>
	  <div class="problem-box">
		<textarea id="message" placeholder="Describe your problem here..." name="message" style="height:90px;"></textarea>
	  </div>
	  <button id="sendbtn" name="submit">Send</button>
	</div>
  </div>
</form>




<!-- Toaster Notification -->
<div id="toaster" style="display:none;position:fixed;left:50%;bottom:40px;transform:translateX(-50%);background:linear-gradient(90deg,#23272f 0%,#444950 100%);color:#fff;padding:18px 38px;border-radius:32px;box-shadow:0 4px 24px rgba(34,39,47,0.13);font-size:1.1rem;font-weight:600;z-index:2000;transition:opacity 0.4s;opacity:0;pointer-events:none;letter-spacing:0.2px;text-align:center;">Order has been placed successfully!</div>
<script>
function showToaster(message) {
  var toaster = document.getElementById('toaster');
  toaster.textContent = message || 'Order has been placed successfully!';
  toaster.style.display = 'block';
  setTimeout(function() { toaster.style.opacity = '1'; }, 10);
  setTimeout(function() {
    toaster.style.opacity = '0';
    setTimeout(function() { toaster.style.display = 'none'; }, 400);
  }, 1800);
}
</script>

<script>
function updateCheckoutCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartList = document.getElementById('cartList');
    const cartCount = document.getElementById('cartCount');
    const itemCount = cart.reduce((total, item) => total + item.quantity, 0);
    cartCount.textContent = itemCount;
    
    cartList.innerHTML = '';
    let totalPrice = 0;
    if (cart.length === 0) {
        cartList.innerHTML += '<li class="list-group-item">Your cart is empty</li>';
    }
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        totalPrice += itemTotal;
        cartList.innerHTML += `
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">${item.name}</h6>
                    <small class="text-muted">Quantity: ${item.quantity}</small>
                </div>
                <span class="text-muted">€${itemTotal.toFixed(2)}</span>
            </li>
        `;
    });
    // Always add the total row
    cartList.innerHTML += `
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (EUR)</span>
            <strong name="price">€${totalPrice.toFixed(2)}</strong>
        </li>
    `;
    // Update hidden form field for submission
    document.querySelector('input[name="cart_data"]').value = JSON.stringify(cart);
}

// Run on page load and set up event listener
document.addEventListener('DOMContentLoaded', function() {
    updateCheckoutCart();
    
    // Listen for storage events (changes from other tabs/windows)
    window.addEventListener('storage', function(e) {
        if (e.key === 'cart') {
            updateCheckoutCart();
        }
    });
});
</script>

</body>

<script src="main.js"></script>
<script src="shoppingCard.js"></script>
<script src="checkout.js"></script>
</html>