<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli($db_url, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $product_group = $_POST['product_group'];
    $image_updated = false;

    // Handle image upload if a new file is provided
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        
        // Validate image
        if ($check !== false && $_FILES["image"]["size"] <= 10000000 &&
            in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_url = $target_file;
                $image_updated = true;
            } else {
                exit("Sorry, there was an error uploading your file.");
            }
        } else {
            exit("Invalid image file. Please ensure it's JPG, JPEG, PNG, or GIF and below 10MB.");
        }
    }

    // Prepare update SQL
    if ($image_updated) {
        $sql = "UPDATE product 
                SET product_name = ?, description = ?, price = ?, product_group = ?, image_url = ?
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdisi", $product_name, $description, $price, $product_group, $image_url, $id);
    } else {
        $sql = "UPDATE product 
                SET product_name = ?, description = ?, price = ?, product_group = ?
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdii", $product_name, $description, $price, $product_group, $id);
    }

    if ($stmt->execute()) {
        echo '<head>';
        echo '<link rel="stylesheet" type="text/css" href="styles.css">';
        echo '</head>';

        echo '<body class="bodyStyle" style="background-color: #FFF5CD;">';
        echo '<hr>';
        echo '<div class="topnav">';
        echo '<a href="index.php">Home</a>';
        echo '<a href="#aboutUs">About Us</a>';
        echo '<a href="#contactUs">Contact Us</a>';
        echo '<a href="menu.php">Menu</a>';
        echo '<a href="orderHistory.php">Order History</a>';
        echo '<a href="addMenu.html">Add Menu</a>';
        echo '<a href="deleteMenu.php">Delete Menu</a>';
        echo '</div>';
        echo '<hr>';

        echo "<h3>Menu item updated successfully!</h3>";
        echo '</body>';
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
