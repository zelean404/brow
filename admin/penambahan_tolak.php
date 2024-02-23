<?php 
    include("header.php"); 
    
    include('koneksi.php');
    
    $kode_penambahan = $_GET['kode'];

    // $panggil_query = "select b.nama_barang, satuan_barang, a.harga_pasaran, tambah_stok, total_harga from detail_penambahan2 a join bahan_baku b on nama_bahanbaku = id_barang where kode_penambahan = '".$kode_penambahan."' ";
    // $hasil_query = mysqli_query($conn, $panggil_query);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">PENOLAKAN Pengajuan Penambahan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?php
                if($_SESSION['role'] == 'owner')
                { ?>
                    <a href="penambahan_owner.php" class="btn btn-danger"> Kembali </a> <?php
                }
                ?>
            </div>
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="o_penambahan_proses.php" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Kode Penambahan</label>
                                        <input type="text" class="form-control" id="kode_penambahan" name="kode_penambahan" value="<?php echo $kode_penambahan ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Alasan Pengajuan Ditolak </label>
                                        <input type="text" class="form-control" id="invoice" name="invoice" placeholder="Alasan Pengajuan Ditolak">
                                    </div>
                                </div>
                            </div>    

                            <input type="hidden" class="form-control" id="action" name="action" value="tolak">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("footer.html"); ?>            