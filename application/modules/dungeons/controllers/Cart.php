<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends FrontendController {
	//
    public $CI;

    /**
     * An array of variables to be passed through to the
     * view, layouts, ....
     */ 
    protected $data = array();

    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        //
        parent::__construct();
        // This function returns the main CodeIgniter object.
        // Normally, to call any of the available CodeIgniter object or pre defined library classes then you need to declare.
        $CI =& get_instance();

        $this->load->model('M_cart');
        $this->load->model('M_barang');
        $this->load->model('M_auth_user');
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */

    // public function index(){
    //     $this->data['data']=$this->M_cart->get_all_product()->result();
    //     $this->template_user('cart_shop/v_cart',$this->data,true);
    // }

    public function detail($id)
    {
        $this->data['detail'] = $this->M_barang->detail_barang($id);
        $this->template_user('v_detail_barang',$this->data,true);
    }

    // --- add cart ---

	public function addCart($id_brg){
        $barang = $this->M_barang->find($id_brg);
        if($this->input->post('qty')){
            $qty = $this->input->post('qty');

        }
		$data = array(
                'id'    => $barang->id_brg,
                'name'  => $barang->nama_brg,
                'price' => $barang->harga,
                'qty'   => $qty
        );
        // insert data into the cart(session)
        $this->cart->insert($data);

        $get_id = $this->M_auth_user->get_id_user();

        $cart_data = array(
                'id_brg'    => $data['id'],
                'id_user'   => $get_id, 
                'qty'       => $data['qty'],
                'price'     => $data['price'],
                'name'      => $data['name']
            );

        if($this->M_cart->insert_cart($cart_data)){
            redirect('keranjang/detail');
        }else{
            echo "gagal!";
        }


        // $this->M_cart->insert_keranjang();
        // echo $this->show_cart();
        // echo json_encode(array('status' => 'success', 'message' => 'Item added to cart'));

	}

    public function view_cart()
    {
        $get_id = $this->M_auth_user->get_id_user();

        $this->data['cart_item'] = $this->M_cart->get_cart_item($get_id);

        $this->template_user('cart_shop/v_cart2',$this->data,true);

    }

    

    // --- belum selesai ---
    // public function total_cart()
    // {
    //     $get_id = $this->M_auth_user->get_id_user();
    //     $this->data['total_cart'] = $this->M_cart->total_cart_all($get_id);

    //         $this->template_user('cart_shop/v_cart2',$this->data,true);
    // }

    public function pembayaran()
    {
        $get_id = $this->M_auth_user->get_id_user();
        $this->data['cart_item'] = $this->M_cart->get_cart_item($get_id);

        $this->template_user('v_pembayaran', $this->data,true);
    }


    //  public function save() {
        
    //     $cart = $this->cart->contents();
    //     $get_id_user = $this->session->userdata('id_user');
        
    //     $cart_data = array();
    //     foreach ($cart as $item) {
    //         $cart_data[] = array(
    //             'id_brg'    => $item['id'],
    //             'id_user'   => $get_id_user, 
    //             'qty'       => $item['qty'],
    //             'price'     => $item['price'],
    //             'name'      => $item['name']
    //         );
    //     }

    //     // var_dump($cart_data);
    //     // exit();

        
    //     if ($this->M_cart->insert_cart_data($cart_data)) {
    //         echo "Cart data saved successfully!";
    //     } else {
    //         echo "Failed to save cart data.";
    //     }
    // }
    
   

    public function show_cart()
    {
        $output = '';
        $no = 0;

            foreach($this->cart->contents() as $items){
                $no++;
                $output .='
                <tr>
                <td>'.$items['name'].'</td>
                <td>'.number_format($items['price']).'</td>
                <td>'.$items['qty'].'</td>
                <td>'.number_format($items['subtotal']).'</td>
                <td><button type="button" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>
                </tr>
                ';
                }
                $output .= '
                <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
                </tr>
                ';
                return $output;
    }

    public function load_cart(){
        $insert_cart = $this->M_cart->insert_keranjang();
        var_dump($insert_cart);
        exit();
        if($insert_cart){
            echo $this->show_cart();
        }else{
            return FALSE;
        }
    }

    function delete_cart(){
        $data = array(
        'rowid' => $this->input->post('row_id'),
        'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
    

}
