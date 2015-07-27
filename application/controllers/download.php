<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

	public function index(){
		$this->load->view('header');
		$this->load->view('download');
		$this->load->view('footer');
	}
	public function project(){
		$this->load->view('header');
		$this->load->view('download');
		$this->load->view('footer');
	}
	public function software(){
		$this->load->view('header');
		$this->load->view('download');
		$this->load->view('footer');
	}
	public function softwareandro(){
		$this->load->view('header');
		$this->load->view('download');
		$this->load->view('footer');
	}
}