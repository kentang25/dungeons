<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0">Shopping Cart</h1>
                    <h6 class="mb-0 text-muted">3 items</h6>
                  </div>
                  <hr class="my-4">
                  <?php 
                  		$subtotal = 0;

                  		foreach($cart_item as $key => $c_items){
                  			$subtotal += $c_items->qty * $c_items->price;
                  			
                  			// var_dump($subtotal);
                  			// exit();
                  			


                  ?>
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-4 col-lg-2 col-xl-2">
                      <!-- <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                        class="img-fluid rounded-3" alt="Cotton T-shirt"> -->
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted"><?= $c_items->name; ?></h6>
                      <h6 class="mb-0">Cotton T-shirt</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button>

                      <input id="form1" min="1" name="quantity" value="<?= $c_items->qty; ?>" type="number"
                        class="form-control" />

                      <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 offset-lg-1">
                      <h6 class="mb-0">Rp. <?= number_format($c_items->price,0,',','.'); ?></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
              <?php } ?>

                  

                  <hr class="my-4">

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="<?= base_url('shop') ?>" class="text-body">
                    	<i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                    </h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-body-tertiary">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">
                  <h5 class="text-uppercase" style="border-bottom: 1px solid black;">ITEMS <?= $this->cart->total_items(); ?></h5>
                  

                  <div class="justify-content-between mb-4">
                  	<div class="row">
                    <?php
                    	foreach($cart_item as $key => $items){ ?>
                    <h5 align="left"  class="col-md-6" ><small><?= $items->name ?></small></h5>		
                    <h5 align="right" class="col-md-6" ><small>Rp. <?= number_format($items->price,0,',','.'); ?></small></h5>
	                 <?php
	                   	};
	                  ?>
	              	</div>
                  </div>


                  
                  <div style="border-top:1px solid black;" class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>Rp. <?= number_format($subtotal,0,',','.'); ?></h5>
                  </div>


                  <a href="<?= base_url('cart/pembayaran') ?>" ><button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">CHECKOUT</button></a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>