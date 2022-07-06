<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterPegawai extends CI_Controller {
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
					'subtitle' => 'Master Pegawai',
					'ttl' => 'Master Data',
					'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai']),
					'data_jabatan' => $this->MainModel->jabatan()
					);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$this->menu());
		$this->load->view('master_pegawai');
		$this->load->view('templates/foot');
	}

	public function data_pegawai($sbm){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$submenu = str_replace("_", " ", $sbm);

		$dt = $this->funcSubmenu($submenu,$id['id_pegawai']);

		$columns = array( 
	                            0 => 'pegawai.no_urut', 
	                            1 => 'pegawai.foto',
	                            2 => 'nama_pegawai',
	                            3 => 'pegawai.jk',
	                            4 => 'jabatan.nama_jabatan',
	                            5 => 'pegawai.status'
	                        );

		$dirs = array( 
	                            'asc' => 'desc',
	                            'desc' => 'asc'
	                        );

		$datacount = $this->MainModel->countPegawai();	
  
        $totalData = $datacount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $dirs[$_POST['order']['0']['dir']];
            
        if(empty($_POST['search']['value'])) {            
        	$data_pegawai = $this->MainModel->dataPegawai($order,$dir,$limit,$start);
        } else {
            $search = $_POST['search']['value']; 
            $data_pegawai = $this->MainModel->srcPegawai($search,$order,$dir,$limit,$start);

			$datacount = $this->MainModel->jSrcPegawai($search);
           	$totalFiltered = $datacount['jumlah'];
        }

        $data = array();

        $no = $start + 1;
        foreach ($data_pegawai as $rowdpg) 
        {
        	if ($rowdpg->jk=='L') {
        		$jk = '<font class="text-success">Laki - laki</font>';
        	} else {
        		$jk = '<font class="text-danger">Perempuan</font>';
        	}

        	if ($rowdpg->foto==''||$rowdpg->foto==NULL) {
            	$letter = strtolower(substr($rowdpg->nama_pegawai, 0, 1));
		        $path_foto = base_url('img/'.$letter.'.png');
		    } else {
		        $path_foto = base_url('file/pegawai/foto_profil/'.$rowdpg->foto);
		    }

		    $detail = '<a href="#" class="btn bg-gradient-purple btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Detail" data-target="#modal-detail'.$rowdpg->id_pegawai.'"><i class="fas fa-list"></i></a>

<div class="modal fade" id="modal-detail'.$rowdpg->id_pegawai.'">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Detail Pegawai</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-4">
      <!-- Bagian Foto -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-image"></i>
              Foto Pegawai
            </h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <img src="'.$path_foto.'" alt="User Image" style="width: 100%; border-radius: 10px">
            </div>
          </div>
        </div>
      <!-- Akhir Bagian Foto -->
      </div>
      <div class="col-md-8">
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
              <label class="col-sm-4 col-form-label form-control-sm">ID</label>
              <label class="col-sm-8 col-form-label form-control-sm text-teal">
              '.$rowdpg->id_pegawai.'
              </label>
            </div>
            <div class="form-group row" style="margin-top: -20px">
              <label class="col-sm-4 col-form-label form-control-sm">Nama Lengkap</label>
              <label class="col-sm-8 col-form-label form-control-sm" style="font-weight: normal">
              '.$rowdpg->nama_pegawai.'
              </label>
            </div>
            <div class="form-group row" style="margin-top: -20px">
              <label class="col-sm-4 col-form-label form-control-sm">Alamat</label>
              <label class="col-sm-8 col-form-label form-control-sm" style="font-weight: normal">
              '.$rowdpg->alamat.'
              </label>
            </div>
            <div class="form-group row" style="margin-top: -20px">
              <label class="col-sm-4 col-form-label form-control-sm">Jenis Kelamin</label>
              <label class="col-sm-8 col-form-label form-control-sm" style="font-weight: normal">
              '.$jk.'
              </label>
            </div>
            <div class="form-group row" style="margin-top: -20px">
              <label class="col-sm-4 col-form-label form-control-sm">Jabatan</label>
              <label class="col-sm-8 col-form-label form-control-sm" style="font-weight: normal">
              '.$rowdpg->nama_jabatan.'
              </label>
            </div>
            <div class="form-group row" style="margin-top: -20px">
              <label class="col-sm-4 col-form-label form-control-sm">Status</label>
              <label class="col-sm-8 col-form-label form-control-sm" style="font-weight: normal">
              '.$rowdpg->status.'
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

        	if ($dt['d']!=0) {
        		$delete = '
				<a href="#" class="btn bg-gradient-danger btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hapus'.$rowdpg->id_pegawai.'"><i class="fas fa-trash"></i></a>

<div class="modal fade mt-4" id="modal-hapus'.$rowdpg->id_pegawai.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Hapus Data Pegawai</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-left">Yakin ingin menghapus data pegawai <b>'.$rowdpg->nama_pegawai.'</b> ?<br></p>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <a href="'.site_url("MasterPegawai/proses_hapus/".$rowdpg->id_pegawai).'" class="btn bg-gradient-danger btn-xs"><i class="fas fa-check"></i>&ensp;Ya !</a>
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

        	if ($dt['u']!=0) {
        		$update = '
				<a href="'.site_url("MasterPegawai/sesi_edpg/".$rowdpg->id_pegawai).'" class="btn bg-gradient-primary btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
				<a href="'.site_url("MasterPegawai/sesi_edpp/".$rowdpg->id_pegawai).'" class="btn bg-gradient-fuchsia btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="tooltip" data-placement="top" title="Ganti Password"><i class="fas fa-key"></i></a>';
        	} else {
        		$update = '';
        	}

        	$nestedData['aksi'] = '<div class="text-center">'.$detail.$update.$delete.'</div>';
        	$nestedData['foto'] = '<div class="text-center"><img src="'.$path_foto.'" style="height: 30px; width: auto"></div>';
        	$nestedData['nama'] = '<div class="text-center">'.$rowdpg->nama_pegawai.'</div>';
            $nestedData['jk'] = '<div class="text-center">'.$jk.'</div>';
            $nestedData['jabatan'] = '<div class="text-center">'.$rowdpg->nama_jabatan.'</div>';
            $nestedData['status'] = '<div class="text-center">'.$rowdpg->status.'</div>';
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

		$tgl = date('Y-m-d H:i:s');

	    $nama = ucwords($this->input->post('nama'));
	    $alamat = ucwords($this->input->post('alamat'));
	    $jk = $this->input->post('rbJK');
	    $id_jabatan = $this->input->post('id_jabatan');
	    $status = $this->input->post('status');
	    $username = strtolower($this->input->post('username'));
	    $pass = $this->input->post('psw');

	    $cek = $this->MainModel->getUsernamePegawai($username);

	    if ($cek!=0) {
	    	$this->session->set_flashdata('message', ' Input Data Pegawai gagal !! \n Username sudah ada !!');
	    } else {
	    	$data_nu = $this->MainModel->nuPegawai();
		    $upg = $data_nu['upg']+1;
		    $jum_upg = strlen($upg);

		    if ($jum_upg==1) {
	    		$no_urut = "00000".$upg;
		    } elseif ($jum_upg==2) {
		    	$no_urut = "0000".$upg;
		    } elseif ($jum_upg==3) {
		    	$no_urut = "000".$upg;
		    } elseif ($jum_upg==4) {
		    	$no_urut = "00".$upg;
		    } elseif ($jum_upg==5) {
		    	$no_urut = "0".$upg;
		    } elseif ($jum_upg==6) {
		    	$no_urut = $upg;
		    }

		    $id_pegawai = "PG".$no_urut;

		    $config['upload_path']      = './file/pegawai/foto_profil/';
		    $config['allowed_types']    = 'gif|jpg|jpeg|png';
		    $config['file_name']        = $id_pegawai;
		    $config['overwrite']        = true; // tindih file dengan file baru
		    $config['max_size']         = 6090; // batas ukuran file: 6MB

		    $this->load->library('upload', $config);

	      	if (!$this->upload->do_upload('foto')) {
	      		$data = array(
		        			  'id_pegawai' => $id_pegawai,
		        			  'nama' => $nama,
		        			  'alamat' => $alamat,
		        			  'jk' => $jk,
		        			  'id_jabatan' => $id_jabatan,
		        			  'status' => $status,
		        			  'username' => $username,
		        			  'password' => md5($pass),
		        			  'user_entry' => $id['id_pegawai'],
	                		  'tgl_entry' => $tgl,
		        			  'no_urut' => $upg
		                    );
	      	} else {
	      		$gambar = $this->upload->data();

	      		$data = array(
		        			  'id_pegawai' => $id_pegawai,
		        			  'nama' => $nama,
		        			  'alamat' => $alamat,
		        			  'jk' => $jk,
		        			  'id_jabatan' => $id_jabatan,
		        			  'foto' => $gambar['file_name'],
                    		  'mime' => $gambar['file_type'],
		        			  'status' => $status,
		        			  'username' => $username,
		        			  'password' => md5($pass),
		        			  'user_entry' => $id['id_pegawai'],
	                		  'tgl_entry' => $tgl,
		        			  'no_urut' => $upg
		                    );
	      	}

	      	$this->MainModel->insertPegawai($data);

	      	$menu = $this->MainModel->all_ha_menu();

	      	foreach ($menu as $rowdmn) {
	      		$cek_submenu = $this->MainModel->cekMnSbm($rowdmn->kode_menu);

	      		if ($cek_submenu!=0) {
	      			$submenu = $this->MainModel->getMnSbm($rowdmn->kode_menu);

	      			foreach ($submenu as $rowdsb) {
	      				$cek_subsubmenu = $this->MainModel->cekMnSbb($rowdsb->kode_submenu);

	      				if ($cek_subsubmenu!=0) {
	      					$subsubmenu = $this->MainModel->getMnSbb($rowdsb->kode_submenu);

	      					foreach ($subsubmenu as $rowdss) {
	      						$data_subsubmenu = array(
					      							'id_pegawai' => $id_pegawai,
					      							'c' => 1,
					      							'r' => 1,
					      							'u' => 1,
					      							'd' => 1,
					      							'p' => 1,
					      							'kode_subsubmenu' => $rowdss->kode_subsubmenu,
					      							'user_entry' => $id['id_pegawai'],
					                		  		'tgl_entry' => $tgl
					      						);

					      		$this->MainModel->insertHSubsubmenu($data_subsubmenu);
	      					}
	      				}

	      				$data_submenu = array(
			      							'id_pegawai' => $id_pegawai,
			      							'c' => 1,
			      							'r' => 1,
			      							'u' => 1,
			      							'd' => 1,
			      							'p' => 1,
			      							'kode_submenu' => $rowdsb->kode_submenu,
			      							'user_entry' => $id['id_pegawai'],
			                		  		'tgl_entry' => $tgl
			      						);

			      		$this->MainModel->insertHSubmenu($data_submenu);
	      			}
	      		}

	      		$data_menu = array(
	      							'id_pegawai' => $id_pegawai,
	      							'c' => 1,
	      							'r' => 1,
	      							'u' => 1,
	      							'd' => 1,
	      							'p' => 1,
	      							'kode_menu' => $rowdmn->kode_menu,
	      							'user_entry' => $id['id_pegawai'],
	                		  		'tgl_entry' => $tgl
	      						);

	      		$this->MainModel->insertHMenu($data_menu);
	      	}

			$this->session->set_flashdata('sukses', ' Data Pegawai berhasil ditambahkan !!');
	    }

		redirect('MasterPegawai');
	}

	public function sesi_edpg($idpg=null){
		if (!isset($idpg)||$idpg==null) {
			redirect('Beranda');
		} else {
			$session = array(
								'sesbas' => md5($idpg)
							);

			$this->session->set_userdata($session);

			redirect('MasterPegawai/edit_pegawai/'.$idpg);
		}
	}

	public function edit_pegawai($idpg=null){
		if (!isset($idpg)||$idpg==null) {
			redirect('Beranda');
		} else {
			$id['sesbas'] = $this->session->userdata('sesbas');

			if ($id['sesbas']!=md5($idpg)) {
				redirect('Beranda');
			} else {
				$id['id_pegawai'] = $this->session->userdata('id_pegawai');

				$dtpg = $this->MainModel->getPegawai($idpg);

				$data_pg = array(
								'id_pegawai' => $idpg,
								'nama' => $dtpg['nama'],
								'alamat' => $dtpg['alamat'],
								'jk' => $dtpg['jk'],
								'id_jabatan' => $dtpg['id_jabatan'],
								'status' => $dtpg['status'],
								'data_jabatan' => $this->MainModel->jabatan()
							);

				$data = array(
							'title' => '&ensp;/&ensp;Master Pegawai',
							'separator' => '&ensp;/&ensp;Master Data',
							'subtitle' => 'Edit Pegawai',
							'alternate' => 'Master Pegawai',
							'ttl' => 'Master Data',
							'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai'])
							);

				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$this->menu());
				$this->load->view('edit_pegawai',$data_pg);
				$this->load->view('templates/foot');
			}
		}
	}

	public function proses_edit(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');

		$id_pegawai = $this->input->post('id_pegawai');
	    $nama = ucwords($this->input->post('nama'));
	    $alamat = ucwords($this->input->post('alamat'));
	    $jk = $this->input->post('rbJK');
	    $id_jabatan = $this->input->post('id_jabatan');
	    $status = $this->input->post('status');

    	$data = array(
    				  'nama' => $nama,
        			  'alamat' => $alamat,
        			  'jk' => $jk,
        			  'id_jabatan' => $id_jabatan,
        			  'status' => $status,
        			  'user_edit' => $id['id_pegawai'],
            		  'tgl_edit' => $tgl
                    );

        $this->MainModel->updateData('pegawai',$data,'id_pegawai',$id_pegawai);

        $this->session->set_flashdata('sukses', ' Data Pegawai berhasil diupdate !!');

		redirect('MasterPegawai');
	}

	public function sesi_edpp($idpg=null){
		if (!isset($idpg)||$idpg==null) {
			redirect('Beranda');
		} else {
			$session = array(
								'sesbas' => md5($idpg)
							);

			$this->session->set_userdata($session);

			redirect('MasterPegawai/edit_akun/'.$idpg);
		}
	}

	public function edit_akun($idpg=null){
		if (!isset($idpg)||$idpg==null) {
			redirect('Beranda');
		} else {
			$id['sesbas'] = $this->session->userdata('sesbas');

			if ($id['sesbas']!=md5($idpg)) {
				redirect('Beranda');
			} else {
				$id['id_pegawai'] = $this->session->userdata('id_pegawai');

				$dtpg = $this->MainModel->getPegawai($idpg);

				$data_pg = array(
								'id_pegawai' => $idpg,
								'username' => $dtpg['username']
							);

				$data = array(
							'title' => '&ensp;/&ensp;Master Pegawai',
							'separator' => '&ensp;/&ensp;Master Data',
							'subtitle' => 'Ganti Password',
							'alternate' => 'Master Pegawai',
							'ttl' => 'Master Data',
							'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai'])
							);

				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$this->menu());
				$this->load->view('edit_akun',$data_pg);
				$this->load->view('templates/foot');
			}
		}
	}

	public function proses_edit_akun(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');

		$id_pegawai = $this->input->post('id_pegawai');
	    $pass = $this->input->post('password_baru');

    	$data = array(
    				  'password' => md5($pass),
        			  'user_edit' => $id['id_pegawai'],
            		  'tgl_edit' => $tgl
                    );

        $this->MainModel->updateData('pegawai',$data,'id_pegawai',$id_pegawai);

        $this->session->set_flashdata('sukses', ' Akun berhasil diupdate !!');

		redirect('MasterPegawai');
	}

	public function proses_hapus($id_pegawai){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$dtpg = $this->MainModel->getPegawai($id_pegawai);

		$foto = $dtpg['foto'];

		if ($foto!=NULL||$foto!='') {
			unlink('./file/pegawai/foto_profil/'.$foto);
		}

		$this->MainModel->deleteData('h_subsubmenu','id_pegawai',$id_pegawai);
		$this->MainModel->deleteData('h_submenu','id_pegawai',$id_pegawai);
		$this->MainModel->deleteData('h_menu','id_pegawai',$id_pegawai);
		$this->MainModel->deleteData('pegawai','id_pegawai',$id_pegawai);

        $this->session->set_flashdata('sukses', ' Data berhasil dihapus !!');

		redirect('MasterPegawai');
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