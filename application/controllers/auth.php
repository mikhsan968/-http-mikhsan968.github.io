<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function index()
	{
		$mail = $this->input->post('mail', TRUE);
		$pass = $this->input->post('pass', TRUE);
		if ($mail and $pass)
		{
			$escape_mail = $this->db->escape_str($mail);
			$escape_pass = $this->db->escape_str($pass);
			$sql = 'SELECT * FROM auth WHERE email = "' . $escape_mail . '" AND password = MD5("' . $escape_pass .'")';
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				// login success
				$this->session->set_userdata('mail', $escape_mail);
				redirect(site_url('home'));
			} else {
				// login failed
				$this->load->view('login', array('error' => true));
			}
		} else {
			// no post data
			$this->load->view('login');
		}
		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('home'));
	}
	
}