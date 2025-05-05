<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - page</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        /* Header and navigation bar styles */
        header {
            background-color:#5c91b0;
            padding: 20px;
            color: white;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px #a66e4d;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #fff;
            box-shadow: 0 4px 8px #5c91b0;
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
            background-color: #dab19f;
        }

        /* Banner styles */
        .banner-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            max-width: 90px%;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px #5c91b0;
        }

        .banner-container img {
            width: 90px%;
            height: auto;
        }

        .divider {
            width: 5px;
            background-color: #5c91b0;
            height: auto;
        }

        /* Main content styles */
        .content {
            max-width: 1200px;
            margin: 20px auto;
            background: #f3e7e7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px #5c91b0;
        }

        .content h2 {
            text-align: center;
            color: #a66e4d;
        }

        .content p {
            line-height: 1.6;
            text-align: justify;
        }

        /* Footer styles */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #5c91b0;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Tech driven charity</h1>
</header>

<nav>
    <a href="home.php">Home</a>
    <a href="donation.php">Donation</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contacts</a>
    <a href="login.php">Login</a>
    </nav>
    <div class="content">
    <img src="image.png" alt="Orphans Donation Image"width="1200" height="400";">
    <br>
 
    Tech Driven Charity seeks to address the growing need for transparency, efficiency, and accessible 
        charitable donations to orphans and children in need through a comprehensive digital platform.
       
    </div>
 
<footer>
    &copy;RUCU 2024/2925. All Rights Reserved.
</footer>

</body>
</html>
