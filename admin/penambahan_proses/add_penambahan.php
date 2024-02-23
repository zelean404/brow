<?php
include('../koneksi.php');

$data = json_decode(file_get_contents('php://input'), true);

$kode_penambahan = $data['kode_penambahan'];
$kebutuhan = $data['kebutuhan'];
$nm_supplier = $data['nm_supplier'];
$estimasi_datang = $data['estimasi_datang'];
$total = $data['total'];


$querySQL = "INSERT INTO penambahan2 VALUES ('$kode_penambahan', '$kebutuhan', '$nm_supplier', '$estimasi_datang', '$total', 'Diproses', '', '', '')";
$stmt = $conn->prepare($querySQL);
$success = $stmt->execute();

if ($success) {
    echo json_encode('Berhasil');
} else {
    echo json_encode('Gagal');
}