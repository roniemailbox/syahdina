<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {
	public function __construct() {
		parent::__construct();

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

	public function atur_menu(){
		$this->cek_sesi();

		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$data = array(
		'title' => '&ensp;/&ensp;Hak Akses',
		'separator' => '',
		'subtitle' => 'Menu',
		'ttl' => 'Hak Akses',
		'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai'])
		);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$this->menu());
		$this->load->view('hak_akses');
		$this->load->view('templates/foot');
	}

	public function menu() {
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$mnu = $this->MainModel->menu($id['id_pegawai']);

		$dd = 1;
		
		$kode_subsubmenu[1][1] = '';
		$submenu[1][1] = '';
		$s_link[1][1] = '';
		$s_icon[1][1] = '';
		$jff[1][1] = 0;
		$kode_subsubmenu[1][1][1] = '';
		$subsubmenu[1][1][1] = '';
		$ss_link[1][1][1] = '';
		$ss_icon[1][1][1] = '';
		$jii[1][1][1] = 0;
		$jumji[1][1] = 0;
		$jumjf[1] = 0;

		foreach ($mnu as $rowmnu) {
			$kode_menu[$dd] = $rowmnu->kode_menu;
			$menu[$dd] = $rowmnu->menu;
			$m_link[$dd] = $rowmnu->link;
			$m_icon[$dd] = $rowmnu->icon;

			$csm = $this->MainModel->cek_submenu($id['id_pegawai'],$kode_menu[$dd]);

			if ($csm!=0) {
				$ff = 1;

				$dsm = $this->MainModel->submenu($id['id_pegawai'],$kode_menu[$dd]);

				foreach ($dsm as $rowdsm) {
					$kode_submenu[$dd][$ff] = $rowdsm->kode_submenu;
					$submenu[$dd][$ff] = $rowdsm->submenu;
					$s_link[$dd][$ff] = $rowdsm->link;
					$s_icon[$dd][$ff] = $rowdsm->icon;
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
						'kode_submenu' => $kode_submenu,
						'submenu' => $submenu,
						's_link' => $s_link,
						's_icon' => $s_icon,
						'kode_subsubmenu' => $kode_subsubmenu,
						'subsubmenu' => $subsubmenu,
						'ss_link' => $ss_link,
						'ss_icon' => $ss_icon
					 );

		return $data_menu;
	}
}