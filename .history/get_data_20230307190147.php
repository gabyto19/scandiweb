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

// Retrieve data from the "products" table
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "SKU: " . $row["sku"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Price: " . $row["price"] . "<br>";
        echo "Product Type: " . $row["productType"] . "<br>";
        echo "Size: " . $row["size"] . "<br>";
        echo "Weight: " . $row["weight"] . "<br>";
        echo "Height: " . $row["height"] . "<br>";
        echo "Width: " . $row["width"] . "<br>";
        echo "Length: " . $row["length"] . "<br>";
        echo "<br>";
    }

} else {
    echo "No data found";
}

// Close connection
$conn->close();

?>
