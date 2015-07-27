<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	public function index(){
		$this->load->view('header');
		$this->load->view('allarticle');
		$this->load->view('footer');
	}	
	public function detail(){
		$this->load->view('header');
		$this->load->view('detailarticle');
		$this->load->view('footer');
	}
	public function update(){
		$this->load->view('header');
		$this->load->view('updatearticle');
		$this->load->view('footer');
	}
	public function delete(){
		$id = $this->uri->segment(3);
		$this->db->where('id',$id);
		$this->db->delete('sc_posts');
		redirect(site_url().'/myfolder');
	}
	public function updatearticle(){
		$id = $this->input->post('id');
		$data['isi']=$this->input->post('isi');
		$data['tags']=$this->input->post('tags');
		$data['judul']=$this->input->post('judul');
		$this->db->where('id',$id);
		$this->db->update('sc_posts',$data);
		redirect(site_url().'/myfolder');
	}
}