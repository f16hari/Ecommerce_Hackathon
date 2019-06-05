<?php include("config.php");?>
<?php

$sql = "select * from product_db";
$result = $db->query($sql);
$sql1 = "SELECT DISTINCT company FROM product_db";
$result1 = $db->query($sql1);



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
	<title>Karma Shop</title>

	<!--
            CSS
            ============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">

</head>

<body id="category">

	<!-- Start Header Area -->
	<?php include("header.php");?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Dont Stop!!!</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						<li class="main-nav-list"><a data-toggle="collapse" onclick="fillter('.electronics')" href="#electronics" aria-expanded="false" aria-controls="electronics"><span
								 class="lnr lnr-arrow-right"></span>Electronics<span class="number">(53)</span></a>
							<ul class="collapse" id="electronics" data-toggle="collapse" aria-expanded="false" aria-controls="electronics">
								<li class="main-nav-list child" onclick="fillter('.mobile')"><a href="#">Mobiles<span class="number">(13)</span></a></li>
								<li class="main-nav-list child" onclick="fillter('.television')"><a href="#">Television<span class="number">(09)</span></a></li>
								<li class="main-nav-list child" onclick="fillter('.gadgets')"><a href="#">Laptops<span class="number">(17)</span></a></li>
							</ul>
						</li>

						<li class="main-nav-list"><a data-toggle="collapse" onclick="fillter('.furniture')" href="#furniture" aria-expanded="false" aria-controls="furniture"><span
								 class="lnr lnr-arrow-right"></span>Furniture<span class="number">(53)</span></a>
							<ul class="collapse" id="furniture" data-toggle="collapse" aria-expanded="false" aria-controls="furniture">
								<li class="main-nav-list child" onclick="fillter('.dining_table')"><a href="#">Dining Tables<span class="number">(13)</span></a></li>
								<li class="main-nav-list child" onclick="fillter('.sofa')"><a href="#">Sofa<span class="number">(09)</span></a></li>
								<li class="main-nav-list child" onclick="fillter('.beds')"><a href="#">Beds<span class="number">(17)</span></a></li>
								
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse"  onclick="fillter('.sports')" href="#sports" aria-expanded="false" aria-controls="sports"><span
								 class="lnr lnr-arrow-right"></span>Sports<span class="number">(77)</span></a>
							<ul class="collapse" id="sports" data-toggle="collapse" aria-expanded="false" aria-controls="sports">
								<li class="main-nav-list child" onclick="fillter('.cricket')"><a href="#">Cricket<span class="number">(13)</span></a></li>
								<li class="main-nav-list child"><a href="#">Football<span class="number">(09)</span></a></li>
								<li class="main-nav-list child"><a href="#">Volleyball<span class="number">(17)</span></a></li>
							</ul>
						</li>
						
						
					</ul>
				</div>
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Product Filters</div>
					<div class="common-filter">
						<div class="head">Brands</div>
						<ul>
						<?php while($row = $result1->fetch_assoc()){?>
							
								
							
									<li class="cc filter-list" onclick="compfillter('.<?php echo $row['company'];?>')"><input class="pixel-radio" id="<?php echo $row['company'];?>" type="radio" name="brand"><?php echo $row['company'];?><span>(29)</li>
								
							
								
							
						<?php }?>
						</ul>
					</div>
					<div class="common-filter">
						<div class="head">Color</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
										Leather<span>(29)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
										with red<span>(19)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
							</ul>
						</form>
					</div>
					
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting">
					<select id="psorting" name="psorting" class="psorting">
							<option value="1">Default</option>
							<option value="2">Price Low to High</option>
							<option value="3">Price High to Low</option>
						</select>
					</div>
					</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row" id="products">
						<!-- single product -->
						<?php while($row = $result->fetch_assoc()){?>
						
						<div class="ss col-lg-4 col-md-6">
							<input type="hidden" class="<?php echo $row['category'];?>" value="<?php echo $row['company'];?>">
							<input type="hidden" class="<?php echo $row['subcategory'];?>" value="<?php echo $row['company'];?>">
							<input type="hidden" class="<?php echo $row['company'];?>" value="<?php echo $row['company'];?>">
							<input type="hidden" class=".price" value="<?php echo $row['price'];?>">

							<a href="single-product.php?id=<?php echo $row['product_id']?>">

							<div class="single-product" >
								<img style="height:225px"class="img-fluid" src="product_images/<?php echo $row['product_id']?>.jpg" alt="">
								<div class="product-details">
									<h6><?php echo $row['product_name'];?></h6>
									<div class="price">
										<h6><?php echo $row['price'];?></h6>
										<h6 class="l-through"><?php $s = (int)$row['price']+1000; echo $s; ?></h6>
									</div>
									<div class="prd-bottom">
										
										<a href="cart.php?id=<?php echo $row['product_id']?>" class="social-info">
										<input type="hidden" name="id" id="id" value="<?php echo $row['product_id'];?>" >
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										
										
										<a href="" class="social-info">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Wishlist</p>
										</a>
										
											<a href="single-product.php?id=<?php echo $row['product_id']?>" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">view more</p>
											</a>
										
										
									</div>
								</div>
							</div>

							</a>
							
						</div>

						<?php }?>
						
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
				<div class="sorting">
						<select>
							<option value="1">Default</option>
							<option value="1">Price Low to High</option>
							<option value="1">Price High to Low</option>
						</select>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

	

	<!-- start footer Area -->
	<?php include("footer.php");?>
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>

		function fillter(category)
		{
			var allele = document.querySelectorAll('.ss');
			var comp = [];
			for (var index = 0; index < allele.length; index++) 
			{
    			allele[index].style.display = "none";
  			}
			var elements = document.querySelectorAll(category);
			for (var index = 0; index < elements.length; index++) 
			{
				if(comp.indexOf(elements[index].value) === -1) {
      				comp.push(elements[index].value);
      				
    				}
				elements[index].parentElement.style.display = "block";
				
  			}
			 var allcom = document.querySelectorAll('.cc');
			for (var index = 0; index < allcom.length; index++) 
			{
				allcom[index].style.display = "none";
  			}
			  for (var index = 0; index < comp.length; index++) 
			{
				document.getElementById(comp[index]).parentElement.style.display = "block";
  			}
			
			  
		}

		function compfillter(company)
		{
			var all = document.querySelectorAll('.ss');
			for(var index = 0; index < all.length; index++)
			{
				all[index].style.display = "none";
			}
			var elements = document.querySelectorAll(company);
			for (var index = 0; index < elements.length; index++) 
			{
				
				elements[index].parentElement.style.display = "block";
				
  			}
		} 
		
		document.getElementById('searchProduct').addEventListener('submit', function (e) {
			const productDetails = document.querySelectorAll('.product-details');
			e.preventDefault();
			console.log(e.target.elements.search_input.value);
			productDetails.forEach((product) => {
				if (product.firstChild.textContent.trim().toLowerCase().includes(e.target.elements.search_input.value.toLowerCase())) {
					console.log(product.firstChild.getAttribute('href'));
					window.location.href = product.firstChild.getAttribute('href');
				}
				
			});

		});

		
	</script>
	

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