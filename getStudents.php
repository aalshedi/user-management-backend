<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE"); // Allow the specified HTTP methods
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); // Allow the specified headers
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SchoolManagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all student records
$sql = "SELECT * FROM Student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $students = array();

    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    // Convert to JSON format and send the response
    header('Content-Type: application/json');
    echo json_encode($students);
} else {
    echo "No students found";
}

// Close the connection
$conn->close();

?>
