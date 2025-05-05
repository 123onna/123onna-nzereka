<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $brand = htmlspecialchars($_POST['brand']);
    $price = htmlspecialchars($_POST['price']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $image = $_FILES['image'];

    // Handle file upload
    $target_dir = "uploads";
    $target_file = $target_dir . basename($image["name"]);
    $upload_ok = 1;

    // Check if file is an image
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image!');</script>";
        $upload_ok = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('File already exists!');</script>";
        $upload_ok = 0;
    }

    // Check file size (limit: 2MB)
    if ($image["size"] > 2000000) {
        echo "<script>alert('File is too large!');</script>";
        $upload_ok = 0;
    }

    // Allow specific file formats
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($image_file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed!');</script>";
        $upload_ok = 0;
    }

    // Attempt to upload file
    if ($upload_ok === 1) {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            // Insert product into the database
            $stmt = $conn->prepare("INSERT INTO products (name, brand, price, quantity, image) VALUES (?, ?, ?, ?, ?)");
            if ($stmt->execute([$name, $brand, $price, $quantity, $image["name"]])) {
                echo "<script>alert('Product uploaded successfully!');</script>";
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Failed to upload product!');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload image file!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px #5c91b0;
        }

        h1 {
            text-align: center;
            color: #5c91b0;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"], input[type="number"], input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-shadow: 0 4px 8px #5c91b0;
        }

        button {
            padding: 10px;
            background: #5c91b0;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 8px #5c91b0;
        }

        button:hover {
            background: #5c91b0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload donation</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="name">center Name</label>
            <input type="text" id="name" name="name" placeholder="center name" required>

            <label for="money">money</label>
            <input type="text" id="money" name="brand" placeholder="Enter money_fomart" required>

            <label for="food">food</label>
            <input type="number" id="food" name="food" placeholder="Enter quntity" required>

            <label for="cloth">cloth</label>
            <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required>

            <label for="services">services</label>
            <input type="file" id="image" name="services" required>
            <label for="image">others</label>
            <input type="file" id="image" name="others" required
            <button type="submit">Upload donation</button>
        </form>
    </div>
</body>
</html>
