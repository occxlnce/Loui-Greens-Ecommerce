<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Admin Dashboard | Loui Greens </title>
	
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
		
		<!-- my 2nd child -->
		<div class="bg-success">
			<h3 class="text-center text-light p-2"> Manage Details</h3>
		</div>
		
		<!-- my 3rd child -->
		<div class="row">
			<div class="col-md-12 bg-dark p-1 d-flex align-items-center">
				<div class="p-3">
					<a href="#"><img src="images/payment1.jpg" alt="" class="admin_image"></a>
					<p class="text-light text-center">Admin Name</p>
				</div>
				<div class="button text-center">
					<button class="my-3">
					<a href="insert_product.php" class="nav-link text-light bg-success my-1">Insert Products</a>
					</button>
					
					<button class="my-3">
					<a href="index.php?view_products" class="nav-link text-light bg-success my-1">View Products</a>
					</button>
					
					<button class="my-3">
					<a href="index.php?insert_category" class="nav-link text-light bg-success my-1">Insert Categories</a>
					</button>
					
					<button class="my-3">
					<a href="index.php?view_categories" class="nav-link text-light bg-success my-1">View Categories</a>
					</button>
					
					<button class="my-3">
					<a href="index.php?insert_brand" class="nav-link text-light bg-success my-1">Insert Brands</a>
					</button>
					
					<button class="my-3">
					<a href="index.php?view_brands" class="nav-link text-light bg-success my-1">View Brands</a>
					</button>
					
					<button class="my-3">
					<a href="index.php?list_orders" class="nav-link text-light bg-success my-1">All Orders</a>
					</button>
					
					<button class="my-3">
					<a href="all_payments" class="nav-link text-light bg-success my-1">All Payments</a>
					</button>
					
					<button class="my-3">
					<a href="list_users" class="nav-link text-light bg-success my-1">List users</a>
					</button>
					
					<button class="my-3">
					<a href="#" class="nav-link text-light bg-success my-1">Logout</a>
					</button>
					
				</div>
			</div>
		</div>
	</div>

<!-- my 4th child-->
	<div class="container my-5">
	<?php
	if(isset($_GET['view_products'])){
		include('view_products.php');
	}		
	
	if(isset($_GET['insert_category'])){
		include('insert_categories.php');
	}
	
	if(isset($_GET['insert_brand'])){
		include('insert_brands.php');
	}
	
	if(isset($_GET['edit_products'])){
		include('edit_products.php');
	}	

	if(isset($_GET['delete_product'])){
		include('delete_product.php');
	}	
	
	if(isset($_GET['view_categories'])){
		include('view_categories.php');
	}	
	
	if(isset($_GET['view_brands'])){
		include('view_brands.php');
	}	

	if(isset($_GET['edit_category'])){
		include('edit_category.php');
	}		
	
	if(isset($_GET['delete_category'])){
		include('delete_category.php');
	}		

	if(isset($_GET['delete_brand'])){
		include('delete_brand.php');
	}		
	
	if(isset($_GET['list_orders'])){
		include('list_orders.php');
	}	
	
	
	?>
	</div>


<!-- My bootstrap js links -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


</body>

</html>