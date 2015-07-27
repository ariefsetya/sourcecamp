<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {

	public function index()
	{
		$this->load->view('header'); 
		$this->load->view('create');
		$this->load->view('footer'); 
	}
	public function project()
	{
		$this->load->view('header'); 
		$this->load->view('createproject');
		$this->load->view('footer'); 
	}
	public function article()
	{
		$this->load->view('header'); 
		$this->load->view('createarticle');
		$this->load->view('footer'); 
	}
	public function application()
	{
		$this->load->view('header'); 
		$this->load->view('createapp');
		$this->load->view('footer'); 
	}
	public function simpanarticle(){
		$data['id_user']=$this->session->userdata('id');
		$data['judul']=$this->input->post('judul');
		$data['isi']=$this->input->post('isi');
		$data['tags']=$this->input->post('tags');
		$data['tgl'] = date("Y-m-d");
		$data['jam'] = date("H:i:s");
		$this->create_model->simpan_article($data);
		$id = mysql_insert_id();
		redirect(site_url().'/article/detail/'.$id);
	}
	public function simpanapp()
	{

		$data['id_user']=$this->session->userdata('id');
		$data['judul'] = $this->input->post('nama');
		$data['license'] = $this->input->post('license');
		$data['os'] = $this->input->post('os');
		$data['review'] = $this->input->post('deskripsi');
		$id = $this->input->post('pv');
		$hasil = 0;
		if($id=="on"){
			$hasil = 1;
		}

		$data['premium'] = $hasil;
		$data['tgl'] = date("Y-m-d");
		$data['jam'] = date("H:i:s");
		$this->create_model->simpan_app($data);
		$id = mysql_insert_id();
		$id_data = $id;
		$data['appname']=md5('app'.$id.'app');
		$this->create_model->update_data_app($data,$id);

		//benars
		$data2['gambar'] = $_FILES['cover']['name'];
		$data2['id_software'] = $id;
		$folder = $_FILES['cover']['name'];
		$lokasi = $_FILES['cover']['tmp_name'];
		move_uploaded_file($lokasi,'coverapp/'.$id.$folder);
		$data2['tgl'] = date("Y-m-d");
		$data2['jam'] = date("H:i:s");
		$this->create_model->simpan_gambar($data2);
		//benar


		$data3['versi'] = $this->input->post('versi');
		$data3['id_software']=$id;
		$data3['packed_file'] = $_FILES['packed']['name'];
		$data3['tgl'] = date("Y-m-d");
		$data3['jam'] = date("H:i:s");
		$this->db->insert('sc_updates',$data3);
		$id = mysql_insert_id();
		$folder = $_FILES['packed']['name'];
		$lokasi = $_FILES['packed']['tmp_name'];
		mkdir('packedfileapp/'.$id);
		move_uploaded_file($lokasi,'packedfileapp/'.$id.'/'.$folder);
		

		
		redirect(site_url().'/application/detail/'.$id_data);

	}
	public function simpanproject()
	{
		$data['id_user']=$this->session->userdata('id');
		$data['nama'] = $this->input->post('nama');
		$data['license'] = $this->input->post('license');
		$data['os'] = $this->input->post('os');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$id = $this->input->post('ofe');
		$hasil = 0;
		if($id=="on"){
			$hasil = 1;
		}
		$data['open_for_edit'] = $hasil;
		$hasil = 0;
		$id = $this->input->post('pv');
		if($id=="on"){
			$hasil = 1;
		}
		$data['protected'] = $hasil;
		$this->create_model->simpan_project($data);
		$id = mysql_insert_id();
		$id_data = $id;
		$data['appname']=md5('project'.$id.'project');
		$data['tgl'] = date("Y-m-d");
		$data['jam'] = date("H:i:s");
		$this->create_model->update_data_project($data,$id);
		$data2['gambar'] = $_FILES['cover']['name'];
		$data2['id_project'] = $id;
		$folder = $_FILES['cover']['name'];
		$lokasi = $_FILES['cover']['tmp_name'];
		move_uploaded_file($lokasi,'cover/'.$id.$folder);
		$data3['versi'] = $this->input->post('versi');
		$data3['id_project']=$id;
		$data3['packed_file'] = $_FILES['packed']['name'];
		$data3['tgl'] = date("Y-m-d");
		$data3['jam'] = date("H:i:s");
		$this->db->insert('sc_updates',$data3);
		$id = mysql_insert_id();
		$folder = $_FILES['packed']['name'];
		$lokasi = $_FILES['packed']['tmp_name'];
		mkdir('packedfile/'.$id);
		move_uploaded_file($lokasi,'packedfile/'.$id.'/'.$folder);


		$this->create_model->simpan_gambar($data2);
		redirect(site_url().'/project/detail/'.$id_data);

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */