<div class="container-fluid p-3 mb-2 bg-dark text-white">
<div class="container">
<div class="card p-4">

            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted"></div>
                        </div>
                    </div>    

                    <?php

                        foreach($cart_item as $key => $c_items):

                     ?>

                    
                    <div class="row">
                        <div class="row main align-items-center">
                            <!-- <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/ba3tvGm.jpg"></div> -->
                            <div class="col">
                                <div class="row text-muted"><?= $c_items->name; ?></div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                                <a href="#">-</a><a href="#" class="border"><?= $c_items->qty ?></a><a href="#">+</a>
                            </div>
                            <div class="col"><?= $c_items->price; ?> <span class="close">&#10005;</span></div>
                        </div>
                    </div>

                     <?php endforeach; ?>

                    
                    <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>

                </div>

                     <?php 

                        if($contents = $this->cart->contents()){
                            foreach($contents as $key => $items){ ?>
                                <div class="col-md-4 summary">
                                    <div><h5><b>Summary</b></h5></div>
                                    <hr>
                                    <div class="row">
                                        <div class="col" style="padding-left:0;">ITEMS 3</div>
                                        <div class="col text-right">Rp.<?= number_format($items['subtotal'],0,',','.') ?></div>
                                    </div>
                                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                        <div class="col">TOTAL PRICE</div>
                                        <div class="col text-right">Rp.<?= number_format($this->cart->total(),0,',','.') ?></div>
                                    </div>
                                    <button class="btn">CHECKOUT</button>
                                </div>
                            </div>
                        <?php
                            }
                        }

                     ?>
                
            
        </div>
</div>
</div>