<?php
include('koneksi.php');

// namaBrg stokBrg satuanBrg expBrg
$id = $_GET['id'];
$id_Brg = $_POST['id_barang'];
$namaBrg = $_POST['namaBrg'];
$stokBrg = $_POST['stokBrg'];
$satuanBrg = $_POST['satuanBrg'];
$hrg_pasaran = $_POST['hrg_pasaran'];
$action = $_POST['action'];

// echo $id_Brg;
// echo $namaBrg;

if($action == "insert")
{
    $simpan = mysqli_query($conn, "insert into bahan_baku values ('', '".$namaBrg."', '".$stokBrg."', '".$satuanBrg."', '".$hrg_pasaran."', '1')");

    if($simpan == 1){
        echo '<script type="text/javascript">';
        echo 'alert("Data Sukses Ditambahkan");';
        echo 'window.location.href = "master.php";';
        echo '</script>';
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("Data Gagal Ditambahkan");';
        echo 'window.location.href = "master.php";';
        echo '</script>';
    }
}


else if($action == "update")
{
    $simpan = mysqli_query($conn, "update bahan_baku set nama_barang='".$namaBrg."', satuan='".$satuanBrg."', harga_pasaran='".$hrg_pasaran."' where id_barang='".$id_Brg."'");

    if($simpan == 1){
        echo '<script type="text/javascript">';
        echo 'alert("Data Sukses Diupdate");';
        echo 'window.location.href = "master.php";';
        echo '</script>';
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("Data Gagal Diupdate");';
        echo 'window.location.href = "master.php";';
        echo '</script>';
    }
}


else 
{
    $nol = 0;
    $hapus = mysqli_query($conn, "update bahan_baku set status='".$nol."' where id_barang='".$id."'");

    if($hapus == 1){
        echo '<script type="text/javascript">';
        echo 'alert("Data Sukses Dihapus");';
        echo 'window.location.href = "master.php";';
        echo '</script>';
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("Data Gagal Dihapus");';
        echo 'window.location.href = "master.php";';
        echo '</script>';
    }
}