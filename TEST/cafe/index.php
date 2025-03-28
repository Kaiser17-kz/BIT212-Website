<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Se&cacute;ret Receipe Caf&eacute;!</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/slider.css">
</head>

<body class="bodyStyle" style="background-color: #FFF5CD;">

	<div id="header" class="mainHeader">
		<hr>
		<div><img src="images/secret_receipe.png" height=auto width="250px"></div>
		<div class="center">Se&cacute;ret Receipe Caf&eacute;</div>
		
	</div>
	<br>
	<?php

		include 'config.php';
	?>
	<hr>
	<div class="topnav">
		<a href="index.php">Home</a>
		<a href="#aboutUs">About Us</a>
		<a href="#contactUs">Contact Us</a>
		<a href="menu.php">Menu</a>
		<a href="orderHistory.php">Order History</a>
		<a href="addMenu.html">Add Menu</a>
		<a href="deleteMenu.php">Delete Menu</a>
	</div>
	<hr>
	<div id="mainContent">

		<div id="mainPictures" class="center">
			<h2>Welcome to Se&cacute;ret Recipe Caf&eacute;!</h2>
			<div class="slider">
				<div class="slides">
						<!-- Slide images -->
						<img src="images/Coffee-and-Pastries.jpg" alt="Image 1">
						<img src="images/Cake-Vitrine.jpg" alt="Image 2">
						<img src="images/Latte.jpg" alt="Image 3">
						<img src="images/black_forest.png" alt="Image 4">
						<img src="images/durian.png" alt="Image 5">
				</div>
			</div>





			<hr>
			<p>Our Se&cacute;rect Receipe  Caf&eacute; offers an assortment of delicious and delectable pastries and coffees that will put a smile on your face. From dishes ,drink and cakes, each treat is especially prepared to excite your tastebuds and brighten your day!</p>
			<br>
			<table class="">
				<tr>
					<td bgcolor="#FFCFB3">
						<div class="cursiveText">Se&cacute;ret Receipe produce rich variety of cakes. Try them all!</div>
						<table>
							<tr>
								<td><img src="images/shop.jpg" height=auto width="300"></td>
							</tr>
						</table>
					</td>
					<td bgcolor="pink">
						<table>
							<tr>
								<td><img src="images/Cup-of-Hot-Chocolate.jpg" height=auto width="200"></td>
								<td class="cursiveText">Coffee,<br>Tea,<br>Pasta,<br> and Cakes.<br>Yes, we have all of it!</td>
							</tr>
						</table>
					</td>
					<td bgcolor="red">
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
					<td><p> As the leading and largest cake chain, Secret Recipe is Malaysia’s top favourite cake shop and cafe. It has grew rapidly and currently operates more than 440 outlets, across the region, including Malaysia, Singapore and Around Southeast Asia...</p></td>
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
				<td><img src="images/secret_receipe.png" height=auto width="120"></td>
			</tr>
		</table>
		<div><p>Jalan Tun  Razak Exchange <br>Kuala Lumpur, Malaysia <br><br>Tel: +1-800-555-0193</p></div>
		<div>
			<h3>Opening Hours</h3>
		</div>
		<div>Weekdays: 6:00am - 8:00pm<br>Saturday: 7:00am - 7:00pm<br>Closed on Sundays</div>
	</div>

	<div id="Copyright" class="center">
		<h5>&copy; 2024, Secret Receipe, Inc. or its Affiliates. All rights reserved.</h5>
	</div>
</body>
</html>
