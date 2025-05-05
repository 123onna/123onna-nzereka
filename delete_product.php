<?php
include 'db.php';

if (isset($_GET['id'])) {
    // Get the product ID from the URL
    $product_id = $_GET['id'];

    // Delete the product from the database
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$product_id]);

    // Redirect to the products page after deletion
    header("Location: index.php");
    exit();
} else {
    // If no ID is provided, redirect back to the products page
    header("Location: index.php");
    exit();
}
?>
