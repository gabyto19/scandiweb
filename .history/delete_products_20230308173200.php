<?php
class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'test';

    public function deleteData($id)
    {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $sql = "DELETE FROM products WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Data deleted successfully";
        } else {
            echo "Error deleting data: " . $conn->error;
        }

        $conn->close();
    }
}


?>