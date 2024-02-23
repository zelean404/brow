<?php 
    include("header.php"); 
    
    include('koneksi.php');
    $post_id = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM bahan_baku WHERE id_barang='$post_id'"));
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="col-md-10">
        <div class="card shadow mb-4">
            <div class="card-body">

            <form action="master_proses.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" id="namaBrg" name="namaBrg" placeholder="Input Nama Barang" value="<?php echo $data['nama_barang'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Stok</label>
                            <input type="number" class="form-control" id="stokBrg" name="stokBrg" placeholder="Input Stok" value="<?php echo $data['stok'] ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" id="satuanBrg" name="satuanBrg" placeholder="Input Satuan" value="<?php echo $data['satuan'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Pasaran/Satuan (RP)</label>
                            <input type="number" class="form-control" id="hrg_pasaran" name="hrg_pasaran" placeholder="Input Harga Pasaran/Satuan (RP)" value="<?php echo $data['harga_pasaran'] ?>">
                        </div>
                    </div>
                </div>

                <input type="hidden" class="form-control" id="id_barang" name="id_barang" value="<?php echo $data['id_barang'] ?>">
                <input type="hidden" class="form-control" id="action" name="action" value="update">
                <button type="submit" class="btn btn-success">Update</button>
            </form>
            </div>
        </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("footer.html"); ?>            