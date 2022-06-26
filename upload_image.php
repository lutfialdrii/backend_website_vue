<?php

include 'connection.php';
//upload.php

$image = '';
$message = null;
if($_POST) {
    $nama_barang = $_POST['nama_barang'];
    $brand = $_POST['brand'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    if(isset($_FILES['file']['name'])) {
        $image_name = $_FILES['file']['name'];
        $valid_extensions = array("jpg","jpeg","png");
        $extension = pathinfo($image_name, PATHINFO_EXTENSION);
        if(in_array($extension, $valid_extensions)) {
            $upload_path = 'upload/' . time() . '.' . $extension;
            if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_path)) {
                $message = "Berhasil";
                $image = "https://web-sepatu.000webhostapp.com/".$upload_path;

                $userQuery = $connection->prepare("INSERT INTO barang (nama_barang, brand, kategori, deskripsi, stok, gambar, harga) VALUES (:nama_barang, :brand, :kategori, :deskripsi, :stok, :gambar, :harga)");

                try {
                    $userQuery->execute([
                        ':nama_barang' => $nama_barang,
                        ':brand' => $brand,
                        ':kategori' => $kategori,
                        ':deskripsi' => $deskripsi,
                        ':stok' => $stok,
                        ':gambar' => $image,
                        ':harga' => $harga
                    ]);
                } catch (Exception $e){
                    $message($e->getMessage());
                }

            } else {
                $message = 'There is an error while uploading image';
            }
        } else {
            $message = 'Only .jpg, .jpeg and .png Image allowed to upload';
        }
    } else {
        $message = 'Select Image';
    }
}

$output = array(
    'message'  => $message,
    'image'   => $image
);

echo json_encode($output,JSON_PRETTY_PRINT);