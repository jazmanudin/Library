
	<?php foreach($list_detail->result() as $d){ ?>
	<tr>
		<td><?php echo $d->kode_buku; ?></td>
		<td><?php echo $d->nama_buku; ?></td>
		<td><?php echo $d->pengarang; ?></td>
		
	</tr>
	<?php } ?>

