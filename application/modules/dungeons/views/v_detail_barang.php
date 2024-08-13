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
					<table class="product table">
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
						
							<form method="POST" action="<?= base_url('tambah-keranjang/'.$dtl->id_brg) ?>">
								<input type="number" name="qty" id="<?php echo $dtl->id_brg;?>" value="1" max="<?= $dtl->stok ?>" min="1" class="d-inline">
								<button class="add_cart btn btn-sm btn-primary mr-2 mt-2" data-produkid="<?php echo $dtl->id_brg;?>" data-produknama="<?php echo $dtl->nama_brg;?>" data-produkharga="<?php echo $dtl->harga;?>">Tambah Keranjang</button>
							</form>
							
							<!-- <a href=""><div class="add_cart btn btn-sm btn-primary mr-2 mt-2">Tambah Keranjang</div></a> -->

							<a href="<?= base_url('shop') ?>"><div class="btn btn-sm btn-danger mr-2 mt-2">Kembali</div></a>
							
							<?= anchor('beli/'. $dtl->id_brg, '<div class="btn btn-sm btn-success mt-2">Beli</div> ') ?>
							
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- <div class="col-md-4">
                        <h4>Shopping Cart</h4>
                        <table class="table table-striped">
                                <thead>
                                        <tr>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Aksi</th>
                                        </tr>
                                </thead>
                                <tbody id="detail_cart">
 
                                </tbody>
                                 
                        </table>
                </div> -->
</div>

<script src="assets/js/jquery.js">

    	 $(document).ready(function(){
                $('.add_cart').click(function(){
                        var produk_id    = $(this).data("id_brg");
                        var produk_nama  = $(this).data("nama_brg");
                        var produk_harga = $(this).data("harga");
                        var quantity     = $('#' + id_brg).val();
                        $.ajax({
                                url : "<?php echo base_url();?>dungeons/cart/addCart",
                                method : "POST",
                                data : {produk_id: id_brg, produk_nama: nama_brg, produk_harga: harga, quantity: qty},
                                success: function(data){
                                        $('#detail_cart').html(data);
                                }
                        });
                });
 
                // Load shopping cart
                $('#detail_cart').load("<?php echo site_url();?>dungeons/cart/load_cart");
 
                //Hapus Item Cart
                $(document).on('click','.hapus_cart',function(){
                        var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
                        $.ajax({
                                url : "<?php echo base_url();?>cart/hapus_cart",
                                method : "POST",
                                data : {row_id : row_id},
                                success :function(data){
                                        $('#detail_cart').html(data);
                                }
                        });
                });
        });

    </script>