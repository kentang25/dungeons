<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends FrontendController {
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

        $this->load->model('M_barang');
        $this->load->model('M_cart');
        $this->load->model('M_invoice');
        $this->load->model('M_auth_user');

    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
	
    public function index()
    {

        if(!$this->M_auth_user->is_Loggedin()){
            redirect('halaman-login');
        }

        $this->data['barang'] = $this->M_barang->tampil_data()->result();
        $this->template_user('v_dashboard', $this->data,true);
    }

    // --- Detail Data ---

    public function detail($id)
    {
        $this->data['detail'] = $this->M_barang->detail_barang($id);

            $this->template_user('v_detail_barang', $this->data,true);
    }

    public function shop()
    {
        $this->data['barang'] = $this->M_barang->tampil_data()->result();
        $this->template_user('v_shop', $this->data,true);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $this->data['barang'] = $this->M_barang->get_keyword($keyword);

            if(empty($this->data['barang'])){
                $this->template_user('v_404', $this->data,true);
            }else{
                $this->template_user('v_shop', $this->data,true);
            }
    }

    public function keranjang($id_brg){
        $barang = $this->M_barang->find($id_brg);
        $qty = 1;

        if($this->input->post('qty')){
            $qty = $this->input->post('qty');

        }
            // var_dump($qty);
            // exit();

        $data = array(
                'id'    => $barang->id_brg,
                'qty'   => $qty,
                'price' => $barang->harga,
                'name'  => $barang->nama_brg,
        );

        $this->db->insert('tb_cart',$data);
        redirect('shop');
    }

    public function detail_keranjang()
    {
        $this->template_user('v_detail_keranjang',$this->data,true);
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('shop');
    }
    

    // --- Pembayaran ----


    public function beli($id)
    {
        $this->data['beli'] = $this->M_barang->detail_barang($id);

        $this->template_user('v_beli',$this->data,true);
    }

    public function proses_pembayaran()
    {

                $this->template_user('v_proses_pembayaran', $this->data,true);
            
    }


}
