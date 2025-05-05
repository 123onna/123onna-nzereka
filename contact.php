<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #5c91b0;
            padding: 20px;
            color: white;
            text-align: center;
            box-shadow: 0 2px 4px #fff;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #fff;
            box-shadow: 0 2px 4px #5c91b0;
            margin-bottom: 20px;
        }

        nav a {
            text-decoration: none;
            padding: 14px 20px;
            color: #5c91b0;
            font-weight: bold;
            text-transform: uppercase;
            transition: background 0.3s;
        }

        nav a:hover {
            background-color: #e6e6e6;
        }

        .contact-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px #5c91b0;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .contact-details, .map-container {
            flex: 1 1 45%;
            padding: 20px;
        }

        .contact-details {
            text-align: center;
        }

        .contact-details h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        .contact-details p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
            margin: 10px 0;
        }

        .social-links a {
            margin: 0 10px;
            text-decoration: none;
            color: #5c91b0;
            font-size: 18px;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #333;
        }

        .map-container iframe {
            width: 100%;
            height: 250px;
            border: none;
            border-radius: 10px;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #5c91b0;
            color: white;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .contact-container {
                flex-direction: column;
            }

            .contact-details, .map-container {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Contact Us</h1>
</header>

<nav>
    <a href="home.php">Home</a>
    <a href="product.php">Products</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
    <a href="login.php">Login</a>
</nav>

<div class="contact-container">
    <!-- Contact Details Section -->
    <div class="contact-details">
        <h1>Get in Touch</h1>
        <p><strong>Phone:</strong> +255 750392776</p>
        <p><strong>Email:</strong> home@store.com</p>
        <p>
            <strong>Social Media:</strong>
            <span class="social-links">
                <a href="https://facebook.com/yourbusiness" target="_blank">Facebook</a> |
                <a href="https://instagram.com/yourbusiness" target="_blank">Instagram</a> |
                <a href="https://youtube.com/yourbusiness" target="_blank">YouTube</a>
            </span>
        </p>
    </div>

    <!-- Map Section -->
    <div class="map-container">
        <h2>Our Location</h2>
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.835434509388!2d-122.4194151846813!3d37.77492957975968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c00000001%3A0x1234567890abcdef!2sYour%20Business%20Location!5e0!3m2!1sen!2sus!4v1693939393939" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</div>

<footer>
    <p>&copy; 2025 [Your Business Name]. All Rights Reserved.</p>
</footer>

</body>
</html>
