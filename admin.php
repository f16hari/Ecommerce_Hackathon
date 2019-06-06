<?php
include("config.php"); 
$sql = "SELECT * from product_db";
$result = $db->query($sql);



if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(isset($_POST['deleteproduct']))
	{
		
		$list=implode(",",$_POST['deleteproduct']);
		$s5="DELETE FROM product_db where product_id IN ($list) ";
		$db->query($s5);
    }
    
    foreach($_POST['id'] AS $id)
	{
	
		$name=$_POST['product_name'][$id];
		$price=$_POST['price'][$id];
		$s4="UPDATE product_db SET product_name='$name',price='$price' WHERE product_id='$id'";
		if($db->query($s4))
		{
			header("location: admin.php");
		}

	}

}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>VMKART</title>
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Admin Panel</h1>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-12">
                    <h2 style="text-align:center">Edit Porducts</h2>
                    <br>
                    <form action="" method="post" enctype="multipart/form-data" data-ajax='false'>
                
                    <?php
		while($row = $result->fetch_assoc())
		{
			echo "<div style='float:left;margin-right:40px;'>";
			echo "<input type='text' name='id[".$row['product_id']."]' value='" . $row['product_id'] . "' /><br><br>";
			echo "Category:<br><input type='text' name='category[".$row['product_id']."]' value='" . $row['category'] ."' /><br><br>";
			echo "SubCategory:<br><input type='text' name='subcategory[".$row['product_id']."]' value='" . $row['subcategory'] ."' /><br><br>";
			echo "Company:<br><input type='text' name='experience[".$row['product_id']."]' value='" . $row['company'] ."' /><br><br>";
			echo "Product Name:<br><input type='text' name='product_name[".$row['product_id']."]' value='" . $row['product_name'] ."' /><br><br>";
			echo "Price:<br><input type='text' name='price[".$row['product_id']."]' value='" . $row['price'] ."' /><br><br>";
			echo "Availability:<br><input type='text' name='vacancies[".$row['product_id']."]' value='" . $row['availability'] ."' /><br><br>";
			echo "Seller:<br><input type='text' name='date[".$row['product_id']."]' value='" . $row['seller'] ."' /><br><br>";
			echo "Seller Address:<br><input type='text' name='ilocation[".$row['product_id']."]' value='" . $row['seller_address'] ."' /><br><br>";
			echo "Product Description:<br><input type='text' name='time[".$row['product_id']."]' value='" . $row['product_desc'] ."' /><br><br>";
			echo "Height:<br><input type='text' name='ilocation[".$row['product_id']."]' value='" . $row['height'] ."' /><br><br>";
			echo "Width:<br><input type='text' name='vacancies[".$row['product_id']."]' value='" . $row['width'] ."' /><br><br>";
			echo "Weight:<br><input type='text' name='date[".$row['product_id']."]' value='" . $row['weight'] ."' /><br><br>";
			echo "Rating:<br><input type='text' name='time[".$row['product_id']."]' value='" . $row['rating'] ."' /><br><br>";
			
			echo "DELETE : <input type='checkbox' name='deleteproduct[".$row['product_id']."]' value='" . $row['product_id'] . "' />";	
			echo "<br><br><br>";
			echo "</div>";
	
	
		}
		echo "<div class='clearfix'></div>";	
			
        ?>
        <input type="submit" value="Update">
        </form>
				</div>
				
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	
	<!--================End Product Description Area =================-->

	

	<!-- start footer Area -->
	<?php include("footer.php")?>
	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>