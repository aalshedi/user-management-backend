<?php

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$sql = "CREATE DATABASE IF NOT EXISTS SchoolManagement";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db("SchoolManagement");

// Create the table
$sql = "CREATE TABLE IF NOT EXISTS Student (
    Id INT(11) PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Age INT(3) NOT NULL,
    Enrollment VARCHAR(20) NOT NULL,
    Subject VARCHAR(100) NOT NULL,
    AdditionalProperty VARCHAR(255),
    AdditionalProperty2 INT(11)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();

?>
