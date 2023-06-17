<?php include('../includes/connect.php');
include('../functions/common_function.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Sign-up | Admin </title>
	
	<!-- my css links -->
	<link rel="stylesheet" href="styles.css">
	<style>
	
	body{
		overflow-x:hidden;
	}
	
	.admin_image {
		width: 100px;
		object-fit: contain;
		border-radius: 8px;
	}
	
	.img-fluid{
		object-fit:contain;
		border-radius:8px;
	}
	
	.my-3 {
		border-radius: 8px;
	}
	
	</style>
	
	<!-- my bootstrap link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- my fontawesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

	<!-- My navbar -->
	<div class="container-fluid p-0">
		<!-- my 1st child -->
		<nav class="navbar navbar-expand-lg navbar-light bg-dark">
			<div class="container-fluid p-0">
			<a href="../index.php">
			<img src="images/logo-22.png" alt="" class="LG logo"></a>
			<nav class="navbar navbar-expand-lg">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="#" class="nav-link text-success">Welcome guest</a>
					</li>
				</ul>
			</nav>
			</div>
		</nav>

<div class="container-fluid m-3">
<h2 class="text-success mb-5 text-center">Admin Registration</h2>
</div>

<div class="row d-flex justify-content-center">
	<div class="col-lg-6 col-xl-5">
	<img src="./images/regi.png" alt="admin" class="img-fluid">
	</div>
	
	<div class="col-lg-6 col-xl-4">
		<form action="" method="post">
			<div class="form-outline mb-4">
				<label for="username" class="form-label">Username</label>
				<input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control bg-success text-light">
				
			</div>	
			
			<div class="form-outline mb-4">
				<label for="email" class="form-label">Email</label>
				<input type="text" id="email" name="email" placeholder="Enter your email" required="required" class="form-control bg-success text-light">
				
			</div>

			<div class="form-outline mb-4">
				<label for="password" class="form-label">Password</label>
				<input type="password" id="passwowrd" name="passowrd" placeholder="Enter passowrd" required="required" class="form-control text-light bg-success">
				
			</div>			
			
			<div class="form-outline mb-4">
				<label for="confirm_password" class="form-label">Confirm Password</label>
				<input type="confirm_password" id="confirm_passwowrd" name="confirm_passowrd" placeholder="Confirm password" required="required" class="form-control text-light bg-success">
				
			</div>		

			<div>
			<input type="submit" class="bg-success text-light py-2 px-3 border-0" name="admin_registration" value="Register">
			<br>
			<br>
			<p class="medium">Already have an account?<a href="admin_login.php" class="link-success">Login</a></p>
			
			</div>
			
		</form>
	</div>	
	
</div>


<!-- My bootstrap js links -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


</body>

</html>

<!-- php code -->
<?php
if(isset($_POST['admin_register'])){
	$admin_name = $_POST['admin_name'];
	$admin_email = $_POST['admin_email'];
	$admin_password = $_POST['admin_password'];
	$hash_password=password_hash($admin_password, PASSWORD_DEFAULT);
	$conf_admin_password = $_POST['conf_admin_password'];
	$admin_address = $_POST['user_address'];
	$user_contact = $_POST['user_contact'];
	$user_image = $_FILES['user_image']['name'];
	$user_image_tmp = $_FILES['user_image']['tmp_name'];
	$admin_ip = getIPAddress();

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
		
}


?>