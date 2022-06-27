<?php
    include "connection.php";
    
    $id_barang = $_POST['id_barang'];
    
    $query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $stmt = $connection->query($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    $result = $stmt->fetchAll();
    //query
    header('Content-Type: application/json');
    echo json_encode($result);
?>