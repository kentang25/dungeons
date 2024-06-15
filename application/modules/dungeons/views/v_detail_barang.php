<div class="container">
	<div class="card mt-4 mb-4">
		<h4 class="card-header">Detail Barang</h4>
		<div class="card-body">
			<?php foreach($detail as $dtl) : ?>
			<div class="row">
				<div class="col-4">
					<img src="<?= base_url(). 'assets/upload/'. $dtl->gambar  ?>" class="card-img-top">
				</div>
				<div class="col-8">
					<table class="table">
						<tr>
							<td>Nama Barang</td>
							<td><strong><?= $dtl->nama_brg ?></strong></td>
						</tr>
						<tr>
							<td>Keterangan Barang</td>
							<td><strong><?= $dtl->keterangan ?></strong></td>
						</tr>
						<tr>
							<td>Kategori Barang</td>
							<td><strong><?= $dtl->kategori ?></strong></td>
						</tr>
						<tr>
							<td>Stok Barang</td>
							<td><strong><?= $dtl->stok ?></strong></td>
						</tr>
						<tr>
							<td>Harga</td>
							<td><strong><div class="btn btn-sm btn-success">Rp. <?= number_format($dtl->harga,0,',','.') ?></div></storong></td>
						</tr>
					</table>

					<div align="right">
						<a href="<?= base_url('shop') ?>"><div class="btn btn-sm btn-danger mr-2">Kemabli</div></a>
						<?= anchor('keranjang/'. $dtl->id , '<div class="btn btn-sm btn-primary">Tambah Keranjang</div> ') ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>