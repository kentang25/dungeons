<div class="container">
    <div class="row text-center">
        <?php foreach($pakaian_pria as $pkp) : ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="card ml-3 mt-4 mb-4" style="width: 16rem;">
                    <img src="<?= base_url().'assets/upload/'. $pkp->gambar ?>" class="card-img-top mt-2" alt="..." style="max-width: 400px; height: 250px;">
                    <div class="card-body " style="max-width: 400px;" >
                        <h5 class="card-title mb-1"><?= $pkp->nama_brg ?></h5>
                        <span class="badge ba dge-pill text-bg-success mb-3">Rp. <?= number_format($pkp->harga,0,',','.') ?></span> <br>
                        
                        <?= anchor('detail-barang/'. $pkp->id_brg , '<div class="btn btn-sm btn-warning">Detail</div> '); ?>
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
