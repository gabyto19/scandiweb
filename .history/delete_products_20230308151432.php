<?php
class Product {
    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    function deleteProduct($sku) {
        $sql = "DELETE FROM products WHERE sku = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $sku);
        $stmt->execute();
        $stmt->close();
    }

    function deleteProducts($skus) {
        foreach ($skus as $sku) {
            $this->deleteProduct($sku);
        }
    }
}
?>
