<?php
// Make sure the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405); // Method Not Allowed
  exit;
}
error_log(file_get_contents('php://input'));

// Get the selected product IDs from the request body
$selectedProducts = json_decode(file_get_contents('php://input'), true)['selectedProducts'];
error_log(print_r($selectedProducts, true)); // Log the selectedProducts array
$stmt = $pdo->prepare("DELETE FROM products WHERE id IN (" . implode(",", $selectedProducts) . ")");
if (!$stmt->execute()) {
  error_log($stmt->errorInfo()[2]); // Log any errors that occur during the delete query
}


// Validate the selected product IDs
if (!is_array($selectedProducts)) {
  http_response_code(400); // Bad Request
  echo json_encode(['message' => 'Invalid request body']);
  exit;
}

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'test');
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');
// Create a database connection object
$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');

// Prepare the SQL query
$stmt = $pdo->prepare("DELETE FROM products WHERE id IN (" . implode(",", $selectedProducts) . ")");

// Execute the SQL query
if (!$stmt->execute()) {
  error_log($stmt->errorInfo()[2]); // Log any errors that occur during the delete query
}
if ($db->connect_errno) {
  http_response_code(500); // Internal Server Error
  echo json_encode(['message' => 'Failed to connect to database']);
  exit;
}

// Construct the SQL query to delete the selected products
$sql = "DELETE FROM products WHERE id IN (".implode(',', $selectedProducts).")";

// Execute the SQL query
if (!$db->query($sql)) {
  http_response_code(500); // Internal Server Error
  echo json_encode(['message' => 'Failed to delete products']);
  exit;
}

// Close the database connection
$db->close();

// Send a success response
http_response_code(200); // OK
echo json_encode(['message' => 'Products deleted successfully']);

?>