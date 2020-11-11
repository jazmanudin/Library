
<div id="notifikasi"><?php echo $this->session->flashdata('msg'); ?></div>
<a href="<?php echo base_url();?>Anggota/input_anggota" class="btn btn-primary btn-sm">Tambah Data</a>
<hr>

<table class="table table-bordered" id="datatable" >
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Anggota</th>
			<th>Nama Anggota</th>
			<th>Jenis Kelamin</th>
			<th>No Hp</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php 
			$no=1;
			foreach($listanggota->result() as $d){
		 ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d->kode_anggota; ?></td>
				<td><?php echo $d->nama_anggota; ?></td>
				<td><?php echo $d->jk; ?></td>
				<td><?php echo $d->no_hp; ?></td>
				<td>
					<a href="<?php echo base_url(); ?>anggota/edit_anggota/<?php echo $d->kode_anggota; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
					<a href="#" data-toggle="modal" data-target="#konfirmasi_hapus" data-href="<?php echo base_url(); ?>Anggota/hapus_anggota/<?php echo $d->kode_anggota; ?>"   class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>

</table>

