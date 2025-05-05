<?php
include 'db.php';

if (isset($_GET['id'])) {
    // Get the user ID from the URL
    $user_id = $_GET['id'];

    // Delete the user from the database
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$user_id]);

    // Redirect to the users page after deletion
    header("Location: users.php");
    exit();
} else {
    // If no ID is provided, redirect back to the users page
    header("Location: users.php");
    exit();
}
?>
