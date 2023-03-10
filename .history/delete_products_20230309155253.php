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
        $sql = "SELECT id, sku, name, price, productType, size, weight, height, width, length FROM products";
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

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = " . $id;
        $result = $this->conn->query($sql);

        if (!$result) {
            throw new Exception("Error deleting product: " . $this->conn->error);
        }
    }
}

$product = new Product("localhost", "root", "", "test");
try {
    $product->connect();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productIds = json_decode(file_get_contents('php://input'));
    
        foreach ($productIds as $id) {
            $product->deleteProduct($id);
        }
    
        $products = $product->getProducts();
        echo $products;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $product->close();
}

?>
