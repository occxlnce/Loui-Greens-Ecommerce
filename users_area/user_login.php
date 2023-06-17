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
	
	<!-- my css links -->
	<link rel="stylesheet" href="../styles.css">	
	
	<title>Sign-in | Loui Greens </title>
	<!-- my bootstrap link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<style>
	body{
		overflow-x:hidden;
		
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

<!-- 1st child of the day -->
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



<div class="container-fluid bg-light m-3">
	<h2 class="text-center text-success">User Login</h2>
	<div class="row d-flex align-items-center justify-content-center mt-5">
		<div class="col-lg-12 col-xl-6">
		<form action="" method="post">
		
		<!-- username field -->
			<div class="form-outline mb-4">
				<label for="user_username" class="form-label text-success">Username</label>
				<input type="text" id="user_username" class="form-control bg-dark" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>	
			</div>		
						
		<!-- password field -->	
			<div class="form-outline mb-4">
				<label for="user_password" class="form-label text-success">Enter Password</label>
				<input type="password" id="user_password" class="form-control bg-dark" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
			</div>	
				
			
			<div class="mt-4 pt-2">
			<input type="submit" value="Login" class="bg-success text-dark py-2 px-3 border-0" name="user_login">
			<p class="large text-dark fw-bold mt-2 pt-1 mb-0">Don't have an account?<a href="user_registration.php" class="text-success">Register </a></p>
			</div>
			
		</form>
		
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

<?php
if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM user_table WHERE username='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();
	
	// cart item
	$select_query_cart = "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
	$select_cart=mysqli_query($con,$select_query_cart);
	$row_count_cart = mysqli_num_rows($select_cart);
	
    if($row_count > 0){
		
		$_SESSION['username']=$user_username;
        if(password_verify($user_password, $row_data['user_password'])){
            if($row_count == 1 && $row_count_cart == 0){
				
				$_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
				
            } else{
				$_SESSION['username']=$user_username;	
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }	
			
        } else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
		
    } else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>

