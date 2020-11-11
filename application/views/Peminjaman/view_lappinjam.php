<?php foreach($list_peminjaman->result() as $d){ ?>
		<tr>
			<td><?php echo $d->kode_pinjam; ?></td>
			<td><?php echo $d->tgl_pinjam; ?></td>
			<td><?php echo $d->batas_kembali; ?></td>
			<td><?php echo $d->kode_anggota; ?></td>
			<td><?php echo $d->nama_anggota; ?></td>
			<td>
				
				<a data-id="<?php echo $d->kode_pinjam; ?>" href="#" class="btn btn-primary btn-sm detail_pinjam" >Detail</a>
			</td>

		</tr>
<?php } ?>



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