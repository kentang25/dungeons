<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends BackendController {
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
	
    public function index()
    {
        if(!$this->M_auth->is_Loggedin()){
            redirect('halaman-login');
        }
        
        $this->data['data_barang'] = $this->M_data_barang->tampil_data()->result();
        $this->template_admin('v_data_barang', $this->data,true);
    }

    // --- INSERT DATA ---
    public function insert()
    {
        $this->M_data_barang->insert_data();
        redirect('admin/data-barang');
    }

    // --- EDIT DATA ---

    public function edit($id)
    {
        $where = array('id'=>$id);

        $this->data['data_barang'] = $this->M_data_barang->edit_data('tb_barang', $where)->result();
        $this->template_admin('v_edit_data',$this->data,true);
    }

    public function update($id = TRUE)
    {
        $this->M_data_barang->update_data($id);
        redirect('admin/data-barang');
    }

    public function delete($id)
    {
        $this->M_data_barang->delete_data($id);
        redirect('admin/data-barang');
    }


        public function detail($id = TRUE)
        {
            $detail_barang = $this->M_data_barang->detail_barang($id);
            $this->data['detail'] = $detail_barang;

                $this->temlate_admin('v_detail_barang', $this->data,true);

        }    
    

}
