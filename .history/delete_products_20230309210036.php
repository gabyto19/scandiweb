<?php
 echo $_POST["selectedProducts"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectedProducts"])) {
    echo "meore";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $selectedProducts = $_POST["selectedProducts"];
    $idString = implode(",", $selectedProducts);
    $sql = "DELETE FROM products WHERE id IN ($idString)";

    echo "SQL query: " . $sql . "<br>"; // Debug statement

    if ($conn->query($sql) === true) {
        $response = array(
            "success" => true,
            "message" => count($selectedProducts) . " product(s) deleted successfully"
        );
        echo json_encode($response);
    } else {
        $response = array(
            "success" => false,
            "message" => "Error deleting products: " . $conn->error
        );
        echo json_encode($response);
    }

    echo "Affected rows: " . $conn->affected_rows . "<br>"; // Debug statement

    $conn->close();
}
?>
