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

if($vfirst == null)
{
    $vfirst = '0';
}

if($vsecond == null)
{
    $vsecond = '0';
}

if($vthird == null)
{
    $vthird = '0';
}

if($size == null)
{
    $size = '0';
}

if($weight == null)
{
    $weight = '0';
}


$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Close the connection
$conn->close();
?>