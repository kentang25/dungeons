<div class="container">

	<h4>Detail Invoice</h4>

	<table class="table table-bordered table-striped">
		<tr>
			<th>ID Barang</th>
			<th>Nama Barang</th>
			<th>Jumlah Pesanan</th>
			<th>Harga Satuan</th>
			<th>Subtotal</th>
		</tr>

		<?php

			$total = 0;
			foreach($detail_invoice as $dtl_inv) :
				$subtotal = $dtl_inv->jumlah * $dtl_inv->harga;
				$total += $subtotal;

		?>

		<tr>
			<td><?= $dtl_inv->id ?></td>
			<td><?= $dtl_inv->nama_brg ?></td>
			<td><?= $dtl_inv->jumlah ?></td>
			<td><?= $dtl_inv->harga ?></td>
			<td align="right">Rp . <?= number_format($subtotal,0,',','.') ?></td>
		</tr>

		<?php endforeach; ?>

		<tr>
			<td colspan="4">Grand Total</td>
			<td align="right"><?= number_format($total,0,',','.') ?></td>
		</tr>
	</table>
</div>