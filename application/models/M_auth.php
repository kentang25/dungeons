<?php
	
	CLass M_auth extends CI_Model{

		public function insert_data()
		{
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

				$data = array(

					'username' 	=> $username,
					'password'	=> $password

				);

				$query = $this->db->insert('tb_auth', $data);
				return $query;
		}

		public function get_user($key,$value)
		{
			$query = $this->db->get_where('tb_auth',array($key=>$value));
			if(!empty($query->row_array())){
				return $query->row_array();
			}
		}

		public function is_Loggedin()
		{
			if(!isset($_SESSION['logged_in'])){
				return FALSE;
			}else{
				return TRUE;
			}
		}


	}

?>