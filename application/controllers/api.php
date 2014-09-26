<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->output->set_content_type('application/json');
	}

	public function facilities()
	{
		$query = $this->db->query('SELECT * FROM faskes');
		$this->output->set_output(json_encode($query->result()));
	}
}