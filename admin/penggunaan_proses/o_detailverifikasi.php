<?php
include('../koneksi.php');

$data = json_decode(file_get_contents('php://input'), true);

$kode_pen = $data['kode_pen'];
$kode_brg = $data['kode_brg'];
$sisa_stok = $data['sisa_stok'];

$querySQL = "update bahan_baku set stok='".$sisa_stok."' where id_barang = '".$kode_brg."'";
$stmt = $conn->prepare($querySQL);
$success = $stmt->execute();