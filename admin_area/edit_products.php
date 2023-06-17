<?php

if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];

    $get_data = "SELECT * FROM products WHERE product_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);

    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    // fetching category name
    $select_category = "SELECT * FROM categories WHERE category_id = $category_id"; // Removed single quotes around 'categories'
    $result_category = mysqli_query($con, $select_category); // Corrected variable name to $select_category
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
    echo $category_title;

    // fetching brand name
    $select_brand = "SELECT * FROM brands WHERE brand_id = $brand_id"; // Removed single quotes around 'brands'
    $result_brand = mysqli_query($con, $select_brand); // Corrected variable name to $select_brand
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
    echo $brand_title;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Edit | Admin Dashboard</title>
	
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
	
	.product_img{
		width: 100px;
		object-fit:contain;
		border-radius: 8px;
		
	}
	
	
	</style>
	
	<!-- my bootstrap link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- my fontawesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>	

<body>

<div class="container mt-5">
	<h3 class="text-center text-success">Edit Product</h3>
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-outline w-50 m-auto">
		<label for="product_title" class="form-label">Product Title</label>
		<input type="text" id="product_title" name="product_title" class="form-control" required="required" value="<?php
			echo $product_title ?>"
	</div>	
		
	<div class="form-outline w-auto m-auto">
		<label for="product_desc" class="form-label">Product Description</label>
		<input type="text" id="product_desc" name="product_desc" class="form-control" required="required" value="<?php
			echo $product_description ?>">
	</div>	
	
	<div class="form-outline w-auto m-auto">
		<label for="product_keywords" class="form-label">Product Keywords</label>
		<input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required" value="<?php
			echo $product_keywords ?>">
	</div>	

	<br>

	<div class="form-outline w-auto m-auto">
	<label for="product_category" class="form-label">Product categories</label><br>
	<select name="product_category" class="form-select">
		<option value="">Choose option</option>
		
		<?php
    // fetching category name
		$select_category_all = "SELECT * FROM categories"; 
		$result_category_all = mysqli_query($con, $select_category_all);
		
		while($row_category_all = mysqli_fetch_assoc($result_category_all)){
			$category_title=$row_category_all['category_title'];
			$category_id=$row_category_all['category_id'];
			echo "<option value='$category_id'>$category_title</option>";
			
		};
		
		?>
			
	</select>
	</div>
	
	<br>
	
	<div class="form-outline w-auto m-auto">
	<label for="product_brands" class="form-label">Product brands</label><br>
	<select name="product_brands" class="form-select">
		<option value="">Choose option</option>

		<?php
	// fetching brand name
		$select_brand_all = "SELECT * FROM brands";
		$result_brand_all = mysqli_query($con, $select_brand_all); 
		
		while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
			$brand_title=$row_brand_all['brand_title'];
			$brand_id=$row_brand_all['brand_id'];
			echo "<option value='$brand_id'>$brand_title</option>";
			
		};
		
		?>


	</select>
	</div>
	
	<br>	
	
	<div class="form-outline w-auto m-auto">
		<label for="product_image1" class="form-label">Product Image1</label>
		<div class="d-flex">
			<input type="file" id="product_image1" name="product_image1" class="form-control" required="required">
			<img src="./product_images/<?php
			echo $product_image1 ?>" alt="" class="product_img">
		</div>
	</div>
	
	<div class="form-outline w-auto m-auto">
		<label for="product_image2" class="form-label">Product Image2</label>
		<div class="d-flex">
			<input type="file" id="product_image2" name="product_image2" class="form-control" required="required">
			<img src="./product_images/<?php
			echo $product_image2 ?>" alt="" class="product_img">
		</div>
	</div>	
	
		<div class="form-outline w-auto m-auto">
		<label for="product_image3" class="form-label">Product Image3</label>
		<div class="d-flex">
			<input type="file" id="product_image3" name="product_image3" class="form-control" required="required">
			<img src="./product_images/<?php
			echo $product_image3 ?>" alt="" class="product_img">
		</div>
	</div>
	
	<div class="form-outline w-auto m-auto">
		<label for="product_price" class="form-label">Product Price</label>
		<input type="text" id="product_price" name="product_price" class="form-control" required="required" value="<?php
			echo $product_price ?>">
	</div>	
	
	<br>
	
	<div class="text-center">
		<input type="submit" name="edit_product" value="Update product" class="btn btn-success px-3 mb-3">
	</div>

	</form>
</div>

<!-- Editing products -->
<?php

if(isset($_POST['edit_products'])){
	$product_title = $_POST['product_title'];
	$product_desc = $_POST['product_desc'];
	$product_keywords = $_POST['product_keywords'];
	$product_category = $_POST['product_category'];
	$product_brands = $_POST['product_brands'];
	$product_price = $_POST['product_price'];
	
	$product_image1 = $_FILES['product_image1']['name'];
	$product_image2 = $_FILES['product_image2']['name'];
	$product_image3 = $_FILES['product_image3']['name'];
	
	$temp_image1 = $_FILES['product_image1']['tmp_name'];
	$temp_image2 = $_FILES['product_image2']['tmp_name'];
	$temp_image3 = $_FILES['product_image3']['tmp_name'];
	
	// checking for fields empty or not
	if($product_title == '' || $product_desc == '' || $product_keywords == '' || $product_category == '' || $product_brands == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == '' || $product_price == ''){
		echo "<script>alert('Please fill all the fields and trust the process')</script>";
		
	}else{
		move_uploaded_file($temp_image1, "./product_images/$product_image1");
		move_uploaded_file($temp_image2, "./product_images/$product_image2");
		move_uploaded_file($temp_image3, "./product_images/$product_image3");
		
		//updating products
		$update_products = "UPDATE products SET product_title='$product_title', product_description='$product_desc', product_keywords='$product_keywords', category_id='$product_category', brand_id='$product_brands', product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_price='$product_price', date=NOW() WHERE product_id=$edit_id";
		
		$result_update = mysqli_query($con, $update_products);
		if($result_update){
			echo "<script>alert('Product updated successfully')</script>";
			echo "<script>window.open('./insert_product.php','_self')</script>";
		}
	}
}
?>


</body>
</html>