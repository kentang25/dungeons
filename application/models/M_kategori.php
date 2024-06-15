<?php
	
	Class M_kategori extends CI_Model{

		public function data_pakaian_pria()
		{
			$query = $this->db->get_where('tb_barang',array('kategori'=>'pakaian pria'));
			return $query;
		}

		public function data_shoes()
		{
			$query = $this->db->get_where('tb_barang',array('kategori'=>'shoes'));
			return $query;
		}

		public function data_kaset()
		{
			$query = $this->db->get_where('tb_barang', array('kategori'=>'kaset'));
			return $query;
		}

		public function data_accessories()
		{
			$query = $this->db->get_where('tb_barang',array('kategori'=>'accessories'));
			return $query;
		}
	}

?>