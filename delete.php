<?php
include 'connection.php';

//POST DATA
if ($_POST){
    $id_barang = $_POST['id_barang'];

    //INSERT DATA
    $stmt = $connection->prepare("DELETE FROM barang WHERE id_barang = '$id_barang'");
    $stmt->execute();

    //Beri Response
    $response['message'] = "Delete Data Berhasil";

} else {
    $response['message'] = "Delete data Gagal";
}
//Jadikan data dalam bentuk JSON
$json = json_encode($response, JSON_PRETTY_PRINT);

//print json
echo $json;