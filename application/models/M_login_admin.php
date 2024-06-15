<?php
	
	Class M_login_admin extends CI_Model{

		public function insert_data()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

				$data = array(

					'username' => $username,
					'password' => $password

				);

				$query = $this->db->insert('tb_login', $data);
				return $query;

		}

		public function get_admin($key, $value)
		{
			$query = $this->db->get_where('tb_login', array($key=>$value));
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