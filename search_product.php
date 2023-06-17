<!-- connection file -->
<?php
	include('includes/connect.php');
	include('functions/common_function.php');
	@session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Search product | Fresh organic produce </title>
	
	<!-- my css links -->
	<link rel="stylesheet" href="styles.css">
	
	<!-- my bootstrap link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!-- my fontawesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
		<style>
		
.hero {
  position: relative;
  height: 100vh;
  overflow: hidden;
}

.videowrapper {
  position: relative;
  height: 0;
  padding-bottom: 56.25%; /* 16:9 aspect ratio */
}

.videowrapper video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.hero-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  color: #28a745;
  -webkit-text-stroke: 1px #f2ebce;
}

.hero-content h1 {
  font-size: 4.5rem;
  font-weight: 900;
  margin-bottom: 1rem;
}

.hero-content h1:hover {
  font-size: 4.5rem;
  font-weight: 900;
  margin-bottom: 1rem;
  color: transparent;
  -webkit-text-stroke: 1px #f2ebce;
  box-shadow: 0px 0px 1000000000px 0px #68846c;
}

@media (max-width: 768px) {
  .hero-content h1 {
    font-size: 2.6rem;
  }
  
  .hero {
    height: auto;
    min-height: 50vh;
  }
  
  .videowrapper {
    padding-bottom: 0;
  }
  
  .videowrapper video {
    height: auto;
  }
}





	</style>
	
</head>

<body>
	
<section class="hero">
  <div class="videowrapper">
    <video autoplay loop muted>
      <source src="mix3.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
  <div class="hero-content">
    <h1>Welcome to Loui Greens</h1>
    <p class="subtitle">Scroll below..</p>
  </div>
</section>

	
	<!-- My navbar -->
	<div class="container-fluid p-0">
		<!-- my 1st child -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		
  <a class="navbar-brand" href="index.php"><img src="images/logo-22.png" alt="LG logo"></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display_all.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./users_area/user_registration.php">Register</a>
      </li>
	      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
		<?php
		cart_item();
		
		?>
		</sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price:<?php total_cart_price();?></a>
      </li>


    </ul>
    <form class="form-inline my-2 my-lg-0" action="" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
	  
	  <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
	  
    </form>
  </div>
</nav>

</div>

<!-- my 2nd child -->
<nav class="navbar navbar-expand-lg navbar-light bg-success">
	<ul class="navbar-nav me-auto">

	<li class="nav-item">
		 <a class="nav-link text-light" href="#">Welcome Guest</a>
	</li>

<?php

if(!isset($_SESSION['username'])){
	echo " 	<li class='nav-item'>
		 <a class='nav-link text-light' href='users_area/user_login.php'>Login</a>
	</li>";
	
}else{
	echo "<li class='nav-item'>
<a class='nav-link text-light' href='users_area/logout.php'>Logout</a>
	</li>";
	
}
	
?>
	</ul>
</nav>

<!-- call cart function -->
<?php
cart();

?>

<!-- operation leyenda -->


<!-- my 3rd child -->
<div class="bg-light">
	<center>
	<h3 class="text-success">Featured products</h3>
	</center>
	<p class="text-center">Shop the freshest vegies, fruits, bevs, and herbs.</p>
</div>

<!-- my 4th child -->
<div class="row px-1">
	<div class="col-md-10">
		<!-- The products -->
		<div class="row">
		
<!-- fetching products -->
	<?php
	
	// calling my functions
	search_product();
	get_unique_categories();
	get_unique_brands();

	?>	
		
<!-- row ending -->
		
		</div>
<!-- col ending -->
	</div>
	
<!-- My sidenav -->
	<div class="col-md-2 bg-dark p-0">
	
<!-- Brands to display -->
		<ul class="navbar-nav me-auto text-center">
			<li class="nav-item bg-success">
				<a href="#" class="nav-link text-light"><h4>Delivery brands</h4></a>
			</li>
			
<?php
	getbrands();

?>
	
		</ul>
	
<!-- Categories to be displayed -->
	<ul class="navbar-nav me-auto text-center">
		<li class="nav-item bg-success">
			<a href="#" class="nav-link text-light"><h4>Categories</h4></a>
		</li>
			
	<?php
	getcategories();

?>		
			
	</ul>
	</div>

</div>

<!-- The last choosen 1 -->
<!-- include the footer here -->
<?php include("./includes/footer.php")

?>

<!-- My bootstrap js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>

</html>
	