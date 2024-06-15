<div class="container">
	<div class="row text-center">
		<?php foreach($shoes as $shs) : ?>
			<div class="card ml-3 mt-4 mb-4" style="width: 16rem;">
			  <img src="<?= base_url().'assets/upload/'. $shs->gambar ?>" class="card-img-top mt-2" alt="...">
			  <div class="card-body">
			    <h5 class="card-title mb-1"><?= $shs->nama_brg ?></h5>
			    <span class="badge badge-pill text-bg-success mb-3">Rp. <?= number_format($shs->harga,0,',','.') ?></span> <br>
			    
			    <?= anchor('detail-barang/'. $shs->id , '<div class="btn btn-sm btn-warning">Detail</div> '); ?>
			    
			  </div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

