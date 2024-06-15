<div class="container">
	<h4><strong>Detail Barang</strong></h4>

		<table class="table table-bordered">
			<tr>
				<td><?= $detail->nama_brg ?></td>
			</tr>
			<tr>
				<td><?= $detail->keterangan ?></td>
			</tr>
			<tr>
				<td><?= $detail->kategori ?></td>
			</tr>
			<tr>
				<td><?= $detail->stok ?></td>
			</tr>
			<tr>
				<td><?= $detail->harga ?></td>
			</tr>
		</table>

		<a href="<?= base_url('admin/data-barang') ?>"><button class="btn btn-primary"> Kembali </button></a>
</div>