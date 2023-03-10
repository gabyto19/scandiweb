<?php

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
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and bind statement
  $stmt = $conn->prepare("INSERT INTO products (sku, name, price, productType, size, weight, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssdssdddd", $sku, $name, $price, $productType, $size, $weight, $height, $width, $length);

  // Execute statement
  if ($stmt->execute()) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $stmt->error;
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();
}

?>
