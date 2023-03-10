<?php
header("Content-Type: application/json");
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

include_once "config/database.php";
include_once "classes/product.php";

$db = new Database();
$conn = $db->getConnection();

$product = new Product($conn);

$data = json_decode(file_get_contents("php://input"));

if (empty($data->selectedProducts)) {
    http_response_code(400);
    echo json_encode(array("message" => "No products selected"));
    exit();
}

try {
    $product->deleteProducts($data->selectedProducts);
    echo json_encode(array("message" => "Products deleted"));
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array("message" => $e->getMessage()));
}

class Product
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function deleteProducts($productIds)
    {
        $ids = implode(",", $productIds);
        $query = "DELETE FROM products WHERE id IN ($ids)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt->execute()) {
            throw new Exception("Failed to delete products");
        }
        return true;
    }
}

?>