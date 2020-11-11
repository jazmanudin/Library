
<form class="needs-validation" novalidate method="POST" action="<?php echo base_url(); ?>buku/input_buku">
	<table class="table table-bordered" style="width:600px">
		<tr  bgcolor="#e4f3ca">
			<td colspan="2"><b>Input Data Buku</b></td>
			
		</tr>
		<tr>
			<td>Kode Buku</td>
			
			<td>
				<input type="text" name="kode_buku" class="form-control" required="">
				<div class="invalid-feedback">
					Kode Buku Harus Diisi!
				</div>
			</td>
		</tr>
		<tr>
			<td>Nama Buku</td>
			
			<td>
				<input type="text" name="nama_buku" class="form-control" required="">
				<div class="invalid-feedback">
					Nama Buku Harus Diisi!
				</div>
			</td>
		</tr>
		<tr>
			<td>Kategori</td>
			
			<td>
				<select name="kategori" class="form-control" required="">
					<option value="">-- Pilih Kategori --</option>
					<?php foreach($listkategori->result() as $k) { ?>
						<option value="<?php echo $k->kode_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
					<?php } ?>
				</select>
				<div class="invalid-feedback">
					Kategori Buku Harus Diisi!
				</div>
			</td>
		</tr>
		<tr>
			<td>Pengarang</td>
			
			<td>
				<input type="text" name="pengarang" class="form-control" required="">
				<div class="invalid-feedback">
					Nama Pengarang Harus Diisi!
				</div>
			</td>
		</tr>
		<tr>
			<td>Penerbit</td>
			
			<td>
				<input type="text" name="penerbit" class="form-control" required="">
				<div class="invalid-feedback">
					Nama Penerbit Harus Diisi!
				</div>
			</td>
		</tr>
		<tr>
			<td>Tahun</td>
			
			<td>
				<input type="text" name="tahun" class="form-control" required="">
				<div class="invalid-feedback">
					Tahun Harus Diisi!
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