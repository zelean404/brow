<?php
include('../koneksi.php');

$data = json_decode(file_get_contents('php://input'), true);

$kode_penggunaan = $data['kode_penggunaan'];
$kode_brg = $data['kode_brg'];
$satuan = $data['satuan'];
$stok_dipakai = $data['stok_dipakai'];

$querySQL = "INSERT INTO detail_penggunaan2 VALUES ('', '$kode_penggunaan', '$kode_brg', '$satuan', '$stok_dipakai')";
$stmt = $conn->prepare($querySQL);
$success = $stmt->execute();