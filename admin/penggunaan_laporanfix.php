<?php 
    //include("header.html"); 
    
    include('koneksi.php');
    $panggil_query = "select a.kode_penggunaan, a.kebutuhan_penggunan, a.rencana_penggunaan, a.status, b.kode_penggunaan, b.nama_brg, b.satuan_brg, b.stok_digunakan, c.nama_barang from penggunaan2 a join detail_penggunaan2 b on a.kode_penggunaan = b.kode_penggunaan join bahan_baku c on c.id_barang = b.nama_brg";
    $hasil_query = mysqli_query($conn, $panggil_query);
    ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800" style="text-align: center;">Laporan Penggunaan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Penggunaan</th>
                                <th>Kebutuhan Penggunaan</th>
                                <th>Rencana Penggunaan</th>
                                <th>Nama Barang</th>
                                <th>satuan_brg</th>
                                <th>Stok Digunakan</th>
                                <th>Status</th>
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
                                        <td><?php echo $isi['kode_penggunaan'] ?></td>
                                        <td><?php echo $isi['kebutuhan_penggunan'] ?></td>
                                        <td><?php echo $isi['rencana_penggunaan'] ?></td>
                                        <td><?php echo $isi['nama_barang'] ?></td>
                                        <td><?php echo $isi['satuan_brg'] ?></td>
                                        <td><?php echo $isi['stok_digunakan'] ?></td>
                                        <td><?php echo $isi['status'] ?></td>
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

<?php //include("footer.html"); ?>          



<script>
    window.print();
</script>