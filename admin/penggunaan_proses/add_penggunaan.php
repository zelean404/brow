<?php
include('../koneksi.php');

$data = json_decode(file_get_contents('php://input'), true);

$kode_penggunaan = $data['kode_penggunaan'];
$kebutuhan = $data['kebutuhan'];
$rencana = $data['rencana'];

$querySQL = "INSERT INTO penggunaan2 VALUES ('".$kode_penggunaan."', '".$kebutuhan."', '".$rencana."', 'Diproses', '', '')";
$stmt = $conn->prepare($querySQL);
$success = $stmt->execute();

if ($success) {
    echo json_encode('Berhasil');
} else {
    echo json_encode('Gagal');
}