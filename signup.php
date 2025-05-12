<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style3.css">
    <link rel="stylesheet" media="mediatype and|not|only (expressions)" href="screen.css">
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
    <title>SignUp</title>
    <style>
        * {    
             box-sizing: border-box;
             
             transition: all .2s linear;
     }
     /*form*/
     .form-container {
         min-height: 80vh; 
         width: 100%; 
         display: flex;
         align-items: center; 
         justify-content: center; 
         background: url(bg-back.jpg) no-repeat; 
         background-size: cover; 
         background-position: center;
         perspective: 1000px; 
     } 
     .form-container form{ 
         height: 650px; 
         width: 350px; 
         background: rgba(255,255,255,.1); 
         text-align: center;
         align-items: center;
         border-radius: 5px;
         box-shadow: 0 5px 15px rgba(0,0,0,.9);
         border-top: 1px solid rgba(255,255,255,.3);
         border-left: 1px solid rgba(255,255,255,.3);    
         backdrop-filter: blur(10px);
         transform-style: preserve-3d;
     }
     /*heading*/
     .form-container form h3{ 
         font-size: 40px; 
         padding:30px 0; 
         color: black; 
         letter-spacing: 3px; 
         margin-bottom: -10px;
     } 
     /*icon*/
     .form-container form i{     
         padding:0.5px; 
         font-size: 20px; 
         color: black;
     
     } 
     /*Login*/
     .form-container form input {     
         outline: none; 
         border: none; 
         height:40px;
         width: 300px;
         background: rgba(0,0,0,.2);
         color: black;
         box-shadow: 0 0 5px rgba(0,0,0,.5) inset;
         font-size: 20px;
         padding: 0 10px;
         margin: 15px -5px;
         letter-spacing: 1px;
         border-radius: 15px;
        
     } 
     /*Login*/
     .form-container form input[type="submit"] 
     { 
         width:90%; 
         cursor: pointer; 
         background: #333030; 
         margin-top: 30px; 
         border-radius: 50px;
         font-size: 25px; 
         color: red;
     } 
     .form-container form input[type="submit"]:hover 
     { 
         letter-spacing: 2px; 
     }        
     .container {
         display: block;
         
     }
     .icon{
         margin-right: 8px;
     }
     .container.error input{
      border-color: #cf1714;
      
    
     }
     .container .error{
      color: #cf1714;
      font-size: 12px;
      
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
						<li class="active"><a href="project.html">Home</a></li>
						<!-- <li><a href="products.php">Products</a></li> -->
						<li><a href="shop.php">Shop</a></li>
						<li><a href="#section-footer">About</a></li>
                        <li><a href="login.php">Login</a></li>
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

    <div class="form-container">
        <form action="register.php" method="post" id="form" style="transform: rotateX(0deg) rotateY(0deg);">
        <h3>Sign Up</h3>
        <class class="container">
       
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="surname" placeholder="Surname" required> 
        <input type="text" placeholder="Username" id="username" name="username" required>
        

        
        <input type="email" placeholder="E-mail" id="email" name="email" required>
        
        
        <input type="password" placeholder="Password" id="password" name="password" required>
        <input type="password" placeholder="Confirm Password" name="confirmpassword" required>
        
        <input type="submit" value="Sign Up" name="submit"> 
        <span>Already have an account? | <a href="login.php">Login</a></span>
        
        
        
        </class></form></div>
        
        <script> 
        
        var form = document.getElementById('form'); 
        form.addEventListener('mousemove', (e) =>{ 
        
        var x = (window.innerWidth / 2 - e.pageX) / 12;  ; 
        var y = (window.innerHeight / 2 - e.pageY) / 12;
        form.style.transform = 'rotateX(' + x + 'deg) rotateY(' + y + 'deg)';
        
        }); 
        
        form.addEventListener('mouseleave', function(){
        form.style.transform = 'rotateX(0deg) rotateY(0deg)';
        
        });
        
        </script> 




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
    <h4>Login/Sign Up</h4>
			<li><a href="login.php">Login</a></li>
			<li><a href="signup.php">Sign up</a></li>

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
		<input type="textarea" id="message" placeholder="Describe your problem here..." name="message"></textarea>
	  </div>
	  <button id="sendbtn" name="submit">Send</button>
	</div>
  </div>
</form>


    
</body>

<script src="main.js"></script>
<script src="login.js"></script>
</html>