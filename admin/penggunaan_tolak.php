<?php 
    include("header.php"); 
    
    include('koneksi.php');
    
    $kode_penggunaan = $_GET['kode'];
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">PENOLAKAN Pengajuan Penggunaan Bahan Baku</h1>
        
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
                        <form action="o_penggunaan_proses.php" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Kode Penggunaan</label>
                                        <input type="text" class="form-control" id="kode_penggunaan" name="kode_penggunaan" value="<?php echo $kode_penggunaan ?>" readonly>
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