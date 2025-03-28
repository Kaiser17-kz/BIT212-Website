<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Butter & Olive Caf&eacute;</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/slider.css">
	<link rel="stylesheet" href="css/footer.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
				integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bodyStyle" style="background-color: #F8F5E9;">

	<div id="header" class="mainHeader">
		
		<div><img src="images/butter_olive.webp" height=auto width="250px"></div>
		<div style="padding-top: 50px;">Butter & Olive Cafe</div>
		
	</div>
	<hr>
	<br>
	<?php
		include 'config.php';
	?>
	<hr>
	<div class="topnav">
		<a href="index.php">Home</a>
		<!--<a href="#aboutUs">About Us</a>-->
		<!--<a href="#contactUs">Contact Us</a>-->
		<a href="menu.php">Menu</a>
		<a href="orderHistory.php">Order History</a>
		<a href="addMenu.html">Add Menu</a>
		<a href="deleteMenu.php">Delete Record</a>
	</div>
	<hr>
	<div id="mainContent">

		<div id="mainPictures" class="center">
			<h2>Welcome to Butter & Olive Cafe</h2>
			<div class="slider">
				<div class="slides">
						<!-- Slide images -->
						<img src="images/Coffee-and-Pastries.jpg" alt="Image 1">
						<img src="images/Cake-Vitrine.jpg" alt="Image 2">
						<img src="images/Latte.jpeg" alt="Image 3">
						<img src="images/black_forest.jpeg" alt="Image 4">
						<img src="images/marcaroni.jpeg" alt="Image 5">
				</div>
			</div>





			<hr>
			<p>Butter & Olive craft healthy and lip smackingly delicious bakes with premium ingredients that's good for you and your family.</p>
			<br>
			<style>
			  .card-img-top {
			    height: 200px;
			    object-fit: cover;
			  }
			  .card {
			    height: 100%;
			  }
			</style>
			<section style="background-color: #EAD8C0;">
			  <div class="container py-5">
			    <div class="row">
			      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
			        <div class="card text-black">
			          <img src="images/shop.jpg"
			            class="card-img-top" alt="cake display" />
			          <div class="card-body" style="background-color: rgba(234, 216, 192, 0.6);">

			            <div class="text-center mt-1">
			              <h4 class="card-title">Butter & Olive produce rich variety of cakes. Try them all!</h4>
			            </div>      
			          </div>
			        </div>
			      </div>
			      <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
			        <div class="card text-black">
			          <div class="card-body" style="background-color: rgba(234, 216, 192, 0.6);">
			            <div class="text-center mt-1">
			              <h4 class="card-title">Coffee,Tea,Pasta, and Cakes.<br>Yes, we have all of it!</h4>
			            </div>
			          </div>
					  <img src="images/Cup-of-Hot-Chocolate.jpg"
					  			            class="card-img-top" alt="hot chocolate" />
			        </div>
			      </div>
			      <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
			        <div class="card text-black">
			          <img src="images/Strawberry-Tarts.jpg"
			            class="card-img-top" alt="strawberry tart" />
			          <div class="card-body" style="background-color: rgba(234, 216, 192, 0.6);">
			            <div class="text-center mt-1">
			              <h4 class="card-title">Our Tarts are always a customer favorite!</h4>
			            </div>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</section>
			
			<!--
			<table class="">
				<tr>
					<td bgcolor="#D1BB9E">
						<div class="cursiveText">Butter & Olive produce rich variety of cakes. Try them all!</div>
						<table>
							<tr>
								<td><img src="images/shop.jpg" height=auto width="300"></td>
							</tr>
						</table>
					</td>
					<td bgcolor="#EAD8C0">
						<table>
							<tr>
								<td><img src="images/Cup-of-Hot-Chocolate.jpg" height=auto width="200"></td>
								<td class="cursiveText">Coffee,<br>Tea,<br>Pasta,<br> and Cakes.<br>Yes, we have all of it!</td>
							</tr>
						</table>
					</td>
					<td bgcolor="#D1BB9E">
						<div class="cursiveText">Our Cake are always <br/> a customer favorite!<br><br>
					  </div>
						<table>
							<tr>
								<td><img src="images/Strawberry-Tarts.jpg" height=auto width="170"></td>
								<td><img src="images/Strawberry-Blueberry-Tarts.jpg" height=auto width="170"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			-->
			<hr>
		</div>
	</div>

	<div id="aboutUs" class="center">
		<hr>
		<div>
			<h2>About Us</h2>
		</div>
			<table>
				<tr>
					<td><img src="images/cafe.jpg" height=auto width="400"></td>
					<td><p> At Butter & Olive, we’re not just about food; we’re about community. We host events, workshops, and tastings that bring people together to celebrate the joy of good food. We invite you to stop by, indulge your senses, and discover why Butter & Olive is more than just a café—it’s a place where memories are made and friendships are forged.</p></td>
				</tr>
			</table>
			<hr>
		</div>

	<div id="contactUs" align="center">
		<hr>
		<div>
			<h2>Contact Us</h2>
		</div>
		<table>
			<tr>
				<td><img src="images/butter_olive.webp" height=auto width="120"></td>
			</tr>
		</table>
		<div><p>12, Jalan Hujan Emas 4, Taman Overseas Union, 58200 <br>Kuala Lumpur, Malaysia <br><br>Tel: +1-800-555-0193</p></div>
		<div>
			<h3>Working Hours</h3>
		</div>
		<div>8:00am - 9:30pm<br>Closed on Public Holidays!</div>
	</div>

	<div id="Copyright" class="center">
		<!--<h5>&copy; 2025, Secret Receipe, Inc. or its Affiliates. All rights reserved.</h5>-->
	</div>
</body>

<footer class="footer">
    <div class="footer-content">
        <!-- Logo and Contact Information -->
        <div class="footer-section logo-contact">
            <img src="images/butter_olive.webp" alt="Secret Recipe Logo" width="120">
            <p>12, Jalan Hujan Emas 4, Taman Overseas Union, 58200<br>Kuala Lumpur, Malaysia <br><br>Tel: 03-7972 8768</p>
        </div>
        
        <!-- Opening Hours -->
        <div class="footer-section hours">
            <h3>Working Hours</h3>
            <p>8:00am - 9:30pm<br>
               Closed on Public Holidays!</p>
        </div>
    </div>
    
    <!-- Copyright Section -->
    <div class="footer-copyright">
        <p>&copy; 2025, Butter & Olive Cafe, Inc. or its Affiliates. All rights reserved.</p>
    </div>
</footer>


</html>
