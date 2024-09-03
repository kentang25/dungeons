<?php
	
	Class M_cart extends CI_Model{

		// public function detail($id)
		// {
		// 	$query = $this->db->get_where('tb_barang',array('id'=>$id)):
		// 	if($query->num_rows() > 0){
		// 		return $query->result();
		// 	}else{
		// 		return FALSE;
		// 	}
		// }



		// insert cart item into databse
		public function insert_cart($data)
		{
			$query = $this->db->insert('tb_cart',$data);
			return $query;
		}

		// public function get_cart($id_user)
		// {
		// 	// var_dump($id_user);
		// 	// exit();
		// 	$query = $this->db->where('id_user',$id_user)
		// 					  ->get('tb_cart');

		// 	return $query;
		// }

		// ambil semua item untuk pengguna tertentu
		public function get_cart_item($id_user)
		{
			// var_dump($id_user);
			// exit();
			$query = $this->db->where('id_user',$id_user)
							  ->get('tb_cart');

			return $query;
		}

		// public function get_id_item($id_user)
		// {
		// 	$this->db->where('id_user',$id_user);
		// 	$query = $this->db->get('tb_cart');
		// 	return $query->row();
		// }

		public function clear_cart_item($id_user)
		{
			$this->db->where('id_user',$id_user);
			return $this->db->delete('tb_cart');
		}

		// --- belum selesai ---
		// public function total_cart_all($id_user)
		// {
		// 	$this->db->where('id_user',$id_user);
		// 	$query = $this->db->count_all_results('tb_cart');

		// 		// var_dump($query);
		// 		// exit();
		// 		return $query;
		// }

		

		public function calculate_cart_subtotal($id_user)
		{
			$cart_items = $this->get_cart_item($id_user)->result();
			$subtotal 	= 0;

				foreach($cart_items as $key => $items){
					$subtotal += $items->qty * $items->price;
				}

				return $subtotal;
		}

		// public function update_cart($rowid,$qty)
		// {
		// 	$data = array(

		// 			'rowid' => $rowid,
		// 			'qty'	=> $qty,

		// 	);

		// 	$this->cart->update($data);
		// }

		// public function remove_from_cart($rowid)
		// {
		// 	$this->cart->remove($rowid);
		// }

		// public function get_cart_contents()
		// {
		// 	return $this->cart->contents();
		// }

		// public function clear_cart()
		// {
		// 	$this->cart->destroy();
		// }

		// // public function join()
		// // {
		// // 	$query = "SELECT "
		// // }

		//  public function insert_cart_data($cart_data) {
	    //     return $this->db->insert_batch('tb_cart', $cart_data);
	    // }

		// public function insert_keranjang()
		// {
		// 	$id_user = $this->db->insert_id();
		// 	foreach($this->cart->contents() as $item){

		// 		$data = array(
		// 			'id_user'	=> $id_user,
		// 			'id_brg'	=> $item['id'],
		// 			'name'		=> $item['name'],
		// 			'price'		=> $item['price'],
		// 			'qty'		=> $item['qty']
		// 		);

		// 		return $this->db->insert('tb_cart', $data);

		// 	}
		// }
	}

?>