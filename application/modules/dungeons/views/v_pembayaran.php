<div class="all bg-dark text-white">
<div class="container">

	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<div class="btn btn-sm btn-success mt-3">
				<?php

					$grand_total = 1;

					if($grand_total){
						foreach($cart_item as $key => $c_items){
                  			$grand_total += $c_items->qty * $c_items->price;
                  			// var_dump($grand_total);
                  			// exit();
						}
						echo "<h5>Total Belanja Anda : Rp .". number_format($grand_total,0,',','.');
					
				?>

				</div>
					<div class="card mt-3 mb-4">
					  <h3 class="card-header">Input Alamat Dan Pembayaran</h3>
					   <div class="card-body">
						<form method="POST" action="<?= base_url('proses-pembayaran') ?>">

							<label>Nominal</label>
								<input type="number" name="harga" class="form-control" value="<?=number_format($grand_total,0,',','.') ?>"><br>

							<!-- <label>Alamat Lengkap</label>
								<input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap"><br>

							<label>No Telepon</label>
								<input type="text" name="no_tlp" class="form-control" placeholder="No Telepon"><br> -->

							<label>Jasa Pengiriman</label>
								<select class="form-control" name="jasa">
									<option>--- PENGIRIMAN ---</option>
									<option>JNT</option>
									<option>JNE</option>
									<option>POS Indonesia</option>
									<option>NINJA</option>
								</select><br>

							<label>Pilih BANK</label>
								<select class="form-control" name="via_pembayaran">
									<option>--- PILIH BANK ---</option>
									<option>BRI - XXXXXXXX</option>
									<option>BCA - XXXXXXXX</option>
									<option>BSI	- XXXXXXXX</option>
									<option>MANDIRI	- XXXXXXXX</option>
								</select><br>

							<button type="submit" class="btn btn-sm btn-primary mb-4">Pesan</button>
						</form>
					<?php } else{
						echo "Keranjang Anda Masih Kosong";
					} ?>
				 </div>
				</div>
			</div>
		</div>
</div>
</div>