<?php
include('koneksi.php');

$kode_sup = $_GET['id'];
$kode_supp = $_POST['kode_sup'];
$nama_sup = $_POST['nama_sup'];
$nama_sales = $_POST['nama_sales'];
$telp_sales = $_POST['telp_sales'];
$telp_kantor = $_POST['telp_kantor'];
$email_kantor = $_POST['email_kantor'];
$action = $_POST['action'];


if($action == "insert")
{
    $simpan = mysqli_query($conn, "insert into supplier values ('', '".$nama_sup."', '".$nama_sales."', '".$telp_sales."', '".$telp_kantor."', '".$email_kantor."', '1')");

    if($simpan == 1){
        echo '<script type="text/javascript">';
        echo 'alert("Data Sukses Ditambahkan");';
        echo 'window.location.href = "supplier.php";';
        echo '</script>';
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("Data Gagal Ditambahkan");';
        echo 'window.location.href = "supplier.php";';
        echo '</script>';
    }
}


else if($action == "update")
{
    $simpan = mysqli_query($conn, "update supplier set nama_sup='".$nama_sup."', nama_sales='".$nama_sales."', telp_sales='".$telp_sales."', telp_kantor='".$telp_kantor."', email_kantor='".$email_kantor."' where kode_sup='".$kode_supp."'");

    if($simpan == 1){
        echo '<script type="text/javascript">';
        echo 'alert("Data Sukses Diupdate");';
        echo 'window.location.href = "supplier.php";';
        echo '</script>';
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("Data Gagal Diupdate");';
        echo 'window.location.href = "supplier.php";';
        echo '</script>';
    }
}


else 
{
    $hapus = mysqli_query($conn, "update supplier set status='0' where kode_sup = '".$kode_sup."'");

    if($hapus == 1){
        echo '<script type="text/javascript">';
        echo 'alert("Data Sukses Dihapus");';
        echo 'window.location.href = "supplier.php";';
        echo '</script>';
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("Data Gagal Dihapus");';
        echo 'window.location.href = "supplier.php";';
        echo '</script>';
    }
}