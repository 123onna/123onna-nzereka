<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        header {
            background-color: #5c91b0;
            color: white;
            padding: 25px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 4px 8px #5c91b0;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav {
            display: flex;
            gap: 15px;
        }

        nav a {
            color: black;
            text-decoration: none;
            font-size: 16px;
            padding: 8px 16px;
            background-color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #5c91b0;
        }

        .container {
            padding: 20px;
            max-width: 1000px;
            margin: 20px auto;
        }

        h2 {
            color: #5c91b0;
            margin-top: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px #5c91b0;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 15px;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #5c91b0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        table th {
            background-color: #5c91b0;
            color: white;
        }

        table tr:hover {
            background-color: #e0f0f9;
        }

        img {
            border-radius: 5px;
        }

        .action-buttons button {
            padding: 8px 12px;
            margin-right: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .action-buttons .edit {
            background-color: #007BFF;
            color: #fff;
        }

        .action-buttons .delete {
            background-color: #FF0000;
            color: #fff;
        }

        .action-buttons .view {
            background-color: #FFA500;
            color: #fff;
        }

        .action-buttons button:hover {
            opacity: 0.9;
        }

        footer {
            background-color: #5c91b0;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 8px #5c91b0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin - Panel Management</h1>
        <nav>
            <a href="update.php">Add Center</a>
            <a href="users.php">Manage Users</a>
            <a href="home.php">Dashboard</a>
        </nav>
    </header>

    <div class="container">
        <h2>Donation Items</h2>
        <table>
            <tr>
                
                <th>Centre Name</th>
                <th>Money</th>
                <th>Food</th>
                <th>Cloth</th>
                <th>Services</th>
                <th>Others</th>
                
            </tr>
            <?php
            try {
                $stmt = $conn->query("SELECT * FROM donation");
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                        <td><img src='uploads/" . htmlspecialchars($row['image']) . "' alt='Image' style='width: 100px; height: 100px;'></td>
                        <td>" . htmlspecialchars($row['centre_name']) . "</td>
                        <td>" . htmlspecialchars($row['money']) . "</td>
                        <td>" . htmlspecialchars($row['food']) . "</td>
                        <td>" . htmlspecialchars($row['cloth']) . "</td>
                        <td>" . htmlspecialchars($row['service']) . "</td>
                        <td>" . htmlspecialchars($row['others']) . "</td>
                        <td class='action-buttons'>
                            <button class='edit' onclick=\"location.href='update_donation.php?id=" . $row['id'] . "'\">Edit</button>
                            <button class='delete' onclick=\"if(confirm('Are you sure you want to delete this product?')) location.href='delete_donation.php?id=" . $row['id'] . "'\">Delete</button>
                            <button class='view' onclick=\"location.href='view_donation.php?id=" . $row['id'] . "'\">View</button>
                        </td>
                    </tr>";
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='8'>Error fetching data: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
            }
            ?>
        </table>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Admin Panel. All Rights Reserved.</p>
    </footer>
</body>
</html>
