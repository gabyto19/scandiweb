<?php
// Replace the database credentials with your own
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$productType = $_POST['productType'];
$size = $_POST['size'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];

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


$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO products (sku, name, price, productType, size,weight,height,width,length) VALUES ('$sku', '$name', '$price','$productType' ,'$size','$weight','$height','$width','$length')";

if ($conn->query($sql) === TRUE) {

    echo "New record created successfully";

} else {

    echo "Error: " . $sql . "<br>" . $conn->error;

}
$referer = $_SERVER['HTTP_REFERER'];

$conn->close();

?>