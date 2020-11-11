<form class="needs-validation" novalidate action="<?php echo base_url(); ?>peminjaman/lap_peminjaman" method="POST" target="_blank">

	<table class="table table-bordered">
		<tr>
			<td  colspan="5" bgcolor="#e4f3ca"><b>Pilih Periode</b></td>
		</tr>
		<tr>
			<td>Dari</td>
			<td><input type="text" name="dari" id="dari" class="form-control"></td>
			<td>Sampai</td>
			<td><input type="text" name="sampai" id="sampai" class="form-control"></td>
			<td><a href="#" class="btn btn-primary" id="carilaporanpinjam">Cari</a></td>
		</tr>

	</table>

<table  class="table table-bordered">
	<thead>
		<tr>
			<th colspan="6" bgcolor="#e4f3ca">
				<span>Data Peminjaman Buku</span>
				<span style="float:right">
						<button class="btn btn-danger" id="print" type="submit"><i class="fa fa-print"></i></button>
			    </span>
			</th>
		</tr>
		<tr>
			<th>Kode Pinjaman</th>
			<th>Tgl Pinjam</th>
			<th>Batas Pengembalian</th>
			<th>Kode Anggota</th>
			<th>Nama Anggota</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody id="tampillaporan">
	
	</tbody>

</table>
</form>

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

		$("#dari").datepicker({

			format: 'yyyy-mm-dd',
		    autoclose:true,
		    todayHighlight:true

		});

		$("#sampai").datepicker({

			format: 'yyyy-mm-dd',
		    autoclose:true,
		    todayHighlight:true

		});

		$("#carilaporanpinjam").click(function(){

			dari 	= $("#dari").val();
			sampai 	= $("#sampai").val();
			if(sampai ==""){

				alert("Periode Harus diisi!");
				
			}else if( dari==""){
				alert("Periode Harus diisi!");
				
			}
			
			$.ajax({

				type 	: 'POST',
				url  	: '<?php echo base_url();?>peminjaman/view_lappinjam',
				data 	: {dari:dari,sampai:sampai},
				cache	: false,
				success : function(msg){

					$("#tampillaporan").html(msg);
				}   	



			});


		});

		
			




	});


</script>