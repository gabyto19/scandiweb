<?php

require_once 'config.php';
require_once 'Product.php';

$product = new Product('localhost', 'username', 'password', 'database_name');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productIds = json_decode(file_get_contents('php://input'));

  foreach ($productIds as $id) {
    $product->deleteProduct($id);
  }

  echo json_encode($product->getAllProducts());
}

class Product
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function deleteProduct($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Other methods for getting, updating, and inserting products in the database
}
?>

