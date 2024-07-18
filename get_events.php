<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch events from database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'date' => $row['date'],
            'description' => $row['description'],
            'type' => $row['type'],
            'everyYear' => $row['every_year'] == 1 ? true : false,
            'badge' => $row['badge'],
            'color' => $row['color']
        );
    }
}

$conn->close();

// Return events as JSON
header('Content-Type: application/json');
echo json_encode($events);
?>
