<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facility extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->output->set_content_type('application/json');
	}

	public function locations()
	{
		$query = $this->db->query('SELECT id, name, lat, lng FROM faskes');
		$this->output->set_output(json_encode($query->result()));
	}
	
	public function get($id)
	{
		$query = $this->db->query('SELECT * FROM faskes WHERE id = ' . $id);
		$this->output->set_output(json_encode($query->row()));
	}
	
}