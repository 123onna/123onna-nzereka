<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID from the URL
    $user_id = $_GET['id'];

    // Collect the form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];

    // Update the user in the database
    $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, contact = ?, username = ? WHERE id = ?");
    $stmt->execute([$first_name, $last_name, $contact, $username, $user_id]);

    // Redirect to the users page after updating
    header("Location: users.php");
    exit();
}

// Get user details
$user_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; }
        h1 {
            color: #5c91b0;
        }
        .container { width: 400px; margin: 60px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px #5c91b0; }
        input[type="text"], input[type="number"] { width: 100%; height: auto;padding: 10px 1px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 4px 8px #5c91b0; }
        button { background-color: #5c91b0; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%; box-shadow: 0 4px 8px #5c91b0; }
        button:hover { background-color: #5c91b0; }
    </style>
</head>
<body>
   

    <div class="container">
        <form method="POST">
        <center><h1>Edit User</h1></center>
            <input type="text" name="first_name" value="<?= $user['first_name'] ?>" required>
            <input type="text" name="last_name" value="<?= $user['last_name'] ?>" required>
            <input type="number" name="contact" value="<?= $user['contact'] ?>" required>
            <input type="text" name="username" value="<?= $user['username'] ?>" required>
            <button type="submit">Update User</button>
        </form>
    </div>
</body>
</html>
