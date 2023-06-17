<?php
if(isset($_GET['delete_brand'])){
	$delete_brand = $_GET['delete_brand'];

	// Create a database connection
	$con=mysqli_connect('localhost','root','','mystore');
	if(!$con){
		die("Database connection error: " . mysqli_connect_error());
	}
	
	$delete_query = "DELETE FROM brands WHERE brand_id = $delete_brand";
	$result = mysqli_query($con, $delete_query);
	if($result){
		echo "<script>alert('Brand deleted')</script>";
		echo "<script>window.open('./index.php?delete_brand','_self')</script>";
	}
	
	// Close the database connection
	mysqli_close($con);
}
?>
