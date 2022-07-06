<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterKavlingCluster extends CI_Controller {
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
					'subtitle' => 'Master Kavling Cluster',
					'ttl' => 'Master Data',
					'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai']),
					'data_cluster' => $this->MainModel->dataCluster('no_urut','desc',30,0),
					'data_type' => $this->MainModel->allType(),
					'data_blok' => $this->MainModel->allBlok()
					);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$this->menu());
		$this->load->view('master_kavling_cluster');
		$this->load->view('templates/foot');
	}

	public function data_kavling_cluster($sbm){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$submenu = str_replace("_"," ", $sbm);

		$dt = $this->funcSubmenu($submenu,$id['id_pegawai']);

		$columns = array( 
	                            0 => 'kavling_cluster.no_urut', 
	                            1 => 'kavling_cluster.kode_kc',
	                            2 => 'cluster.alias',
	                            3 => 'kavling_cluster.type',
	                            4 => 'kavling_cluster.blok'
	                        );

		$dirs = array( 
	                            'asc' => 'desc',
	                            'desc' => 'asc'
	                        );

		$datacount = $this->MainModel->countKavlingCluster();	
  
        $totalData = $datacount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $dirs[$_POST['order']['0']['dir']];
            
        if(empty($_POST['search']['value'])) {            
        	$data_kavling_cluster = $this->MainModel->dataKavlingCluster($order,$dir,$limit,$start);
        } else {
            $search = $_POST['search']['value']; 
            $data_kavling_cluster = $this->MainModel->srcKavlingCluster($search,$order,$dir,$limit,$start);

			$datacount = $this->MainModel->jSrcKavlingCluster($search);
           	$totalFiltered = $datacount['jumlah'];
        }

        $data = array();

        $no = $start + 1;
        foreach ($data_kavling_cluster as $rowdkc) 
        {
        	if ($rowdkc->gambar==''||$rowdkc->gambar==NULL) {
		        $path_foto = base_url('img/default-foto.png');
		    } else {
		        $path_foto = base_url('file/kavling_cluster/gambar/'.$rowdkc->gambar);
		    }

        	if ($dt['d']!=0) {
        		$delete = '
        		<a href="#" class="btn bg-gradient-danger btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hapus'.$rowdkc->kode_kc.'"><i class="fas fa-trash"></i></a>

<div class="modal fade mt-4" id="modal-hapus'.$rowdkc->kode_kc.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Hapus Data Kavling Cluster</h6>
        <button cluster="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <p>Yakin ingin menghapus data ini ?<br></p>
      </div>
      <div class="modal-footer text-right">
        <button cluster="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <a href="'.site_url("MasterKavlingCluster/proses_hapus/".$rowdkc->kode_kc).'" class="btn bg-gradient-danger btn-xs"><i class="fas fa-check"></i>&ensp;Ya !</a>
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
				<a href="'.site_url("MasterKavlingCluster/sesi_edgf/".$rowdkc->kode_kc).'" class="btn bg-gradient-indigo btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="tooltip" data-placement="top" title="Ubah Foto"><i class="fas fa-edit"></i>&ensp;Ubah Foto</a>';
        	} else {
        		$update = '';
        	}

        	$nestedData['aksi'] = '<div class="text-center">'.$delete.'</div>';
            $nestedData['foto'] = '<div class="text-center"><a href="#" data-toggle="modal" data-target="#modal-foto'.$rowdkc->kode_kc.'"><img src="'.$path_foto.'" style="height: 50px; width: auto"></a></div>

<div class="modal fade mt-4" id="modal-foto'.$rowdkc->kode_kc.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Foto Kavling Cluster</h6>
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
            $nestedData['cluster'] = '<div class="text-center">'.$rowdkc->nama.' '.$rowdkc->urut_cluster.' '.$rowdkc->alias.'</div>';
            $nestedData['type'] = '<div class="text-center">'.$rowdkc->type.'</div>';
            $nestedData['blok'] = '<div class="text-center">'.$rowdkc->blok.'</div>';
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

	    $cek = $this->MainModel->cekKavlingCluster($kode_cluster, $kode_type, $kode_blok);

	    if ($cek!=0) {
	    	$this->session->set_flashdata('message', ' Data Kavling Cluster sudah ada !!');
	    } else {
	    	$qrjm = $this->MainModel->nuKavlingCluster();
		    $nukc = $qrjm['ukc']+1;

		    $jum_ukc = strlen($nukc);

		    if ($jum_ukc==1) {
	    		$no_urut = "00000".$nukc;
		    } elseif ($jum_ukc==2) {
		    	$no_urut = "0000".$nukc;
		    } elseif ($jum_ukc==3) {
		    	$no_urut = "000".$nukc;
		    } elseif ($jum_ukc==4) {
		    	$no_urut = "00".$nukc;
		    } elseif ($jum_ukc==5) {
		    	$no_urut = "0".$nukc;
		    } elseif ($jum_ukc==6) {
		    	$no_urut = $nukc;
		    }

		    $kode_kc = "KC010001".$no_urut;

		    $config['upload_path']      = './file/kavling_cluster/gambar/';
		    $config['allowed_types']    = 'gif|jpg|jpeg|png';
		    $config['file_name']        = $kode_kc;
		    $config['overwrite']        = true; // tindih file dengan file baru
		    $config['max_size']         = 6090; // batas ukuran file: 6MB

		    $this->load->library('upload', $config);

	      	if (!$this->upload->do_upload('foto')) {
	      		$data = array(
		        			  'kode_kc' => $kode_kc,
		        			  'kode_cluster' => $kode_cluster,
		        			  'type' => $kode_type,
		        			  'blok' => $kode_blok,
		        			  'status' => '1',
		        			  'user_entry' => $id['id_pegawai'],
	                		  'tgl_entry' => $tgl,
		        			  'no_urut' => $nukc
		                    );
	      	} else {
	      		$gambar = $this->upload->data();

	      		$data = array(
		        			  'kode_kc' => $kode_kc,
		        			  'kode_cluster' => $kode_cluster,
		        			  'type' => $kode_type,
		        			  'blok' => $kode_blok,
		        			  'gambar' => $gambar['file_name'],
	                		  'mime' => $gambar['file_type'],
		        			  'status' => '1',
		        			  'user_entry' => $id['id_pegawai'],
	                		  'tgl_entry' => $tgl,
		        			  'no_urut' => $nukc
		                    );
	      	}

	      	$this->MainModel->insertKavlingCluster($data);

	        $this->session->set_flashdata('sukses', ' Data Kavling Cluster berhasil ditambahkan !!');
	    }

		redirect('MasterKavlingCluster');
	}

	public function sesi_edgf($idkc=null){
		if (!isset($idkc)||$idkc==null) {
			redirect('Beranda');
		} else {
			$session = array(
								'sesbas' => md5($idkc)
							);

			$this->session->set_userdata($session);

			redirect('MasterKavlingCluster/edit_gambar_kc/'.$idkc);
		}
	}

	public function edit_gambar_kc($idkc=null){
		if (!isset($idkc)||$idkc==null) {
			redirect('Beranda');
		} else {
			$id['sesbas'] = $this->session->userdata('sesbas');

			if ($id['sesbas']!=md5($idkc)) {
				redirect('Beranda');
			} else {
				$id['id_pegawai'] = $this->session->userdata('id_pegawai');

				$dtkc = $this->MainModel->getKavlingCluster($idkc);

				$dtcl = $this->MainModel->getCluster($dtkc['kode_cluster']);

				$nama_cluster = $dtcl['nama'].' '.$dtcl['no_urut'].' '.$dtcl['alias'];

				$data_bc = array(
								'kode_kc' => $idkc,
								'nama_cluster' => $nama_cluster,
								'type' => $dtkc['type'],
								'blok' => $dtkc['blok'],
								'gambar' => $dtkc['gambar'],
								'mime' => $dtkc['mime']
							);

				$data = array(
							'title' => '&ensp;/&ensp;Master Kavling Cluster',
							'separator' => '&ensp;/&ensp;Master Data',
							'subtitle' => 'Ubah Foto Kavling Cluster',
							'alternate' => 'Master Kavling Cluster',
							'ttl' => 'Master Data',
							'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai'])
							);

				$this->load->view('templates/header',$data);
				$this->load->view('templates/sidebar',$this->menu());
				$this->load->view('edit_gambar_kc',$data_bc);
				$this->load->view('templates/foot');
			}
		}
	}

	public function proses_foto(){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$tgl = date('Y-m-d H:i:s');

		$kode_kc = $this->input->post('kode_kc');

		$config['upload_path']			= './file/kavling_cluster/gambar/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $kode_kc;
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

            $this->MainModel->updateData('kavling_cluster',$data,'kode_kc',$kode_kc);

            $this->session->set_flashdata('sukses', 'Selamat, foto berhasil di update');
        }

        redirect('MasterKavlingCluster');
	}

	public function proses_hapus($kode_kc){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$dtkc = $this->MainModel->getKavlingCluster($kode_kc);

		$foto = $dtkc['gambar'];

		if ($foto!=NULL||$foto!='') {
			unlink('./file/kavling_cluster/gambar/'.$foto);
		}

		$this->MainModel->deleteData('kavling_cluster','kode_kc',$kode_kc);

        $this->session->set_flashdata('sukses', ' Data berhasil dihapus !!');

		redirect('MasterKavlingCluster');
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