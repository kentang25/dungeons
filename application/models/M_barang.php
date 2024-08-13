<?php
	
	Class M_barang extends CI_Model{

		public function tampil_data()
		{
			$query = $this->db->get('tb_barang');
			return $query;
		}

		// --- detail data ---

		public function detail_barang($id)
		{
			$query = $this->db->where('id_brg',$id)->get('tb_barang');
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return FALSE;
			}
		}

		// --- search ---

		public function get_keyword($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_barang');
			$this->db->like('nama_brg', $keyword);
			$this->db->or_like('kategori',$keyword);
			$this->db->or_like('keterangan',$keyword);
			

			return $this->db->get()->result();
		}

		public function find($id_brg)
		{
			$result = $this->db->where('id_brg',$id_brg)
							   ->limit(1)
							   ->get('tb_barang');
			if($result->num_rows() > 0){
				return $result->row();
			}else{
				return array();
			}
		}

	}

?>