<div class="container">
	<div class="row text-center">
		<?php foreach($accessories as $acc) : ?>
			<div class="card ml-3 mt-4 mb-4" style="width: 16rem;">
			  <img src="<?= base_url().'assets/upload/'. $acc->gambar ?>" class="card-img-top mt-2" alt="...">
			  <div class="card-body">
			    <h5 class="card-title mb-1"><?= $acc->nama_brg ?></h5>
			    <span class="badge badge-pill text-bg-success mb-3">Rp. <?= number_format($acc->harga,0,',','.') ?></span> <br>

			    <?= anchor('detail-barang/'. $acc->id_brg , '<div class="btn btn-sm btn-warning">Detail</div> '); ?>
			    
			    
			  </div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

