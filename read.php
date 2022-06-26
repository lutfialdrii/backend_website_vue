<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST');
// header('Access-Control-Allow-Headers: *');
include "connection.php";

    $query = "SELECT * FROM barang";
    $stmt = $connection->query($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();
//query
header('Content-Type: application/json');
echo json_encode($result);
?>