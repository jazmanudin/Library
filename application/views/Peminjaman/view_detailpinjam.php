
<table  class="table table-bordered">
	<thead>
		<tr>
			<th>Kode Buku</th>
			<th>Nama Buku</th>
			<th>Pengarang</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list_detail->result() as $d){ ?>
		<tr>
			<td><?php echo $d->kode_buku; ?></td>
			<td><?php echo $d->nama_buku; ?></td>
			<td><?php echo $d->pengarang; ?></td>
			
		</tr>
		<?php } ?>
	</tbody>

</table>
