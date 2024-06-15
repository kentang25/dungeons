<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends BackendController {
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

        $this->load->model('M_auth');
        // $this->load->model('M_news');
        // $this->load->model('M_gallery');
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */

    public function register()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('password2','Konfirmasi Password','required|matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->template_login('v_register',$this->data,true);
            }else{
                // --- insert data ---
                $data = $this->M_auth->insert_data();
                // --- redirect ---
                redirect('halaman-login');
            }
    }

    public function login()
    {

        if($this->M_auth->is_Loggedin()){
            redirect('admin');
        }

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() === FALSE){
                $this->template_login('v_login',$this->data,true);

            }else{
                $data = $this->M_auth->get_user('username', $this->input->post('username'));
                if($data == FALSE){
                    $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                              Username atau Password anda salah!
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>');

                    redirect('halaman-login');
                }else{
                    // --- session ---
                    $_SESSION['user_id']    = $auth['id'];
                    $_SESSION['logged_in']  = TRUE;

                    // --- redirect ---
                    redirect('admin');
                }
            }
    }
	
}
