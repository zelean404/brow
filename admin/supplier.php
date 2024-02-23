<?php 
    include("header.php"); 
    
    include('koneksi.php');
    $panggil_query = "select * from supplier where status='1'";
    $hasil_query = mysqli_query($conn, $panggil_query);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Master Supplier</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

        <?php
            if($_SESSION['role'] == 'owner' || $_SESSION['role'] == 'kar_penjualan') { ?>
                <div class="card-header py-3">
                    <a href="supplier_insert.php" class="btn btn-success"> Tambah Data Supplier </a>
                </div> <?php
            }
        ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Supplier</th>
                                <th>Nama Sales</th>
                                <th>Telp Sales</th>
                                <th>Telp Kantor</th>
                                <th>Email Kantor</th>
                                <?php
                                    if($_SESSION['role'] == 'owner' || $_SESSION['role'] == 'kar_penjualan') { ?>
                                        <th>Action</th> <?php
                                    }
                                ?>
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
                                        <td><?php echo $isi['nama_sup'] ?></td>
                                        <td><?php echo $isi['nama_sales'] ?></td>
                                        <td><?php echo $isi['telp_sales'] ?></td>
                                        <td><?php echo $isi['telp_kantor'] ?></td>
                                        <td><?php echo $isi['email_kantor'] ?></td>
                                        
                                        <?php
                                            if($_SESSION['role'] == 'owner') { ?>
                                                <td>
                                                    <a href="supplier_update.php?id=<?php echo $isi['kode_sup'] ?>" class="btn btn-primary"> U </a>
                                                    <a href="supplier_proses.php?id=<?php echo $isi['kode_sup'] ?>" class="btn btn-danger"> D </a>
                                                </td> <?php
                                            }

                                            else if($_SESSION['role'] == 'kar_gudang') { ?>
                                                <td>
                                                    <a href="supplier_update.php?id=<?php echo $isi['kode_sup'] ?>" class="btn btn-primary"> U </a>
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