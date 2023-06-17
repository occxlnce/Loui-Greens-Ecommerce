<?php include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF_8">
	<meta http-equiv="X_UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="favicon.ico">
	
	<title>Sign-up | Loui Greens </title>
	<!-- my bootstrap link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	
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

<br>
<br>

<div class="container-fluid bg-light m-3">
	<h2 class="text-center text-success">New User Registration</h2>
	<div class="row d-flex align-items-center justify-content-center">
		<div class="col-lg-12 col-xl-6">
		<form action="" method="post" enctype="multipart/form-data">
		
		<!-- username field -->
			<div class="form-outline mb-4">
				<label for="user_username" class="form-label text-success">Username</label>
				<input type="text" id="user_username" class="form-control bg-dark" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>	
			</div>		

				
		<!-- email field -->	
			<div class="form-outline mb-4">
				<label for="user_email" class="form-label text-success">Email</label>
				<input type="text" id="user_email" class="form-control bg-dark" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
			</div>		

		<!-- image field -->	
			<div class="form-outline mb-4">
				<label for="user_image" class="form-label text-success">User Image</label>
				<input type="file" id="user_image" class="form-control bg-dark" placeholder="Insert your Image" autocomplete="off" required="required" name="user_image"/>
			</div>				
			
		<!-- password field -->	
			<div class="form-outline mb-4">
				<label for="user_password" class="form-label text-success">Enter Password</label>
				<input type="password" id="user_password" class="form-control bg-dark" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
			</div>	
			
		<!-- confirm password field -->	
			<div class="form-outline mb-4">
				<label for="conf_user_password" class="form-label text-success">Confirm Password</label>
				<input type="password" id="conf_user_password" class="form-control bg-dark" placeholder="Enter your password" autocomplete="off" required="required" name="conf_user_password"/>
			</div>				
			
		<!-- address field -->	
			<div class="form-outline mb-4">
				<label for="user_address" class="form-label text-success">Address</label>
				<input type="text" id="user_address" class="form-control bg-dark" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
			</div>		

		<!-- contact field -->	
			<div class="form-outline mb-4">
				<label for="user_contact" class="form-label text-success">Contact</label>
				<input type="text" id="user_contact" class="form-control bg-dark" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact"/>
			</div>			
			
			<div class="mt-4 pt-2">
			<input type="submit" value="Register" class="bg-success text-dark py-2 px-3 border-0" name="user_register">
			<p class="large text-dark fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="user_login.php" class="text-success">Login </a></p>
			</div>
			
		</form>
		
		<br>
		<br>
		
		</div>
	</div>
</div>	

<br>
<br>
<br>

<!-- The last choosen 1 -->
<!-- include the footer here -->
<?php include("../includes/footer.php")

?>

<!-- My bootstrap js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
	$user_username = $_POST['user_username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$hash_password=password_hash($user_password, PASSWORD_DEFAULT);
	$conf_user_password = $_POST['conf_user_password'];
	$user_address = $_POST['user_address'];
	$user_contact = $_POST['user_contact'];
	$user_image = $_FILES['user_image']['name'];
	$user_image_tmp = $_FILES['user_image']['tmp_name'];
	$user_ip = getIPAddress();

	// select query
	$select_query = "SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email'";
	$result = mysqli_query($con, $select_query);
	$rows_count = mysqli_num_rows($result);
	if($rows_count > 0){
		echo "<script>alert('User already exists')</script>";
	}else if($user_password != $conf_user_password){
		echo "<script>alert('Passwords do not match')</script>";
	}else{
		// insert_query
		move_uploaded_file($user_image_tmp,"./user_images/$user_image");
		$insert_query = "INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
		$sql_execute = mysqli_query($con, $insert_query);
	}
	
	// selecting cart items
	$select_cart_items = "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
	$result_cart = mysqli_query($con, $select_cart_items);
	$rows_count = mysqli_num_rows($result_cart);

	if ($rows_count > 0) {
		$_SESSION['username']=$user_username;
		echo "<script>alert('You have items in your cart')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
	}else{
		echo "<script>window.open('../index.php','_self')</script>";
		
}
}

?>

