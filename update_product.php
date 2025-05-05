<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID from the URL
    $product_id = $_GET['id'];

    // Collect the form data
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Handle image upload
    if ($_FILES['image']['name']) {
        // If the user uploads a new image
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $upload_dir = '../uploads/';
        $image_path = $upload_dir . basename($image);
        move_uploaded_file($image_temp, $image_path);
    } else {
        // If no new image is uploaded, retain the old image
        $stmt = $conn->prepare("SELECT image FROM donations WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();
        $image = $product['image'];  // Retain the old image
    }

    // Update the product in the database
    $stmt = $conn->prepare("UPDATE products SET name = ?, brand = ?, price = ?, quantity = ?, image = ? WHERE id = ?");
    $stmt->execute([$name, $brand, $price, $quantity, $image, $product_id]);

    // Redirect to the products page after updating
    header("Location: index.php");
    exit();
}

// Get product details
$product_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM donations WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
    <style>
        /* Styling for the edit form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Edit Product</h1>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
    <input type="text" name="brand" value="<?= htmlspecialchars($product['brand']) ?>" required>
    <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
    <input type="number" name="quantity" value="<?= htmlspecialchars($product['quantity']) ?>" required>
    <input type="number" name="quantity" value="<?= htmlspecialchars($product['quantity']) ?>" required>

    <label for="image">Upload New Image (Optional)</label>
    <input type="file" name="image" id="image">
    
    <button type="submit">Update Product</button>
</form>

</body>
</html>
