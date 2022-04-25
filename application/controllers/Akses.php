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
		$this->load->view('hak_akses',$this->menu2());
		$this->load->view('templates/foot');
	}

	public function proses_tambah_menu(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');

	    $menu = ucwords($this->input->post('menu'));
	    $link = $this->input->post('link');
	    $icon = strtolower($this->input->post('icon'));

	    $data_umn = $this->MainModel->nuMenu();
	    $kode_menu = $data_umn['umn']+1;

	    $data_ummn = $this->MainModel->numMenu();
	    $no_menu = $data_ummn['ummn']+1;

        $data_menu = array(
                      'kode_menu' => $kode_menu,
                      'menu' => $menu,
                      'no_menu' => $no_menu,
                      'link' => $link,
                      'icon' => 'fas fa-'.$icon,
                      'status_aktif' => 1
                    );

        $this->MainModel->insertMenu($data_menu);

        $data_hmenu = array(
        			  'id_pegawai' => $id['id_pegawai'],
        			  'c' => 1,
        			  'r' => 1,
        			  'u' => 1,
        			  'd' => 1,
        			  'p' => 1,
                      'kode_menu' => $kode_menu,
                      'user_entry' => $id['id_pegawai'],
                      'tgl_entry' => $tgl
                    );

        $this->MainModel->insertHMenu($data_hmenu);

        $this->session->set_flashdata('sukses', ' Data Menu berhasil ditambahkan !!');

		redirect('Akses/atur_menu');
	}

	public function proses_edit_menu(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$kode_menu = $this->input->post('kode_menu');
	    $menu = ucwords($this->input->post('menu'));
	    $link = $this->input->post('link');
	    $icon = strtolower($this->input->post('icon'));
	    $status_aktif = $this->input->post('status_aktif');

        $data_menu = array(
                      'menu' => $menu,
                      'link' => $link,
                      'icon' => 'fas fa-'.$icon,
                      'status_aktif' => (int)$status_aktif
                    );

        $this->MainModel->updateData('menu',$data_menu,'kode_menu',$kode_menu);

        $this->session->set_flashdata('sukses', ' Data Menu berhasil diupdate !!');

		redirect('Akses/atur_menu');
	}

	public function proses_hapus_menu($kode_menu){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$cek_menu = $this->MainModel->cekMnSbm($kode_menu);

		if ($cek_menu!=0) {
			$data_menu = $this->MainModel->getMnSbm($kode_menu);

			foreach ($data_menu as $rowdmn) {
				$kode_submenu = $rowdmn->kode_submenu;

				$cek_menu = $this->MainModel->cekMnSbb($kode_submenu);

				if ($cek_menu!=0) {
					$data_submenu = $this->MainModel->getMnSbb($kode_submenu);

					foreach ($data_submenu as $rowdsb) {
						$kode_subsubmenu = $rowdsb->kode_subsubmenu;

						$this->MainModel->deleteData('h_subsubmenu','kode_subsubmenu',$kode_subsubmenu);
						$this->MainModel->deleteData('subsubmenu','kode_subsubmenu',$kode_subsubmenu);
					}

					$this->MainModel->deleteData('h_submenu','kode_submenu',$kode_submenu);
					$this->MainModel->deleteData('submenu','kode_submenu',$kode_submenu);
				} else {
					$this->MainModel->deleteData('h_submenu','kode_submenu',$kode_submenu);
					$this->MainModel->deleteData('submenu','kode_submenu',$kode_submenu);
				}
			}

			$this->MainModel->deleteData('h_menu','kode_menu',$kode_menu);
			$this->MainModel->deleteData('menu','kode_menu',$kode_menu);
		} else {
			$this->MainModel->deleteData('h_menu','kode_menu',$kode_menu);
			$this->MainModel->deleteData('menu','kode_menu',$kode_menu);
		}

        $this->session->set_flashdata('sukses', ' Data berhasil dihapus !!');

		redirect('Akses/atur_menu');
	}

	public function proses_tambah_submenu(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');

		$kode_menu = $this->input->post('kode_menu');
	    $submenu = ucwords($this->input->post('submenu'));
	    $link = $this->input->post('link');

	    $data_usm = $this->MainModel->nuSubmenu();
	    $kode_submenu = $data_usm['usm']+1;

	    $data_ussm = $this->MainModel->numSubmenu();
	    $no_submenu = $data_ussm['ussm']+1;

        $data_submenu = array(
        			  'kode_submenu' => $kode_submenu,
                      'kode_menu' => $kode_menu,
                      'submenu' => $submenu,
                      'no_submenu' => $no_submenu,
                      'link' => $link,
                      'status_aktif' => 1
                    );

        $this->MainModel->insertSubmenu($data_submenu);

        $data_hsubmenu = array(
        			  'id_pegawai' => $id['id_pegawai'],
        			  'c' => 1,
        			  'r' => 1,
        			  'u' => 1,
        			  'd' => 1,
        			  'p' => 1,
                      'kode_submenu' => $kode_submenu,
                      'user_entry' => $id['id_pegawai'],
                      'tgl_entry' => $tgl
                    );

        $this->MainModel->insertHSubmenu($data_hsubmenu);

        $this->session->set_flashdata('sukses', ' Data Submenu berhasil ditambahkan !!');

		redirect('Akses/atur_menu');
	}

	public function proses_edit_submenu(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$kode_submenu = $this->input->post('kode_submenu');
		$kode_menu = $this->input->post('kode_menu');
	    $submenu = ucwords($this->input->post('submenu'));
	    $link = $this->input->post('link');
	    $status_aktif = $this->input->post('status_aktif');

        $data_submenu = array(
                      'submenu' => $submenu,
                      'link' => $link,
                      'status_aktif' => (int)$status_aktif
                    );

        $this->MainModel->updateData2('submenu',$data_submenu,'kode_submenu',$kode_submenu,'kode_menu',$kode_menu);

        $this->session->set_flashdata('sukses', ' Data Submenu berhasil diupdate !!');

		redirect('Akses/atur_menu');
	}

	public function proses_hapus_submenu($kode_submenu){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$cek_menu = $this->MainModel->cekMnSbb($kode_submenu);

		if ($cek_menu!=0) {
			$data_submenu = $this->MainModel->getMnSbb($kode_submenu);

			foreach ($data_submenu as $rowdsb) {
				$kode_subsubmenu = $rowdsb->kode_subsubmenu;

				$this->MainModel->deleteData('h_subsubmenu','kode_subsubmenu',$kode_subsubmenu);
				$this->MainModel->deleteData('subsubmenu','kode_subsubmenu',$kode_subsubmenu);
			}

			$this->MainModel->deleteData('h_submenu','kode_submenu',$kode_submenu);
			$this->MainModel->deleteData('submenu','kode_submenu',$kode_submenu);
		} else {
			$this->MainModel->deleteData('h_submenu','kode_submenu',$kode_submenu);
			$this->MainModel->deleteData('submenu','kode_submenu',$kode_submenu);
		}

        $this->session->set_flashdata('sukses', ' Data berhasil dihapus !!');

		redirect('Akses/atur_menu');
	}

	public function proses_tambah_subsubmenu(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');

		$kode_submenu = $this->input->post('kode_submenu');
	    $subsubmenu = ucwords($this->input->post('subsubmenu'));
	    $link = $this->input->post('link');

	    $data_uss = $this->MainModel->nuSubsubmenu();
	    $kode_subsubmenu = $data_uss['uss']+1;

	    $data_usss = $this->MainModel->numSubsubmenu();
	    $no_subsubmenu = $data_usss['usss']+1;

        $data_subsubmenu = array(
        			  'kode_subsubmenu' => $kode_subsubmenu,
                      'kode_submenu' => $kode_submenu,
                      'subsubmenu' => $subsubmenu,
                      'no_subsubmenu' => $no_subsubmenu,
                      'link' => $link,
                      'status_aktif' => 1
                    );

        $this->MainModel->insertSub($data_subsubmenu);

        $data_hsubsubmenu = array(
        			  'id_pegawai' => $id['id_pegawai'],
        			  'c' => 1,
        			  'r' => 1,
        			  'u' => 1,
        			  'd' => 1,
        			  'p' => 1,
                      'kode_subsubmenu' => $kode_subsubmenu,
                      'user_entry' => $id['id_pegawai'],
                      'tgl_entry' => $tgl
                    );

        $this->MainModel->insertHSubsubmenu($data_hsubsubmenu);

        $this->session->set_flashdata('sukses', ' Data Subsubmenu berhasil ditambahkan !!');

		redirect('Akses/atur_menu');
	}

	public function proses_edit_subsubmenu(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$kode_subsubmenu = $this->input->post('kode_subsubmenu');
		$kode_submenu = $this->input->post('kode_submenu');
	    $subsubmenu = ucwords($this->input->post('subsubmenu'));
	    $link = $this->input->post('link');
	    $status_aktif = $this->input->post('status_aktif');

        $data_subsubmenu = array(
                      'subsubmenu' => $subsubmenu,
                      'link' => $link,
                      'status_aktif' => (int)$status_aktif
                    );

        $this->MainModel->updateData2('subsubmenu',$data_subsubmenu,'kode_subsubmenu',$kode_subsubmenu,'kode_submenu',$kode_submenu);

        $this->session->set_flashdata('sukses', ' Data Subsubmenu berhasil diupdate !!');

		redirect('Akses/atur_menu');
	}

	public function proses_hapus_subsubmenu($kode_subsubmenu){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$this->MainModel->deleteData('h_subsubmenu','kode_subsubmenu',$kode_subsubmenu);
		$this->MainModel->deleteData('subsubmenu','kode_subsubmenu',$kode_subsubmenu);

        $this->session->set_flashdata('sukses', ' Data berhasil dihapus !!');

		redirect('Akses/atur_menu');
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

	public function menu2() {
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$mnu = $this->MainModel->menu2($id['id_pegawai']);

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

			$csm = $this->MainModel->cek_submenu2($id['id_pegawai'],$kode_menu[$dd]);

			if ($csm!=0) {
				$ff = 1;

				$dsm = $this->MainModel->submenu2($id['id_pegawai'],$kode_menu[$dd]);

				foreach ($dsm as $rowdsm) {
					$kode_submenu[$dd][$ff] = $rowdsm->kode_submenu;
					$submenu[$dd][$ff] = $rowdsm->submenu;
					$s_link[$dd][$ff] = $rowdsm->link;
					$s_icon[$dd][$ff] = $rowdsm->icon;
					$s_status[$dd][$ff] = $rowdsm->status_aktif;
					$jff[$dd][$ff] = $ff;

					$css = $this->MainModel->cek_subsubmenu2($id['id_pegawai'],$kode_submenu[$dd][$ff]);

					if ($css!=0) {
						$ii = 1;

						$dss = $this->MainModel->subsubmenu2($id['id_pegawai'],$kode_submenu[$dd][$ff]);

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