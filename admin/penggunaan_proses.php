<?php
    include('koneksi.php');

    //deklarasi 
    $namaBrg = $_POST['nm_barang'];
    $stok = $_POST['stok'];
    $keterangan = $_POST['keterangan'];

    $panggil_query = "select stok, satuan from bahan_baku where id_barang = '".$namaBrg."'";
    $query = mysqli_query($conn, $panggil_query);
    $isi = mysqli_fetch_assoc($query);
    $satuan =  $isi['satuan'];
    $stok_sekarang =  $isi['stok'];

    if($stok >= $stok_sekarang)
    {
        echo '<script type="text/javascript">';
        echo 'alert("Maaf Pengajuan Penggunaan Stok Bahan Baku Gagal Diajukan Karena Permintaan Stok Melibihi Kapasitas");';
        echo 'window.location.href = "penggunaan.php";';
        echo '</script>';
    }

    else 
    {
        $simpan = mysqli_query($conn, "insert into penggunaan values ('', '".$namaBrg."', '".$satuan."', '".$stok."', '".$keterangan."', 'Diproses')");

        if($simpan == 1){
            echo '<script type="text/javascript">';
            echo 'alert("Pengajuan Penggunaan Stok Bahan Baku Sukses Diajukan");';
            echo 'window.location.href = "Penggunaan.php";';
            echo '</script>';
        }
        else{
            echo '<script type="text/javascript">';
            echo 'alert("Pengajuan Penggunaan Stok Bahan Baku Gagal Diajukan");';
            echo 'window.location.href = "penggunaan.php";';
            echo '</script>';
        }
    }
    
?>