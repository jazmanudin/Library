
<div id="test"></div>
<table class="table table-bordered">
	<tr bgcolor="#e4f3ca">
		<td colspan ="4"><b>Detail Peminjaman</b></td>
	</tr>
	<tr>
		<td width="200px">Kode Buku</td>
		<td>Nama Buku</td>
		<td>Pengarang</td>
		<td>Aksi</td>
	</tr>
	<tbody>

	<?php foreach ($bukutmp->result() as $b){ ?>


		
				<tr>
					<td><?php echo $b->kode_buku; ?></td>
					<td><?php echo $b->nama_buku; ?></td>
					<td><?php echo $b->pengarang; ?></td>
					<td><a href="#" class="delete btn btn-danger btn-sm" kode="<?php echo $b->kode_buku;?>">Delete</a></td>
					
				</tr>



	<?php	} ?>
	</tbody>
</table>	

<script type="text/javascript">
	
	$(function(){
		function loadData(){

          $("#detailtmp").load("<?php echo base_url("Buku/view_bukutmp");?>");


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
		 $(".delete").click(function(){
               kode = $(this).attr("kode");
               $.ajax({

                 type  :'POST',
                 url   :'<?php echo base_url(); ?>buku/delbukutmp',
                 data  :{kodebuku:kode},
                 cache   : false,
                 success : function(msg){
                 	 loadData();
                 	 cekbuku();
                 	 $("#test").html(kode);
                 } 



               });
        });
	});


</script>

