<?php
include('../koneksi.php');

$data = json_decode(file_get_contents('php://input'), true);

$kode_penggunaan = $data['kode_penggunaan'];


$querySQL = "update penggunaan2 set status='Selesai' where kode_penggunaan = '".$kode_penggunaan."'";
$stmt = $conn->prepare($querySQL);
$success = $stmt->execute();

if ($success) {
    echo json_encode('Berhasil');
} else {
    echo json_encode('Gagal');
}