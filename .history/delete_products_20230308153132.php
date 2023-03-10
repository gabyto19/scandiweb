<?php
// Create connection to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL query to delete product
$id = $_POST['id'];
$stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

// Return response to AJAX request
if ($stmt->affected_rows > 0) {
    echo "Product deleted successfully";
} else {
    echo "Error deleting product";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>