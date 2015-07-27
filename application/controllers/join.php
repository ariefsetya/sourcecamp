<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Controller {

	public function index()
	{
		$this->load->view('header'); 
		$this->load->view('join');
		$this->load->view('footer'); 
	}
	public function simpan_user(){
		$data['nama_pengguna']=$this->input->post('username');
		$data['kata_sandi']=$this->input->post('password');
		$data['nama_depan']=$this->input->post('firstname');
		$data['nama_belakang']=$this->input->post('lastname');
		$data['status']='user';
		$query = $this->db->where('nama_pengguna',$data['nama_pengguna']);
		$query = $this->db->get('sc_users');
		$hasil = $query->row_array();
		$id;
		if(empty($hasil)){
			$this->create_model->simpan_join($data);
			$id = mysql_insert_id();
			$this->session->set_userdata('id',$id);
			$this->session->set_userdata('username',$data['nama_pengguna']);
			$this->session->set_userdata('password',$data['kata_sandi']);
			$this->session->set_userdata('firstname',$data['nama_depan']);
			$this->session->set_userdata('lastname',$data['nama_belakang']);
			$this->session->set_userdata('status',$data['status']);
		}
		else{
			$this->session->set_userdata('username',$data['nama_pengguna']);
			$this->session->set_userdata('password',$data['kata_sandi']);
			$this->session->set_userdata('firstname',$data['nama_depan']);
			$this->session->set_userdata('lastname',$data['nama_belakang']);
			$this->session->set_userdata('errno','username');
			echo "<script>window.location='".site_url()."/join';</script>";
		}

		redirect(site_url().'/update');

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */