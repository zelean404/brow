<?php
include('koneksi.php');

// namaBrg stokBrg satuanBrg expBrg
$nm_barang = $_POST['nm_barang'];
$stok = $_POST['stok'];
$nm_supplier = $_POST['nm_supplier'];
$exp_date = $_POST['exp_date'];

//untuk satuan
$panggil_query = "select * from bahan_baku where id_barang = '".$nm_barang."'";
$query_satuan = mysqli_query($conn, $panggil_query);
$isi = mysqli_fetch_assoc($query_satuan);
$satuan =  $isi['satuan'];

//untuk telp supplier
$panggil_query = "select * from supplier where kode_sup = '".$nm_supplier."'";
$query_supplier = mysqli_query($conn, $panggil_query);
$isi = mysqli_fetch_assoc($query_supplier);
$telp_sales =  $isi['telp_sales'];


$simpan = mysqli_query($conn, "insert into penambahan values (' ', '".$nm_barang."', '".$satuan."', '".$stok."', '".$nm_supplier."', '".$telp_sales."', '".$exp_date."', 'Diproses', '', '' )");

if($simpan == 1){
    echo '<script type="text/javascript">';
    echo 'alert("Pengajuan Penambahan Stok Bahan Baku Sukses Diajukan");';
    echo 'window.location.href = "penambahan.php";';
    echo '</script>';
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Pengajuan Penambahan Stok Bahan Baku Gagal Diajukan");';
    echo 'window.location.href = "penambahan.php";';
    echo '</script>';
}