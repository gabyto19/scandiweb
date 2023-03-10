<?php
$product = new Product("localhost", "root", "", "test");


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
$sku = $_POST['sku'];
$stmt = $conn->prepare("DELETE FROM products WHERE sku = ?");
$stmt->bind_param("s", $sku);
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