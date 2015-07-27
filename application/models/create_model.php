<?php

class Create_model extends CI_Model {

	public function simpan_project($data){
		$this->db->insert('sc_project',$data);
	}
	public function simpan_app($data){
		$this->db->insert('sc_softwares',$data);
	}
	public function simpan_join($data){
		$this->db->insert('sc_users',$data);
	}
	public function simpan_article($data){
		$this->db->insert('sc_posts',$data);
	}
	public function update_data_user($data,$id){
		$this->db->where('id',$id);
		$this->db->update('sc_users',$data);
	}
	public function update_data_project($data,$id){
		$this->db->where('id',$id);
		$this->db->update('sc_project',$data);
	}
	public function update_data_app($data,$id){
		$this->db->where('id',$id);
		$this->db->update('sc_softwares',$data);
	}
	public function delete_user_image($id){
		$this->db->where('id_user',$id);
		$this->db->delete('sc_images');
	}
	public function delete_project_image($id){
		$this->db->where('id_project',$id);
		$this->db->delete('sc_images');
	}
	public function delete_app_image($id){
		$this->db->where('id_software',$id);
		$this->db->delete('sc_images');
	}
	public function simpan_gambar($data){
		$this->db->insert('sc_images',$data);
	}
	public function cek($data){
		$query = $this->db->where('nama_pengguna',$data['nama_pengguna']);
		$query = $this->db->get('sc_users');
		$hasil = $query->row_array();
		if(empty($hasil)){
			$hasil = "gagal";
		}
		else{
			if($hasil['kata_sandi']!=$data['kata_sandi']){
				$hasil = "gagal";
			}
		}
		return $hasil;
	}
}