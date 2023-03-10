<?php
class Database {
    private $host = 'localhost';
    private $user = 'username';
    private $password = 'password';
    private $database = 'database';
  
    public function deleteData($id) {
      $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
  
      if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
      }
  
      $sql = "DELETE FROM table_name WHERE id = $id";
  
      if ($conn->query($sql) === TRUE) {
        echo "Data deleted successfully";
      } else {
        echo "Error deleting data: " . $conn->error;
      }
  
      $conn->close();
    }
  }
  

?>