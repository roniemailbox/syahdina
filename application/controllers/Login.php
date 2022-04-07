<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		if($this->session->userdata('auth_pegawai')) // Jika user sudah login (Session authenticated ditemukan)
			redirect('Beranda'); // Redirect ke page admin
	}

	public function index(){
		$this->load->view('login');
	}

	public function login(){
		$id = $this->input->post('id');
		$psw = md5($this->input->post('psw'));

		$cek_us = $this->MainModel->user_pegawai($id,$psw);

		if($cek_us > 0){
			$data_us = $this->MainModel->getAccPegawai($id,$psw);
			$id_pegawai = $data_us['id_pegawai'];
			$status = $data_us['status'];

			if ($status=='0') {
				$this->session->set_flashdata('warning', 'Maaf, login gagal !! Akun anda tidak aktif !!');
				redirect('Login');
			} else {
				$session = array(
								'id_pegawai'=>$id_pegawai,
								'auth_pegawai'=>true
							);

				$this->session->set_userdata($session);
	            redirect('Beranda');
			}
		} else {
			$this->session->set_flashdata('message', 'Maaf, login gagal !!');
			redirect('Login');
		}
	}
}