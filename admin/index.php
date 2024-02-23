<?php 
    include("header.php"); 
    
    include('koneksi.php');
    $panggil_query = "select * from bahan_baku where status='1' ";
    $hasil_query = mysqli_query($conn, $panggil_query);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Master Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <?php
                if($_SESSION['role'] == 'owner' || $_SESSION['role'] == 'kar_produksi') 
                { ?>
                    <div class="card-header py-3">
                        <a href="master_insert.php" class="btn btn-success"> Tambah Data </a>
                    </div> <?php
                }
            ?>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Harga Pasaran/Satuan (RP)</th>
                                <?php
                                if($_SESSION['role'] == 'owner' || $_SESSION['role'] == 'kar_produksi')
                                { ?>
                                    <th>Action</th> <?php
                                } ?>
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
                                        <td><?php echo $isi['nama_barang'] ?></td>
                                        <td><?php echo $isi['stok'] ?></td>
                                        <td><?php echo $isi['satuan'] ?></td>
                                        <td><?php echo $isi['harga_pasaran'] ?></td>
                                        <?php
                                            if($_SESSION['role'] == 'owner')
                                            { ?>
                                                <td>
                                                    <a href="master_update.php?id=<?php echo $isi['id_barang'] ?>" class="btn btn-primary"> U </a>
                                                    <a href="master_proses.php?id=<?php echo $isi['id_barang'] ?>" class="btn btn-danger"> D </a> 
                                                </td> <?php
                                            }

                                            else if($_SESSION['role'] == 'kar_produksi')
                                            { ?>
                                                <td>
                                                    <a href="master_update.php?id=<?php echo $isi['id_barang'] ?>" class="btn btn-primary"> U </a>
                                                </td> <?php
                                            }
                                        ?>
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