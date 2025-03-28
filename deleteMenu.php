<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
    <div id="header" class="mainHeader">
		<hr>
		<div><img src="images/secret_receipe.png" height=auto width="250px"></div>
		<div class="center">Se&cacute;ret Receipe Caf&eacute;</div>
		
	</div>
    <hr><hr>
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
    <div id="header" class="mainHeader">
        <h1>Delete Product</h1>
    </div>

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
</body>
</html>
