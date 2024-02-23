<?php 
    include("header.php"); 
    
    include('koneksi.php');
    $post_id = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM supplier WHERE kode_sup='$post_id'"));
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Supplier</h1>
        
        <!-- DataTales Example -->
        <div class="col-md-10">
        <div class="card shadow mb-4">
            <div class="card-body">

            <form action="supplier_proses.php" method="POST">
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <input type="text" class="form-control" id="nama_sup" name="nama_sup" placeholder="Input Nama Supplier" value="<?php echo $data['nama_sup'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Sales</label>
                            <input type="text" class="form-control" id="nama_sales" name="nama_sales" placeholder="Input Nama Sales" value="<?php echo $data['nama_sales'] ?>">
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Telp Sales</label>
                            <input type="number" class="form-control" id="telp_sales" name="telp_sales" placeholder="Input Telp Sales" value="<?php echo $data['telp_sales'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Telp Kantor</label>
                            <input type="number" class="form-control" id="telp_kantor" name="telp_kantor" placeholder="Input Telp Kantor" value="<?php echo $data['telp_kantor'] ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email Kantor</label>
                            <input type="email" class="form-control" id="email_kantor" name="email_kantor" placeholder="Input Email Kantor" value="<?php echo $data['email_kantor'] ?>">
                        </div>
                    </div>
                </div>
                
                <input type="hidden" class="form-control" id="kode_sup" name="kode_sup" value="<?php echo $data['kode_sup'] ?>">
                <input type="hidden" class="form-control" id="action" name="action" value="update">
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
            </div>
        </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("footer.html"); ?>            