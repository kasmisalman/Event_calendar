<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $date = $conn->real_escape_string($_POST['date']);
    $description = $conn->real_escape_string($_POST['description']);
    $type = $conn->real_escape_string($_POST['type']);
    $every_year = intval($_POST['every_year']);
    $badge = $conn->real_escape_string($_POST['badge']);
    $color = $conn->real_escape_string($_POST['color']);

    $sql = "INSERT INTO events (name, date, description, type, every_year, badge, color)
            VALUES ('$name', '$date', '$description', '$type', $every_year, '$badge', '$color')";

            if ($conn->query($sql) === TRUE) {
              // Set a success message in a session variable
              session_start();
              $_SESSION['message'] = "New event added successfully";
              header("Location: index.html");
              exit();
          } else {
              // Set an error message in a session variable
              session_start();
              $_SESSION['message'] = "Error: " . $conn->error;
              header("Location: index.html");
              exit();
          }
}

$conn->close();
?>
