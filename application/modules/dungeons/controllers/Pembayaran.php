<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends FrontendController {
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
        $this->load->model('M_order');
        $this->load->model('M_transaksi');
        $this->load->model('M_auth_user');
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
	public function checkout() {
		$get_user  = $this->M_auth_user->get_id_user();
        $cart_item = $this->M_cart->get_cart_item($get_user);

            if(empty($cart_item)){
                show_error("Keranjang Masih Kosong.");
            }

            // calculate total amount

            $total_amount = $this->M_cart->calculate_cart_subtotal($get_user);

            // create order

            $order_data = array(

                'id_user'    => $get_user,
                'total_amount'     => $total_amount,
                'status'     => 'pending',
                'created_at' => date('Y-m-d H:i:s')

            );

            $order_id = $this->M_order->create_order($order_data);

            redirect('cart/pembayaran');

    }


            public function transaksi(){
                // save transaksi 
                    $get_user  = $this->M_auth_user->get_id_user();
                    
                    $get_order = $this->M_order->get_order($get_user);
                    var_dump($get_order);
                    exit();
                    // $order_id = $this->M_transaksi->get_id_order($get_order);

                $pay_method     = $this->input->post('via_pembayaran');
                // $total_amount   = $this->input->post('harga');
                $total_amount = $this->M_cart->calculate_cart_subtotal($get_user);

                $payment_status = 'success';

                $data_transaksi = array(

                    'id_order'          => $get_order,
                    'payment_method'    => 'paypal',
                    'status'            => $payment_status,
                    'harga'             => $total_amount,
                    'created_at'        => date('Y-m-d H:i:s')
                );

                $transaksi = $this->M_transaksi->create_transaksi($data_transaksi);
                return $transaksi;

                // update order

                $this->db->where('id_order',$order_id);
                $this->db->update('tb_order', array('status => completed'));

            }

                

                // clear cart

            public function delete_data()
            {
                $this->M_cart->clear_cart_item($get_user);

                redirect('proses-pembayaran');
            }



}
