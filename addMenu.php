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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conn = new mysqli($db_url, $db_user, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $product_group = $_POST['product_group'];

    // Handle image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;

    // Check if the image is valid
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (limit to 10MB)
    if ($_FILES["image"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only specific image formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Upload file if it passed checks
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        exit("File upload failed due to errors.");
    }

    // Insert data into the product table
    $image_url = $target_file; // Set image path for database
    $sql = "INSERT INTO product (product_name, description, price, product_group, image_url)
            VALUES ('$product_name', '$description', '$price', '$product_group', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        echo'<head>';
        echo'<link rel="stylesheet" type="text/css" href="styles.css">';
        echo'</head>';

        echo'<body class="bodyStyle" style="background-color: #FFF5CD;">';
        
        echo'<hr>';
	echo'<div class="topnav">';
	echo'</div>';
	echo'<hr>';


        echo "New menu item added successfully!";
        echo'</body>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
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