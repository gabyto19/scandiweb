<?php

require_once 'config.php';
require_once 'Product.php';

$product = new Product($pdo);
$product = new Product('localhost', 'username', 'password', 'database_name');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productIds = json_decode(file_get_contents('php://input'));

  foreach ($productIds as $id) {
    $product->deleteProduct($id);
  }

  echo json_encode($product->getAllProducts());
}

?>
