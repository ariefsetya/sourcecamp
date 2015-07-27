<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index()
	{
		$search = htmlentities($this->input->post('cari'));
		if(empty($search)){
			$hasil['hasil'] = "Keyword not found";
			goto lompat;
		}
		$this->session->set_userdata('cari',$search);
		$query = $this->db->like('judul',$search);
		$query = $this->db->or_like('review',$search);
		$query = $this->db->get('sc_softwares');
		$hasil['hasil'] = $query->result_array(); 
		lompat:
		$this->load->view('header'); 
		$this->load->view('search',$hasil);
		$this->load->view('footer'); 
	}
	public function browse()
	{
		$this->load->view('header');
		$this->load->view('listing');
		$this->load->view('footer');
	}
	public function featured()
	{
		$this->load->view('header');
		$this->load->view('listing');
		$this->load->view('footer');
	}
	public function allsystem()
	{
		$this->load->view('header');
		$this->load->view('listing');
		$this->load->view('footer');
	}
	public function windows()
	{
		$this->load->view('header');
		$this->load->view('listing');
		$this->load->view('footer');
	}
	public function tux()
	{
		$this->load->view('header');
		$this->load->view('listing');
		$this->load->view('footer');
	}
	public function apple()
	{
		$this->load->view('header');
		$this->load->view('listing');
		$this->load->view('footer');
	}
	public function android()
	{
		$this->load->view('header');
		$this->load->view('listing');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */