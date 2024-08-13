<?php
	
	Class M_invoice extends CI_Model{
		public function index()
		{
			date_default_timezone_get('Asia/Kediri');
			$nama 	= $this->input->post('nama');
			$alamat	= $this->input->post('alamat');

			foreach($this->cart->contents() as $item){

				$invoice = array(

					'nama' 			=> $nama,
					'alamat'		=> $alamat,
					'tgl_pesan'		=> date('Y-m-d H:i:s'),
					'batas_bayar'	=> date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
					'nama_brg'		=> $item['name'],
					'id'			=> $item['id'],
					'jumlah'		=> $item['qty'],
					'harga'			=> $item['price']
				);


				$query = $this->db->insert('tb_invoice',$invoice);
				return $query;
				$id_invoice = $this->db->insert_id();

			}

					// foreach($this->cart->contents() as $item){
					// 	$data = array(

					// 		'id_invoice' 	=> $id_invoice,
					// 		'id_brg'		=> $item['id'],
					// 		'nama_brg'		=> $item['name'],
					// 		'jumlah'		=> $item['qty'],
					// 		'harga'			=> $item['price']


					// 	);

					// 	$this->db->insert('tb_pesanan', $data);
						
					// 		// var_dump($query);
					// 		// exit();
					// }

					return TRUE;
		}


		public function tampil_data()
		{
			$result = $this->db->get('tb_invoice');
			if($result->num_rows() > 0){
				return $result->result();
			}else{
				return FALSE;
			}
		}

		public function get_id($id_inv)
		{
			$result = $this->db->where('id_inv',$id_inv)->limit(1)->get('tb_invoice');
			if($result->num_rows() > 0){
				return $result->result();
			}else{
				return FALSE;
			}
		}
	}

?>