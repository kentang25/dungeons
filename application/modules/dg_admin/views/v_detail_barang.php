<div class="container">
	<h4><strong>Detail Barang</strong></h4>

		<table class="table table-bordered">
			<tr>
				<th>Nama Barang</th>
				<th><?= $detail->nama_brg ?></th>
			</tr>
				
			<tr>
				<th>Keterangan</th>
				<th><?= $detail->keterangan ?></th>
			</tr>
			<tr>
				<th>Kategori</th>
				<th><?= $detail->kategori ?></th>
			</tr>
			<tr>
				<th>Stok</th>
				<th><?= $detail->stok ?></th>
			</tr>
			<tr>
				<th>Harga</th>
				<th><?= $detail->harga ?></th>
			</tr>
		</table>

		<a href="<?= base_url('admin/data-barang') ?>"><button class="btn btn-primary"> Kembali </button></a>
</div>