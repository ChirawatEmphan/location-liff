<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $display_name = $_POST['display_name'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $stmt = $conn->prepare("INSERT INTO locations (user_id, display_name, latitude, longitude) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $user_id, $display_name, $latitude, $longitude);
    $stmt->execute();
    $stmt->close();

    echo "Location data saved successfully!";
}
?>
