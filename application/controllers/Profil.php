<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public $CI = NULL;

	public function __construct() {
		parent::__construct();

		$this->CI = & get_instance();

		date_default_timezone_set('Asia/Jakarta');

		if(!$this->session->userdata('auth_pegawai')) {// Jika user sudah login (Session authenticated ditemukan)
			redirect('Login'); // Redirect ke page login
		}
	}

	public function cek_sesi() {
		if($this->session->userdata('sesbas')) {// Jika sesi basic di set
			$this->session->unset_userdata('sesbas'); // hapus sesi basic
		}
	}

	public function index(){
		$this->cek_sesi();

		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$data = array(
						'title' => '',
						'separator' => '',
  						'subtitle' => 'Profil',
  						'ttl' => 'Profil',
						'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai'])
					 );

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$this->menu());
		$this->load->view('profil');
		$this->load->view('templates/foot');
	}

	public function funcMenu($menu, $id_pegawai){
		$cek = $this->MainModel->CHMA($menu, $id_pegawai);

		if ($cek!=0) {
			$data_sbm = $this->MainModel->HMA($menu, $id_pegawai);
			$c = $data_sbm['c'];
			$r = $data_sbm['r'];
			$u = $data_sbm['u'];
			$d = $data_sbm['d'];
			$p = $data_sbm['p'];
		} else {
			$c = 0;
			$r = 0;
			$u = 0;
			$d = 0;
			$p = 0;
		}

		$data = array(
						'c' => $c,
						'r' => $r,
						'u' => $u,
						'd' => $d,
						'p' => $p
					);

		return $data;
	}

	public function proses_foto(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');

		$config['upload_path']			= './file/pegawai/foto_profil/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $id['id_pegawai'];
        $config['overwrite']            = true; // tindih file dengan file baru
        $config['max_size']             = 6090; // batas ukuran file: 6MB
        //$config['max_width']            = 1080; // batas lebar gambar dalam piksel
        //$config['max_height']           = 1080; // batas tinggi gambar dalam piksel
 
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('foto')) 
        {
            $this->session->set_flashdata('message', $this->upload->display_errors());
        } 
        else 
        {
            $gambar = $this->upload->data();

            $data = array(
            				'foto' => $gambar['file_name'],
            				'mime' => $gambar['file_type'],
            				'user_edit' => $id['id_pegawai'],
            				'tgl_edit' => $tgl
            			);

            $this->MainModel->updateData('pegawai',$data,'id_pegawai',$id['id_pegawai']);

            $this->session->set_flashdata('sukses', 'Selamat, foto berhasil di update');
        }

        redirect('Profil');
	}

	public function edit_profil(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');
		$us = $this->input->post('us');

		$nama = ucwords($this->input->post('nama'));
		$alamat = ucwords($this->input->post('alamat'));
		$jk = $this->input->post('rbJK');
		$username = $this->input->post('username');

		$cek = $this->MainModel->getUsernamePegawai($username);

		if ($username!=$us) {
			if ($cek!=0) {
				$this->session->set_flashdata('message', ' Username sudah ada!!');
			} else {
				$data = array(
								'nama' => $nama,
								'alamat' => $alamat,
								'jk' => $jk,
								'username' => $username,
								'user_edit' => $id['id_pegawai'],
								'tgl_edit' => $tgl
							);

				$this->MainModel->updateData('pegawai',$data,'id_pegawai',$id['id_pegawai']);

				$this->session->set_flashdata('sukses', ' Proses update profil berhasil !!');
			}			
		} else {
			$data = array(
							'nama' => $nama,
							'alamat' => $alamat,
							'jk' => $jk,
							'username' => $username,
							'user_edit' => $id['id_pegawai'],
							'tgl_edit' => $tgl
						);

			$this->MainModel->updateData('pegawai',$data,'id_pegawai',$id['id_pegawai']);

			$this->session->set_flashdata('sukses', ' Proses update profil berhasil !!');
		}

		redirect('Profil');
	}

	public function ganti_password(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');
		$ps = $this->input->post('ps');

		$psl = md5($this->input->post('psl'));
		$psb = $this->input->post('psb');
		$psb2 = $this->input->post('psb2');

		if ($psl!=$ps) {
			$this->session->set_flashdata('message', ' Password lama anda tidak sama !!');
		} else {
			if ($psb!=$psb2) {
				$this->session->set_flashdata('message', ' Password baru anda tidak sama !!');
			} else {
				$psw = md5($psb2);

				$data = array(
								'password' => $psw,
								'user_edit' => $id['id_pegawai'],
								'tgl_edit' => $tgl
							);

				$this->MainModel->updateData('pegawai',$data,'id_pegawai',$id['id_pegawai']);

				$this->session->set_flashdata('sukses', ' Proses ganti password berhasil !!');
			}
		}

		redirect('Profil');
	}

	public function menu() {
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$mnu = $this->MainModel->menu($id['id_pegawai']);

		$dd = 1;
		
		$kode_subsubmenu[1][1] = '';
		$submenu[1][1] = '';
		$s_link[1][1] = '';
		$s_icon[1][1] = '';
		$s_status[1][1] = '';
		$jff[1][1] = 0;
		$kode_subsubmenu[1][1][1] = '';
		$subsubmenu[1][1][1] = '';
		$ss_link[1][1][1] = '';
		$ss_icon[1][1][1] = '';
		$ss_status[1][1][1] = '';
		$jii[1][1][1] = 0;
		$jumji[1][1] = 0;
		$jumjf[1] = 0;

		foreach ($mnu as $rowmnu) {
			$kode_menu[$dd] = $rowmnu->kode_menu;
			$menu[$dd] = $rowmnu->menu;
			$m_link[$dd] = $rowmnu->link;
			$m_icon[$dd] = $rowmnu->icon;
			$m_status[$dd] = $rowmnu->status_aktif;

			$csm = $this->MainModel->cek_submenu($id['id_pegawai'],$kode_menu[$dd]);

			if ($csm!=0) {
				$ff = 1;

				$dsm = $this->MainModel->submenu($id['id_pegawai'],$kode_menu[$dd]);

				foreach ($dsm as $rowdsm) {
					$kode_submenu[$dd][$ff] = $rowdsm->kode_submenu;
					$submenu[$dd][$ff] = $rowdsm->submenu;
					$s_link[$dd][$ff] = $rowdsm->link;
					$s_icon[$dd][$ff] = $rowdsm->icon;
					$s_status[$dd][$ff] = $rowdsm->status_aktif;
					$jff[$dd][$ff] = $ff;

					$css = $this->MainModel->cek_subsubmenu($id['id_pegawai'],$kode_submenu[$dd][$ff]);

					if ($css!=0) {
						$ii = 1;

						$dss = $this->MainModel->subsubmenu($id['id_pegawai'],$kode_submenu[$dd][$ff]);

						foreach ($dss as $rowdss) {
							$kode_subsubmenu[$dd][$ff][$ii] = $rowdss->kode_subsubmenu;
							$subsubmenu[$dd][$ff][$ii] = $rowdss->subsubmenu;
							$ss_link[$dd][$ff][$ii] = $rowdss->link;
							$ss_icon[$dd][$ff][$ii] = $rowdss->icon;
							$ss_status[$dd][$ff][$ii] = $rowdss->status_aktif;
							$jii[$dd][$ff][$ii] = $ii;

							$ii++;
						}

						$jumji[$dd][$ff] = $ii-1;
					} else {
						$jumji[$dd][$ff] = 0;
					}

					$ff++;
				}

				$jumjf[$dd] = $ff-1;
			} else {
				$jumjf[$dd] = 0;
			}

			$dd++;
		}

		$data_menu = array(
						'jum_menu' => $dd-1,
						'jum_submenu' => $jff,
						'jum_subsubmenu' => $jii,
						'jumjf' => $jumjf,
						'jumji' => $jumji,
						'kode_menu' => $kode_menu,
						'menu' => $menu,
						'm_link' => $m_link,
						'm_icon' => $m_icon,
						'm_status' => $m_status,
						'kode_submenu' => $kode_submenu,
						'submenu' => $submenu,
						's_link' => $s_link,
						's_icon' => $s_icon,
						's_status' => $s_status,
						'kode_subsubmenu' => $kode_subsubmenu,
						'subsubmenu' => $subsubmenu,
						'ss_link' => $ss_link,
						'ss_icon' => $ss_icon,
						'ss_status' => $ss_status
					 );

		return $data_menu;
	}
}