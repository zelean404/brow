<?php 
    include("header.php"); 
    
    include('koneksi.php');

    $kode_penggunaan = $_GET['kode'];
?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Upload Bukti Foto Laporan Produksi</h1>
        
        <!-- DataTales Example -->
        <div class="col-md-10">
        <div class="card shadow mb-4">
            <div class="card-body">

            <form action="penggunaan_fixproses.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Penggunaan</label>
                            <input type="text" class="form-control" id="kode_penggunaan" name="kode_penggunaan" value="<?php echo $kode_penggunaan ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Upload Foto Bukti Produksi</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Upload Bukti</button>
            </form>
            </div>
        </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("footer.html"); ?>            