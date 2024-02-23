<?php 
    include("header.php"); 
    
    include('koneksi.php');

    $kode_penambahan = $_GET['kode'];
?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Upload Bukti Nota Penambahan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="col-md-10">
        <div class="card shadow mb-4">
            <div class="card-body">

            <form action="penambahan_prosesBukti.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" class="form-control" id="kode_penambahan" name="kode_penambahan" value="<?php echo $kode_penambahan ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Upload Foto Nota</label>
                            <input type="file" class="form-control" id="nota" name="nota" accept="image/*" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Upload Foto Produk</label>
                            <input type="file" class="form-control" id="produk" name="produk" accept="image/*" required>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" class="form-control" id="action" name="action" value="insert">
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