<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF_8">
	<meta http-equiv="X_UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="favicon.ico">
	
	<title>Payment options | Loui Greens </title>
	<!-- my bootstrap link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<style>
	body{
		overflow-x:hidden;
		
	}
	
	img{
		width: 100%;
		border-radius: 10px;
		margin-auto;
		display:block;
	}
	
	</style>
	
</head>

<body>

<!-- My navbar -->
<div class="container-fluid p-0">
	<!-- my 1st child -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-success">
		
  <a class="navbar-brand" href="../index.php"><img src="logo-22.png" alt="LG logo"></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../display_all.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_registration.php">Register</a>
      </li>
	      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
		<?php
		cart_item();
		
		?>
		</sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price:<?php total_cart_price();?></a>
      </li>


    </ul>
    <form class="form-inline my-2 my-lg-0" action="../search_product.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
	  
	  <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
	  
    </form>
  </div>
</nav>

</div>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
	<ul class="navbar-nav me-auto">
	<li class="nav-item">
		 <a class="nav-link text-success" href="#">Welcome Guest</a>
	</li>

<?php

if(!isset($_SESSION['username'])){
	echo " 	<li class='nav-item'>
		 <a class='nav-link text-success' href='user_login.php'>Login</a>
	</li>";
	
}else{
	echo "<li class='nav-item'>
<a class='nav-link text-success' href='logout.php'>Logout</a>
	</li>";
	
}
	
?>
	</ul>
</nav>

<br>
<br>
<br>

<!-- php code to access user id -->
<?php
$user_ip = getIPAddress();
$get_user = "SELECT * FROM user_table WHERE user_ip='$user_ip'";
$result = mysqli_query($con, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];
?>


<div class="container">
	<h2 class="text-center text-success">Payment options</h2>
	<div class="row d-flex justify-content-center align-items-center my-5">
		<div class="col-md-6">
			<a href="https://www.paypal.com">
			<img src="user_images/payment2.jpg" target="_blank" alt="payment option">
			</a>
		</div>
		
		<div class="col-md-6">
			<a href="order.php?user_id=
			<?php  
			$user_id
			
			
			?>">
			<h3 class="text-center text-dark">Pay offline</h3>
			</a>
		</div>
		
	</div>
</div>

<!-- My bootstrap js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cd
n.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>