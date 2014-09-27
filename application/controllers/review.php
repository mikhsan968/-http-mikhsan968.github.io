<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function index()
	{
		$mail = $this->session->userdata('mail');
		if ($mail === FALSE) {
			redirect(site_url('auth'));
			return;
		}
		
		$faskes = $this->db->query('SELECT id, name FROM faskes')->result();	
		$this->load->view('review', array(
			'mail' => $this->session->userdata('mail'),
			'faskes' => $faskes
		));
	}
	
	public function post()
	{
		$tanggal = $this->input->get_post('tanggal', TRUE);
		$waktu = $this->input->get_post('waktu', TRUE);
		$faskes = $this->input->get_post('faskes', TRUE);
		$keterangan = $this->input->get_post('keterangan', TRUE);
		$nilai = $this->input->get_post('nilai', TRUE);
		$user = $this->session->userdata('mail');
		
		if ($tanggal && $faskes && $keterangan && $nilai) {
			$sql = "INSERT INTO review (id, user, date, time, faskes, notes, score) VALUES ( ? , ? , ? , ? , ? , ? , ? )";
			$this->db->query($sql, array(NULL, $user, $tanggal, $waktu, $faskes, $keterangan, $nilai));
			redirect(site_url('review/success'));
		} else {
			redirect(site_url('review/failed'));
		}
	}
	
	public function success()
	{
		$this->load->view('success', array(
			'mail' => $this->session->userdata('mail')
		));
	}
	
	public function failed()
	{
		$this->load->view('failure', array(
			'mail' => $this->session->userdata('mail')
		));
	}
	
}