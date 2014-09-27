<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller
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
		
		echo 'Hello info!';
	}
	
}