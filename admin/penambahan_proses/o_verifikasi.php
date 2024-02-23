<?php
include('../koneksi.php');

$data = json_decode(file_get_contents('php://input'), true);

$kode_penambahan = $data['kode_penambahan'];


$querySQL = "update penambahan2 set status='Selesai' where kode_penambahan = '".$kode_penambahan."'";
$stmt = $conn->prepare($querySQL);
$success = $stmt->execute();

if ($success) {
    echo json_encode('Berhasil');
} else {
    echo json_encode('Gagal');
}