<?php

// Get the selectedProducts array from the request body
$selectedProducts = $_POST['selectedProducts'];
echo "$selectedProducts";

// TODO: Perform any necessary validation or data processing here

// Save the selectedProducts array to a file or database
$file = fopen('selected_products.txt', 'w');
fwrite($file, json_encode($selectedProducts));
fclose($file);

// Return a success response to the client
$response = array(
    'status' => 'success',
    'message' => 'Selected products saved successfully',
);
echo json_encode($response);
?>