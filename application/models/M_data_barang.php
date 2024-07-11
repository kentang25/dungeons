<?php
	
	Class M_data_barang extends CI_Model{

		// --- INSERT DATA ---

		public function tampil_data()
		{
			$query = $this->db->get('tb_barang');
			return $query;
		}

		public function get_count()
		{
			$query = $this->db->get('tb_barang');
			return $query->num_rows();
		}

		public function get($start = null,$limit = null)
		{
			$query = $this->db->get('tb_barang',$start,$limit);
			return $query->result();
		}

		public function insert_data()
		{
			$nama_brg 	= $this->input->post('nama_brg');
			$keterangan = $this->input->post('keterangan');
			$kategori 	= $this->input->post('kategori');
			$stok 		= $this->input->post('stok');
			$harga 		= $this->input->post('harga');
			$gambar 	= $_FILES['gambar']['name'];

				if($gambar=''){}else{
					$config['upload_path'] 		= FCPATH. 'assets/upload';
					$config['allowed_types']	= 'png|jpg|gif';

						$this->load->library('upload', $config);

						if(!$this->upload->do_upload('gambar')){
							echo "gambar gagal di upload". die();
						}else{
							$gambar = $this->upload->data('file_name');
						}
				}

				$data = array(

					'nama_brg' 		=> $nama_brg,
					'keterangan'	=> $keterangan,
					'kategori'		=> $kategori,
					'stok'			=> $stok,
					'harga'			=> $harga,
					'gambar'		=> $gambar

				);

				$query = $this->db->insert('tb_barang',$data);
				return $query;
		}

		public function edit_data($table,$where)
		{
			$query = $this->db->get_where($table,$where);
			return $query;
		}

		public function update_data($id)
		{
			$nama_brg 		= $this->input->post('nama_brg');
			$keterangan		= $this->input->post('keterangan');
			$kategori		= $this->input->post('kategori');
			$stok 			= $this->input->post('stok');
			$harga			= $this->input->post('harga');

				$data = array(

					'nama_brg' 		=> $nama_brg,
					'keterangan'	=> $keterangan,
					'kategori'		=> $kategori,
					'stok'			=> $stok,
					'harga'			=> $harga

				);

				$this->db->where('id',$id);
				$query = $this->db->update('tb_barang',$data);
				return $query;
		}

		// --- Hapus Data

		public function delete_data($id)
		{
			$query = $this->db->delete('tb_barang',array('id'=>$id));
			return $query;
		}

		// --- Detail Barang ---

		public function detail_barang($id)
		{
			$query = $this->db->get_where('tb_barang', array('id'=>$id))->row();
			return $query;
		}

		// --- Search ---

		public function get_search($keyword)
		{
			$this->db->select('*');
			$this->db->from('tb_barang');
			$this->db->like('nama_brg',$keyword);
			$this->db->or_like('keterangan',$keyword);
			$this->db->or_like('kategori',$keyword);

				return $this->db->get()->result();
		}

	}

?>