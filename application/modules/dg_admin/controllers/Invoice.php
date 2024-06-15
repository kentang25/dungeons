<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends BackendController {
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

        $this->load->model('M_invoice');
        $this->load->model('M_auth');
        // $this->load->model('M_gallery');
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
	public function index() {

        if(!$this->M_auth->is_Loggedin()){
            redirect('halaman-login');
        }
        
		$this->data['invoice'] = $this->M_invoice->tampil_data();
        $this->template_admin('v_invoice', $this->data,true);
	}

}
