<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$mail = $this->session->userdata('mail');
		if ($mail === FALSE) {
			redirect(site_url('auth'));
			return;
		}
		
		$this->load->view('home', array(
			'mail' => $this->session->userdata('mail')
		));
	}
	
}