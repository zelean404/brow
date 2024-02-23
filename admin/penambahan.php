<?php 
    include("header.php"); 
    
    include('koneksi.php');
    $panggil_query = "select kode_penambahan, kebutuhan_penambahan, estimasi_datang, gtotal, a.status, b.nama_sup, invoice from penambahan2 a join supplier b on kode_sup = nama_supplier";
    $hasil_query = mysqli_query($conn, $panggil_query);
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Penambahan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="penambahan_insert.php" class="btn btn-success"> Pengajuan Penambahan Bahan Baku </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Kebutuhan</th>
                                <th>Nama Supplier</th>
                                <th>Estimasi Datang</th>
                                <th>Detail</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                        <td><a href="penambahan_detail.php?kode=<?php echo $isi['kode_penambahan']?>" class="btn btn-warning"> Detail </a></td>
                                        <td><?php echo $isi['status'] ?></td>
                                        <td>
                                            <?php
                                            if($isi['status'] == "Disetujui")
                                            {?>
                                                <a href="penambahan_insert_bukti.php?kode=<?php echo $isi['kode_penambahan'] ?>" class="btn btn-primary"> Bukti </a> <?php
                                            }
                                            ?>

                                            <?php
                                            if($isi['status'] == "Ditolak")
                                            {?>
                                                <?php echo $isi['invoice'] ?> <?php
                                            }
                                            ?>
                                        </td>
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