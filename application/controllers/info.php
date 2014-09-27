<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$mail = $this->session->userdata('mail');
		if ($mail === FALSE) {
			redirect(site_url('auth'));
			return;
		}
	}
	
	public function index()
	{
		$this->faskes(rand() % 256);
	}
	
	public function faskes($id)
	{
		$faskes = $this->db->query('SELECT * FROM faskes WHERE id = ?', $id)->row();
		$faskes->score = $this->db->query('SELECT AVG(score) FROM review WHERE faskes = ?', $id)->row_array()['AVG(score)'];
		$faskes->scorecount = $this->db->query('SELECT COUNT(id) FROM review WHERE faskes = ?', $id)->row_array()['COUNT(id)'];;
		$faskes->reviews = $this->db->query('SELECT * FROM review WHERE faskes = ? LIMIT 3', $id)->result();
		$faskes->type = $this->__gettype($faskes->type);
		
		// dummy kelas
		$rn = rand() % 3;
		$kelas = $rn == 0 ? 'A' : $rn == 1 ? 'B' : 'C';
		
		$tarif = $this->db->query('SELECT penyakit, harga FROM tarif WHERE class = ?', $kelas)->result();
		
		$this->load->view('info', array(
			'mail' => $this->session->userdata('mail'),
			'faskes' => $faskes,
			'state' => $this->__getstate(),
			'kelas' => $kelas,
			'tarif' => $tarif
		));
	}
	
	private function __getstate()
	{
		// dummy
		$i = 500 + rand() % 500;
		$j = rand() % $i;
		return array('max' => $i, 'avg' => $j);
	}
	
	private function __gettype($code)
	{
		switch ($code) {
			case 'P1': return 'Puskesmas';
			case 'P2': return 'Dokter Umum Praktik Mandiri';
			case 'P3': return 'Dokter Gigi/Klinik Gigi';
			case 'P4': return 'Klinik Pratama';
			case 'P5': return 'Faskes Tk1 TNI';
			case 'P6': return 'Faskes Tk1 POLRI';
			case 'P7': return 'RS Klas D Pratama/RS Bersalin/Balai Pengobatan';
			case 'L1': return 'RSUP/RSUD';
			case 'L2': return 'RS TNI';
			case 'L3': return 'RS POLRI';
			case 'L4': return 'RS SWASTA';
			case 'L5': return 'RS Khusus Pemerintah';
			case 'L6': return 'KLINIK UTAMA/BALAI KESEHATAN MASYARAKAT';
			case 'S1': return 'APOTEK';
			case 'S2': return 'LAB';
			case 'S3': return 'OPTIK';
			case 'S4': return 'BIDAN/PERAWAT';
			default:   return 'FASKES PENUNJANG LAIN';
		}
	}
	
}