<?php
class Database {
    // MySQL database configuration
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'test';

    // MySQLi object
    private $conn;

    // Constructor
    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Get connection
    public function getConnection() {
        return $this->conn;
    }
}

// Create new instance of Database class
$database = new Database();

// Get MySQLi object
$conn = $database->getConnection();

// Test connection
if ($conn) {
    echo "Connected successfully";
} else {
    echo "Connection failed";
}
?>
