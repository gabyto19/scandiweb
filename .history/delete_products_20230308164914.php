<?php
require_once "Product.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = new Product("localhost", "root", "", "test");
    $product->connect();

    $ids = $_POST["ids"];

    $success = true;
    $message = "";
    $error = "";

    foreach ($ids as $id) {
        $stmt = $product->conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            $success = false;
            $error .= "Error deleting product with ID $id. ";
        }

        $stmt->close();
    }

    if ($success) {
        $message = "Selected products deleted successfully.";
    }

    echo json_encode(array(
        "success" => $success,
        "message" => $message,
        "error" => $error,
    ));

    $product->close();
}
?>