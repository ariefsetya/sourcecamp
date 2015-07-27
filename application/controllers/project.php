<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

	public function index(){
		$this->load->view('header');
		$this->load->view('project');
		$this->load->view('footer');
	}
	public function detail(){
		$this->load->view('header');
		$this->load->view('detailproject');
		$this->load->view('footer');
	}
	public function upgrade(){
		$this->load->view('header');
		$this->load->view('upgradeproject');
		$this->load->view('footer');
	}
	public function simpan_komen(){
		$id = $this->input->post('id');
		$data['id_project'] = $id;
		$data['id_user'] = $this->session->userdata('id');
		$data['isi'] = htmlentities($this->input->post('komen'));
		$data['tgl'] = date("Y-m-d");
		$data['jam'] = date("H:i:s");
		$this->db->insert('sc_comments',$data);
		redirect(site_url().'/project/detail/'.$id);
	}
	public function update(){
		$this->load->view('header');
		$this->load->view('updateproject');
		$this->load->view('footer');
	}
	public function delete(){
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete('sc_project');
		$query = $this->db->where('id_project',$this->uri->segment(3));
		$query = $this->db->get('sc_updates');
		$hasil = $query->result_array();
		foreach ($hasil as $key) {
			unlink('packedfile/'.$key['id'].'/'.$key['packed_file']);
			rmdir('packedfile/'.$key['id']);
		}
		$this->db->where('id_project',$this->uri->segment(3));
		$this->db->delete('sc_updates');
		redirect(site_url().'/myfolder');
	}
	public function updateproject(){
		$id = $this->input->post('id');

		if(empty($_FILES['cover']['name'])){
		}
		else{
		$folder = $_FILES['cover']['name'];
		$lokasi = $_FILES['cover']['tmp_name'];
		move_uploaded_file($lokasi,'cover/'.$id.$folder);
		$this->create_model->delete_project_image($id);
		$data2['gambar'] = $_FILES['cover']['name'];
		$data2['id_project']=$id;

		$this->create_model->simpan_gambar($data2);
		}

		$data['nama'] = $this->input->post('nama');
		$data['versi'] = $this->input->post('versi');
		$data['license'] = $this->input->post('license');
		$data['os'] = $this->input->post('os');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$this->create_model->update_data_project($data,$id);
		redirect(site_url().'/myfolder');
	}
	public function upgradeproject(){
		$data['versi']=$this->input->post('versi');
		$data['packed_file']=$_FILES['packed']['name'];
		$data['change_log']=$this->input->post('changelog');
		$data['id_project']=$this->input->post('id');
		$data['tgl'] = date("Y-m-d");
		$data['jam'] = date("H:i:s");
		$this->db->insert('sc_updates',$data);
		$id = mysql_insert_id();
		$folder = $_FILES['packed']['name'];
		$lokasi = $_FILES['packed']['tmp_name'];
		mkdir('packedfile/'.$id);
		move_uploaded_file($lokasi,'packedfile/'.$id."/".$folder);
		redirect(site_url().'/myfolder');
	}

}