<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application extends CI_Controller {

	public function index(){
		$this->load->view('header');
		$this->load->view('app');
		$this->load->view('footer');
	}
	public function detail(){
		$this->load->view('header');
		$this->load->view('detailapp');
		$this->load->view('footer');
	}
	public function update(){
		$this->load->view('header');
		$this->load->view('updateapp');
		$this->load->view('footer');
	}
	public function delete(){
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete('sc_softwares');
		$query = $this->db->where('id_software',$this->uri->segment(3));
		$query = $this->db->get('sc_updates');
		$hasil = $query->result_array();
		foreach ($hasil as $key) {
			unlink('packedfileapp/'.$key['id'].'/'.$key['packed_file']);
			rmdir('packedfileapp/'.$key['id']);
		}
		$this->db->where('id_software',$this->uri->segment(3));
		$this->db->delete('sc_updates');
		redirect(site_url().'/myfolder');
	}
	public function upgrade(){
		$this->load->view('header');
		$this->load->view('upgradeapp');
		$this->load->view('footer');
	}
	public function upgradeapp(){
		$data['versi']=$this->input->post('versi');
		$data['packed_file']=$_FILES['packed']['name'];
		$data['id_software']=$this->input->post('id');
		$data['tgl'] = date("Y-m-d");
		$data['jam'] = date("H:i:s");
		$data['change_log']=$this->input->post('changelog');
		$this->db->insert('sc_updates',$data);
		$id = mysql_insert_id();
		$folder = $_FILES['packed']['name'];
		$lokasi = $_FILES['packed']['tmp_name'];
		mkdir('packedfileapp/'.$id);
		move_uploaded_file($lokasi,'packedfileapp/'.$id."/".$folder);
		redirect(site_url().'/myfolder');
	}
	public function simpan_komen(){
		$id = $this->input->post('id');
		$data['id_software'] = $id;
		$data['id_user'] = $this->session->userdata('id');
		$data['isi'] = htmlentities($this->input->post('komen'));
		$data['tgl'] = date("Y-m-d");
		$data['jam'] = date("H:i:s");
		$this->db->insert('sc_comments',$data);
		redirect(site_url().'/application/detail/'.$id);
	}
	public function updateapp(){
		$id = $this->input->post('id');
		$pv = $this->input->post('pv');
		$pv = 0;
		if($id=="on"){
			$pv = 1;
		}
		$data['premium'] = $pv;
		if(empty($_FILES['cover']['name'])){
		}
		else{
		$folder = $_FILES['cover']['name'];
		$lokasi = $_FILES['cover']['tmp_name'];
		move_uploaded_file($lokasi,'coverapp/'.$id.$folder);
		$this->create_model->delete_app_image($id);
		$data2['gambar'] = $_FILES['cover']['name'];
		$data2['id_software']=$id;

		$this->create_model->simpan_gambar($data2);
		}

		
		$data['judul'] = $this->input->post('judul');
		$data['license'] = $this->input->post('license');
		$data['os'] = $this->input->post('os');
		$data['review'] = $this->input->post('review');
		$this->create_model->update_data_app($data,$id);
		redirect(site_url().'/myfolder');
	}

}