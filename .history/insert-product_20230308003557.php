<?php

class Product
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function close()
    {
        $this->conn->close();
    }

    public function getTables()
    {
        $tables = array();
        $result = $this->conn->query("SHOW TABLES");
        while ($row = $result->fetch_row()) {
            $tables[] = $row[0];
        }
        return $tables;
    }

    public function getTableData($tableName)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $tableName");
        if (!$stmt->execute()) {
            error_log("Error executing query: " . $stmt->error);
            return null;
        }
        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $stmt->close();

        return $data;
    }

    public function insertProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length)
    {
        $stmt = $this->conn->prepare("INSERT INTO products (sku, name, price, productType, size, weight, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdssdddd", $sku, $name, $price, $productType, $size, $weight, $height, $width, $length);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }



}

$product = new Product("localhost", "root", "", "test");
$product->connect();




$product->close();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $product->connect();
    $product->insertProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length);
    $product->close();
}

?>