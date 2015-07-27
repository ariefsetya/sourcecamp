<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update extends CI_Controller {

	public function index(){
		$this->load->view('header');
		$this->load->view('updateuser');
		$this->load->view('footer');
	}
	public function set_update(){
		$id = $this->session->userdata('id');
		if(empty($_FILES['foto']['name'])){
		}
		else{
		$folder = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi,'foto/'.$id.$folder);
		$this->create_model->delete_user_image($id);
		$data2['gambar'] = $_FILES['foto']['name'];
		$data2['id_user']=$id;

		$this->create_model->simpan_gambar($data2);
		}
		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
		$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		$data['tempat_lahir'] = $this->input->post('tempat_lahir');
		$data['contact'] = $this->input->post('contact');
		$data['email'] = $this->input->post('email');
		$data['facebook'] = $this->input->post('facebook');
		$data['twitter'] = $this->input->post('twitter');
		$data['pekerjaan'] = $this->input->post('pekerjaan');
		$data['perusahaan'] = $this->input->post('perusahaan');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$data['alamat'] = $this->input->post('alamat');
		$this->create_model->update_data_user($data,$id);
		redirect(site_url().'/home');
	}

}