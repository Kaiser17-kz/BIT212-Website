<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <link rel="stylesheet" href="css/styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
						integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    

</head>
<body class="bodyStyle" style="background-color: #F8F5E9;">
    <div id="header" class="mainHeader">
		<div><img src="images/butter_olive.webp" height=auto width="250px"></div>
		<div style="padding-top: 50px;">Butter & Olive Cafe</div>
	</div>

    <hr>
    <div class="topnav">
		<a href="index.php">Home</a>
		<a href="menu.php">Menu</a>
		<a href="orderHistory.php">Order History</a>
		<a href="addMenu.html">Add Menu</a>
		<a href="deleteMenu.php">Delete Record</a>
        <a href="editMenu.php">Edit Record</a>
	</div>
    <hr>
    <br>

<h2>Delete a Product</h2>

<?php
        include 'config.php';

        // Create a connection to the database
        $conn = new mysqli($db_url, $db_user, $db_password, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the list of products
        $sql = "SELECT product_name FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo'<body class="bodyStyle" style="background-color: #FFF5CD;">';
            echo "<form action='delete_product.php' method='POST'>";
            echo "<label for='product_name'>Select Product to Delete:</label><br>";
            echo "<select name='product_name' id='product_name' required>";

            // Loop through products and display them in a dropdown
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['product_name'] . "'>" . $row['product_name'] . "</option>";
            }

            echo "</select><br><br>";
            echo "<input type='submit' value='Delete Product'>";
            echo "</form>";
            echo "</body>";
        } else {
            echo'<body class="bodyStyle" style="background-color: #FFF5CD;">';
            echo "<p>No products found.</p>";
            echo "</body>";
        }

        $conn->close();
    ?>

<br><br>


</body>

<footer class="footer">
    <div class="footer-content">
        <!-- Logo and Contact Information -->
        <div class="footer-section logo-contact">
            <img src="images/butter_olive.webp" alt="Butter & Olive Logo" width="120">
            <p>12, Jalan Hujan Emas 4, Taman Overseas Union, 58200 <br>Kuala Lumpur, Malaysia <br><br>Tel: +1-800-555-0193</p>
        </div>
        
        <!-- Opening Hours -->
        <div class="footer-section hours">
            <h3>Opening Hours</h3>
            <p>8:00am - 9:30pm<br>Closed on Public Holidays!</p>
        </div>
    </div>
    
    <!-- Copyright Section -->
    <div class="footer-copyright">
        <p>&copy; 2025, Butter & Olive, Inc. or its Affiliates. All rights reserved.</p>
    </div>
</footer>

</html>
