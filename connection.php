<?php
$dbserver = "localhost";
$dbname = "id19171712_web_sepatu";
$dbuser = "id19171712_root";
$dbpassword = "cobaDatabase1;";
$dsn = "mysql:host={$dbserver};dbname={$dbname}";

$connection = null;
try {
    $connection = new PDO($dsn, $dbuser, $dbpassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Koneksi Gagal: " . $e->getMessage());
}