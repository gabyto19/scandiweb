<?php

class ProductsController {
  
  private $pdo;
  
  public function __construct($pdo) {
    $this->pdo = $pdo;
  }
  
  public function deleteProducts() {
    
    // Make sure the request method is POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      http_response_code(405); // Method Not Allowed
      exit;
    }

    // Get the selected product IDs from the request body
    $selectedProducts = json_decode(file_get_contents('php://input'), true)['selectedProducts'];
    error_log(print_r($selectedProducts, true)); // Log the selectedProducts array

    // Validate the selected product IDs
    if (!is_array($selectedProducts)) {
      http_response_code(400); // Bad Request
      echo json_encode(['message' => 'Invalid request body']);
      exit;
    }

    // Prepare the SQL query
    $stmt = $this->pdo->prepare("DELETE FROM products WHERE id IN (" . implode(",", $selectedProducts) . ")");

    // Execute the SQL query
    if (!$stmt->execute()) {
      error_log($stmt->errorInfo()[2]); // Log any errors that occur during the delete query
      http_response_code(500); // Internal Server Error
      echo json_encode(['message' => 'Failed to delete products']);
      exit;
    }

    // Send a success response
    http_response_code(200); // OK
    echo json_encode(['message' => 'Products deleted successfully']);
  }
}

// Create a PDO database connection object
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
// Create a new instance of the ProductsController class
$productsController = new ProductsController($pdo);

// Call the deleteProducts method
$productsController->deleteProducts();

?>
