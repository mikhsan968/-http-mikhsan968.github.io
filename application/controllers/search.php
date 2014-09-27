<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller
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
		
		$this->load->view('search', array(
			'mail' => $this->session->userdata('mail')
		));
	}
	
	public function show()
	{
		$mail = $this->session->userdata('mail');
		if ($mail === FALSE) {
			redirect(site_url('auth'));
			return;
		}
		
		$this->load->view('searchshow', array(
			'mail' => $this->session->userdata('mail'),
			'kebutuhan' => $this->input->get('kebutuhan')
		));
	}
	
}