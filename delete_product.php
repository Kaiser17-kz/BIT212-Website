<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Menu Item</title>
    <link rel="stylesheet" href="css/styles.css">
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

<?php

include 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name'])) {
    $product_name = $_POST['product_name'];

    // Create a connection to the database
    $conn = new mysqli($db_url, $db_user, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete the product based on the product_name
    $sql = "DELETE FROM product WHERE product_name = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the product_name to the prepared statement
    $stmt->bind_param("s", $product_name);

    // Execute the query
    if ($stmt->execute()) {
		echo '<body class="bodyStyle" style="background-color: #FFF5CD;">';
		echo '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAhFBMVEX///8AAAD8/PwGBgbo6Oj29vbq6uoMDAz19fUFBQXs7Oz5+flwcHAXFxdsbGySkpLf399jY2PV1dVOTk53d3czMzMiIiIcHBy9vb21tbUTExPS0tIuLi5TU1OampooKCisrKyCgoI+Pj7CwsKLi4uhoaFHR0daWlpCQkJ8fHxlZWWmpqbIHu3QAAAEhUlEQVR4nO2c2XaqQBBF04BhcEDBCWfFIZr//78bk9zkqtUHSB6q667ar1lZq46y6UMDPj0piqIoiqIoiqIoiqIoiqIoiqIoiqI4TDKfFtMs4R7jl3j9NB/Pwtk6TzOPe5hfEB1GvvnAH6XP3OP8mGA4M9/4yzn3QD8kuPjmhp3MJEnnLocxeZ97qB/gpeF9DhNvBRpfjh9yGLOWd3AlSyKHiVPuuRqzejywrpxa3IM1JBuROcxO2GLSHsZ0kIWw89Z0QueQFoQ2/coo4J6tERbT38gj7tmaYDP9jaGkFdFqujHhhnu4JlhNf1NEkut204UdWXbTzbjkHq4BwHQzbHNPVx9gullI6r7AdD8VZAgy/ShpVQemzzbcwzUAmT4Q1E6Q6WtJp15guqh9B2T6TlI5AaaHB+7hGoBMXwrajm8B0ydT7ukagEzvCNoFQqYvMu7pGoBMl1SykOmSShYyXVTJAqabi6CS9QxMF3UrAZjuSypZyHRJJavVsZsuqmQh00+CStZzbs8hqmQB02NJO1nI9JGgktXq2HOEkm7iItMllSxkerfgnq4BwHRRJStb2HNIKlnIdFElqwCmSypZyPTZK/d0DUCmSypZc2C6pJKFTBdVspDpkkoWMj1ccU9XH+rhyy9yQSULremSShYy3fQElayia88hqWQFwHR/L6hkIdMllSy0pksqWdB0SSULmS7pmSxkuqSSBdd0SSULmS6pZEHTc86H+Nv98pDu09cyqLWQIdM5S1Y07Yxmfmxiv7sbltUlCZnOWLK8cvDvBzzpVK3K0HS+khWt1rejxIOKJMh0vpIVbWf3w1QkiXrgwHrhKlntPXGYxAN0dYdM5ytZG3IqHySBprOVrP6OHsieBJrOV7L2D6+gViVBpsdnrpJl+0KuSS5kEmg6X8nagMOEToJM5ytZ3hB8vGSS4Aj+ga9kRegERCXxUptThrVkBeD2+EeSu88Ymc65k9VHc70n6d0kgaZz7mRVBrlLgkxn3cl6tp99qSTQdLaSdSUCT+89JoGm8z596Z2rgxi/89mfoOnMO1nFQ4W3J4Gmc+9kBS81gnwmQabzlay/oJvLt0mg6fzv38LxbpIg013YyZpSP11CjHpag7+y7mR94q3AoV8TN24XtlbgVnk9HHnFpb0Z2Z89roM77xFnl1rnLgsu3S5MHve26sNasu6JVvVOXgSOveLiFZWN3oJz7xGXtdrKA9wliyA7gbXbBn/JIgg6zU9e/CWLIto3XeVdKFkU7QNqVATOvkfsTSs2iG5x+enLed6grzhSsmj6g9onL3dKFklyrtlXXCpZJFFar9i7/4pLe1OnrzhWski8snoL0r2SRZItq5R3sGSR9Hu4r8RbB0sWScXFlqCnL1sHcLEl6j1ir7D3FWdLFk15tPQVl0sWSZ++2Ar3Ukz/IhgSJy+/J+vAeoe42Ap7zncTivbr3cXWeC/w+7jilafvLyWeDEpxfnwRTc/HdTecddfHbY1HN13GS7KyKMoscfwKRFEURVEURVEURVEURVEURVEURVGU/5o/s2VFvu6ybIIAAAAASUVORK5CYII=" alt="Success" style="display:block; margin: 30px auto; max-width: 150px;">';
		echo "<p style='text-align: center; font-size: 20px; font-weight: bold;'>Product deleted successfully!</p>";
		echo '</body>';
    } else {
        echo'<body class="bodyStyle" style="background-color: #FFF5CD;">';
        echo "<p>Error deleting product: " . $conn->error . "</p>";
        echo "</body>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo'<body class="bodyStyle" style="background-color: #FFF5CD;">';
    echo "<p>No product selected to delete.</p>";
    echo "</body>";
}
?>

</body>

<br>
<a href="menu.php">Back to Menu</a>
<hr>
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
            <p>8:00am - 9:30pm<br>
               Closed on Public Holidays!</p>
        </div>
    </div>
    
    <!-- Copyright Section -->
    <div class="footer-copyright">
        <p>&copy; 2025, Butter & Olive, Inc. or its Affiliates. All rights reserved.</p>
    </div>
</footer>


</html>