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

	public function data_icon($sbm){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$submenu = str_replace("_", " ", $sbm);

		$dt = $this->funcSubmenu($submenu,$id['id_pegawai']);

		$columns = array( 
	                            0 => 'nama_icon', 
	                            1 => 'nama_icon',
	                            2 => 'nama_icon'
	                        );

		$datacount = $this->MainModel->countIcon();	
  
        $totalData = $datacount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
            
        if(empty($_POST['search']['value'])) {            
        	$data_icon = $this->MainModel->dataIcon($order,$dir,$limit,$start);
        } else {
            $search = $_POST['search']['value']; 
            $data_icon = $this->MainModel->srcIcon($search,$order,$dir,$limit,$start);

			$datacount = $this->MainModel->jSrcIcon($search);
           	$totalFiltered = $datacount['jumlah'];
        }

        $data = array();

        $no = $start + 1;
        foreach ($data_icon as $rowdic) 
        {
        	if ($dt['d']!=0) {
        		$delete = '
        	<div class="text-center">
				<a href="#" class="btn bg-gradient-danger btn-xs" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hapus'.$rowdic->font.'"><i class="fas fa-trash"></i></a>
        	</div>

<div class="modal fade mt-4" id="modal-hapus'.$rowdic->font.'">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Hapus Data Icon</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus data icon <b>'.ucfirst(substr($rowdic->nama_icon, 7)).'</b> ?<br></p>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <a href="'.site_url("MasterIcon/proses_hapus/".$rowdic->font).'" class="btn bg-gradient-danger btn-xs"><i class="fas fa-check"></i>&ensp;Ya !</a>
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

        	$nestedData['aksi'] = $delete;
        	$nestedData['picture'] = '<div class="text-center"><i class="'.$rowdic->nama_icon.'" style="font-size: 15px"></i></div>';
            $nestedData['nama'] = '<div class="text-left">'.ucfirst(substr($rowdic->nama_icon, 7)).'</div>';
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

	    $ni = strtolower($this->input->post('nama_icon'));
	    $font = strtolower($this->input->post('font'));

	    $nama_icon = 'fas fa-'.$ni;

	    $cek = $this->MainModel->cekIcon($nama_icon);
	    
	    if ($cek!=0) {
	    	$this->session->set_flashdata('message', ' Icon sudah ada !!');

			redirect('MasterIcon');
	    } else {
	    	$data = array(
	        			  'nama_icon' => $nama_icon,
	        			  'font' => $font
	                    );

	        $this->MainModel->insertIcon($data);

	        $this->session->set_flashdata('sukses', ' Data Icon berhasil ditambahkan !!');

			redirect('MasterIcon');
	    }
	}

	public function proses_hapus($font){
		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$this->MainModel->deleteData('icon','font',$font);

        $this->session->set_flashdata('sukses', ' Data berhasil dihapus !!');

		redirect('MasterIcon');
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