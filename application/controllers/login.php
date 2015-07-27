<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('header'); 
		$this->load->view('login');
		$this->load->view('footer'); 
	}
	public function cek(){
		$data['nama_pengguna']=$this->input->post('username');
		$data['kata_sandi']=$this->input->post('password');
		$hasil = $this->create_model->cek($data);
		
		if($hasil=="gagal"){
			$this->session->set_userdata('errno','gagal');
			echo "<script>window.location='".site_url()."/login';</script>";
		}
		$this->session->set_userdata('errno','welcome');
		$this->session->set_userdata('status',$hasil['status']);
		$this->session->set_userdata('username',$hasil['nama_pengguna']);
		$this->session->set_userdata('password',$hasil['kata_sandi']);
		$this->session->set_userdata('id',$hasil['id']);
		echo "<script>window.location='".site_url()."/home';</script>";
	}
}