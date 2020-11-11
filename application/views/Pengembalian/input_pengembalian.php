<form class="needs-validation" novalidate method="POST" action="<?php echo base_url();?>Pengembalian/input_pengembalian">
<table class="table table-bordered">
	<tr>
		<td colspan="4" bgcolor="#e4f3ca"><b>Data Pengembalian</b></td>
	</tr>
	<tr>
		<td>Kode Pengembalian</td>
		<td><input type="text" name="kode_pengembalian" id="kode_pengembalian" value="<?php echo $kode_pengembalian; ?>" class="form-control" readonly></td>
		<td>Kode Peminjaman</td>
		<td>
			<div class="row">
				<div class="col-md-8">
					<input type="text" name="kode_pinjam" id="kode_pinjam" class="form-control" required>
					<div class="invalid-feedback">
						Kode Peminjaman Harus Diisi !!
					</div>
				</div>
				<div class="col-md-3">
					<a href="#" class="btn btn-primary" id="cariPeminjaman">Cari</a>
				</div>
			</div>
			
		</td>
	</tr>
	<tr>
		<td>Tanggal Kembali</td>
		<td><input type="text" name="tglkembali" value ="<?php echo date('Y-m-d'); ?>" class="form-control" id="tglkembali" readonly></td>
		<td>Kode Anggota</td>
		<td><input type="text" name="kode_anggota" class="form-control" id="kode_anggota" readonly></td>
	</tr>
	<tr>
		<td>Denda</td>
		<td><input type="text" name="denda" id="denda" class="form-control" style='text-align:right'> </td>
		<td>Nama Anggota</td>
		<td><input type="text" name="nama_anggota" id="nama_anggota" class="form-control"   readonly></td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="alert alert-warning">
				<p>
					Jika Tanggal Pengembalian Melebihi Batas Pengembalian yang sudah<br> ditentukan maka akan dikenakan denda sebesa Rp. 5000
				</p>
			</div>
		</td>
		<td>Batas Pengembalian</td>
		<td><input type="text" name="batas_kembali" id="batas_kembali" class="form-control" readonly> 
	</tr>
</table>
<table class="table table-bordered">
	<tr>
		<td colspan="3" bgcolor="#e4f3ca"><b>Detail Buku</b></td>
	</tr>
	<tr style="font-weight: bold">
		<td>Kode Buku</td>
		<td>Nama Buku</td>
		<td>Pengarang</td>
	</tr>
	<tbody id="detailbuku">
	</tbody>

</table>
<button name="submit" type="submit" class="btn btn-primary btn-lg">Proses</button>
<br><br>
</form>
<div class="modal fade bd-example-modal-lg" id="ModalCariPeminjaman"    tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Data Peminjaman Buku</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">&times;</span> 
				</button>
			</div>
			<div class="modal-body">
       			<table  class="table table-bordered" style="font-size:14px" id="datatable">
					<thead>
						<tr>
							<th>Kode Pinjaman</th>
							<th>Tgl Pinjam</th>
							<th>Batas Pengembalian</th>
							<th>Kode Anggota</th>
							<th>Nama Anggota</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list_peminjaman->result() as $d){ ?>
						<tr>
							<td><?php echo $d->kode_pinjam; ?></td>
							<td><?php echo $d->tgl_pinjam; ?></td>
							<td><?php echo $d->batas_kembali; ?></td>
							<td><?php echo $d->kode_anggota; ?></td>
							<td><?php echo $d->nama_anggota; ?></td>
							<td>
								<a href="#" data-kodepinjam="<?php echo $d->kode_pinjam; ?>" data-kodeanggota="<?php echo $d->kode_anggota; ?>" data-nama="<?php echo $d->nama_anggota; ?>" data-batastgl ="<?php echo $d->batas_kembali; ?>" class="btn btn-primary btn-sm pilihpeminjaman">Pilih</a>
							</td>

						</tr>
						<?php } ?>
					</tbody>

				</table>

     		 </div>
     		 
		</div>
	</div>
</div>
<script type="text/javascript">
	
	$(function(){



		$("#cariPeminjaman").click(function(){

			$("#ModalCariPeminjaman").modal("show");

		});

		$(".pilihpeminjaman").click(function(){

			$("#kode_pinjam").val($(this).attr('data-kodepinjam'));	
			$("#kode_anggota").val($(this).attr('data-kodeanggota'));	
			$("#nama_anggota").val($(this).attr('data-nama'));	
			$("#batas_kembali").val($(this).attr('data-batastgl'));	
			$("#ModalCariPeminjaman").modal("hide");

			var batas_kembali = $("#batas_kembali").val();
			var tgl_kembali   = $("#tglkembali").val();

			if(tgl_kembali > batas_kembali){

				$("#denda").val(5000);
			} else{
				$("#denda").val(0);
			}
			id = $("#kode_pinjam").val();
			$.ajax({

					type	:'POST',
					url		:'<?php echo base_url();?>Pengembalian/detail_buku',
					data    :{kode_pinjam:id},
					cache	:false,
					success : function(msg){

						$("#detailbuku").html(msg);
					}


			});


		});


	});

</script>