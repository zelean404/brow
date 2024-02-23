<?php 
    include("header.php"); 
    
    include('koneksi.php');

    $panggil_query2 = "select * from bahan_baku where status ='1'";
    $hasil_query2 = mysqli_query($conn, $panggil_query2);
    ?>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pengajuan Penggunaan Bahan Baku</h1>
        
        <!-- DataTales Example -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-body">

            <form target="_blank" method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Kebutuhan Penggunaan</label>
                            <input type="text" class="form-control" id="kebutuhan" name="kebutuhan" placeholder="Input Kebutuhan Penggunaan">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Rencana Penggunaan</label>
                            <input type="date" class="form-control" id="rencana" name="rencana" placeholder="Rencana Penggunaan">
                        </div>
                    </div>
                </div>
                <hr> 
			</form>    

			<!-- beberapa barang yang akan diajukan penambahan -->
			<div class="mb-3 row" id="tableAddItem">
				<div class="col-md-6">
					<a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" id="btnAddBarang" data-toggle="modal" data-target="#modalBeliBarang"><i class="fa fa-plus" aria-hidden="true"></i>
						Tambah Barang
					</a>
				</div> 
				
				<div class="col-md-6">
					<input type="text" name="kodebrg" id="kodebrg" class="form-control input-group" readonly>
				</div>
				
				<div class="col-md-2 mt-3 mb-3">
					<label for="nama" class="form-label input-group">Bahan Baku:</label>
					<input type="text" name="nama" id="nama" class="form-control input-group" readonly />
				</div>
				<div class="col-md-2 mt-3 mb-3">
					<label for="harga" class="form-label input-group">Stok Saat Ini:</label>
					<input type="text" name="stok" id="stok" class="form-control input-group" readonly />
				</div>
				<div class="col-md-2 mt-3 mb-3">
					<label for="satuan" class="form-label input-group">Satuan:</label>
					<input type="text" name="satuan" id="satuan" class="form-control input-group" readonly />
				</div>
				<div class="col-md-3 mt-3 mb-3">
					<label for="tmb_stok" class="form-label input-group">Jumlah Stok Yang Dipakai:</label>
					<input type="text" name="tmb_stok" id="tmb_stok" class="form-control input-group" />
				</div>
				<div class="col-md-1 mt-3 mb-3">
					<label for="saveItem" class="form-label input-group text-white">.
					</label>
					<button class="mx-auto btn btn-primary text-center" id="saveItem"> Add </button>
				</div>
			</div>
			

			<!-- TABEL LIST BAHAB BAKU YG DIAJUKAN PENAMBAHAN -->
			<div class="">
				<table class="table table-hover" id="myTable" border="1">
					<thead>
						<tr>
							<th>Kode</th>
							<th>Bahan Baku</th>
							<th>Stok Saat Ini</th>
							<th>Satuan</th>
							<th>Stok Dipakai</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot>
						<tr>
							<th rowspan="1" colspan="4"> Total </th>
							<th id="totalItem" rowspan="1" colspan="1"> Item </th>
							<!-- <th id="totalHarga" rowspan="1" colspan="1"> Total </th> -->
							<th rowspan="1" colspan="1"></th>
						</tr>
					</tfoot>
				</table>
				<br />
				<button id="btnsave_penggunaan" class="btn btn-primary">Lanjutkan Pengajuan</button>
			</div>
            </div>
        </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal View -->
<div class="modal fade" id="modalBeliBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Pilih Bahan Baku</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%">
                    <thead>
                        <tr>
                            <th> Kode </th>
                            <th> Nama </th>
							<th> Stok Sekarang</th>
                            <th> Satuan </th>
                            <th> Harga </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>

                    <tbody>
                    <?php
                        if(mysqli_num_rows($hasil_query2)>0) 
                        {
                            while($isi = mysqli_fetch_assoc($hasil_query2))
                            {
                            ?>
                                <tr>
                                    <td><?php echo $isi['id_barang'] ?></td>
                                    <td><?php echo $isi['nama_barang'] ?></td>
                                    <td><?php echo $isi['stok'] ?></td>
                                    <td><?php echo $isi['satuan'] ?></td>
                                    <td><?php echo $isi['harga_pasaran'] ?></td>
                                    <td><button data-dismiss="modal" class="btn btn-info check"> Pilih </button></td>
                                </tr>
                            <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="dismissBtn" data-dismiss="modal"> Close </button>
            </div>
        </div>
    </div>
</div>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
	$(document).ready(function() {
		$("#kodebrg").hide();

		// $('#btnAddBarang').on('click', function() {
		// })
		let datatablemyTable = $('#myTable').DataTable();

		// ==================================================
		// menghitung total dari total barang dan harga
		$.fn.hitungTotal = function(file, kolom) {
			let total1 = 0;
			// let total2 = 0;
			let panjang = $("#myTable tbody tr").length;
			$("#myTable tbody tr").each(function() {
				let currentRow = $(this);

				let value1 = currentRow.find("td").eq(kolom).text();
				total1 = total1 + Number(value1);
				
				// let value2 = currentRow
				// 	.find("td")
				// 	.eq(kolom + 1)
				// 	.text();
				// total2 = total2 + Number(value2);
			});
			if (file === "pembelian3") {
				$("#totalItem").text(total1);
				$("#totalHarga").text(total2);
			} else if (file === "pembelian4") {}
		};
		// ==================================================


		// ==================================================
		// fungsi pada halaman pembelian3 (form pembelian)
		// ambil waktu untuk kode pembelian dan tanggal
		$.fn.ambilWaktu = function() {
			let key = 'Penggunaan-';
			let dates = new Date();
			let year = dates.getFullYear();
			let month = dates.getMonth() + 1;
			let date = dates.getDate();
			let hour = dates.getHours();
			let minute = dates.getMinutes();
			let seconds = dates.getSeconds();
			let miliseconds = dates.getMilliseconds();

			let kode = `${key}${year}${month}${date}${hour}${minute}${seconds}${miliseconds}`;
			return kode;
			// $("#tanggal").val(dates.toLocaleDateString());
		};
		// ==================================================

		// ==================================================
		// fungsi membersihkan form
		$.fn.clearform = function() {
			$(`#kodebrg`).val("");
			$(`#nama`).val("");
			$(`#satuan`).val("");
			$(`#stok`).val("");
			$(`#tmb_stok`).val("");
		};
		// ==================================================

		// ==================================================
		// fungsi untuk remove barang
		$.fn.removeBarang = function() {
			let total = 0;
			$("#myTable tbody").on("click", ".remove", function() {
				let index = $(this).closest("tr").index();
				datatablemyTable.row(index).remove().draw();
				$.fn.hitungTotal("pembelian3", 4);
			});
		};
		// ==================================================

		// ==================================================
		// click untuk simpan barang
		$.fn.saveBarang = function() 
		{
			let kolomIndex = 0;
			datatablemyTable.draw();
			let kolomData = datatablemyTable.rows().data().toArray();

			let prevJml, indexSameRow;
			let sameItem = false;
			for (let index = 0; index < kolomData.length; index++) {
				if (kolomData[index][0] === $('#kodebrg').val()) {
					// cek jika data sama
					indexSameRow = index;
					// console.log(indexSameRow);
					prevJml = kolomData[index][4];
					sameItem = true;
				}
			}

			if (sameItem === false) {
				// ambil panjang dari tabel
				let panjang = $("#myTable").length;

				// ambil value dari form barang
				let kode = $(`#kodebrg`).val();
				let nama = $(`#nama`).val();
				// let harga = $(`#harga`).val();
				let satuan = $(`#satuan`).val();
				let stok = $(`#stok`).val();
				let tmb_stok = $(`#tmb_stok`).val();
				// let totalhrg = harga * tmb_stok;

				datatablemyTable.row.add([kode, nama, stok, satuan, tmb_stok, `<button id="id${panjang}" class="remove btn btn-danger">X</button>`]).draw();

			} else {
				// let harga = $('#harga').val();
				let tmb_stok = $('#tmb_stok').val();

				// console.log(prevJml, indexSameRow, sameItem);

				tmb_stok = parseInt(tmb_stok) + parseInt(prevJml);
				// totalhrg = harga * tmb_stok;

				kolomData[indexSameRow][4] = tmb_stok;
				// kolomData[indexSameRow][6] = totalhrg;

				datatablemyTable.clear();
				datatablemyTable.rows.add(kolomData);
				datatablemyTable.draw();
			}
            
            //kondisi jika ngajukan lebih dari 90%
            let stok = $(`#stok`).val();
            let tmb_stok = $(`#tmb_stok`).val();
            stok = stok * 0.9;
            
            if(tmb_stok > stok)
            {
                alert("Kapasitas Permintaan Melebihi 90% Stok Saat Ini");
                window.location.href = 'penggunaan_insert.php';
            }

            $.fn.clearform();
			$.fn.hitungTotal("pembelian3", 4);
		};
		// ==================================================

		// ==================================================
		renderSelectBarang();
		async function renderSelectBarang() {
			const datas = await getDataBarang();

			// ambil elemen dari table di modal view
			const table = document.querySelector('#dataTable tbody');
			// bersihkan child elemen yang sudah ada
			while (table.hasChildNodes()) {
				table.removeChild(table.firstChild);
			}

			for (let index = 0; index < datas.length; index++) {
				// ambil data
				let valkode = datas[index].kode_barang
				let valnama = datas[index].nama_barang
				let valsatuan = datas[index].satuan
				let valhrgjual = datas[index].harga_jual

				// add row
				let rows = table.insertRow(index);

				// add cells
				let cellkode = rows.insertCell(0);
				let cellnama = rows.insertCell(1);
				let cellsatuan = rows.insertCell(2);
				let cellharga = rows.insertCell(3);
				let cellact = rows.insertCell(4);

				// create button for cellact
				const btnAct = document.createElement('button');
				btnAct.innerHTML = 'Pilih';
				btnAct.setAttribute('data-dismiss', 'modal');
				btnAct.setAttribute('class', 'btn btn-info check');

				// add value of the cell
				cellkode.innerHTML = valkode;
				cellnama.innerHTML = valnama;
				cellsatuan.innerHTML = valsatuan;
				cellharga.innerHTML = valhrgjual;
				cellact.appendChild(btnAct);
			}
		}
		// ==================================================

        // Proses setelah pilih barang pada modal
		// ==================================================
		function checkVisibilityModalBarang() {
			const targetModal = document.querySelector('#modalBeliBarang');

			const observer = new MutationObserver(function(mutationList) {
				for (let mutation of mutationList) {
					if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
						if (targetModal.classList.contains('show')) {
							pilihBarang();
						}
					}
				}
			})

			const observerConfig = {
				attributes: true,
				attributeFilter: ['class']
			}

			observer.observe(targetModal, observerConfig)
		}
		checkVisibilityModalBarang()
		// ==================================================

		// ==================================================
		async function getDataBarang() {
			const response = await axios.get('./getBarang.php');
			return response.data;
		}
		// ==================================================

		// ==================================================
		$.fn.removeBarang();
		// ==================================================

		// ==================================================
		function pilihBarang() {
			$(".check").click(function() {
				let closestTR = $(this).closest("tr").children(0);
				let kodebrg = closestTR.eq(0).text();
				let nama = closestTR.eq(1).text();
				let stok = closestTR.eq(2).text();
				let satuan = closestTR.eq(3).text();
				let harga = closestTR.eq(4).text();

				$("#kodebrg").val(kodebrg);
				console.log($("#kodebrg").val());
                console.log('tes');

				// ambil value (id) dari select
				let currentSelect = $(this);
				let id = currentSelect.val();

				$("#nama").val(nama);
				$("#stok").val(stok);
				$("#satuan").val(satuan);
				$("#harga").val(harga);
			});
		}
		// ==================================================

		// ==================================================
		tambahpemesanan();

		function tambahpemesanan() 
        {
			$('#btnsave_penggunaan').on('click', function() 
            {
                
				//deklarasikan variabel data penambahan
				let kode_penggunaan = $.fn.ambilWaktu();
				let kebutuhan = $('#kebutuhan').val();
				let rencana = $('#rencana').val();

                // alert("ninu " + kebutuhan + kode_penggunaan + rencana);

				let data = {
					kode_penggunaan: kode_penggunaan,
					kebutuhan: kebutuhan,
					rencana: rencana
				};

				axios.post('penggunaan_proses/add_penggunaan.php', JSON.stringify(data), {
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
					let satuan = currentRow.find('td').eq(3).text();
					let stok_dipakai = currentRow.find('td').eq(4).text();

					axios.post('penggunaan_proses/add_detailpenggunaan.php', JSON.stringify({
						kode_penggunaan: kode_penggunaan, //id nya penggunaan
						kode_brg: kode_brg,
						satuan: satuan,
						stok_dipakai: stok_dipakai
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

				window.location.href = 'penggunaan.php';
			})
		}
		// ==================================================

		// ==================================================
		// $('#btnCancelPermintaan').on('click', function() {
		// 	window.location.href = 'pengggunaan.php';
		// });

		$("#saveItem").click(function() {
			$.fn.saveBarang();
		});

		// ambil tanggal dari sistem
		$.fn.getDate = function() {};

		// panggil function pindah halaman
		$.fn.pindahHalaman();

		$.fn.getKaryawan();
	});
</script>

<?php include("footer.html"); ?>            