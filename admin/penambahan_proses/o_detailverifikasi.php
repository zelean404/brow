<?php
include('../koneksi.php');

$data = json_decode(file_get_contents('php://input'), true);

$kode_penambahan = $data['kode_penambahan'];
$kode_brg = $data['kode_brg'];
$akumulasi_stok = $data['akumulasi_stok'];

$querySQL = "update bahan_baku set stok='".$akumulasi_stok."' where id_barang = '".$kode_brg."'";
$stmt = $conn->prepare($querySQL);
$success = $stmt->execute();