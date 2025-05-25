<?php 

    include_once('config.php');

    if (empty($_SESSION['username'])) {
          header("Location: login.php");
    }
   
    $sql = "SELECT * FROM shopproducts";
    $selectProducts = $conn->prepare($sql);
    $selectProducts->execute();

    $products_data = $selectProducts->fetchAll();
    

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Dashboard</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
  	<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
	<meta name="theme-color" content="#7952b3">
 </head>
 <body>
 
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" style="position:relative; min-height:65px;">
  <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="position:absolute; left:10px; top:50%; transform:translateY(-50%);">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#" id="dashboardBrand" style="transition:margin-left 0.3s;"><?php echo "Welcome ".$_SESSION['username']; ?></a>
  <img src="images/hyperx.png" alt="HyperX Logo" id="dashboardLogo" style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); height:60px; z-index:10; transition:left 0.3s, transform 0.3s;">
  <div class="navbar-nav d-none d-md-flex" id="desktopSignOut">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
  <!-- Dropdown menu for mobile -->
  <ul class="dropdown-menu d-md-none" id="mobileNavDropdown" style="left:10px; top:60px;">
    <?php if ($_SESSION['isadmin'] == 'true') { ?>
      <li><a class="dropdown-item" href="project.php">Home</a></li>
      <li><a class="dropdown-item" href="dashboard.php">Edit Users</a></li>
      <li><a class="dropdown-item" href="ordersList.php">Orders</a></li>
      <li><a class="dropdown-item" href="messagesDashboard.php">Client Messages</a></li>
      <li><a class="dropdown-item" href="editProducts.php">Add/Edit Products</a></li>
    <?php } else { ?>
      <li><a class="dropdown-item" href="project.php">Home</a></li>
      <li><a class="dropdown-item" href="updateUsers.php">Edit Profile</a></li>
      <li><a class="dropdown-item" href="ordersList.php">Your Orders</a></li>
    <?php } ?>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item text-danger" href="logout.php">Sign out</a></li>
  </ul>
</header>

<style>
@media (max-width: 767.98px) {
  #dashboardBrand {
    margin-left: 50px;
    font-size: 1rem;
    max-width: 60vw;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  #dashboardLogo {
    left: 55%;
    height: 45px;
  }
}
@media (max-width: 400px) {
  #dashboardBrand {
    font-size: 0.9rem;
    margin-left: 40px;
  }
  #dashboardLogo {
    left: 58%;
    height: 35px;
  }
}
</style>

<script>
// Show/hide dropdown on toggler click (mobile only)
document.addEventListener('DOMContentLoaded', function() {
  var toggler = document.querySelector('.navbar-toggler');
  var dropdown = document.getElementById('mobileNavDropdown');
  if (toggler && dropdown) {
    toggler.addEventListener('click', function(e) {
      e.stopPropagation();
      dropdown.classList.toggle('show');
    });
    document.addEventListener('click', function(e) {
      if (!toggler.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.remove('show');
      }
    });
  }
});
function adjustDashboardHeader() {
  var brand = document.getElementById('dashboardBrand');
  var logo = document.getElementById('dashboardLogo');
  if (window.innerWidth < 768) {
    brand.style.marginLeft = '50px';
    logo.style.left = '55%';
    logo.style.height = '45px';
  } else {
    brand.style.marginLeft = '';
    logo.style.left = '50%';
    logo.style.height = '60px';
  }
  if (window.innerWidth < 400) {
    brand.style.marginLeft = '40px';
    logo.style.left = '58%';
    logo.style.height = '35px';
  }
}
window.addEventListener('resize', adjustDashboardHeader);
document.addEventListener('DOMContentLoaded', adjustDashboardHeader);
</script>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
           <?php if ($_SESSION['isadmin'] == 'true') { ?>
            <li class="nav-item">
              <a class="nav-link" href="project.php">
                <span data-feather="file"></span>
                Home
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Edit Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="ordersList.php">
              <span data-feather="home"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="messagesDashboard.php">
              <span data-feather="home"></span>
              Client Messages
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="editProducts.php">
              <span data-feather="home"></span>
              Add/Edit Products
            </a>
          </li>
       
          
        </ul>
        <?php }else {?>
            <li class="nav-item">
              <a class="nav-link" href="project.php">
               
                Home
              </a>
            </li>
          <li class="nav-item">
          <a class="nav-link" href="editUsers.php">
            <span ></span>
            Edit Profile
          </a>
        </li>
        </ul>
      <?php
      } ?>

        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        
      </div>

    <?php if ($_SESSION['isadmin'] == 'true') { ?>

      <h2>Edit Products</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Product Name</th>
              <th scope="col">Product Price</th>
              <th scope="col">Product Image</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products_data as $product_data) { ?>

               <tr>
                <td><?php echo $product_data['id']; ?></td>
                <td><?php echo $product_data['nameProducts']; ?></td>
                <td><?php echo $product_data['price']; ?></td>
                <td><?php echo $product_data['imageProducts']; ?></td>
                
        
                <td> <button class="btn btn-warning"> <a href="updateProductsForm.php?id=<?= $product_data['id'];?>" style="text-decoration:none; color:white; font-weight:bold;">Update</a></button></td>
           
                <td> <button class="btn btn-danger"><a href="deleteProducts.php?id=<?= $product_data['id'];?>" style="text-decoration:none; color:white; font-weight:bold;">Delete</a></button></td>
               
                
              </tr>
              
           <?php  } ?>
           
            
          </tbody>
          <td> <button class="btn btn-success"><a href="addProducts.php" style="text-decoration:none; color:white; font-weight:bold;">Add</a></button></td>
        </table>
      </div>
     <?php  } else {
      
    } ?>
    </main>
  </div>
</div>

	<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>


 </body>
 </html>