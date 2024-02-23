<?php 
    include("header.php"); 
    
    include('koneksi.php');
    $panggil_query = "select * from penambahan2";
    $hasil_query = mysqli_query($conn, $panggil_query);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Penambahan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <input type="button" class="btn btn-success" value="Cetak Laporan" onclick="window.open('penambahan_laporanfix.php', '_blank')">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Penambahan</th>
                                <th>Kebutuhan Penambahan</th>
                                <th>Nama Supplier</th>
                                <th>Estimasi Datang</th>
                                <th>Gtotal</th>
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
                                        <td><?php echo $isi['kode_penambahan'] ?></td>
                                        <td><?php echo $isi['kebutuhan_penambahan'] ?></td>
                                        <td><?php echo $isi['nama_supplier'] ?></td>
                                        <td><?php echo $isi['estimasi_datang'] ?></td>
                                        <td><?php echo $isi['gtotal'] ?></td>
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

<?php include("footer.html"); ?>            