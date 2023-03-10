<?php
// include database connection file
include_once "config/database.php";

// create database connection
$db = new Database();
$conn = $db->getConnection();

// define product class
class Product {
  private $conn;
  private $table_name = "products";

  public $id;

  public function __construct($db) {
    $this->conn = $db;
  }

  // delete product by id
  function delete() {
    // create query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // bind id of product to be deleted
    $stmt->bindParam(1, $this->id);

    // execute query
    if($stmt->execute()) {
      return true;
    }

    return false;
  }
}

// instantiate product object
$product = new Product($conn);

// set product id to be deleted
$product->id = 1;

// delete the product
if($product->delete()) {
  echo "Product was deleted.";
} else {
  echo "Unable to delete product.";
}
?>
