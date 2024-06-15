<div class="all bg-dark text-white">
<div class="container">

	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<div class="btn btn-sm btn-success mt-3">
				<?php

					$grand_total = 0;

					if($keranjang = $this->cart->contents()){
						foreach($keranjang as $item){
							$grand_total = $grand_total + $item['subtotal'];
						}
						echo "<h5>Total Belanja Anda : Rp .". number_format($grand_total,0,',','.');
					

				?>
				</div>
					<div class="card mt-3 mb-4">
					  <h3 class="card-header">Input Alamat Dan Pembayaran</h3>
					   <div class="card-body">
						<form method="POST" action="<?= base_url('proses-pembayaran') ?>">

							<label>Nama Lengkap</label>
								<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"><br>

							<label>Alamat Lengkap</label>
								<input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap"><br>

							<label>No Telepon</label>
								<input type="text" name="no_tlp" class="form-control" placeholder="No Telepon"><br>

							<label>Jasa Pengiriman</label>
								<select class="form-control" name="jasa">
									<option>--- PENGIRIMAN ---</option>
									<option>JNT</option>
									<option>JNE</option>
									<option>POS Indonesia</option>
									<option>NINJA</option>
								</select><br>

							<label>Pilih BANK</label>
								<select class="form-control" name="jasa">
									<option>--- PILIH BANK ---</option>
									<option>BRI - XXXXXXXX</option>
									<option>BCA - XXXXXXXX</option>
									<option>BSI	- XXXXXXXX</option>
									<option>MANDIRI	- XXXXXXXX</option>
								</select><br>

							<button type="submit" class="btn btn-sm btn-primary mb-4">Pesan</button>
						</form>
					<?php } else{
						echo "Keranjang Anda Masih Kosoing";
					} ?>
				 </div>
				</div>
			</div>
		</div>
</div>
</div>