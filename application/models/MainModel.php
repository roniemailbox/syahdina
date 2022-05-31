<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainModel extends CI_Model {
/*UMUM*/
	public function updateData($table,$data,$field_name,$field_key) {
        $this->db->where($field_name, $field_key);
		$this->db->update($table, $data);
    }

    public function updateData2($table,$data,$field_name,$field_key,$field_name2,$field_key2)  {
        $this->db->where($field_name, $field_key);
        $this->db->where($field_name2, $field_key2);
		$this->db->update($table, $data);
    }

    public function deleteData($table,$field_name,$field_key) {
        $this->db->where($field_name, $field_key);
		$this->db->delete($table);
    }

    public function deleteData2($table,$field_name,$field_key,$field_name2,$field_key2) {
        $this->db->where($field_name, $field_key);
        $this->db->where($field_name2, $field_key2);
		$this->db->delete($table);
    }

    public function updateFoto($tabel,$fid,$id,$field,$datagambar,$mime){
        $sql = 'UPDATE `'.$tabel.'` SET '.$field.'="'.$datagambar.'", mime="'.$mime.'" WHERE '.$fid.'="'.$id.'"';
        $query = $this->db->query($sql);
        return $query;
    }

    public function insertGambarSoal($kode_soal,$gambar,$mime,$user_entry,$tgl_entry){
    	$sql = 'INSERT INTO detail_gambar_soal VALUES("'.$kode_soal.'","'.$gambar.'","'.$mime.'","'.$user_entry.'","'.$tgl_entry.'","'.$user_entry.'","'.$tgl_entry.'")';
        $query = $this->db->query($sql);
        return $query;
    }

    public function updateFoto2($tabel,$fid,$id,$fid2,$id2,$field,$datagambar,$mime){
        $sql = 'UPDATE `'.$tabel.'` SET '.$field.'="'.$datagambar.'", mime_jawaban="'.$mime.'" WHERE '.$fid.'="'.$id.'" AND '.$fid2.'="'.$id2.'"';
        $query = $this->db->query($sql);
        return $query;
    }
/*akhir UMUM*/

/*MENU HANDLING*/
	function menu($id) {
        return $this->db->query("SELECT *
        							FROM h_menu AS hm
        						LEFT JOIN menu AS m
        							ON hm.kode_menu = m.kode_menu
        						WHERE hm.id_pegawai = '$id'
        							AND hm.r = '1'
        							AND m.status_aktif='1'")->result();
    }

    function submenu($id,$kode_menu) {
        return $this->db->query("SELECT *
        							FROM h_submenu AS hm
        						LEFT JOIN submenu AS m
        							ON hm.kode_submenu = m.kode_submenu
        						WHERE hm.id_pegawai = '$id'
        							AND m.kode_menu='$kode_menu'
        							AND hm.r = '1'
        							AND m.status_aktif='1'")->result();
    }

    function cek_submenu($id,$kode_menu) {
        return $this->db->query("SELECT *
        							FROM h_submenu AS hm
        						LEFT JOIN submenu AS m
        							ON hm.kode_submenu = m.kode_submenu
        						WHERE hm.id_pegawai = '$id'
        							AND m.kode_menu='$kode_menu'
        							AND hm.r = '1'
        							AND m.status_aktif='1'")->num_rows();
    }

    function subsubmenu($id,$kode_submenu) {
        return $this->db->query("SELECT *
        							FROM h_subsubmenu AS hm
        						LEFT JOIN subsubmenu AS m
        							ON hm.kode_subsubmenu = m.kode_subsubmenu
        						WHERE hm.id_pegawai = '$id'
        							AND hm.r = '1'
        							AND m.kode_submenu='$kode_submenu'
        							AND m.status_aktif='1'")->result();
    }

    function cek_subsubmenu($id,$kode_submenu) {
        return $this->db->query("SELECT *
        							FROM h_subsubmenu AS hm
        						LEFT JOIN subsubmenu AS m
        							ON hm.kode_subsubmenu = m.kode_subsubmenu
        						WHERE hm.id_pegawai = '$id'
        							AND hm.r = '1'
        							AND m.kode_submenu='$kode_submenu'
        							AND m.status_aktif='1'")->num_rows();
    }

    /*================================================================*/

    function menu2($id) {
        return $this->db->query("SELECT *
        							FROM h_menu AS hm
        						LEFT JOIN menu AS m
        							ON hm.kode_menu = m.kode_menu
        						WHERE hm.id_pegawai = '$id'")->result();
    }

    function submenu2($id,$kode_menu) {
        return $this->db->query("SELECT *
        							FROM h_submenu AS hm
        						LEFT JOIN submenu AS m
        							ON hm.kode_submenu = m.kode_submenu
        						WHERE hm.id_pegawai = '$id'
        							AND m.kode_menu='$kode_menu'")->result();
    }

    function cek_submenu2($id,$kode_menu) {
        return $this->db->query("SELECT *
        							FROM h_submenu AS hm
        						LEFT JOIN submenu AS m
        							ON hm.kode_submenu = m.kode_submenu
        						WHERE hm.id_pegawai = '$id'
        							AND m.kode_menu='$kode_menu'")->num_rows();
    }

    function subsubmenu2($id,$kode_submenu) {
        return $this->db->query("SELECT *
        							FROM h_subsubmenu AS hm
        						LEFT JOIN subsubmenu AS m
        							ON hm.kode_subsubmenu = m.kode_subsubmenu
        						WHERE hm.id_pegawai = '$id'
        							AND m.kode_submenu='$kode_submenu'")->result();
    }

    function cek_subsubmenu2($id,$kode_submenu) {
        return $this->db->query("SELECT *
        							FROM h_subsubmenu AS hm
        						LEFT JOIN subsubmenu AS m
        							ON hm.kode_subsubmenu = m.kode_subsubmenu
        						WHERE hm.id_pegawai = '$id'
        							AND m.kode_submenu='$kode_submenu'")->num_rows();
    }
/*akhir MENU HANDLING*/

/*tabel menu*/
	public function nuMenu(){
		$query=$this->db->query("SELECT
										MAX(kode_menu) AS umn
								FROM menu")->row_array();
		return $query;
	}

	public function numMenu(){
		$query=$this->db->query("SELECT
										MAX(no_menu) AS ummn
								FROM menu")->row_array();
		return $query;
	}

	public function insertMenu($data){
		$query=$this->db->insert("menu",$data);
		return $query;
	}

	public function all_ha_menu(){
		$query=$this->db->query("SELECT * FROM menu")->result();
		return $query;
	}
/*akhir tabel menu*/

/*tabel h_menu*/
	public function insertHMenu($data){
		$query=$this->db->insert("h_menu",$data);
		return $query;
	}

	public function HMenu($id_pegawai){
		$query=$this->db->query("SELECT *
								FROM h_menu
									WHERE id_pegawai='$id_pegawai'")->result();
		return $query;
	}

	public function HMenuArray($kode_menu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM h_menu
									WHERE kode_menu='$kode_menu' AND id_pegawai='$id_pegawai'")->row_array();
		return $query;
	}

	public function CekHMenu($kode_menu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM h_menu
									WHERE kode_menu='$kode_menu' AND id_pegawai='$id_pegawai'")->num_rows();
		return $query;
	}

	public function HMA($menu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM menu LEFT JOIN h_menu
									ON menu.kode_menu = h_menu.kode_menu
								WHERE menu.menu='$menu' AND h_menu.id_pegawai='$id_pegawai'")->row_array();
		return $query;
	}

	public function CHMA($menu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM menu LEFT JOIN h_menu
									ON menu.kode_menu = h_menu.kode_menu
								WHERE menu.menu='$menu' AND h_menu.id_pegawai='$id_pegawai'")->num_rows();
		return $query;
	}
/*akhir tabel h_menu*/

/*tabel submenu*/
	public function cekMnSbm($kode_menu) {
		$query=$this->db->query("SELECT * FROM submenu WHERE kode_menu='$kode_menu'")->num_rows();
		return $query;
	}

	public function getMnSbm($kode_menu) {
		$query=$this->db->query("SELECT * FROM submenu WHERE kode_menu='$kode_menu'")->result();
		return $query;
	}

	public function nuSubmenu(){
		$query=$this->db->query("SELECT
										MAX(kode_submenu) AS usm
								FROM submenu")->row_array();
		return $query;
	}

	public function numSubmenu(){
		$query=$this->db->query("SELECT
										MAX(no_submenu) AS ussm
								FROM submenu")->row_array();
		return $query;
	}

	public function insertSubmenu($data){
		$query=$this->db->insert("submenu",$data);
		return $query;
	}
/*akhir tabel submenu*/

/*tabel h_submenu*/
	public function cekHMnSbm($kode_submenu){
		$query=$this->db->query("SELECT * FROM h_submenu WHERE kode_submenu='$kode_submenu'")->num_rows();
		return $query;
	}

	public function getHMnSbm($kode_submenu) {
		$query=$this->db->query("SELECT * FROM h_submenu WHERE kode_submenu='$kode_submenu'")->result();
		return $query;
	}

	public function insertHSubmenu($data){
		$query=$this->db->insert("h_submenu",$data);
		return $query;
	}

	public function HSubmenuArray($kode_submenu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM h_submenu
									WHERE kode_submenu='$kode_submenu' AND id_pegawai='$id_pegawai'")->row_array();
		return $query;
	}

	public function CekHSubmenu($kode_submenu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM h_submenu
									WHERE kode_submenu='$kode_submenu' AND id_pegawai='$id_pegawai'")->num_rows();
		return $query;
	}

	public function HSA($submenu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM submenu LEFT JOIN h_submenu
									ON submenu.kode_submenu = h_submenu.kode_submenu
								WHERE submenu.submenu='$submenu' AND h_submenu.id_pegawai='$id_pegawai'")->row_array();
		return $query;
	}

	public function CHSA($submenu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM submenu LEFT JOIN h_submenu
									ON submenu.kode_submenu = h_submenu.kode_submenu
								WHERE submenu.submenu='$submenu' AND h_submenu.id_pegawai='$id_pegawai'")->num_rows();
		return $query;
	}
/*akhir tabel h_submenu*/

/*tabel subsubmenu*/
	public function cekMnSbb($kode_submenu) {
		$query=$this->db->query("SELECT * FROM subsubmenu WHERE kode_submenu='$kode_submenu'")->num_rows();
		return $query;
	}

	public function getMnSbb($kode_submenu) {
		$query=$this->db->query("SELECT * FROM subsubmenu WHERE kode_submenu='$kode_submenu'")->result();
		return $query;
	}

	public function nuSubsubmenu(){
		$query=$this->db->query("SELECT
										MAX(kode_subsubmenu) AS uss
								FROM subsubmenu")->row_array();
		return $query;
	}

	public function numSubsubmenu(){
		$query=$this->db->query("SELECT
										MAX(no_subsubmenu) AS usss
								FROM subsubmenu")->row_array();
		return $query;
	}

	public function insertSub($data){
		$query=$this->db->insert("subsubmenu",$data);
		return $query;
	}
/*akhir tabel subsubmenu*/

/*tabel h_subsubmenu*/
	public function cekHMnSbb($kode_subsubmenu){
		$query=$this->db->query("SELECT * FROM h_subsubmenu WHERE kode_subsubmenu='$kode_subsubmenu'")->num_rows();
		return $query;
	}

	public function getHMnSbb($kode_subsubmenu) {
		$query=$this->db->query("SELECT * FROM h_subsubmenu WHERE kode_subsubmenu='$kode_subsubmenu'")->result();
		return $query;
	}

	public function insertHSubsubmenu($data){
		$query=$this->db->insert("h_subsubmenu",$data);
		return $query;
	}

	public function HSubsubmenuArray($kode_subsubmenu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM h_subsubmenu
									WHERE kode_subsubmenu='$kode_subsubmenu' AND id_pegawai='$id_pegawai'")->row_array();
		return $query;
	}

	public function CekHSubsubmenu($kode_subsubmenu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM h_subsubmenu
									WHERE kode_subsubmenu='$kode_subsubmenu' AND id_pegawai='$id_pegawai'")->num_rows();
		return $query;
	}

	public function HSBA($subsubmenu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM subsubmenu LEFT JOIN h_subsubmenu
									ON subsubmenu.kode_subsubmenu = h_subsubmenu.kode_subsubmenu
								WHERE subsubmenu.subsubmenu='$subsubmenu' AND h_subsubmenu.id_pegawai='$id_pegawai'")->row_array();
		return $query;
	}

	public function CHSBA($kode_subsubmenu, $id_pegawai){
		$query=$this->db->query("SELECT *
								FROM subsubmenu LEFT JOIN h_subsubmenu
									ON subsubmenu.kode_subsubmenu = h_subsubmenu.kode_subsubmenu
								WHERE subsubmenu.subsubmenu='$subsubmenu' AND h_subsubmenu.id_pegawai='$id_pegawai'")->num_rows();
		return $query;
	}
/*akhir tabel h_subsubmenu*/

/*tabel icon*/
	public function icon() {
		$query=$this->db->query("SELECT * FROM icon ORDER BY nama_icon ASC")->result();
		return $query;
	}

	public function countIcon(){
		$query=$this->db->query("SELECT
									COUNT(nama_icon) AS jumlah
								FROM icon
								")->row_array();
		return $query;
	}

	public function dataIcon($order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM icon
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcIcon($search,$order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM icon
								WHERE
									nama_icon LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcIcon($search){
		$query=$this->db->query("SELECT
									COUNT(nama_icon) AS jumlah
								FROM icon
								WHERE
									nama_icon LIKE '%$search%'
								")->row_array();
		return $query;
	}

	public function cekIcon($nama_icon) {
		$query=$this->db->query("SELECT * FROM icon WHERE nama_icon = '$nama_icon'")->num_rows();
		return $query;
	}

	public function insertIcon($data){
		$query=$this->db->insert("icon",$data);
		return $query;
	}
/*akhir tabel icon*/

/*tabel jabatan*/
	public function countJabatan(){
		$query=$this->db->query("SELECT
									COUNT(id_jabatan) AS jumlah
								FROM jabatan
								")->row_array();
		return $query;
	}

	public function dataJabatan($order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM jabatan
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcJabatan($search,$order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM jabatan
								WHERE
									nama_jabatan LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcJabatan($search){
		$query=$this->db->query("SELECT
									COUNT(id_jabatan) AS jumlah
								FROM jabatan
								WHERE
									nama_jabatan LIKE '%$search%'
								")->row_array();
		return $query;
	}

	public function nuJabatan(){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS ujb
								FROM jabatan")->row_array();
		return $query;
	}

	public function insertJabatan($data){
		$query=$this->db->insert("jabatan",$data);
		return $query;
	}

	public function getJabatan($id) {
		$query=$this->db->query("SELECT * FROM jabatan WHERE id_jabatan='$id'")->row_array();
		return $query;
	}

	public function jabatan() {
		$query=$this->db->query("SELECT * FROM jabatan ORDER BY no_urut DESC")->result();
		return $query;
	}
/*akhir tabel jabatan*/

/*tabel pegawai*/
	public function user_pegawai($id,$psw) {
		$query=$this->db->query("SELECT * FROM pegawai WHERE username='$id' AND password='$psw'")->num_rows();
		return $query;
	}

	public function getAccPegawai($id,$psw) {
		$query=$this->db->query("SELECT * FROM pegawai WHERE username='$id' AND password='$psw'")->row_array();
		return $query;
	}

	public function getPegawai($id) {
		$query=$this->db->query("SELECT * FROM pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan WHERE pegawai.id_pegawai='$id'")->row_array();
		return $query;
	}

	public function pegawai() {
		$query=$this->db->query("SELECT * FROM pegawai ORDER BY nama ASC")->result();
		return $query;
	}

	public function countPegawai(){
		$query=$this->db->query("SELECT
									COUNT(id_pegawai) AS jumlah
								FROM pegawai
								")->row_array();
		return $query;
	}

	public function dataPegawai($order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM pegawai
								LEFT JOIN jabatan
								ON pegawai.id_jabatan = jabatan.id_jabatan
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcPegawai($search,$order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM pegawai
								LEFT JOIN jabatan
								ON pegawai.id_jabatan = jabatan.id_jabatan
								WHERE
									pegawai.id_pegawai LIKE '%search%'
								OR
									pegawai.nama LIKE '%$search%'
								OR
									pegawai.status LIKE '%$search%'
								OR
									jabatan.nama_jabatan LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcPegawai($search){
		$query=$this->db->query("SELECT
									COUNT(id_pegawai) AS jumlah
								FROM pegawai
								LEFT JOIN jabatan
								ON pegawai.id_jabatan = jabatan.id_jabatan
								WHERE
									pegawai.id_pegawai LIKE '%search%'
								OR
									pegawai.nama LIKE '%$search%'
								OR
									pegawai.status LIKE '%$search%'
								OR
									jabatan.nama_jabatan LIKE '%$search%'
								")->row_array();
		return $query;
	}

	public function nuPegawai(){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS upg
								FROM pegawai")->row_array();
		return $query;
	}

	public function insertPegawai($data){
		$query=$this->db->insert("pegawai",$data);
		return $query;
	}

	public function getUsernamePegawai($username) {
		$query=$this->db->query("SELECT * FROM pegawai WHERE username='$username'")->num_rows();
		return $query;
	}
/*akhir tabel pegawai*/

/*tabel perusahaan*/
	public function perusahaan() {
		$query=$this->db->query("SELECT * FROM perusahaan")->row_array();
		return $query;
	}
/*akhir tabel perusahaan*/

/*tabel perumahan*/
	public function perumahan() {
		$query=$this->db->query("SELECT * FROM perumahan")->row_array();
		return $query;
	}
/*akhir tabel perumahan*/
}