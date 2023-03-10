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
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function close()
    {
        $this->conn->close();
    }

    public function getProducts()
    {
        $sql = "SELECT sku, name, price, productType, size, weight, height, width, length FROM products";
        $result = $this->conn->query($sql);

        if (!$result) {
            throw new Exception("Error retrieving products: " . $this->conn->error);
        }

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return json_encode($data);
    }
}


$product = new Product("localhost", "root", "", "test");
$product->connect();

$product->close();

$product->connect();
$product->getProducts();
$product->close();


?>