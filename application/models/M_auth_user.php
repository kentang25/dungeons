<?php

	Class M_auth_user extends CI_Model{

		public function insert_data_user()
		{
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');

				$data = array(

						'username'	=> $username,
						'password'	=> $password,

					);

				$query = $this->db->insert('tb_auth_user', $data);
				return $query;
		}

		public function get_user($key,$value)
		{
			$query = $this->db->get_where('tb_auth_user', array($key=>$value));
			if(!empty($query->row_array())){
				return $query->row_array();
			}
		}

		public function is_Loggedin()
		{
			if(!isset($_SESSION['is_logged_in'])){
				return FALSE;
			}else{
				return TRUE;
			}
		}

		public function get_id_user()
		{
			return $this->session->userdata('id_user');
		}

	}
	
?>