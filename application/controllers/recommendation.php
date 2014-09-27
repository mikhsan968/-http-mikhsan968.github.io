<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recommendation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->output->set_content_type('application/json');
	}
	
	public function index($kebutuhan)
	{
		switch ($kebutuhan)
		{
		case "bidan":		$codeset = "('P1', 'P7', 'S4')"; break;
		case "d_gigi":		$codeset = "('P3')"; break;
		case "d_umum":		$codeset = "('P2')"; break;
		case "k_medis":		$codeset = "('P1', 'P2', 'P4', 'P7')"; break;
		case "optik":		$codeset = "('S3')"; break;
		case "implant":		$codeset = "('L1', 'L4')"; break;
		case "forensik":	$codeset = "('L2', 'L3')"; break;
		case "jenazah":		$codeset = "('L1', 'L2', 'L3', 'L4', 'L6')"; break;
		case "rawat_inap":	$codeset = "('P1', 'P7')"; break;
		case "rehab_medis":	$codeset = "('L1', 'L4')"; break;
		case "t_darah":		$codeset = "('P1', 'P4', 'P7')"; break;
		case "medik_nonsp":	$codeset = "('P1', 'P2', 'P4', 'P5', 'P6', 'P7')"; break;
		case "medik_sp":	$codeset = "('L1', 'L2', 'L3', 'L4', 'L5', 'L6')"; break;
		default:			$codeset = "('P1', 'P2', 'P4', 'P5', 'P6', 'P7')"; break;
		}
		
		$query = $this->db->query('SELECT * FROM faskes WHERE type IN ' . $codeset);
		$this->output->set_output(json_encode($query->result()));
	}
	
}