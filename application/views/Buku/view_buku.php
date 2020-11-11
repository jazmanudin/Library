<div id="notifikasi"><?php echo $this->session->flashdata('msg'); ?></div>
<a href="<?php echo base_url();?>Buku/input_buku" class="btn btn-primary btn-sm">Tambah Data</a>
<hr>
<table class="table table-bordered" id="datatable">
	<thead>
		<tr>
			<th>Kode Buku</th>
			<th>Nama Buku</th>
			<th>Kategori</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($listbuku->result() as $b ) { ?>
	
		<tr>
			<td><?php echo $b->kode_buku; ?></td>
			<td><?php echo $b->nama_buku; ?></td>
			<td><?php echo $b->nama_kategori; ?></td>
			<td><?php echo $b->pengarang; ?></td>
			<td><?php echo $b->penerbit; ?></td>
			<td><?php echo $b->tahun; ?></td>
			<td>
				<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
				<a href="#"  data-target="#konfirmasi_hapus" data-toggle="modal" data-href="<?php echo base_url(); ?>buku/hapus_buku/<?php echo $b->kode_buku; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>