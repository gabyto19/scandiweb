<?php

class Database {
    private $conn;
    
    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function __destruct() {
        $this->conn->close();
    }
    
    public function execute($sql, $params) {
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(...$params);
        
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
        
        $stmt->close();
    }
}

class Product {
    private $sku;
    private $name;
    private $price;
    private $productType;
    private $size;
    private $weight;
    private $height;
    private $width;
    private $length;
    
    public function __construct($sku, $name, $price, $productType, $size = 0, $weight = 0, $height = 0, $width = 0, $length = 0) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
        $this->size = $size;
        $this->weight = $weight;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
    
    public function toArray() {
        return array($this->sku, $this->name, $this->price, $this->productType, $this->size, $this->weight, $this->height, $this->width, $this->length);
    }
}

// Replace the database credentials with your own
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get form data
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $productType = $_POST['productType'];
  $size = $_POST['size'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $width = $_POST['width'];
  $length = $_POST['length'];

  // Check if optional fields were left blank
  if ($size == null) {
      $size = '0';
  }

  if ($weight == null) {
      $weight = '0';
  }

  if ($height == null) {
      $height = '0';
  }

  if ($width == null) {
      $width = '0';
  }

  if ($length == null) {
      $length = '0';
  }

  // Create connection
  $db = new Database($servername, $username, $password, $dbname);
  
  // Create product
  $product = new Product($sku, $name, $price, $productType, $size, $weight, $height, $width, $length);
  
  //
?>