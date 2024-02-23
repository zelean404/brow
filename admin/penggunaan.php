<?php 
    include("header.php"); 
    
    include('koneksi.php');
    $panggil_query = "select * from penggunaan2";
    $hasil_query = mysqli_query($conn, $panggil_query);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Penggunaan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="penggunaan_insert.php" class="btn btn-success"> Pengajuan Penggunaan Bahan Baku </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Penggunaan</th>
                                <th>kebutuhan</th>
                                <th>rencana_penggunaan</th>
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
                                        <td><?php echo $isi['kode_penggunaan'] ?></td>
                                        <td><?php echo $isi['kebutuhan_penggunan'] ?></td>
                                        <td><?php echo $isi['rencana_penggunaan'] ?></td>
                                        <td><a href="penggunaan_detail.php?kode=<?php echo $isi['kode_penggunaan']?>" class="btn btn-warning"> Detail </a></td>
                                        <td><?php echo $isi['status'] ?></td>
                                        <td>
                                            <?php
                                            if($isi['status'] == "Selesai")
                                            {?>
                                                <a href="penggunaan_fix.php?kode=<?php echo $isi['kode_penggunaan'] ?>" class="btn btn-primary"> Bukti Produksi </a> <?php
                                            }
                                            ?>

                                            <?php
                                            if($isi['status'] == "Ditolak")
                                            {?>
                                                <?php echo $isi['invoice'] ?> <?php
                                            }
                                            ?>

                                            <?php
                                            if($isi['status'] == "Fix Selesai")
                                            {?>
                                                <img src="berkasPenggunaan/<?php echo $isi['foto_laporan'] ?>" width="150" height="150"> <?php
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