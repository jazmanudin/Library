<form  class="needs-validation" novalidate method="POST" action="<?php echo base_url(); ?>peminjaman/input_peminjaman" >

	<table class="table table-bordered">
		<tr bgcolor="#e4f3ca">
			<td colspan ="4"><b>Transaksi Peminjaman</b></td>
		</tr>
		<tr>
			<td>Kode Peminjaman</td>
			<td><input type="text" name="kode_peminjaman" value="<?php echo $kode_pinjam; ?>" readonly class="form-control"></td>
			<td>Kode Anggota</td>
			<td>
				<div class="row">
					<div class="col-md-6">
						<input type="text" id="kode_anggota" name="kode_anggota" class="form-control"  required>
						<div class="invalid-feedback">
							Kode Anggota Harus diisi !
						</div>
					</div>
					<div class="col-md-2">
						<a href="#" class="btn btn-primary" id="carianggota"  data-toggle="modal" data-target="#exampleModal">
							Cari
						</a>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>Tanggal Peminjaman</td>
			<td><input type="text" name="tgl_pinjam" value="<?php echo date('Y-m-d') ?>" id="tgl_pinjam" class="form-control"></td>
			<td>Nama Anggota</td>
			<td><input type="text" name="nama_anggota" id="nama_anggota" class="form-control" readonly=""></td>
		</tr>
		<tr>
			<td>Batas Pengembalian</td>
			<td><input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly=""></td>
			<td colspan="2"></td>
			
		</tr>
		

	</table>
	<br>
	<br>


	<table class="table table-bordered" >
		<tr bgcolor="#e4f3ca">
			<td colspan ="4" ><b>Data Buku</b></td>
		</tr>
		<tr>
			<td width="300px" >Kode Buku</td>
			<td>Nama Buku</td>
			<td>Pengarang</td>
			
		</tr>
		<tr>
			<td>
				<div class="row">
					<div class="col-md-6">
						<input type="text" id="kodebuku"  name="kode_buku" class="form-control">
					</div>
					<div class="col-md-2">
						<a href="#" class="btn btn-primary" id="caribuku"  data-toggle="modal" data-target="#exampleModal">
							Cari
						</a>
					</div>
				</div>
			</td>
			<td><input type="text" id="namabuku" name="nama_buku" class="form-control" readonly></td>
			<td><input type="text" id="pengarang" name="pengarang" class="form-control" readonly></td>
			
		</tr>
		
		<input type='hidden' id="jmlbuku">
		
	</table>
	<div class="alert alert-danger" id="notifbuku">
		<h4>Data Buku Belum di isi!</h4>
		<p>Silahkan Masukan Data Buku Terlebih Dahulu !</p>
	</div>
	<div id="detailtmp"></div>
	<input type="submit" class="btn btn-primary btn-lg" value="Simpan Data" name="submit">


</form>


<!------------------------------------------------ MODAL Anggota ------------------------------>
<div class="modal fade" id="ModalCariAnggota"    tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Data Anggota</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span> 
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered" id="datatable" >
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Anggota</th>
							<th>Nama Anggota</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php 
						$no=1;
						foreach($listanggota->result() as $d){
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $d->kode_anggota; ?></td>
								<td><?php echo $d->nama_anggota; ?></td>
								<td>
									<a href="#" class="btn btn-primary btn-sm pilih"  data-kode="<?php echo $d->kode_anggota; ?>" data-nama="<?php echo $d->nama_anggota; ?>">Pilih</a>
								</td>
							</tr>
							<?php $no++; } ?>
						</tbody>

					</table>
				</div>
				
			</div>
		</div>
	</div>

	<!------------------------------------------------ MODAL BUKU ------------------------------>
	<div class="modal fade" id="ModalCariBuku"    tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Data Buku</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span> 
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered" id="datatable2" >
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Buku</th>
								<th>Nama Buku</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$no=1;
							foreach($listbuku->result() as $d){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $d->kode_buku; ?></td>
									<td><?php echo $d->nama_buku; ?></td>
									<td>
										<a href="#" class="btn btn-primary btn-sm pilihbuku"  data-kode="<?php echo $d->kode_buku; ?>" data-nama="<?php echo $d->nama_buku; ?>" data-pengarang="<?php echo $d->pengarang; ?>">Pilih</a>
									</td>
								</tr>
								<?php $no++; } ?>
							</tbody>

						</table>
					</div>
					
				</div>
			</div>
		</div>
		<script>

			$(function(){

				$("#notifbuku").hide();



				function hitungtglkembali(){

					var tgl_pinjam = $("#tgl_pinjam").val();
					$.ajax({

						type	:'POST',
						url     :'<?php echo base_url();?>Peminjaman/hitungtglkembali',
						data    :{tgl_peminjaman:tgl_pinjam},
						cache	:false,
						success : function(msg){

							$("#tgl_kembali").val(msg);
						}

					});
				}

				function cekbuku(){

					$.ajax({

						type	:'POST',
						url     :'<?php echo base_url();?>Peminjaman/cek_jmlbuku',
						cache	: false,
						success : function(msg){

							$("#jmlbuku").val(msg);
						}


					});

				}

				function loadData(){

					$("#detailtmp").load("<?php echo base_url("Buku/view_bukutmp");?>");


				}

				$("form").submit(function(){

					var jmlbuku = $("#jmlbuku").val();
					if (jmlbuku == 0){

						$("#notifbuku").fadeIn();
						return false;
					}

				});

				cekbuku();
				hitungtglkembali();
				loadData();
				$("#carianggota").click(function(e){
					
					$("#ModalCariAnggota").modal("show");


				});

				$("#caribuku").click(function(e){
					
					$("#ModalCariBuku").modal("show");


				});

				$("#tgl_pinjam").datepicker({

					format		:'yyyy-mm-dd',
					autoclose	:true

				});

				

				

				$("#kodebuku").on('keyup keydown change',function(){
					kode = $("#kodebuku").val();
					$.ajax({
						type    :'POST',
						url     :'<?php echo base_url();?>Buku/get_buku',
						data    : {kodebuku:kode},
						cache   : false,
						success : function(msg){

							data = msg.split("|");
							if(data==0){
								$("#namabuku").val('Data Tidak Ditemukan');
								$("#pengarang").val('Data Tidak Ditemukan');

							}else{
								$("#namabuku").val(data[0]);
								$("#pengarang").val(data[1]);

								
								$.ajax({
									type    :'POST',
									url     :'<?php echo base_url();?>Buku/insert_bukutmp',
									data    : {kodebuku:kode},
									cache   : false,
									success : function(msg){
										loadData();
										cekbuku();
										$("#notifbuku").fadeOut();
										
									}

								});


							}


						}  
						


					});
					
				});



		   //Memunculkan Nama Anggota

		   $(".pilih").click(function(e){

		   	$("#nama_anggota").val($(this).attr('data-nama'));
		   	$("#kode_anggota").val($(this).attr('data-kode'));
		   	$("#ModalCariAnggota").modal("hide");


		   });

			//Memunculkan Buku

			$(".pilihbuku").click(function(e){

				
				$("#kodebuku").val($(this).attr('data-kode'));
				$("#namabuku").val($(this).attr('data-nama'));
				$("#pengarang").val($(this).attr('data-pengarang'));
				kode = $("#kodebuku").val();
				$.ajax({
					type    :'POST',
					url     :'<?php echo base_url();?>Buku/insert_bukutmp',
					data    : {kodebuku:kode},
					cache   : false,
					success : function(msg){
						loadData();
						cekbuku();
						$("#notifbuku").fadeOut();
						
					}

				});
				$("#ModalCariBuku").modal("hide");


			});

			$("#tgl_pinjam").change(function(e){
				hitungtglkembali();
			});



			




		});



	</script>