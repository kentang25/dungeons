<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends BackendController {
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

        $this->load->model('M_data_barang');
        
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
        $this->data['data_barang'] = $this->M_data_barang->tampil_data()->result();
        $this->template_admin('v_dashboard',$this->data,true);
    }


}
