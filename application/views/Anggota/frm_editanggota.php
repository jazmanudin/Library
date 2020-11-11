<h5 id="test">Edit Data Anggota</h5>
<form class="needs-validation" novalidate  method="post"  enctype="multipart/form-data" action="<?php echo base_url()?>anggota/edit_anggota">
	<table class="table table-bordered" style="width:600px">
		<tr>
			<td>Kode Anggota</td>
			
			<td>
				<input type="text" class="form-control" name="kode_anggota" required="" value="<?php echo $anggota['kode_anggota']; ?>" readonly>  
		 	</td>
		</tr>
		<tr>
			<td>Nama Anggota</td>
		
			<td>
				<input type="text" class="form-control" name="nama_anggota" value="<?php echo $anggota['nama_anggota']; ?>" required>
				<div class="invalid-feedback">
		       		 Nama Lengkap Harus Di Isi..!
		      	</div>
			</td>
		</tr>
		<tr>
			<td>Provinsi</td>
			
			<td>
				<select name="provinsi" id="provinsi" class="form-control" required>
					
					<?php
						foreach ($listprovinsi->result_array() as $p ) {
							
							echo "<option value='$p[id_provinsi]'";
							echo $p['id_provinsi'] == $anggota['id_provinsi']?'selected':'';
							echo ">$p[nama_provinsi]</option>";
						}

					?>
				</select>
				<div class="invalid-feedback">
		       		 Silahkan Pilih Provinsi..!
		      	</div>
			</td>

		</tr>
		<tr>
			<td>Kabupaten</td>
			
			<td>
				<select  name="kota" id ="kota" class="form-control" required>
					<option value="<?php echo $anggota['id_kota']; ?>"><?php echo $kota; ?></option>
				</select>
				<div class="invalid-feedback">
		       		 Silahkan Pilih Kabupaten/Kota..!
		      	</div>
			</td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			
			<td>
				<select name="kecamatan" id="kecamatan" class="form-control" required>
					<option value="<?php echo $anggota['id_kecamatan']; ?>"><?php echo $kec; ?></option>
				</select>
				<div class="invalid-feedback">
		       		 Silahkan Pilih Kecamatan..!
		      	</div>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			
			<td>
				<input type="text" name="alamat" class="form-control" value="<?php echo $anggota['alamat']; ?>" required>
				<div class="invalid-feedback">
	       		 	Alamat Harus diisi..!
	      		</div>
			</td>
			
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			
			<td>
				<select name="jk" class="form-control"  required>
						
						<option value="L" <?php echo $anggota['jk']=='L'?'selected':''; ?>>Laki-Laki</option>
						<option value="P" <?php echo $anggota['jk']=='P'?'selected':''; ?>>Perempuan</option>
				</select>
				<div class="invalid-feedback">
	       		 	Alamat Harus diisi..!
	      		</div>
			</td>
		</tr>
		<tr>
			<td>No HP</td>
			
			<td>
				<input type="number" name="no_hp" class="form-control" value="<?php echo $anggota['no_hp']; ?>" required>
				<div class="invalid-feedback">
	       		 	No Hp Harus diisi dan Harus diisi dengan Angka..!
	      		</div>
			</td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			
			<td>
				<input type="text" id="tanggallahir" name="tgl_lahir" class="form-control" value="<?php echo $anggota['tgl_lahir']; ?>" required>
				<div class="invalid-feedback">
	       		 	Tanggal Lahir Harus di isi, Format : YYY-MM-DD
	      		</div>
			</td>
		</tr>
		<tr>
			<td>Tanggal Daftar</td>
			
			<td>
				<input type="text" id="tgldaftar" name="tgl_daftar" value="<?php echo $anggota['tgl_daftar']; ?>" class="form-control" required>
				<div class="invalid-feedback">
	       		 	Tanggal Daftar Harus di isi, Format : YYY-MM-DD
	      		</div>
			</td>
		</tr>
		
		<tr>
		
			<td colspan="2" align="right">
				<input type="submit" class="btn btn-primary btn-lg" value="Simpan Data" name="submit">
				<input type="reset" value="Cancel"  class="btn btn-danger btn-lg" name="cancel">
			</td>
		</tr>
		
	
	
	</table>




</form>
<script>
    $(function(){
     

     $('#tanggallahir').datepicker({
	    format: 'yyyy-mm-dd',
	    autoclose:true,
	    todayHighlight:true
	 });

	 $('#tgldaftar').datepicker({
	    format: 'yyyy-mm-dd',
	    autoclose:true,
	    todayHighlight:true
	 });

      $("#provinsi").change(function(){

          id = $("#provinsi").val();
          $.ajax({
              type    : 'POST',
              url     : '<?php echo base_url();?>Anggota/get_kota',
              data    : {id_prov:id},
              cache   : false,
              success : function(respond){

                  $("#kota").html(respond);     


              }
          });
      
      });


      $("#kota").change(function(){

          id = $("#kota").val();
          $.ajax({
              type    : 'POST',
              url     : '<?php echo base_url();?>Anggota/get_kecamatan',
              data    : {id_kota:id},
              cache   : false,
              success : function(respond){

                
                  $("#kecamatan").html(respond);     


              }
          });
      
      });

      
   

  });



    
</script>
