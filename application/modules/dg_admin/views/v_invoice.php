<div class="container">
	<h4> Invoice Data Pembayaran</h4>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Nama Pemesan</th>
			<th>Alamat Pengiriman</th>
			<th>Tanggal Pengiriman</th>
			<th>Batas Pembayaran</th>
			<th>Aksi</th>
		</tr>

		<?php foreach($invoice as $inv) : ?>
		<tr>
			<td><?= $inv->nama ?></td>
			<td><?= $inv->alamat ?></td>
			<td><?= $inv->tgl_pesan ?></td>
			<td><?= $inv->batas_bayar ?></td>
			<td><?= anchor('admin/invoice/detail'. $inv->id_inv, '<div class="btn btn-sm btn-primary"><i class="fa fa-search"></i></div>') ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>