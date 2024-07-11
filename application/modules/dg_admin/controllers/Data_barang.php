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
        // $this->template_admin('v_data_barang', $this->data,true);

        $this->load->library('pagination');

        $jumlah = $this->M_data_barang->get_count();

        // var_dump($jumlah);
        // exit();

        $config['base_url']     = base_url(). 'dg_admin/data_barang/index' ;
        // $config['page_query_string'] = TRUE;
        $config['total_rows']   = $jumlah;
        $config['per_page']     = 10;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // $config['num_links'] = 2;

        $this->pagination->initialize($config);

        $data['start'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->data['barang'] = $this->M_data_barang->get($config['per_page'],$data['start']);
        // var_dump($this->data['barang']);
        // exit();
        // $this->data['start'] = $page;

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

                $this->template_admin('v_detail_barang', $this->data,true);

        }    
    
    public function search()
    {
        $keyword = $this->input->get('keyword');
        $this->data['data_barang'] = $this->M_data_barang->get_search($keyword);

        // var_dump($keyword);
        // exit();

                $this->template_admin('v_data_barang',$this->data,true);
    }

    // public function views_search()
    // {
    //     $this->data['data_barang'] = $this->M_data_barang->tampil_data()->result();
    //     $this->template_admin('v_hasil_search',$this->data,true);
    // }

}
