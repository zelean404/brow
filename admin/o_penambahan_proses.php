<?php
    include('koneksi.php');

    //ambil get saat setuju/tolak pengajuan penambahan
    $kode_penambahan = $_GET['kode'];
    $action = $_GET['action'];

    $action2 = $_POST['action'];
    $kode_penambahan2 = $_POST['kode_penambahan'];
    $invoice = $_POST['invoice'];
    // echo $action;
    // echo $kode_barang;

    if($action == "setuju")
    {
        $simpan = mysqli_query($conn, "update penambahan2 set status='Disetujui' where kode_penambahan = '".$kode_penambahan."'");

        if($simpan == 1){
            echo '<script type="text/javascript">';
            echo 'alert("Pengajuan Penambahan Stok Bahan Baku Sukses Disetujui");';
            echo 'window.location.href = "penambahan_owner.php";';
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">';
            echo 'alert("Pengajuan Penambahan Stok Bahan Baku Gagal Disetujui");';
            echo 'window.location.href = "penambahan_owner.php";';
            echo '</script>';
        }
    }

    else if($action2 == "tolak")
    {
        $simpan = mysqli_query($conn, "update penambahan2 set status='Ditolak', invoice='".$invoice."' where kode_penambahan = '".$kode_penambahan2."'");

        if($simpan == 1){
            echo '<script type="text/javascript">';
            echo 'alert("Pengajuan Penambahan Stok Bahan Baku Sukses Ditolak");';
            echo 'window.location.href = "penambahan_owner.php";';
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">';
            echo 'alert("Pengajuan Penambahan Stok Bahan Baku Gagal Ditolak");';
            echo 'window.location.href = "penambahan_owner.php";';
            echo '</script>';
        }
    }

    // else if($_POST['action'] == "verifikasi")
    // {
    //     //ambil post data yg diperlukan
    //     $kode = $_POST['kode'];
    //     $nm_barang = $_POST['nama_barang'];
    //     $stok_saatIni = $_POST['stok_saatIni'];
    //     $tmb_stok = $_POST['stok_ditambahkan'];

    //     //proses penjumlahan stok saat ini + stok diajukan
    //     $stok = $stok_saatIni + $tmb_stok;

    //     $simpan = mysqli_query($conn, "update penambahan2 set status='Selesai' where kode_penambahan = '".$kode."'"); //rubah status di db penambahan
    //     $simpan2 = mysqli_query($conn, "update bahan_baku set stok='".$stok."' where id_barang = '".$_POST['nm_barang']."'"); //nambah stok di db bahan baku (master)

    //     if($simpan == 1 && $simpan2 == 1) {
    //         echo '<script type="text/javascript">';
    //         echo 'alert("Pengajuan Penambahan Stok Bahan Baku Sukses Terverivikasi");';
    //         echo 'window.location.href = "penambahan_owner.php";';
    //         echo '</script>';
    //     }
    //     else {
    //         echo '<script type="text/javascript">';
    //         echo 'alert("Pengajuan Penambahan Stok Bahan Baku Gagal Terverivikasi");';
    //         echo 'window.location.href = "penambahan_owner.php";';
    //         echo '</script>';
    //     }
    // }
?>