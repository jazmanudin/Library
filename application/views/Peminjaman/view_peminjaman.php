<div id="notifikasi"><?php echo $this->session->flashdata('msg'); ?></div>
<a href="<?php echo base_url();?>Peminjaman/input_peminjaman" class="btn btn-primary btn-sm">Tambah Data</a>
<hr>
<table  class="table table-bordered" id="datatable">
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
				<a href="#" data-toggle="modal" data-target="#konfirmasi_hapus" data-href="<?php echo base_url();?>peminjaman/hapus_peminjaman/<?php echo $d->kode_pinjam; ?>" class="btn btn-danger btn-sm">Hapus</a>
				<a data-id="<?php echo $d->kode_pinjam; ?>" href="#" class="btn btn-primary btn-sm detail_pinjam" >Detail</a>
			</td>

		</tr>
		<?php } ?>
	</tbody>

</table>
<div id="tampil"></div>
<!------------------------------------------------ MODAL Detail Peminjaman ------------------------------>
<div class="modal fade" id="ModalDetailPinjam"    tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Peminjaman</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">&times;</span> 
				</button>
			</div>
			<div class="modal-body" >
       			
     		 </div>
     		 
		</div>
	</div>
</div>
<script type="text/javascript">
	
	$(function(){

		$(".detail_pinjam").click(function(e){
			e.preventDefault();
			id = $(this).attr('data-id');
			$("#ModalDetailPinjam").modal("show");
			 $.ajax({
            	type :'POST',
            	url  :'<?php echo base_url(); ?>Peminjaman/view_detailpinjam',
            	data : {kode_pinjam:id},
            	cache:false,
            	success : function(msg){

            		$(".modal-body").html(msg);
            	}
              
            });
          });
			




	});


</script>