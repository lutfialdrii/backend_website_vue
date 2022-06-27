<?php
include 'connection.php';

//POST DATA
if ($_POST){
    $id_barang = $_POST['id_barang'];

    //INSERT DATA
    $stmt = $connection->prepare("INSERT INTO transaksi (id_barang) VALUES ('$id_barang')");
    $stmt->execute();

    //Beri Response
    $response['message'] = "Data Berhasil diRecord";

} else {
    $response['message'] = "Data gagal diRecord";
}
$json = json_encode($response, JSON_PRETTY_PRINT);

//print json
echo $json;