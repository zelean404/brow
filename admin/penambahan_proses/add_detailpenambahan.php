<?php
include('../koneksi.php');

$data = json_decode(file_get_contents('php://input'), true);

$kode_penambahan = $data['kode_pen'];
$kode_brg = $data['kode_brg'];
$satuan = $data['satuan'];
$harga = $data['harga'];
$tmb_stok = $data['tmb_stok'];
$totalhrg = $data['totalhrg'];

$querySQL = "INSERT INTO detail_penambahan2 VALUES ('', '$kode_penambahan', '$kode_brg', '$satuan', '$harga', '$tmb_stok', '$totalhrg')";
$stmt = $conn->prepare($querySQL);
$success = $stmt->execute();