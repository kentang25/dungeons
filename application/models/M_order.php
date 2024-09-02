<?php
	
	CLass M_order extends CI_Model{

		public function create_order($data)
		{
			$this->db->insert('tb_order',$data);
			return $this->db->insert_id();
		}

		public function get_order($id_order)
		{
			$this->db->where('id_order',$id_order);
			$query = $this->db->get('tb_order');
			return $query->row();
		}

	}

?>