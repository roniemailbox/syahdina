<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
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

	public function index(){
		$this->cek_sesi();

		$id['id_pegawai'] = $this->session->userdata('id_pegawai');

		$data = array(
						'title' => '',
						'separator' => '',
  						'subtitle' => 'Beranda',
  						'ttl' => 'Beranda',
						'data_pegawai' => $this->MainModel->getPegawai($id['id_pegawai']),
						'menu' => $this->MainModel->menu($id['id_pegawai']),
						'submenu' => $this->MainModel->submenu($id['id_pegawai']),
						'subsubmenu' => $this->MainModel->subsubmenu($id['id_pegawai'])
					 );

		/*echo $id['id_pegawai'];*/

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('beranda');
		$this->load->view('templates/foot');
	}

	public function menu(){
		$menu = $this->MainModel->menu($id['id_pegawai']);

		foreach ($menu as $rowmnu) {
		
          if($rowmnu->menu != "") {
?>
          <li class="nav-item">
            <a href="<?php echo site_url($rowmnu->link); ?>" class="nav-link <?php if($ttl==$rowmnu->menu) { echo 'active'; } else { echo 'text-light'; } ?>">
              <i class="nav-icon fas <?php echo $rowmnu->icon; ?>"></i>
              <p>
                <?php echo $rowmnu->menu; ?>
              </p>
            </a>
<?php
          }
w?>
          </li>
<?php
		}
	}

	public function logout(){
		$this->session->sess_destroy(); // Hapus semua session
		redirect('Login'); // Redirect ke halaman login
	}
}