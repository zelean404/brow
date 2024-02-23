<?php
include('koneksi.php');

//panggil kode barang POST
$kode_penggunaan = $_POST['kode_penggunaan'];

//deklarasi penamaan folder buat tampung file gambar
$direktoriPenggunaan = "berkasPenggunaan/";

//deklarasi ke variabel nama file gambar
$imgPenggunaan = $_FILES['foto']['name'];

//menaruh file gambarnya di folder/direktori internal
move_uploaded_file($_FILES['foto']['tmp_name'],$direktoriPenggunaan.$imgPenggunaan);

//proses
$simpan = mysqli_query($conn, "update penggunaan2 set status='Fix Selesai', foto_laporan='".$imgPenggunaan."' where kode_penggunaan='".$kode_penggunaan."'");

if($simpan == 1){
    echo '<script type="text/javascript">';
    echo 'alert("Upload Bukti Penggunaan Produksi Bahan Baku Sukses");';
    echo 'window.location.href = "penggunaan.php";';
    echo '</script>';
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Upload Bukti Penggunaan Produksi Bahan Baku Gagal");';
    echo 'window.location.href = "penggunaan.php";';
    echo '</script>';
}