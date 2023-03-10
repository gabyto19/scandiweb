<?php
// Replace the database credentials with your own
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the Vue.js app
if (isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['productType']) && isset($_POST['size']) && isset($_POST['weight']) && isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length'])) {
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $productType = $_POST['productType'];
    $size = $_POST['size'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];

    // Insert the data into a table
    $sql = "INSERT INTO products (sku, name, price, product_type, size, weight, height, width, length)
    VALUES ('$sku', '$name', '$price', '$productType', '$size', '$weight', '$height', '$width', '$length')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: missing required data";
}

// Close the connection
$conn->close();
?>