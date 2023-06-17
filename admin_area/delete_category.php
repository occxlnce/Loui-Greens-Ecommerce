<?php
if(isset($_GET['delete_category'])){
	$delete_category = $_GET['delete_category'];

	// Create a database connection
	$con=mysqli_connect('localhost','root','','mystore');
	if(!$con){
		die("Database connection error: " . mysqli_connect_error());
	}
	
	$delete_query = "DELETE FROM categories WHERE category_id = $delete_category";
	$result = mysqli_query($con, $delete_query);
	if($result){
		echo "<script>alert('Category deleted')</script>";
		echo "<script>window.open('./index.php?delete_category','_self')</script>";
	}
	
	// Close the database connection
	mysqli_close($con);
}
?>
