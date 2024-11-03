<?php
header('Content-Type: application/json');

$data = [
    ["id" => 1, "name" => "Sample Item 1"],
    ["id" => 2, "name" => "Sample Item 2"],
    // Add more sample data as needed
];

echo json_encode($data);
?>
