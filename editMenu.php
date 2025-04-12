<?php
include 'config.php';

$conn = new mysqli($db_url, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product list
$product_list = [];
$sql = "SELECT id, product_name FROM product";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $product_list[] = $row;
}

// Get selected product details
$product = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bodyStyle" style="background-color: #F8F5E9;">

    <div id="header" class="mainHeader">
        <div><img src="images/butter_olive.webp" width="250px"></div>
        <div style="padding-top: 50px;">Butter & Olive Cafe</div>
    </div>

    <hr>
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="orderHistory.php">Order History</a>
        <a href="addMenu.html">Add Menu</a>
        <a href="deleteMenu.php">Delete Record</a>
        <a href="editMenuForm.php">Edit Record</a>
    </div>
    <hr>

    <h2>Edit Menu Item</h2>

    <!-- Dropdown -->
    <form method="get" action="editMenuForm.php">
        <label for="id">Select Product to Edit:</label>
        <select name="id" id="id" onchange="this.form.submit()" required>
            <option value="">-- Select Product --</option>
            <?php foreach ($product_list as $item): ?>
                <option value="<?= $item['id'] ?>" <?= isset($id) && $id == $item['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($item['product_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <br>

    <?php if ($product): ?>
    <form action="updateMenu.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <label for="product_name">Product Name:</label><br>
        <input type="text" id="product_name" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" required><?= htmlspecialchars($product['description']) ?></textarea><br><br>

        <label for="price">Price:</label><br>
        <input type="number" step="0.01" id="price" name="price" value="<?= $product['price'] ?>" required><br><br>

        <label for="product_group">Product Group:</label><br>
        <select id="product_group" name="product_group" required>
            <option value="1" <?= $product['product_group'] == 1 ? 'selected' : '' ?>>Cake</option>
            <option value="2" <?= $product['product_group'] == 2 ? 'selected' : '' ?>>Drinks</option>
            <option value="3" <?= $product['product_group'] == 3 ? 'selected' : '' ?>>Dishes</option>
            <option value="4" <?= $product['product_group'] == 4 ? 'selected' : '' ?>>Others</option>
        </select><br><br>

        <label>Current Image:</label><br>
        <img src="<?= htmlspecialchars($product['image_url']) ?>" width="200"><br><br>

        <label for="image">Change Image (optional):</label><br>
        <input type="file" id="image" name="image" accept="image/*"><br><br>

        <input type="submit" name="submit" value="Update Menu Item">
    </form>
    <?php endif; ?>

    <hr>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section logo-contact">
                <img src="images/butter_olive.webp" alt="Butter & Olive Logo" width="120">
                <p>12, Jalan Hujan Emas 4, Taman Overseas Union, 58200 <br>Kuala Lumpur, Malaysia <br><br>Tel: +1-800-555-0193</p>
            </div>

            <div class="footer-section hours">
                <h3>Opening Hours</h3>
                <p>8:00am - 9:30pm<br>Closed on Public Holidays!</p>
            </div>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2025, Butter & Olive, Inc. or its Affiliates. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
