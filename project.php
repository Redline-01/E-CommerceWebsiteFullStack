
<?php 

   include_once('config.php');

    if (empty($_SESSION['username'])) {
          header("Location: login.php");
    }
   
    $sql = "SELECT * FROM login";
    $selectUsers = $conn->prepare($sql);
    $selectUsers->execute();

    $users_data = $selectUsers->fetchAll();
    

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="images/hyperxfavicon.jpg">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kalnia">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Afacad">
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"
>
<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<title>HyperX</title>
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
						<li id="usernameDB"><a href="dashboard.php"> <?php echo "Hello There ".$_SESSION['username']; ?> </a></li>
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

	<section id="section-2">
		<div id="carouselAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/hyperxheader2.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/hyperxheader2.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/hyperxheader2.jpg" class="d-block w-100">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
		</section>
		<br>
		<br>

<section id="section-3">
	<div class="image-box">
		<img src="images/hyperxhistory.jpg">
	</div>
	<div class="history">
	 <h1>Our History</h1>
	
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	
</div>
</section>
<br>
<br>
<br>
<section id="section-4">
<div class="whatsnew"> 
<h1>Whats New ?</h1>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
	It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
</p>
</div>
</section>




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
	</div>

	<div class="footer-content">
		<h4>Products</h4>
		<li><a href="shop.php">HyperX Mouse</a></li>
		<li><a href="shop.php">HyperX Keyboard</a></li>
		<li><a href="shop.php">HyperX Headset</a></li>
		<li><a href="shop.php">HyperX Monitor</a></li>
	</div>

	<div class="footer-content">
		<h4>Login</h4>
		<li><a href="login.php">Log in</a></li>
		
	</div>
</section>




<form action="clientMessages.php" method="POST">
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
		<textarea id="message" placeholder="Describe your problem here..." name="message"></textarea>
	  </div>
	  <button id="sendbtn" name="submit">Send</button>
	</div>
  </div>
</form>

</body>

<script src="main.js"></script>
</html>