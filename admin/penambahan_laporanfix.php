<?php 
    // include("header.html"); 
    
    include('koneksi.php');
    $panggil_query = "SELECT a.kode_penambahan, a.kebutuhan_penambahan, a.estimasi_datang, a.gtotal, a.status, a.invoice, c.nama_barang, d.nama_sup, b.satuan_barang, b.harga_pasaran, b.tambah_stok, b.total_harga FROM penambahan2 a

    JOIN detail_penambahan2 b ON a.kode_penambahan = b.kode_penambahan
    JOIN bahan_baku c ON b.nama_bahanbaku = c.id_barang
    JOIN supplier d ON d.kode_sup = a.nama_supplier;
    ";
    $hasil_query = mysqli_query($conn, $panggil_query);
    ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800" style="text-align: center;">Laporan Penambahan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Kebutuhan</th>
                                <th>Supplier</th>
                                <th>Estimasi</th>
                                <th>Barang</th>
                                <th>Satuan</th>
                                <th>Harga Pasaran</th>
                                <th>Tambah Stok</th>
                                <th>Total Harga</th>
                                <th>Gtotal</th>
                                <th>Status</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                if(mysqli_num_rows($hasil_query)>0)
                                {
                                    while($isi = mysqli_fetch_assoc($hasil_query))
                                    {
                                    ?>
                                    <tr>
                                        <td><?php echo $isi['kode_penambahan'] ?></td>
                                        <td><?php echo $isi['kebutuhan_penambahan'] ?></td>
                                        <td><?php echo $isi['nama_sup'] ?></td>
                                        <td><?php echo $isi['estimasi_datang'] ?></td>
                                        <td><?php echo $isi['nama_barang'] ?></td>
                                        <td><?php echo $isi['satuan_barang'] ?></td>
                                        <td><?php echo $isi['harga_pasaran'] ?></td>
                                        <td><?php echo $isi['tambah_stok'] ?></td>
                                        <td><?php echo $isi['total_harga'] ?></td>
                                        <td><?php echo $isi['gtotal'] ?></td>
                                        <td><?php echo $isi['status'] ?></td>
                                        <td><?php echo $isi['invoice'] ?></td>
                                    </tr>
                                    <?php    
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    window.print();
</script>          