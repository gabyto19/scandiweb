<?php

// Get the selectedProducts array from the request body
$selectedProducts = $_POST['selectedProducts'];
echo "1=============1";
echo $_POST['selectedProducts'];
echo "1=============1";


// TODO: Perform any necessary validation or data processing here

// Save the selectedProducts array to a file or database
$file = fopen('selected_products.txt', 'w');
fwrite($file, json_encode($selectedProducts));
fclose($file);

// Return a success response to the client
$response = array(
    'status' => 'success',
    'message' => 'Selected products saved successfully',
);
echo json_encode($response);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "loggg";
}
?>


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

    public function deleteProduct($selectedProducts)
    {
        $stmt = $this->conn->prepare("INSERT INTO products (sku, name, price, productType, size, weight, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdssdddd", $sku, $name, $price, $productType, $size, $weight, $height, $width, $length);

        if ($stmt->execute()) {
            echo "deleted successfully";
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