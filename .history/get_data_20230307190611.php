<?php

// Replace the database credentials with your own
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define a class to hold product data
class Product {
    public $sku;
    public $name;
    public $price;
    public $productType;
    public $size;
    public $weight;
    public $height;
    public $width;
    public $length;
}

// Retrieve data from the "products" table and save it to an array of Product objects
$products = array();
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $product = new Product();
        $product->sku = $row["sku"];
        $product->name = $row["name"];
        $product->price = $row["price"];
        $product->productType = $row["productType"];
        $product->size = $row["size"];
        $product->weight = $row["weight"];
        $product->height = $row["height"];
        $product->width = $row["width"];
        $product->length = $row["length"];
        $products[] = $product;
    }
}

// Close connection
$conn->close();

?>
