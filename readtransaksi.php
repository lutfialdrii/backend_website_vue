<?php
include "connection.php";

    $query = "SELECT * FROM transaksi";
    $stmt = $connection->query($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();
//query
header('Content-Type: application/json');
echo json_encode($result);
?>