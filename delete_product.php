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
        echo'<body class="bodyStyle" style="background-color: #FFF5CD;">';
        echo "<p>Product deleted successfully!</p>";
        echo "</body>";
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

<br>
<a href="menu.php">Back to Menu</a>
