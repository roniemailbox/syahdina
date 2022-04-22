<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {
	public function __construct() {
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		if(!$this->session->userdata('auth_pegawai')) {// Jika user sudah login (Session authenticated ditemukan)
			redirect('Login'); // Redirect ke page login
		}
	}

	public function index() {
		$this->load->view('coba');
	}

	public function coba2() {
		$this->load->view('coba2');
	}

	public function coba3() {
		$this->load->view('coba3');
	}

	public function coba4() {
		$this->load->view('coba4');
	}
}