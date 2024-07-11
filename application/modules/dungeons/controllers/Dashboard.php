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
        $this->load->model('M_invoice');
        // $this->load->model('M_gallery');
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

            $this->template_user('v_shop', $this->data,true);
    }

    public function keranjang($id){
        $barang = $this->M_barang->find($id);

        $data = array(
                'id'    => $barang->id,
                'qty'   => 1,
                'price' => $barang->harga,
                'name'  => $barang->nama_brg,
        );

        $this->cart->insert($data);
        redirect('shop');
    }

    public function detail_keranjang()
    {
        $this->template_user('v_detail_keranjang',$this->data,true);
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('dashboard');
    }
    

    // --- Pembayaran ----

    public function pembayaran()
    {
        $this->template_user('v_pembayaran', $this->data,true);
    }

    public function beli($id)
    {
        $this->data['beli'] = $this->M_barang->detail_barang($id);

        $this->template_user('v_beli',$this->data,true);
    }

    public function proses_pembayaran()
    {
        $is_processed = $this->M_invoice->index();
            if($is_processed){
                $this->cart->destroy();
                $this->template_user('v_proses_pembayaran', $this->data,true);
            }else{
                echo "Maaf,pesanan anda gagal diproses";
            }
    }

    public function proses_pembayaran_2()
    {
        $is_processed = $this->M_invoice->langsung_beli();
            if($is_processed){
                $this->template_user('v_proses_pembayaran', $this->data,true);
            }else{
                echo "Maaf,pesanan anda gagal diproses";
            }
    }

}
