
<form class="needs-validation" novalidate method="post" action="<?php echo base_url(); ?>Kategori/input_kategori">
	<table class="table table-bordered" style="width:400px">
		<tr  bgcolor="#e4f3ca">
			<td colspan="2"><b>Input Data Kategori</b></td>
			
		</tr>
		<tr>
			<td>Kode Kategori</td>

			<td><input type="text" name="kode_kategori" class="form-control" value="<?php echo $kode_kategori; ?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Kategori</td>
		
			<td>
				<input type="text" name="nama_kategori" class="form-control" required="">
				<div class="invalid-feedback">
					Nama Kategori Harus Di Isi!
				</div>
			</td>
		</tr>
		<tr>
		
			<td colspan="2" align="right">
				<input type="submit" class="btn btn-primary" value="Simpan Data" name="submit">
				<input type="reset"  class="btn btn-danger"value="Cancel" name="cancel">
			</td>
		</tr>
	</table>




</form>