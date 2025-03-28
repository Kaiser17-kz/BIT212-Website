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
		echo'<a href="index.php">Home</a>';
		echo'<a href="#aboutUs">About Us</a>';
		echo'<a href="#contactUs">Contact Us</a>';
		echo'<a href="menu.php">Menu</a>';
		echo'<a href="orderHistory.php">Order History</a>';
		echo'<a href="addMenu.html">Add Menu</a>';
        echo'<a href="deleteMenu.php">Delete Menu</a>';
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
