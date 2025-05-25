<?php 

   include_once('config.php');

    if (empty($_SESSION['username'])) {
          header("Location: login.php");
    }
   
    // Pagination setup
    $productsPerPage = 9;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $productsPerPage;

    // Get total product count
    $countSql = "SELECT COUNT(*) FROM shopproducts";
    $countStmt = $conn->prepare($countSql);
    $countStmt->execute();
    $totalProducts = $countStmt->fetchColumn();
    $totalPages = ceil($totalProducts / $productsPerPage);

    // Fetch paginated products
    $sql_1 = "SELECT * FROM shopproducts LIMIT :limit OFFSET :offset";
    $selectProducts = $conn->prepare($sql_1);
    $selectProducts->bindValue(':limit', $productsPerPage, PDO::PARAM_INT);
    $selectProducts->bindValue(':offset', $offset, PDO::PARAM_INT);
    $selectProducts->execute();
    $products_data = $selectProducts->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
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
    <title>Shop</title>
	<style>
		.modal {
  display: none; 
  position: fixed; 
  z-index: 1000; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgba(0, 0, 0, 0.5); 
}


.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 600px;
  position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%); 

}


.close {
  color: #888;
  float: right;
  font-size: 28px;
  font-weight: bold;
  width: 30px;
  height: 40px;

}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
  
}
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
					    <li id="usernameDB"><a href="dashboard.php"> <?php echo "Welcome ".$_SESSION['username']; ?> </a></li>
					    <div id="verline"></div>
						<li><a href="project.php">Home</a></li>
						<!-- <li><a href="products.php">Products</a></li> -->
						<li class="active"><a href="shop.php">Shop</a></li>
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

    <section id="shopList">
	
	<div id="cartbutton">
	<button class="cart-button" onclick="toggleCart()"><span id="notification-dot"></span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAbNJREFUWEftlzsyREEUhr+pwioESEgkNoBEagskZFZAoViBbCRYglTCCiQSEo8qq0AVc1Rf1bfv9POeuSaYTibo7nO++f/Tp/v2GLPRGzMeJkAxR1yFDp0NV8BrLIjmvAv0PST4EXCsmTQUKwVI9m8Dl11AhSybG9i1ZSDugPX/ALJzCtDtQBn5lTHfRT3Fjv2FpVIntRQDWjMqVcoJlOZ4A6Qc/k5yDEiSv1i2acJUsWr1mQIkvUlbGfuPiTpSn78jBWjUKtVqMxXILm5t22qnNxXILW4tqJpdOZaNyrZGK0lVSICka4t1mqORPwdIWyW5G+WOrI1cIM0WMPTCzgVy77dS+xrFnNuH7MQaLcB7L+YqJGAaLcD7cigBalvcXrty+5BtW5viDj5jShWqrFvNrGp5bgSfwm2AMlnSlrcB6pvG9gzsATeelBvAGbBgOv1uCK0UyL1GnoAlT6JHYNGaC37BlALtAydWkk9gxgP0AUxbcwfAqU+lUqBl4H4QeMoEPgd8Voi1O2bdF7ACPGgDSTyB2gTeYyfHvBRmgesQTJs+lHZkClaVWlaQKm3LBCim0w9/s0MlLyUdKwAAAABJRU5ErkJggg=="/></button>
    
</div>

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



	<div class="search-container">
        <input type="text" id="searchInput" placeholder="Search products..." onkeyup="searchProducts()">
    </div>

	<?php 
	$productCount = 0;
	foreach ($products_data as $product_data) {
		$price = floatval($product_data['price']);
		$productCount++;
		?>
		  
		<div class="buyShop" name="buyProduct" data-name="<?php echo strtolower($product_data['nameProducts']); ?>">

           <div class="product-box">

			<img src="images/<?php  echo $product_data['imageProducts']; ?>" width="300px" height="300px" class="product-image">
			<h3 class="product-name"><?php echo $product_data['nameProducts']; ?></h3>
			<button id="buybtn" onclick="addToCart('<?php echo addslashes($product_data['nameProducts']); ?>', '<?php echo $product_data['price']; ?>')">
            <img class="img-shop" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAe1JREFUWEftlz0yhEEQhp+twikESEgkLoBE6gokZE5AoTiBjARHkEpwAYmExE+VU6CKfdV8W1OzO9Mzsz+1wXYimJ7uZ/vt6f60GDNrjRkPEyBLkbBCh8GFa+DdCjLI8xDot0fwI+B4kElTsXKAdH8buBoFVEqyubZcWw7iHljPAFoDVp3fA6B7RZZ6ZQK6a1dGf2XzGf2kHpTEsiqprWd/6VUpJ8HQgSSBqtSYVaWhAwnkzZPNau6RAPlJwubuNSZKXnWXr9VDzQW/Sr5stUDR15gL5De35pGkk9UC+fc0TjrjIRcot7lzesj30VpSxTuWCxQ2d2wE5AAlR0kJkKa2gsn0y1TqcPFaQBqy6sfGuvKXAOWMAAsoKZcSlAKlRoDiWbvMnGmlQDX7rZHHl6urmaMapqaaOyvdb01IS85/v9IKNbL4+63Z7tZv8f2iO7EGKGxuCyQ8j8pVWyHd88tfCpT8jKmtUPiicqE+rE/hfoByIYr8+gE6d0v2FdgDbiOZN4AzYMFN+t0UYS2Qv0YU/wVYiiR6Bha9s+RHXi3QPnDiJfkGZiJAX8C0d3YAnMaqVAu0DDy2A0+5wBdATApJu+P8foAV4GnQQIonqE3g03o57j+XWeAmBdPPHCp6OSXOtZKV5CjynQBZ5foDkI1sJb53g8kAAAAASUVORK5CYII="/> Add to Cart
        </button>
		<h3 class="price">&euro; <?php echo number_format($price, 2); ?></h3>
			<div class="heart-icon"><img src="images/heart.png" width="40px" height="40px" class="heart-img"  onclick="openFavoriteModal('<?php echo addslashes($product_data['nameProducts']); ?>')"></div>
		   </div>
        
        </div>

        <?php 
        // Show pagination at the end of the page (after last product on this page)
        if ($productCount == count($products_data) && $totalPages > 1) {
            ?>
            <div style="width:100%; text-align:center; margin:30px 0;">
                <div style="display:inline-flex; justify-content:center; align-items:center; gap:4px; flex-wrap:wrap;">
                <?php if ($page > 1): ?>
                    <a href="shop.php?page=<?= $page - 1 ?>" style="display:inline-block; padding:8px 16px; border-radius:4px; background:#f8f9fa; color:#333; text-decoration:none; font-weight:bold;">&laquo; Prev</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="shop.php?page=<?= $i ?>" style="display:inline-block; padding:8px 16px; border-radius:4px; background:<?= $i == $page ? '#333030' : '#f8f9fa' ?>; color:<?= $i == $page ? 'white' : '#333' ?>;text-decoration:none;font-weight:bold;box-shadow:0 2px 6px rgba(0,0,0,0.08);">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
                <?php if ($page < $totalPages): ?>
                    <a href="shop.php?page=<?= $page + 1 ?>" style="display:inline-block; padding:8px 16px; border-radius:4px; background:#f8f9fa; color:#333; text-decoration:none; font-weight:bold;">Next &raquo;</a>
                <?php endif; ?>
                </div>
            </div>
            <?php
        }
    } ?>


		<div id="favoriteModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
	<h3 id="favoriteTitle"></h3>
    <p id="favoriteMessage"></p>
  </div>
</div>
<button id="scrollToTop" title="Scroll To Top">↑</button>


		

		 <div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<div id="checkoutInfo">
					
				</div>
			</div>
		</div>  


	


		

		




    </section>



	


















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
	
	
	
	
	
	
	<form action="clientMessages1.php" method="POST">
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
		<input type="textarea" id="message" placeholder="Describe your problem here..." name="message"></textarea>
	  </div>
	  <button id="sendbtn" name="submit">Send</button>
	</div>
  </div>
</form>


	  
    
</body>

<script src="main.js"></script>
<script src="main2.js"></script>
<script src="searchproducts.js"></script>
<script src="shoppingCard.js"></script>
<script src="script.js"></script>

</html>