<?php 
    include("header.php"); 
    
    include('koneksi.php');

    $kode = $_GET['kode'];

    $panggil_query = "select kode_penambahan, kebutuhan_penambahan, estimasi_datang, gtotal, a.status, b.nama_sup, invoice, bukti_produk, bukti_nota from penambahan2 a join supplier b on kode_sup = nama_supplier where kode_penambahan='".$kode."'";
    $query1 = mysqli_query($conn, $panggil_query);
    $isi = mysqli_fetch_assoc($query1);

    $panggil_query = "select b.nama_barang, nama_bahanbaku, satuan_barang, a.harga_pasaran, tambah_stok, total_harga, b.stok from detail_penambahan2 a join bahan_baku b on nama_bahanbaku = id_barang where kode_penambahan = '".$kode."' ";
    $query2 = mysqli_query($conn, $panggil_query);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Verifikasi Pengajuan Penambahan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Kode Penambahan</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $isi['kode_penambahan'] ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Kebutuhan Penambahan</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $isi['kebutuhan_penambahan'] ?>" readonly>
                        </div>
                    </div>
                </div>
            
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Supplier</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo $isi['nama_sup'] ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Estimasi Datang</label>
                            <input type="date" class="form-control" id="estimasi" name="estimasi" value="<?php echo $isi['estimasi_datang'] ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Grand Total Pasaran</label>
                            <input type="text" class="form-control" id="gtotal" name="gtotal" value="<?php echo $isi['gtotal'] ?>" readonly>
                        </div>
                    </div>
                </div> <hr>


                <!-- Detail barang bahan baku -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Nama Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga Pasaran</th>
                                <th>Stok Saat Ini</th>
                                <th>Tambah Stok</th>
                                <th>Akumulasi</th>
                                <th>Total Harga Pasaran</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                if(mysqli_num_rows($query2)>0)
                                {
                                    while($detail = mysqli_fetch_assoc($query2))
                                    {
                                        $akumulasi = $detail['tambah_stok'] + $detail['stok'];
                                    ?>
                                    <tr>
                                        <td><?php echo $detail['nama_bahanbaku'] ?></td>
                                        <td><?php echo $detail['nama_barang'] ?></td>
                                        <td><?php echo $detail['satuan_barang'] ?></td>
                                        <td><?php echo $detail['harga_pasaran'] ?></td>
                                        <td><?php echo $detail['stok'] ?></td>
                                        <td><?php echo $detail['tambah_stok'] ?></td>
                                        <td><?php echo $akumulasi ?></td>
                                        <td><?php echo $detail['total_harga'] ?></td>
                                    </tr>
                                    <?php    
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Menampilkan file foto produk dan nota -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Foto Produk</label><br>
                            <img src="berkasProduk/<?php echo $isi['bukti_produk'] ?>" width="250" height="250">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Foto Nota</label><br>
                            <img src="berkasNota/<?php echo $isi['bukti_nota'] ?>" width="250" height="250">
                        </div>
                    </div>
                </div>

                <input type="hidden" class="form-control" id="action" name="action" value="verifikasi">
                <button class="btn btn-success" id="btnVerifikasi">Verifikasi</button>
            </div>
        </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    $('#btnVerifikasi').on('click', function() 
    {
        //deklarasikan variabel data penambahan
        let kode_penambahan = $('#kode').val();

        let data = {
            kode_penambahan: kode_penambahan,
        };

        axios.post('penambahan_proses/o_verifikasi.php', JSON.stringify(data), {
            headers: {
                'Content-Type': 'application:json'
            }
        }).then((response) => {
            // alert(response.data);
        }).catch((error) => {
            // console.log(error);
        })

        $('#myTable tbody tr').each(function() {
            let currentRow = $(this);
            let kode_brg = currentRow.find('td').eq(0).text();
            let akumulasi_stok = currentRow.find('td').eq(6).text(); 

            axios.post('penambahan_proses/o_detailverifikasi.php', JSON.stringify({
                kode_pen: kode_penambahan, //id nya pemesanan
                kode_brg: kode_brg,
                akumulasi_stok: akumulasi_stok
            }), {
                headers: {
                    'Content-Type': 'application:json'
                }
            }).then((response) => {
                // alert(response.data);
            }).catch((error) => {
                // console.log(error);
            })
        })

        window.location.href = 'penambahan_owner.php';
    })
</script>

<?php include("footer.html"); ?>            