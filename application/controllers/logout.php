<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		$this->session->set_userdata('status','');
		$this->session->set_userdata('username','');
		redirect('/home');
	}
}