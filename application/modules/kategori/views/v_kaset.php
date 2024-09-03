<div class="container">
	<div class="row text-center">
		<?php foreach($kaset as $kst) : ?>
			<div class="card ml-3 mt-4 mb-4" style="width: 16rem;">
			  <img src="<?= base_url().'assets/upload/'. $kst->gambar ?>" class="card-img-top mt-2" alt="..." style="height: 250px;">
			  <div class="card-body" style="max-width: 400px;">
			    <h5 class="card-title mb-1"><?= $kst->nama_brg ?></h5>
			    <span class="badge badge-pill text-bg-success mb-3">Rp. <?= number_format($kst->harga,0,',','.') ?></span> <br>
			    
			    <?= anchor('detail-barang/'. $kst->id_brg , '<div class="btn btn-sm btn-warning">Detail</div> '); ?>
			    
			  </div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

