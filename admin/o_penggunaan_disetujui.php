<?php 
    include("header.php"); 
    
    include('koneksi.php');

    $kode = $_GET['kode'];

    $panggil_query = "select * from penggunaan2 where kode_penggunaan='".$kode."'";
    $query1 = mysqli_query($conn, $panggil_query);
    $isi = mysqli_fetch_assoc($query1);

    $panggil_query = "select satuan_brg, stok_digunakan, nama_brg, b.stok, b.nama_barang from detail_penggunaan2 a join bahan_baku b on id_barang = nama_brg where kode_penggunaan='".$kode."'";
    $query2 = mysqli_query($conn, $panggil_query);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Verifikasi Pengajuan Penggunaan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="col-md-12">
        <div class="card shadow mb-6">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Penggunaan</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $isi['kode_penggunaan'] ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rencana Penggunaan</label>
                            <input type="date" class="form-control" id="rencana" name="rencana" value="<?php echo $isi['rencana_penggunaan'] ?>" readonly>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Kebutuhan Penggunaan</label>
                        <input type="text" class="form-control" id="kebutuhan" name="kebutuhan" value="<?php echo $isi['kebutuhan_penggunan'] ?>" readonly>
                    </div>
                </div>  <hr>


                <!-- Detail barang bahan baku -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Nama Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok Saat Ini</th>
                                <th>Satuan</th>
                                <th>Stok Yang Dipakai</th>
                                <th>Sisa Stok</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                if(mysqli_num_rows($query2)>0)
                                {
                                    while($detail = mysqli_fetch_assoc($query2))
                                    {
                                        $sisa = $detail['stok'] - $detail['stok_digunakan'];
                                    ?>
                                    <tr>
                                        <td><?php echo $detail['nama_brg'] ?></td>
                                        <td><?php echo $detail['nama_barang'] ?></td>
                                        <td><?php echo $detail['stok'] ?></td>
                                        <td><?php echo $detail['satuan_brg'] ?></td>
                                        <td><?php echo $detail['stok_digunakan'] ?></td>
                                        <td><?php echo $sisa ?></td>
                                    </tr>
                                    <?php    
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <button class="btn btn-success" id="btnVerifikasi">Disetujui</button>
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
        let kode_penggunaan = $('#kode').val();

        let data = {
            kode_penggunaan: kode_penggunaan,
        };

        axios.post('penggunaan_proses/o_verifikasi.php', JSON.stringify(data), {
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
            let sisa_stok = currentRow.find('td').eq(5).text(); 

            axios.post('penggunaan_proses/o_detailverifikasi.php', JSON.stringify({
                kode_pen: kode_penggunaan, //id nya pemesanan
                kode_brg: kode_brg,
                sisa_stok: sisa_stok
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

        window.location.href = 'penggunaan_owner.php';
    })
</script>

<?php include("footer.html"); ?>            