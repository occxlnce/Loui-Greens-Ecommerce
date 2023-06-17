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
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cart details | Loui Greens</title>
	
	<!-- my css links -->
	<link rel="stylesheet" href="styles.css">
	
	<!-- my bootstrap link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!-- my fontawesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<style>
	.cart_img {
		width:80px;
		height: 80px;
		border-radius: 8px;
		object-fit: contain;
	
	}

	
	</style>
	
</head>

<body>
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
				</ul>
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

<br>
<br>
	<!-- my 4th child -->
<div class="container bg-dark text-light">
    <div class="row">
        <form action="" method="post">
            <div class="table-responsive">
                <table class="table bg-dark table-bordered">

                        <!-- php code to display dynamic data -->
                        <?php

                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
						$result_count=mysqli_num_rows($result);
						if($result_count>0){
							echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
						</thead>
						<tbody>";
							
						
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = $row_product_price['product_price'];
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = $product_price;
                                $total_price += $product_values;
                        ?>
						
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                                    <td><input type="text" name="qty[]" class="form-control w-80" value="1"></td>
                                    <td>R<?php echo $price_table?></td>
                                    <td><input type="checkbox"name="removeitem[]" value="<?php echo $product_id?>"></td>
                                    <td>
									
									<!--<button class="bg-success text-light px-3 py-2 border-0 mx-3">Update</button> -->
                                        <input type="submit" value="Update Cart" class="bg-success text-light px-3 py-2 border-0 mx-3" name="update_cart">
                                     <!--<button class="bg-success text-light px-3 py-2 border-0 mx-3">Remove</button> -->
										<input type="submit" value="Remove Cart" class="bg-success text-light px-3 py-2 border-0 mx-3" name="remove_cart">
                                    </td>
                                </tr>
								
                        <?php }}}
						else{
						echo "<h2 class='text-danger text-center'>Cart is empty</h2>";
						
						}
						?>
						
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex mb-5">
					<?php
                        $get_ip_add = getIPAddress();
                        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
						$result_count=mysqli_num_rows($result);
						if($result_count>0){	
						echo "<h4 class='px-3'>Subtotal: <strong class='text-success'> $total_price/-</strong></h4>
						<input type='submit' value='Continue Shopping' class='bg-success text-light px-3 py-2 border-0 mx-3' name='continue_shopping'>
						
						<button class='bg-success text-light px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
						
						}else{
							echo "<a href='index.php'><button class='bg-success text-light px-3 py-2 border-0 mx-3'>Continue Shopping</button></a>";
						
						}
						
						if(isset($_POST['continue_shopping'])){
							echo "<script>window.open('index.php','_self')</script>";
						}
					
					?>
                   
                </div>
            </div>
        </form>
    </div>
</div>

	
	<br>
	<br>
	<br>
	
<?php
// function for removing items
function remove_cart_item(){
	global $con;
	if(isset($_POST['remove_cart'])){
		foreach($_POST['removeitem'] as $remove_id){
			echo $remove_id;
			$delete_query = "DELETE FROM cart_details WHERE product_id = $remove_id"; // Removed single quotes around table name and fixed query syntax
			$run_delete = mysqli_query($con, $delete_query); // Corrected 'mysli_query' to 'mysqli_query'
			if($run_delete){
				echo "<script>window.open('cart.php','_self')</script>"; // Fixed typo in 'window'
			}
		}
	}
}

$remove_item = remove_cart_item();
echo $remove_item;
?>


	<!-- include the footer here -->
	<?php include("./includes/footer.php") ?>

	<!-- My bootstrap js links -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
