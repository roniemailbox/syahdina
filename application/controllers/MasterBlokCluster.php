<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterBlokCluster extends CI_Controller {
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
					'subtitle' => 'Master Blok Cluster',
					'ttl' => 'Master Data',
					'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai']),
					'data_cluster' => $this->MainModel->dataCluster('no_urut','desc',30,0),
					'data_type' => $this->MainModel->allType(),
					'data_blok' => $this->MainModel->allBlok()
					);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$this->menu());
		$this->load->view('master_blok_cluster');
		$this->load->view('templates/foot');
	}

	public function data_blok_cluster($sbm){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$submenu = str_replace("_"," ", $sbm);

		$dt = $this->funcSubmenu($submenu,$id['id_pegawai']);

		$columns = array( 
	                            0 => 'blok_cluster.no_urut', 
	                            1 => 'blok_cluster.kode_bc',
	                            2 => 'cluster.alias',
	                            3 => 'blok_cluster.type',
	                            4 => 'blok_cluster.blok'
	                        );

		$dirs = array( 
	                            'asc' => 'desc',
	                            'desc' => 'asc'
	                        );

		$datacount = $this->MainModel->countBlokCluster();	
  
        $totalData = $datacount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $dirs[$_POST['order']['0']['dir']];
            
        if(empty($_POST['search']['value'])) {            
        	$data_blok_cluster = $this->MainModel->dataBlokCluster($order,$dir,$limit,$start);
        } else {
            $search = $_POST['search']['value']; 
            $data_blok_cluster = $this->MainModel->srcBlokCluster($search,$order,$dir,$limit,$start);

			$datacount = $this->MainModel->jSrcBlokCluster($search);
           	$totalFiltered = $datacount['jumlah'];
        }

        $data = array();

        $no = $start + 1;
        foreach ($data_blok_cluster as $rowdbc) 
        {
        	if ($rowdbc->gambar==''||$rowdbc->gambar==NULL) {
		        $path_foto = base_url('img/default-foto.png');
		    } else {
		        $path_foto = base_url('file/blok_cluster/gambar/'.$rowdbc->gambar);
		    }

        	if ($dt['d']!=0) {
        		$delete = '
				<a href="#" class="btn bg-gradient-danger btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hapus'.$rowdbc->kode_bc.'"><i class="fas fa-trash"></i></a>

<div class="modal fade mt-4" id="modal-hapus'.$rowdbc->kode_bc.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Hapus Data Blok Cluster</h6>
        <button cluster="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <p>Yakin ingin menghapus data ini ?<br></p>
      </div>
      <div class="modal-footer text-right">
        <button cluster="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <a href="'.site_url("MasterBlokCluster/proses_hapus/".$rowdbc->kode_bc).'" class="btn bg-gradient-danger btn-xs"><i class="fas fa-check"></i>&ensp;Ya !</a>
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
				<a href="'.site_url("MasterBlokCluster/sesi_edgf/".$rowdbc->kode_bc).'" class="btn bg-gradient-indigo btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="tooltip" data-placement="top" title="Ubah Foto"><i class="fas fa-edit"></i>&ensp;Ubah Foto</a>';
        	} else {
        		$update = '';
        	}

        	$nestedData['aksi'] = '<div class="text-center">'.$delete.'</div>';
            $nestedData['foto'] = '<div class="text-center"><a href="#" data-toggle="modal" data-target="#modal-foto'.$rowdbc->kode_bc.'"><img src="'.$path_foto.'" style="height: 50px; width: auto"></a></div>

<div class="modal fade mt-4" id="modal-foto'.$rowdbc->kode_bc.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Foto Blok Cluster</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group row text-center">
            <img src="'.$path_foto.'" class="col-sm-12" style="width: 100px; height: auto">
          </div>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Tutup</button>
        '.$update.'
        </form>
      </div>
    </div>
  </div>
</div>';
            $nestedData['cluster'] = '<div class="text-center">'.$rowdbc->nama.' '.$rowdbc->urut_cluster.' '.$rowdbc->alias.'</div>';
            $nestedData['type'] = '<div class="text-center">'.$rowdbc->type.'</div>';
            $nestedData['blok'] = '<div class="text-center">'.$rowdbc->blok.'</div>';
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

	    $kode_cluster = $this->input->post('kode_cluster');
	    $kode_type = $this->input->post('kode_type');
	    $kode_blok = $this->input->post('kode_blok');

	    $cek = $this->MainModel->cekBlokCluster($kode_cluster, $kode_type, $kode_blok);

	    if ($cek!=0) {
	    	$this->session->set_flashdata('message', ' Data Blok Cluster sudah ada !!');
	    } else {
	    	$qrjm = $this->MainModel->nuBlokCluster();
		    $nubc = $qrjm['ubc']+1;

		    $jum_ubc = strlen($nubc);

		    if ($jum_ubc==1) {
	    		$no_urut = "00000".$nubc;
		    } elseif ($jum_ubc==2) {
		    	$no_urut = "0000".$nubc;
		    } elseif ($jum_ubc==3) {
		    	$no_urut = "000".$nubc;
		    } elseif ($jum_ubc==4) {
		    	$no_urut = "00".$nubc;
		    } elseif ($jum_ubc==5) {
		    	$no_urut = "0".$nubc;
		    } elseif ($jum_ubc==6) {
		    	$no_urut = $nubc;
		    }

		    $kode_bc = "BC010001".$no_urut;

		    $config['upload_path']      = './file/blok_cluster/gambar/';
		    $config['allowed_types']    = 'gif|jpg|jpeg|png';
		    $config['file_name']        = $kode_bc;
		    $config['overwrite']        = true; // tindih file dengan file baru
		    $config['max_size']         = 6090; // batas ukuran file: 6MB

		    $this->load->library('upload', $config);

	      	if (!$this->upload->do_upload('foto')) {
	      		$data = array(
		        			  'kode_bc' => $kode_bc,
		        			  'kode_cluster' => $kode_cluster,
		        			  'type' => $kode_type,
		        			  'blok' => $kode_blok,
		        			  'status' => '1',
		        			  'user_entry' => $id['id_pegawai'],
	                		  'tgl_entry' => $tgl,
		        			  'no_urut' => $nubc
		                    );
	      	} else {
	      		$gambar = $this->upload->data();

	      		$data = array(
		        			  'kode_bc' => $kode_bc,
		        			  'kode_cluster' => $kode_cluster,
		        			  'type' => $kode_type,
		        			  'blok' => $kode_blok,
		        			  'gambar' => $gambar['file_name'],
	                		  'mime' => $gambar['file_type'],
		        			  'status' => '1',
		        			  'user_entry' => $id['id_pegawai'],
	                		  'tgl_entry' => $tgl,
		        			  'no_urut' => $nubc
		                    );
	      	}

	      	$this->MainModel->insertBlokCluster($data);

	        $this->session->set_flashdata('sukses', ' Data Blok Cluster berhasil ditambahkan !!');
	    }

		redirect('MasterBlokCluster');
	}

	public function sesi_edgf($idbc=null){
		if (!isset($idbc)||$idbc==null) {
			redirect('Beranda');
		} else {
			$session = array(
								'sesbas' => md5($idbc)
							);

			$this->session->set_userdata($session);

			redirect('MasterBlokCluster/edit_gambar_bc/'.$idbc);
		}
	}

	public function edit_gambar_bc($idbc=null){
		if (!isset($idbc)||$idbc==null) {
			redirect('Beranda');
		} else {
			$id['sesbas'] = $this->session->userdata('sesbas');

			if ($id['sesbas']!=md5($idbc)) {
				redirect('Beranda');
			} else {
				$id['id_pegawai'] = $this->session->userdata('id_pegawai');

				$dtbc = $this->MainModel->getBlokCluster($idbc);

				$dtcl = $this->MainModel->getCluster($dtbc['kode_cluster']);

				$nama_cluster = $dtcl['nama'].' '.$dtcl['no_urut'].' '.$dtcl['alias'];

				$data_bc = array(
								'kode_bc' => $idbc,
								'nama_cluster' => $nama_cluster,
								'type' => $dtbc['type'],
								'blok' => $dtbc['blok'],
								'gambar' => $dtbc['gambar'],
								'mime' => $dtbc['mime']
							);

				$data = array(
							'title' => '&ensp;/&ensp;Master Blok Cluster',
							'separator' => '&ensp;/&ensp;Master Data',
							'subtitle' => 'Ubah Foto Blok Cluster',
							'alternate' => 'Master Blok Cluster',
							'ttl' => 'Master Data',
							'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai'])
							);

				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$this->menu());
				$this->load->view('edit_gambar_bc',$data_bc);
				$this->load->view('templates/foot');
			}
		}
	}

	public function proses_foto(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');

		$kode_bc = $this->input->post('kode_bc');

		$config['upload_path']			= './file/blok_cluster/gambar/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $kode_bc;
        $config['overwrite']            = true; // tindih file dengan file baru
        $config['max_size']             = 6090; // batas ukuran file: 6MB
        //$config['max_width']            = 1080; // batas lebar gambar dalam piksel
        //$config['max_height']           = 1080; // batas tinggi gambar dalam piksel
 
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('gambar')) 
        {
            $this->session->set_flashdata('message', $this->upload->display_errors());
        } 
        else 
        {
            $gambar = $this->upload->data();

            $data = array(
            				'gambar' => $gambar['file_name'],
            				'mime' => $gambar['file_type'],
            				'user_edit' => $id['id_pegawai'],
            				'tgl_edit' => $tgl
            			);

            $this->MainModel->updateData('blok_cluster',$data,'kode_bc',$kode_bc);

            $this->session->set_flashdata('sukses', 'Selamat, foto berhasil di update');
        }

        redirect('MasterBlokCluster');
	}

	public function proses_hapus($kode_bc){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$dtbc = $this->MainModel->getBlokCluster($kode_bc);

		$foto = $dtbc['gambar'];

		if ($foto!=NULL||$foto!='') {
			unlink('./file/blok_cluster/gambar/'.$foto);
		}

		$this->MainModel->deleteData('blok_cluster','kode_bc',$kode_bc);

        $this->session->set_flashdata('sukses', ' Data berhasil dihapus !!');

		redirect('MasterBlokCluster');
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