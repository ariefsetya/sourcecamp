<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myfolder extends CI_Controller {

	public function index(){
		$this->load->view('header');
		$this->load->view('myfolder');
		$this->load->view('footer');
	}

}