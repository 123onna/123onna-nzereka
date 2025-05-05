<!DOCTYPE html>
<html lang="en">
<head>
    <title>Make Payments</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        header {
            background-color: #5c91b0;
            padding: 20px;
            color: white;
            text-align: center;
            box-shadow: 0 4px 8px #5c91b0;
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
            background-color: #575757;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px #5c91b0;
        }

        .container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .payment-options {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap;
        }

        .option {
            flex: 1 1 200px;
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .option:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px #5c91b0;
        }

        .option img {
            width: 100px;
            height: auto;
            margin-bottom: 15px;
        }

        .option h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        .option button {
            padding: 10px 20px;
            background-color: #5c91b0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .option button:hover {
            background-color: #5c91b0;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #5c91b0;
            color: white;
            margin-top: 20px;
            box-shadow: 0 4px 8px #5c91b0;
        }
    </style>
</head>
<body>

<header>
    <h1>Make Payments</h1>
</header>

<nav>
    <a href="home.php">Home</a>
    <a href="donations.php">donations</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
    <a href="payments.php">Payments</a>
</nav>

<div class="container">
    <h1>Select a Payment Method</h1>
    <div class="payment-options">
        <!-- Mobile Money -->
        <div class="option">
            
            <h2>Mobile Money</h2>
            <p>Pay using M-Pesa, Airtel Money, or Tigo Pesa.</p>
            <button onclick="alert('Proceed to Mobile Money payment.')">Pay Now</button>
        </div>

        <!-- Credit/Debit Card -->
        <div class="option">
        
            <h2>Credit/Debit Card</h2>
            <p>Pay securely using Visa, MasterCard, or American Express.</p>
            <button onclick="alert('Proceed to Credit/Debit Card payment.')">Pay Now</button>
        </div>

        <!-- PayPal -->
        <div class="option">
           
            <h2>PayPal</h2>
            <p>Use your PayPal account for fast and secure payments.</p>
            <button onclick="alert('Proceed to PayPal payment.')">Pay Now</button>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2025 [Your Business Name]. All Rights Reserved.</p>
</footer>

</body>
</html>
