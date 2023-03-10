<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ids = $_POST['ids'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $ids_str = implode(",", $ids);

    $sql = "DELETE FROM products WHERE id IN ($ids_str)";

    if ($conn->query($sql) === TRUE) {
        $response = array("success" => true, "message" => "Products deleted successfully");
        echo json_encode($response);
    } else {
        $response = array("success" => false, "error" => "Error deleting products: " . $conn->error);
        echo json_encode($response);
    }

    $conn->close();
}
?>