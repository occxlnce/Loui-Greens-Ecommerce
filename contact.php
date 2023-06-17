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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Leave us a message | Fresh organic produce </title>
	
	<!-- my css links -->
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="hero.css">
	<!-- my bootstrap link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>	
	
	<!-- my fontawesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
		<style>
		.jumbotron {
background: #28a745;
color: #FFF;
border-radius: 8px;
}
.jumbotron-sm { padding-top: 24px;
padding-bottom: 24px; }
.jumbotron small {
color: #FFF;
}
.h1 small {
font-size: 34px;
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
        <a class="nav-link" href="../Loui Greens/index.php">Home <span class="sr-only">(current)</span></a>
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
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price:<?php total_cart_price();?></a>
      </li>


    </ul>
    <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
	  
	  <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
	  
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
		 <a class="nav-link text-success" href="#">Welcome Guest</a>
	</li>

<?php

if(!isset($_SESSION['username'])){
	echo " 	<li class='nav-item'>
		 <a class='nav-link text-success' href='users_area/user_login.php'>Login</a>
	</li>";
	
}else{
	echo "<li class='nav-item'>
<a class='nav-link text-success' href='users_area/logout.php'>Logout</a>
	</li>";
	
}
	
?>
	</ul>
</nav>

<!-- operation leyenda -->
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Don't be shy <small>Feel free to contact us</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Loui Greens</strong><br>
                29 Anderson st<br>
                Louis Trichardt, Limpopo RSA<br>
                <abbr title="Phone">
                    P:</abbr>
                (+27) 79 765 6866
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">info@louigreens.co.za</a>
            </address>
            </form>
        </div>
    </div>
</div>

<!-- The last choosen 1 -->
<!-- include the footer here -->
<?php include("./includes/footer.php")

?>

<!-- My bootstrap js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>

</html>
	