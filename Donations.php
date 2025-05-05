<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donations</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #5c91b0;
            color: white;
        }

        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Donation Listings</h1>
    <table>
        <tr>
            <th>center name</th>
            <th>money</th>
            <th>food</th>
            <th>cloth</th>
            <th>service</th>
            <th>others</th>
        </tr>
        <?php
        try {
            $stmt = $conn->query("SELECT * FROM donation");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td><img src='../uploads/{$row['center name']}' alt='{$row['title']}'></td>
                        <td>" . htmlspecialchars($row['money']) . "</td>
                        <td>" . htmlspecialchars($row['food']) . "</td>
                        <td>$" . number_format($row['target_amount'], 6) . "</td>
                    </tr>";
            }
        } catch (PDOException $e) {
            echo "<tr><td colspan='4' style='color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
        }
        ?>
    </table>
</body>
</html>
