<div class="container-fluid p-3 mb-2 bg-dark text-white">
	<div class="container">
	<h4 class="mt-2">Keranjang Belanja</h4>

	<table class="table table-bordered table-striped bg-dark text-white">
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Sub-total</th>
		</tr>
		<?php
			$no = 1;
			foreach($this->cart->contents() as $items) : 
		?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $items['name'] ?></td>
			<td><?= $items['qty'] ?></td>
			<td align="right">Rp.<?= number_format($items['price'],0,',','.') ?></td>
			<td align="right">Rp.<?= number_format($items['subtotal'],0,',','.') ?></td>
		</tr>
		<?php endforeach; ?>

		<tr>
			<td colspan="4" align="center"><bold>Total</bold></td>
			<td align="right">Rp.<?= number_format($this->cart->total(),0,',','.') ?></td>
		</tr>
	</table>

	<div align="right">
		<a href="<?= base_url('dashboard') ?>"><div class="btn btn-sm btn-primary">Kembali</div></a>
		<a href="<?= base_url('keranjang/hapus') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
		<a href="<?= base_url('pembayaran') ?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
	</div>


	</div>
</div>