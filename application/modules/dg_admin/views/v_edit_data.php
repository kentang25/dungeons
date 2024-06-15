<div class="container">

	<?php foreach($data_barang as $d_brg) :?>
		<form method="POST" action="<?= base_url(). 'dg_admin/data_barang/update' ?>">
			<label>Nama Barang</label>
			<input type="text" name="nama_brg" class="form-control" value="<?= $d_brg->nama_brg; ?>">

			<label>Keterangan</label><br>
			<textarea class="form-control" cols="25" rows="10" name="keterangan">
				<?= $d_brg->keterangan; ?>
			</textarea><br>

			<label>Kategori</label>
			<input type="text" name="kategori" class="form-control" value="<?= $d_brg->kategori; ?>">

			<label>Stok</label>
			<input type="text" name="stok" class="form-control" value="<?= $d_brg->stok; ?>">

			<label>Harga</label>
			<input type="text" name="harga" class="form-control" value="<?= $d_brg->harga; ?>">

			<button type="reset" class="btn btn-warning">Reset</button>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	<?php endforeach; ?>

</div>