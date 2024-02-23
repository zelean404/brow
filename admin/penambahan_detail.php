<?php 
    include("header.php"); 
    
    include('koneksi.php');
    
    $kode_penambahan = $_GET['kode'];

    $panggil_query = "select b.nama_barang, satuan_barang, a.harga_pasaran, tambah_stok, total_harga from detail_penambahan2 a join bahan_baku b on nama_bahanbaku = id_barang where kode_penambahan = '".$kode_penambahan."' ";
    $hasil_query = mysqli_query($conn, $panggil_query);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Barang Penambahan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?php
                if($_SESSION['role'] == 'owner')
                { ?>
                    <a href="penambahan_owner.php" class="btn btn-danger"> Kembali </a> <?php
                }
                ?>

                <?php
                if($_SESSION['role'] == 'kar_penjualan')
                { ?>
                    <a href="penambahan.php" class="btn btn-danger"> Kembali </a> <?php
                }
                ?>
            </div>
            <div class="card-body">
                <h4 class="h4 mb-2 text-gray-800">Kode : <?php echo $kode_penambahan ?></h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga Pasaran</th>
                                <th>Tambah Stok</th>
                                <th>Total Harga</th>
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
                                        <td><?php echo $isi['satuan_barang'] ?></td>
                                        <td><?php echo $isi['harga_pasaran'] ?></td>
                                        <td><?php echo $isi['tambah_stok'] ?></td>
                                        <td><?php echo $isi['total_harga'] ?></td>
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