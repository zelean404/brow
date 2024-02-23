<?php
include('koneksi.php');

//panggil kode barang POST
$kode_penambahan = $_POST['kode_penambahan'];

//deklarasi penamaan folder buat tampung file gambar
$direktori_nota = "berkasNota/";
$direktori_produk = "berkasProduk/";

//deklarasi ke variabel nama file gambar
$imgNota = $_FILES['nota']['name'];
$imgProduk = $_FILES['produk']['name'];

//menaruh file gambarnya di folder/direktori internal
move_uploaded_file($_FILES['nota']['tmp_name'],$direktori_nota.$imgNota);
move_uploaded_file($_FILES['produk']['tmp_name'],$direktori_produk.$imgProduk);

//proses
$simpan = mysqli_query($conn, "update penambahan2 set status='Proses_Verifikasi', bukti_nota='".$imgNota."', bukti_produk='".$imgProduk."' where kode_penambahan='".$kode_penambahan."'");

if($simpan == 1){
    echo '<script type="text/javascript">';
    echo 'alert("Upload Bukti Penambahan Stok Bahan Baku Sukses Diajukan");';
    echo 'window.location.href = "penambahan.php";';
    echo '</script>';
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Upload Bukti Penambahan Stok Bahan Baku Gagal Diajukan");';
    echo 'window.location.href = "penambahan.php";';
    echo '</script>';
}