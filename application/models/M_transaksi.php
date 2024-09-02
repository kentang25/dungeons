<?php
	
	Class M_transaksi extends CI_Model{

		public function create_transaksi($data)
		{
			$query = $this->db->insert('tb_transaksi',$data);
			return $query;
		}

		public function get_id_order($id_order)
		{
			$this->db->where('id_order',$id_order);
			$query = $this->db->get('tb_order');
			return $query->row();
		}

	}

?>