<?php
include 'db.php';

// ดึงข้อมูลจากฐานข้อมูล
$query = "SELECT display_name, latitude, longitude, timestamp FROM locations ORDER BY timestamp DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Location Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f8f8f8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Admin - Location Data</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Display Name</th>
                    <th>Timestamp</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Map</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $latitude = $row['latitude'];
                        $longitude = $row['longitude'];
                        $google_maps_link = "https://www.google.com/maps?q=$latitude,$longitude";
                        echo "<tr>";
                        echo "<td>{$row['display_name']}</td>";
                        echo "<td>{$row['timestamp']}</td>";
                        echo "<td>{$latitude}</td>";
                        echo "<td>{$longitude}</td>";
                        echo "<td><a href='$google_maps_link' target='_blank'>ดูแผนที่</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
