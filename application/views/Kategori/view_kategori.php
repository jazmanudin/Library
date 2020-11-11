<div id="notifikasi"><?php echo $this->session->flashdata('msg'); ?></div>
<a href="<?php echo base_url();?>Kategori/input_kategori" class="btn btn-primary btn-sm">Tambah Data</a>
<hr>
<table  class="table table-bordered" id="datatable">
	<thead>
		<tr>
			<th>Kode Kategori</th>
			<th>Nama Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($listkategori->result() as $k){ ?>
		<tr>
			<td><?php echo $k->kode_kategori; ?></td>
			<td><?php echo $k->nama_kategori; ?></td>
			<td>
				<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
				<a href="#" data-target="#konfirmasi_hapus" data-toggle="modal" data-href="<?php echo base_url(); ?>kategori/hapus_kategori/<?php echo $k->kode_kategori; ?>"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>