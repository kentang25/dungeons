 <div id="products">
        <!-- Example product -->
        <div class="product" data-id="1" data-name="Product 1" data-price="10.00">
            <h3>Product 1</h3>
            <p>Price: $10.00</p>
            <input type="number" value="1" class="quantity">
            <button class="add-to-cart">Add to Cart</button>
        </div>
        <!-- More products here -->
    </div>

    <div id="cart"></div>

    <script src="assets/js/jquery.js">

    	$(document).ready(function(){

    			$('.add-to-cart').click(function(){

    					var product = $(this).closest('.product');
    					var id 		= product.data('id_brg');
    					var name 	= product.data('nama_brg');
    					var price 	= product.data('harga');
    					var qty 	= product.find('quantity').val();

    						$.ajax({
    							url		: <?= base_url('tambah-keranjang'); ?>,
    							type	: post,
    							data	: {
    								'id'	: id_brg,
    								'name'	: nama_brg,
    								'price'	: harga,
    								'qty'	: jumlah
    							},

    							success: function(response){
    								alert('item added to cart');
    								loadCart();
    							}
    						});

    			});

    			function loadCart()
    			{
    				$.ajax({
    					url		: <?= base_url('contents-keranjang') ?>,
    					type	: GET,
    					success : function(response){
    						var cart =JSON.parse(response);
    						var cart_html = '<ul>';
    						$.each(cart, function(i, item){
    							cart_html += '<li>' + item.name + '(' + item.qty ') - $' +item.price + '</li>';
    						});
    						cart_html += '</ul>';
    						$('#cart').html(cart_html);
    					}
    				});
    			}

    		loadCart();
    	});

    </script>