<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="images/hyperxfavicon.jpg">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kalnia">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Afacad">
	<link rel="stylesheet" href="CSS/style1.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"
>
<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Products</title>
</head>
<body>
	<section id="section-1">
		<header>
				<a href="project.html"><img src="images/hyperx.png" width="200px" height="100px"></a>
				<div class="hamburger">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</div>
				<nav>
					<ul>
						<li><a href="project.html">Home</a></li>
						<li class="active"><a href="products.html">Products</a></li>
						<li><a href="shop.html">Shop</a></li>
						<li><a href="#section-footer">About</a></li>
						<li><a href="login.html">Login</a></li>
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
		
		</header>
		<script>
			hamburger = document.querySelector(".hamburger")
			hamburger.onclick = function() {
				nav = document.querySelector("nav");
				nav.classList.toggle("active");
			}


		</script>
		</section>

<section id="section-2">
	<h1>HyperX Products</h1>
	<ul class="products">
			<li><img src="images/hyperxcloud2red.webp" width="300px" height="300px"
				title="HyperX Cloud II Headset"></li>
		
	
	
	
		<li><img src="images/hyperxkeyboard.webp" width="300px" height="300px" title="HyperX Alloy Keyboard"></li>
	
	
		<li><img src="images/hyperxmouse.webp" width="300px" height="300px" title="HyperX Mouse"></li>
		<li><img src="images/hyperxcontroller.webp" width="300px" height="300px" title="HyperX Xbox Controller"></li>
		<li><img src="images/hyperxmonitor.webp" width="300px" height="300px" title="HyperX QHD Monitor"></li>
		<li><img src="images/hyperxmic.webp" width="300px" height="300px" title="HyperX Mic"></li>
	</ul>
	<br>
	<br>
	<br>
	<br>
	<h1>New Products</h1>
	<ul class="new-products">
		
		<li><img src="images/hyperxheadsetnew.webp" width="300px" height="300px"></li>
		<li><img src="images/hyperxnewkeyboard.webp" width="300px" height="300px"></li>
		<li><img src="images/hyperxnewmouse.webp" width="300px" height="300px"></li>

	</ul>
	
	





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
		<li><a href="project.html">Home</a></li>
		<li><a href="products.html">Products</a></li>
		<li><a href="shop.html">Shop</a></li>
		<li><a href="#">Contact</a></li>
	</div>

	<div class="footer-content">
		<h4>Products</h4>
		<li><a href="shop.html">HyperX Mouse</a></li>
		<li><a href="shop.html">HyperX Keyboard</a></li>
		<li><a href="shop.html">HyperX Headset</a></li>
		<li><a href="shop.html">HyperX Monitor</a></li>
	</div>

	<div class="footer-content">
		<h4>Login</h4>
		<li><a href="login.html">Log in</a></li>
		
	</div>
</section>






<div class="chat-box" id="chat-box">
	<div class="chat-icon" onclick="toggleChat()">
	  <img src="images/chatbox.webp" alt="Chat Icon">
	</div>
	<div class="chat-window" id="chat-window">
	  <div class="header">Welcome to our support center! Do you need assistance with anything? Our team is here to help you resolve any issues or answer any questions you may have. Feel free to reach out to us and we'll do our best to assist you promptly. Your satisfaction is our top priority!</div>
	  
	  <div class="email-info">
		<input type="email" id="email" placeholder="Your Email" required>
	  </div>
	  <div class="problem-box">
		<textarea id="message" placeholder="Describe your problem here..." required></textarea>
	  </div>
	  <button onclick="sendMessage()" id="sendbtn">Send</button>
	</div>
  </div>

</body>

<script src="main.js"></script>
</html>