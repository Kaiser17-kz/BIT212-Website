<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "cafe"; // Update with your database password
    $dbname = "cafe_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get product_id from form
    $product_id = $_POST['product_id'];

    // Prepare SQL DELETE statement
    $sql = "DELETE FROM product WHERE id = ?";

    // Prepare statement to avoid SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $product_id); // "i" specifies the variable type as integer
        $stmt->execute();

        // Check if a record was deleted
        if ($stmt->affected_rows > 0) {
            echo "Product with ID " . htmlspecialchars($product_id) . " was deleted successfully.";
        } else {
            echo "No product found with the specified ID.";
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
