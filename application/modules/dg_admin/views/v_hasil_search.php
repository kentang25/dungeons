<div class="container">
	<h4><strong>Detail Barang</strong></h4>

		<?php foreach($data_barang as $brg) : ?>
			<table class="table table-bordered">
				<tr>
					<td><?= $brg->nama_brg ?></td>
				</tr>
				<tr>
					<td><?= $brg->keterangan ?></td>
				</tr>
				<tr>
					<td><?= $brg->kategori ?></td>
				</tr>
				<tr>
					<td><?= $brg->stok ?></td>
				</tr>
				<tr>
					<td><?= $brg->harga ?></td>
				</tr>
			</table>
		<?php endforeach; ?>
		<a href="<?= base_url('admin/data-barang') ?>"><button class="btn btn-primary"> Kembali </button></a>
</div>