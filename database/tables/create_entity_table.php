<?php 
$pdo = require '../db.php';

// sql to create table
$sql = "CREATE TABLE entity (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    birthdate DATE NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table entity created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>