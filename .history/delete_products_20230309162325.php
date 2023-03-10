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


}


$product = new Product("localhost", "root", "", "test");
try {
    $product->connect();
    $products = $product->getProducts();
    echo $products;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $product->close();
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectedProducts"])) {
$product = new Product("localhost", "root", "", "test");
try {
$product->connect();
$selectedProducts = $_POST["selectedProducts"];
$idString = implode(",", $selectedProducts);
$sql = "DELETE FROM products WHERE id IN ($idString)";
if ($product->conn->query($sql) === true) {
$response = array(
"success" => true,
"message" => count($selectedProducts) . " product(s) deleted successfully"
);
echo json_encode($response);
} else {
$response = array(
"success" => false,
"message" => "Error deleting products: " . $product->conn->error
);
echo json_encode($response);
}
} catch (Exception $e) {
$response = array(
"success" => false,
"message" => "Error deleting products: " . $e->getMessage()
);
echo json_encode($response);
} finally {
$product->close();
}
}

?>