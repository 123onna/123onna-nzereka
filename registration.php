<?php
include 'db.php'; // Database connection


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $address = htmlspecialchars($_POST['address']);
    $contact = htmlspecialchars($_POST['contact']);

    // Check if the username or email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Username or Email already exists!');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, first_name, last_name, password, email, address, contact) 
                                VALUES (:username, :first_name, :last_name, :password, :email, :address, :contact)");
        $success = $stmt->execute([
            'username' => $username,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'password' => $hashed_password,
            'email' => $email,
            'address' => $address,
            'contact' => $contact
        ]);

        if ($success) {
            echo "<script>alert('Registration successful!'); window.location='login.php';</script>";
            exit();
        } else {
            echo "<script>alert('Registration failed. Try again!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .registration-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px #a66e4d;
            width: 100%;
            max-width: 400px;
        }

        .registration-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #a66e4d;
        }

        .registration-container form {
            display: flex;
            flex-direction: column;
        }

        .registration-container input[type="text"],
        .registration-container input[type="email"],
        .registration-container input[type="number"],
        .registration-container textarea,
        .registration-container input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-shadow: 0 4px 8px #a66e4d;
        }

        .registration-container button {
            padding: 10px;
            background: #a66e4d;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .registration-container button:hover {
            background: #5c91b0;
        }

        .registration-container p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #777;
        }

        @media (max-width: 768px) {
            .registration-container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h1>User Registration</h1>
        <form method="POST">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <textarea name="address" placeholder="Address" rows="3" required></textarea>
            <input type="number" name="contact" placeholder="contact" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
