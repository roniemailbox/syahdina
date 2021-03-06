<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterType extends CI_Controller {
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
					'title' => '&ensp;/&ensp;Master Data',
					'separator' => '',
					'subtitle' => 'Master Type',
					'ttl' => 'Master Data',
					'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai'])
					);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$this->menu());
		$this->load->view('master_type');
		$this->load->view('templates/foot');
	}

	public function data_type($sbm){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$submenu = str_replace("_", " ", $sbm);

		$dt = $this->funcSubmenu($submenu,$id['id_pegawai']);

		$columns = array( 
	                            0 => 'kode_type', 
	                            1 => 'nama_type'
	                        );

		$dirs = array( 
	                            'asc' => 'desc',
	                            'desc' => 'asc'
	                        );

		$datacount = $this->MainModel->countType();	
  
        $totalData = $datacount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $dirs[$_POST['order']['0']['dir']];
            
        if(empty($_POST['search']['value'])) {            
        	$data_type = $this->MainModel->dataType($order,$dir,$limit,$start);
        } else {
            $search = $_POST['search']['value']; 
            $data_type = $this->MainModel->srcType($search,$order,$dir,$limit,$start);

			$datacount = $this->MainModel->jSrcType($search);
           	$totalFiltered = $datacount['jumlah'];
        }

        $data = array();

        $no = $start + 1;
        foreach ($data_type as $rowdtp) 
        {
        	if ($rowdtp->luas_bangunan==0) {
        		$luas_bangunan = '<i class="text-danger">Belum diisi</i>';
        	} else {
        		$luas_bangunan = $rowdtp->luas_bangunan.' meter';
        	}

        	if ($rowdtp->panjang==0) {
        		$panjang = '<i class="text-danger">Belum diisi</i>';
        	} else {
        		$panjang = $rowdtp->panjang.' meter';
        	}

        	if ($rowdtp->lebar==0) {
        		$lebar = '<i class="text-danger">Belum diisi</i>';
        	} else {
        		$lebar = $rowdtp->lebar.' meter';
        	}

        	if ($dt['d']!=0) {
        		$delete = '
				<a href="#" class="btn bg-gradient-danger btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hapus'.$rowdtp->kode_type.'"><i class="fas fa-trash"></i></a>

<div class="modal fade mt-4" id="modal-hapus'.$rowdtp->kode_type.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Hapus Data Type</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <p>Yakin ingin menghapus data type <b>'.$rowdtp->nama_type.'</b> ?<br></p>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <a href="'.site_url("MasterType/proses_hapus/".$rowdtp->kode_type).'" class="btn bg-gradient-danger btn-xs"><i class="fas fa-check"></i>&ensp;Ya !</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->';
        	} else {
        		$delete = '';
        	}

        	$detail = '<a href="#" class="btn bg-gradient-purple btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Detail" data-target="#modal-detail'.$rowdtp->kode_type.'"><i class="fas fa-list"></i></a>

<div class="modal fade" id="modal-detail'.$rowdtp->kode_type.'">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Detail Type</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-12">
      <!-- Bagian Rinci -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-list"></i>
              Data Rinci
            </h3>
          </div>
          <div class="card-body text-left">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label form-control-sm">Nama Type</label>
              <label class="col-sm-8 col-form-label form-control-sm" style="font-weight: normal">
              '.$rowdtp->nama_type.'
              </label>
            </div>
            <div class="form-group row" style="margin-top: -20px">
              <label class="col-sm-4 col-form-label form-control-sm">Luas Bangunan</label>
              <label class="col-sm-8 col-form-label form-control-sm" style="font-weight: normal">
              '.$luas_bangunan.'
              </label>
            </div>
            <div class="form-group row" style="margin-top: -20px">
              <label class="col-sm-4 col-form-label form-control-sm">Panjang</label>
              <label class="col-sm-8 col-form-label form-control-sm" style="font-weight: normal">
              '.$panjang.'
              </label>
            </div>
            <div class="form-group row" style="margin-top: -20px">
              <label class="col-sm-4 col-form-label form-control-sm">Lebar</label>
              <label class="col-sm-8 col-form-label form-control-sm" style="font-weight: normal">
              '.$lebar.'
              </label>
            </div>
          </div>
        </div>
      <!-- Akhir Bagian Rinci -->
      </div>
      </div>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Tutup</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->';

			if ($dt['u']!=0) {
        		$update = '
				<a href="'.site_url("MasterType/sesi_edtp/".$rowdtp->kode_type).'" class="btn bg-gradient-primary btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>';
        	} else {
        		$update = '';
        	}

        	$nestedData['aksi'] = '<div class="text-center">'.$detail.$update.$delete.'</div>';
            $nestedData['type'] = '<div class="text-left">'.$rowdtp->nama_type.'</div>';
            $data[] = $nestedData;
            $no++;
        }
          
        $json_data = array(
                    "draw"            => intval($_POST['draw']),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data);
	}

	public function funcSubmenu($submenu, $id_pegawai){
		$cek = $this->MainModel->CHSA($submenu, $id_pegawai);

		if ($cek!=0) {
			$data_sbm = $this->MainModel->HSA($submenu, $id_pegawai);
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

	public function proses_tambah(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

	    $type = ucwords($this->input->post('type'));
	    $luas_bangunan = $this->input->post('luas_bangunan');
	    $panjang = $this->input->post('panjang');
	    $lebar = $this->input->post('lebar');

	    $cek = $this->MainModel->cekType($type);
	    
	    if ($cek!=0) {
	    	$this->session->set_flashdata('message', ' Type sudah ada !!');

			redirect('MasterType');
	    } else {
	    	$qrtyp = $this->MainModel->nuType();
	    	$kode_type = $qrtyp['utp']+1;

	    	$data = array(
	        			  'kode_type' => $kode_type,
	        			  'nama_type' => $type,
	        			  'luas_bangunan' => $luas_bangunan,
	        			  'panjang' => $panjang,
	        			  'lebar' => $lebar
	                    );

	        $this->MainModel->insertType($data);

	        $this->session->set_flashdata('sukses', ' Data Type berhasil ditambahkan !!');

			redirect('MasterType');
	    }
	}

	public function sesi_edtp($idtp=null){
		if (!isset($idtp)||$idtp==null) {
			redirect('Beranda');
		} else {
			$session = array(
								'sesbas' => md5($idtp)
							);

			$this->session->set_userdata($session);

			redirect('MasterType/edit_type/'.$idtp);
		}
	}

	public function edit_type($idtp=null){
		if (!isset($idtp)||$idtp==null) {
			redirect('Beranda');
		} else {
			$id['sesbas'] = $this->session->userdata('sesbas');

			if ($id['sesbas']!=md5($idtp)) {
				redirect('Beranda');
			} else {
				$id['id_pegawai'] = $this->session->userdata('id_pegawai');

				$dttp = $this->MainModel->getType($idtp);

				$data_tp = array(
								'kode_type' => $idtp,
								'type' => $dttp['nama_type'],
								'luas_bangunan' => $dttp['luas_bangunan'],
								'panjang' => $dttp['panjang'],
								'lebar' => $dttp['lebar']
							);

				$data = array(
							'title' => '&ensp;/&ensp;Master Type',
							'separator' => '&ensp;/&ensp;Master Data',
							'subtitle' => 'Edit Type',
							'alternate' => 'Master Type',
							'ttl' => 'Master Data',
							'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai'])
							);

				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$this->menu());
				$this->load->view('edit_type',$data_tp);
				$this->load->view('templates/foot');
			}
		}
	}

	public function proses_edit(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$kode_type = $this->input->post('kode_type');
	    $luas_bangunan = $this->input->post('luas_bangunan');
	    $panjang = $this->input->post('panjang');
	    $lebar = $this->input->post('lebar');

    	$data = array(
        			  'luas_bangunan' => $luas_bangunan,
        			  'panjang' => $panjang,
            		  'lebar' => $lebar
                    );

        $this->MainModel->updateData('type',$data,'kode_type',$kode_type);

        $this->session->set_flashdata('sukses', ' Data Type berhasil diupdate !!');

		redirect('MasterType');
	}

	public function proses_hapus($kode_type){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$this->MainModel->deleteData('type','kode_type',$kode_type);

        $this->session->set_flashdata('sukses', ' Data berhasil dihapus !!');

		redirect('MasterType');
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