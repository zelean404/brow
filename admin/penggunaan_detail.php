<?php 
    include("header.php"); 
    
    include('koneksi.php');
    
    $kode_penggunaan = $_GET['kode'];

    $panggil_query = "select satuan_brg, stok_digunakan, b.nama_barang from detail_penggunaan2 a join bahan_baku b on id_barang = nama_brg where kode_penggunaan='".$kode_penggunaan."'";
    $hasil_query = mysqli_query($conn, $panggil_query);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Barang Penggunaan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?php
                if($_SESSION['role'] == 'owner')
                { ?>
                    <a href="penggunaan_owner.php" class="btn btn-danger"> Kembali </a> <?php
                }
                ?>

                <?php
                if($_SESSION['role'] == 'kar_produksi')
                { ?>
                    <a href="penggunaan.php" class="btn btn-danger"> Kembali </a> <?php
                }
                ?>
            </div>
            <div class="card-body">
                <h4 class="h4 mb-2 text-gray-800">Kode : <?php echo $kode_penggunaan ?></h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Stok Yang Dipakai</th>
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
                                        <td><?php echo $isi['satuan_brg'] ?></td>
                                        <td><?php echo $isi['stok_digunakan'] ?></td>
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