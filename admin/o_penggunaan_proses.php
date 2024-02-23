<?php
    include('koneksi.php');

    $action = $_POST['action'];
    $kode = $_POST['kode_penggunaan'];
    $invoice = $_POST['invoice'];
    // $stok_digunakan = $_GET['stokk'];

    $panggil_query = "select stok from bahan_baku where id_barang='".$namaBrg."' ";
    $query2 = mysqli_query($conn, $panggil_query);
    $isi = mysqli_fetch_assoc($query2);
    $stok_sekarang = $isi['stok'];

    if($action == "tolak")
    {
        $simpan = mysqli_query($conn, "update penggunaan2 set status='Ditolak', invoice='".$invoice."' where kode_penggunaan = '".$kode."'"); //rubah status di db penggunaan

        if($simpan == 1) {
            echo '<script type="text/javascript">';
            echo 'alert("Pengajuan Penggunaan Stok Bahan Baku Sukses Ditolak");';
            echo 'window.location.href = "penggunaan_owner.php";';
            echo '</script>';
        }
        else {
            echo '<script type="text/javascript">';
            echo 'alert("Pengajuan Penggunaan Stok Bahan Baku Gagal Ditolak");';
            echo 'window.location.href = "penggunaan_owner.php";';
            echo '</script>';
        }
    }
?>