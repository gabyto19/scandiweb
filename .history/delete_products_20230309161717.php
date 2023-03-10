<?php

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
