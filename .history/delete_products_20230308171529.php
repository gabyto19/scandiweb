<?php
class Product
{
    private $db;

    function __construct($host, $username, $password, $dbname)
    {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $options = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->db = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    function deleteProducts($ids)
    {
        $placeholders = implode(",", array_fill(0, count($ids), "?"));
        $sql = "DELETE FROM products WHERE id IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($ids);
        return $stmt->rowCount();
    }
}

// Example usage:
$product = new Product("localhost", "root", "", "test");
$ids = $_POST["ids"];
$deletedCount = $product->deleteProducts($ids);
echo $deletedCount;






?>