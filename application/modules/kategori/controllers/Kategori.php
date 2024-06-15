<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends FrontendController {
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

        $this->load->model('M_kategori');
        $this->load->model('M_barang');
        // $this->load->model('M_gallery');
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
	
    public function pakaian_pria()
    {
        $this->data['pakaian_pria'] = $this->M_kategori->data_pakaian_pria()->result();

        $this->template_user('v_pakaian_pria', $this->data,true);
    }
    
    public function shoes()
    {
        $this->data['shoes'] = $this->M_kategori->data_shoes()->result();

        $this->template_user('v_shoes', $this->data,true);
    }

    public function kaset()
    {
        $this->data['kaset'] = $this->M_kategori->data_kaset()->result();

        $this->template_user('v_kaset', $this->data,true);
    }

    public function accessories()
    {
        $this->data['accessories'] = $this->M_kategori->data_accessories()->result();

        $this->template_user('v_accessories', $this->data,true);
    }


}
