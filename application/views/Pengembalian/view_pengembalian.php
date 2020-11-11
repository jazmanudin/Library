<div id="notifikasi"><?php echo $this->session->flashdata('msg'); ?></div>
<a href="<?php echo base_url(); ?>pengembalian/input_pengembalian" class="btn btn-primary">Tambah Data </a>
<hr>
<table class="table table-bordered" id="datatable">
	<thead>
		<tr>
			<td>Kode Pengembalian</td>
			<td>Tgl Kembali</td>
			<td>Kode Pinjam</td>
			<td>Kode Anggota</td>
			<td>Nama Anggota</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($list_pengembalian->result() as $d){ ?>
		<tr>
			<td><?php echo $d->kode_pengembalian; ?></td>
			<td><?php echo $d->tgl_kembali; ?></td>
			<td><?php echo $d->kode_pinjam; ?></td>
			<td><?php echo $d->kode_anggota; ?></td>
			<td><?php echo $d->nama_anggota; ?></td>
			<td>
				<a href="#" data-toggle="modal" data-target="#konfirmasi_hapus" data-href="<?php echo base_url();?>pengembalian/hapus_pengembalian/<?php echo $d->kode_pengembalian; ?>" class="btn btn-danger btn-sm"> Hapus</a>
				<a href="#" class="btn btn-primary btn-sm detail_pinjam" data-id="<?php echo $d->kode_pinjam;?>"> Detail</a>
			</td>

		</tr>
		<?php } ?>
	</tbody>
</table>
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