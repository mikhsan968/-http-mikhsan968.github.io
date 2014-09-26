<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/head.php');
		$this->load->view('maps.php');
		$this->load->view('templates/foot.php');
	}
}