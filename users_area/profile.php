<!-- user dashboard page -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF_8">
	<meta http-equiv="X_UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="favicon.ico">
	
	<title>Profile | Loui Greens </title>
	<!-- my bootstrap link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!-- my fontawesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
	
	<style>
	body{
		overflow-x:hidden;
		overflow-y:scroll;		
	}
	
	.profile_img{
		width: 55%;
		border-radius: 5px;
		margin-auto;
		justify-content:center;
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

<!-- call cart function -->
<?php
	cart();
?>

<!-- my 2nd child -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
	<ul class="navbar-nav me-auto">

	<li class="nav-item">
		 <a class="nav-link text-light" href="#">Welcome Guest</a>
	</li>

<?php

if(!isset($_SESSION['username'])){
	echo " 	<li class='nav-item'>
		 <a class='nav-link text-light' href='user_login.php'>Login</a>
	</li>";
	
}else{
	echo "<li class='nav-item'>
<a class='nav-link text-light' href='logout.php'>Logout</a>
	</li>";
	
}
	
?>
	</ul>
</nav>

<br>
<br>
<br>

<!-- my 3rd child -->
<div class="bg-light">
	<center>
	<h3 class="text-success">User Account</h3>
	</center>
	<p class="text-center">Welcome to account dashboard.</p>
</div>

<!-- my 4th child -->
<div class="row px-1">
	<div class="col-md-10">
		<!-- The products -->
		<div class="row">
		<div class="col-md-2">
		<ul class="navbar-nav bg-dark text-center" style="height:100vh">
		<li class="nav-item bg-success">
			<a class="nav-link text-light" href="#"><h4>Your profile</h4>
		</li>
		
		<?php
		$username = $_SESSION['username'];
		$user_image_query = "SELECT * FROM user_table WHERE username='$username'"; // Removed single quotes around table name
		$result_image = mysqli_query($con, $user_image_query);
		$row_image = mysqli_fetch_array($result_image); // Updated variable to use the query result
		$user_image = $row_image['user_image'];
		echo "<li class='nav-item'>
		<img src='user_images/$user_image' class='profile_img my-4' alt=''>
		</li>";

		?>
		
		<li class="nav-item">
		<a class="nav-link text-light bg-dark" href="profile.php">Pending orders</a>
		</li>
		
		<li class="nav-item">
		<a class="nav-link text-light bg-dark" href="profile.php?edit_account">Edit account</a>
		</li>	

		<li class="nav-item">
		<a class="nav-link text-light bg-dark" href="profile.php?my_orders">My orders</a>
		</li>			
		
		<li class="nav-item">
		<a class="nav-link text-light bg-dark" href="profile.php?delete_account">Delete Account</a>
		</li>

		<li class="nav-item">
		<a class="nav-link text-light bg-dark" href="logout.php">Logout</a>
		</li>		
		
		</ul>
		</div>
		
	</div>	
</div>		

		<div class="col-md-10">
			<?php 
			get_user_order_details();
			if(isset($_GET['edit_account'])){
				include('edit_account.php');
				
			}
			
			?>	
				
		</div>

</div>


	<!-- My bootstrap js links -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>