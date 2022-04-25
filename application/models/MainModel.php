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
        							AND m.status_aktif='1'")->result();
    }

    function submenu($id,$kode_menu) {
        return $this->db->query("SELECT *
        							FROM h_submenu AS hm
        						LEFT JOIN submenu AS m
        							ON hm.kode_submenu = m.kode_submenu
        						WHERE hm.id_pegawai = '$id'
        							AND m.kode_menu='$kode_menu'
        							AND m.status_aktif='1'")->result();
    }

    function cek_submenu($id,$kode_menu) {
        return $this->db->query("SELECT *
        							FROM h_submenu AS hm
        						LEFT JOIN submenu AS m
        							ON hm.kode_submenu = m.kode_submenu
        						WHERE hm.id_pegawai = '$id'
        							AND m.kode_menu='$kode_menu'
        							AND m.status_aktif='1'")->num_rows();
    }

    function subsubmenu($id,$kode_submenu) {
        return $this->db->query("SELECT *
        							FROM h_subsubmenu AS hm
        						LEFT JOIN subsubmenu AS m
        							ON hm.kode_subsubmenu = m.kode_subsubmenu
        						WHERE hm.id_pegawai = '$id'
        							AND m.kode_submenu='$kode_submenu'
        							AND m.status_aktif='1'")->result();
    }

    function cek_subsubmenu($id,$kode_submenu) {
        return $this->db->query("SELECT *
        							FROM h_subsubmenu AS hm
        						LEFT JOIN subsubmenu AS m
        							ON hm.kode_subsubmenu = m.kode_subsubmenu
        						WHERE hm.id_pegawai = '$id'
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
		$query=$this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$id'")->row_array();
		return $query;
	}
/*akhir tabel pegawai*/

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
/*akhir tabel menu*/

/*tabel h_menu*/
	public function insertHMenu($data){
		$query=$this->db->insert("h_menu",$data);
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
/*akhir tabel h_subsubmenu*/

/*------------------------------------------------------------------------------------------*/

/*tabel admin*/
	public function cekUserAdmin($id) {
		$query=$this->db->query("SELECT * FROM admin WHERE username='$id'")->num_rows();
		return $query;
	}

	public function countAdmin(){
		$query=$this->db->query("SELECT
									COUNT(id_admin) AS jumlah
								FROM admin
								")->row_array();
		return $query;
	}

	public function dataAdmin($order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM admin
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcAdmin($search,$order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM admin
								WHERE
									nama LIKE '%$search%'
								OR
									alamat LIKE '%$search%'
								OR
									kota_kelahiran LIKE '%$search%'
								OR
									tgl_lahir LIKE '%$search%'
								OR
									jk LIKE '%$search%'
								OR
									no_telp LIKE '%$search%'
								OR
									username LIKE '%$search%'
								OR
									level LIKE '%$search%'
								OR
									status LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcAdmin($search){
		$query=$this->db->query("SELECT
									COUNT(id_admin) AS jumlah
								FROM admin
								WHERE
									nama LIKE '%$search%'
								OR
									alamat LIKE '%$search%'
								OR
									kota_kelahiran LIKE '%$search%'
								OR
									tgl_lahir LIKE '%$search%'
								OR
									jk LIKE '%$search%'
								OR
									no_telp LIKE '%$search%'
								OR
									username LIKE '%$search%'
								OR
									level LIKE '%$search%'
								OR
									status LIKE '%$search%'
								")->row_array();
		return $query;
	}

	public function nuAdmin(){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS uad
								FROM admin")->row_array();
		return $query;
	}

	public function insertAdmin($data){
		$query=$this->db->insert("admin",$data);
		return $query;
	}
/*akhir tabel admin*/

/*tabel petugas*/
	public function user_petugas($id,$psw) {
		$query=$this->db->query("SELECT * FROM petugas WHERE username='$id' AND password='$psw'")->num_rows();
		return $query;
	}

	public function getPetugas($id) {
		$query=$this->db->query("SELECT * FROM petugas WHERE username='$id'")->row_array();
		return $query;
	}

	public function getPetugas2($id) {
		$query=$this->db->query("SELECT *,
									petugas.alamat AS alamat_petugas,
									petugas.no_telp AS no_telp_petugas
								FROM petugas LEFT JOIN sd ON petugas.id_sekolah = sd.id_sekolah WHERE petugas.id_petugas='$id'")->row_array();
		return $query;
	}

	public function petugas() {
		$query=$this->db->query("SELECT * FROM petugas")->result();
		return $query;
	}

	public function insertPetugas($data){
		$query=$this->db->insert("petugas",$data);
		return $query;
	}

	public function cekUserPetugas($id) {
		$query=$this->db->query("SELECT * FROM petugas WHERE username='$id'")->num_rows();
		return $query;
	}

	public function nuPetugas($id_sekolah){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS upt
								FROM petugas
								WHERE
									id_sekolah='$id_sekolah'")->row_array();
		return $query;
	}

	public function countPetugas(){
		$query=$this->db->query("SELECT
									COUNT(id_petugas) AS jumlah
								FROM petugas
								")->row_array();
		return $query;
	}

	public function dataPetugas($order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *,
									petugas.alamat AS alamat_petugas,
									petugas.no_telp AS no_telp_petugas
								FROM petugas
									LEFT JOIN sd
								ON petugas.id_sekolah = sd.id_sekolah
									ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcPetugas($search,$order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *,
									petugas.alamat AS alamat_petugas,
									petugas.no_telp AS no_telp_petugas
								FROM petugas
									LEFT JOIN sd
								ON petugas.id_sekolah = sd.id_sekolah
								WHERE
									petugas.nama LIKE '%$search%'
								OR
									petugas.alamat LIKE '%$search%'
								OR
									petugas.kota_kelahiran LIKE '%$search%'
								OR
									petugas.tgl_lahir LIKE '%$search%'
								OR
									petugas.jk LIKE '%$search%'
								OR
									petugas.no_telp LIKE '%$search%'
								OR
									petugas.username LIKE '%$search%'
								OR
									petugas.status LIKE '%$search%'
								OR
									sd.nama_sekolah LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcPetugas($search){
		$query=$this->db->query("SELECT
									COUNT(petugas.id_petugas) AS jumlah
								FROM petugas
									LEFT JOIN sd
								ON petugas.id_sekolah = sd.id_sekolah
								WHERE
									petugas.nama LIKE '%$search%'
								OR
									petugas.alamat LIKE '%$search%'
								OR
									petugas.kota_kelahiran LIKE '%$search%'
								OR
									petugas.tgl_lahir LIKE '%$search%'
								OR
									petugas.jk LIKE '%$search%'
								OR
									petugas.no_telp LIKE '%$search%'
								OR
									petugas.username LIKE '%$search%'
								OR
									petugas.status LIKE '%$search%'
								OR
									sd.nama_sekolah LIKE '%$search%'
								")->row_array();
		return $query;
	}
/*akhir tabel petugas*/

/*tabel siswa*/
	public function user_siswa($nisn) {
		$query=$this->db->query("SELECT * FROM siswa WHERE nisn='$nisn'")->num_rows();
		return $query;
	}

	public function siswa() {
		$query=$this->db->query("SELECT * FROM siswa AS sw LEFT JOIN sd ON sw.id_sekolah = sd.id_sekolah")->result();
		return $query;
	}

	public function insertSiswa($data){
		$query=$this->db->insert("siswa",$data);
		return $query;
	}

	public function getSiswa($id) {
		$query=$this->db->query("SELECT * FROM siswa AS sw LEFT JOIN sd ON sw.id_sekolah = sd.id_sekolah WHERE sw.nisn='$id'")->row_array();
		return $query;
	}

	public function getSiswa2($id) {
		$query=$this->db->query("SELECT *,
									sw.alamat AS alamat_siswa,
									sw.no_telp AS no_telp_siswa
								FROM siswa AS sw LEFT JOIN sd ON sw.id_sekolah = sd.id_sekolah WHERE sw.id_siswa='$id'")->row_array();
		return $query;
	}

	public function dataSWS($id,$kelas) {
		$query=$this->db->query("SELECT * FROM siswa WHERE id_sekolah='$id' AND kelas_siswa='$kelas'")->result();
		return $query;
	}

	public function countSiswa(){
		$query=$this->db->query("SELECT
									COUNT(id_siswa) AS jumlah
								FROM siswa
								")->row_array();
		return $query;
	}

	public function dataSiswa($order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *,
									siswa.alamat AS alamat_siswa,
									siswa.no_telp AS no_telp_siswa
								FROM siswa
									LEFT JOIN sd
								ON siswa.id_sekolah = sd.id_sekolah
									ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcSiswa($search,$order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *,
									siswa.alamat AS alamat_siswa,
									siswa.no_telp AS no_telp_siswa
								FROM siswa
									LEFT JOIN sd
								ON siswa.id_sekolah = sd.id_sekolah
								WHERE
									siswa.nisn LIKE '%$search%'
								OR
									siswa.nama LIKE '%$search%'
								OR
									siswa.alamat LIKE '%$search%'
								OR
									siswa.kota_kelahiran LIKE '%$search%'
								OR
									siswa.tgl_lahir LIKE '%$search%'
								OR
									siswa.jk LIKE '%$search%'
								OR
									siswa.no_telp LIKE '%$search%'
								OR
									siswa.status LIKE '%$search%'
								OR
									siswa.kelas_siswa LIKE '%$search%'
								OR
									sd.nama_sekolah LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcSiswa($search){
		$query=$this->db->query("SELECT
									COUNT(siswa.id_siswa) AS jumlah
								FROM siswa
									LEFT JOIN sd
								ON siswa.id_sekolah = sd.id_sekolah
								WHERE
									siswa.nisn LIKE '%$search%'
								OR
									siswa.nama LIKE '%$search%'
								OR
									siswa.alamat LIKE '%$search%'
								OR
									siswa.kota_kelahiran LIKE '%$search%'
								OR
									siswa.tgl_lahir LIKE '%$search%'
								OR
									siswa.jk LIKE '%$search%'
								OR
									siswa.no_telp LIKE '%$search%'
								OR
									siswa.status LIKE '%$search%'
								OR
									siswa.kelas_siswa LIKE '%$search%'
								OR
									sd.nama_sekolah LIKE '%$search%'
								")->row_array();
		return $query;
	}

	public function nuSiswa($id_sekolah, $tgl){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS usw
								FROM siswa
								WHERE
									id_sekolah='$id_sekolah'
								AND
									tgl_entry
								LIKE
									'%$tgl%'")->row_array();
		return $query;
	}
/*akhir tabel siswa*/

/*tabel sd*/
	public function lembaga() {
		$query=$this->db->query("SELECT * FROM sd")->result();
		return $query;
	}

	public function insertLembaga($data){
		$query=$this->db->insert("sd",$data);
		return $query;
	}

	public function getLembaga($id) {
		$query=$this->db->query("SELECT * FROM sd WHERE id_sekolah='$id'")->row_array();
		return $query;
	}

	public function nuLembaga(){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS ulb
								FROM sd")->row_array();
		return $query;
	}

	public function countLembaga(){
		$query=$this->db->query("SELECT
									COUNT(id_sekolah) AS jumlah
								FROM sd
								")->row_array();
		return $query;
	}

	public function dataLembaga($order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM sd
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcLembaga($search,$order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM sd
								WHERE
									nama_sekolah LIKE '%$search%'
								OR
									alamat LIKE '%$search%'
								OR
									no_telp LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcLembaga($search){
		$query=$this->db->query("SELECT
									COUNT(id_sekolah) AS jumlah
								FROM sd
								WHERE
									nama_sekolah LIKE '%$search%'
								OR
									alamat LIKE '%$search%'
								OR
									no_telp LIKE '%$search%'
								")->row_array();
		return $query;
	}
/*akhir tabel sd*/

/*tabel mata_pelajaran*/
	public function mata_pelajaran() {
		$query=$this->db->query("SELECT * FROM mata_pelajaran")->result();
		return $query;
	}

	public function mata_pelajaran2() {
		$query=$this->db->query("SELECT * FROM mata_pelajaran WHERE status='1'")->result();
		return $query;
	}

	public function insertMapel($data){
		$query=$this->db->insert("mata_pelajaran",$data);
		return $query;
	}

	public function getMapel($id) {
		$query=$this->db->query("SELECT * FROM mata_pelajaran WHERE kode_mapel='$id'")->row_array();
		return $query;
	}

	public function nuMapel($tgl){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS ump
								FROM mata_pelajaran
								WHERE
									tgl_entry
								LIKE
									'%$tgl%'")->row_array();
		return $query;
	}

	public function countMapel(){
		$query=$this->db->query("SELECT
									COUNT(kode_mapel) AS jumlah
								FROM mata_pelajaran
								")->row_array();
		return $query;
	}

	public function dataMapel($order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM mata_pelajaran
								ORDER BY $order $dir
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcMapel($search,$order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *
								FROM mata_pelajaran
								WHERE
									nama LIKE '%$search%'
								OR
									kelas_mapel LIKE '%$search%'
								OR
									status LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcMapel($search){
		$query=$this->db->query("SELECT
									COUNT(kode_mapel) AS jumlah
								FROM mata_pelajaran
								WHERE
									nama LIKE '%$search%'
								OR
									kelas_mapel LIKE '%$search%'
								OR
									status LIKE '%$search%'
								")->row_array();
		return $query;
	}
/*akhir tabel mata_pelajaran*/

/*tabel soal*/
	public function soal($kode_mapel) {
		$query=$this->db->query("SELECT * FROM soal WHERE kode_mapel='$kode_mapel' ORDER BY no ASC")->result();
		return $query;
	}

	public function insertSoal($data){
		$query=$this->db->insert("soal",$data);
		return $query;
	}

	public function noSoal($kode_mapel) {
		$query=$this->db->query("SELECT MAX(no) AS maxks FROM soal WHERE kode_mapel='$kode_mapel'")->row_array();
		return $query;
	}

	public function nuSoal($tgl){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS usl
								FROM soal
								WHERE
									tgl_entry
								LIKE
									'%$tgl%'")->row_array();
		return $query;
	}

	public function getSoal($id) {
		$query=$this->db->query("SELECT * FROM soal WHERE kode_soal='$id'")->row_array();
		return $query;
	}

	public function dataMPS($id) {
		$query=$this->db->query("SELECT * FROM soal WHERE kode_mapel='$id'")->result();
		return $query;
	}

	public function cekMPS($id) {
		$query=$this->db->query("SELECT * FROM soal WHERE kode_mapel='$id'")->num_rows();
		return $query;
	}

	public function countSoal($kode_mapel){
		$query=$this->db->query("SELECT
									COUNT(kode_soal) AS jumlah
								FROM soal
								WHERE kode_mapel = '$kode_mapel'
								")->row_array();
		return $query;
	}

	public function dataSoal($order,$dir,$limit,$start,$kode_mapel){
		$query=$this->db->query("SELECT *
								FROM soal
								WHERE kode_mapel = '$kode_mapel'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcSoal($search,$order,$dir,$limit,$start,$kode_mapel){
		$query=$this->db->query("SELECT *
								FROM soal
								WHERE
									kode_mapel = '$kode_mapel'
								AND
									(no LIKE '%$search%'
								OR
									uraian LIKE '%$search%')
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcSoal($search,$kode_mapel){
		$query=$this->db->query("SELECT
									COUNT(kode_soal) AS jumlah
								FROM soal
								WHERE
									kode_mapel = '$kode_mapel'
								AND
									(no LIKE '%$search%'
								OR
									uraian LIKE '%$search%')
								")->row_array();
		return $query;
	}
/*akhir tabel soal*/

/*tabel detail_gambar_soal*/
	public function getDetGmbSoal($id) {
		$query=$this->db->query("SELECT * FROM detail_gambar_soal WHERE kode_soal='$id'")->row_array();
		return $query;
	}
/*akhir tabel detail_gambar_soal*/

/*tabel jawaban*/
	public function insertJawaban($data){
		$query=$this->db->insert("jawaban",$data);
		return $query;
	}

	public function getJawabanA($id) {
		$query=$this->db->query("SELECT * FROM jawaban WHERE kode_soal='$id' AND sign='A'")->row_array();
		return $query;
	}

	public function getJawabanB($id) {
		$query=$this->db->query("SELECT * FROM jawaban WHERE kode_soal='$id' AND sign='B'")->row_array();
		return $query;
	}

	public function getJawabanC($id) {
		$query=$this->db->query("SELECT * FROM jawaban WHERE kode_soal='$id' AND sign='C'")->row_array();
		return $query;
	}

	public function getJawabanD($id) {
		$query=$this->db->query("SELECT * FROM jawaban WHERE kode_soal='$id' AND sign='D'")->row_array();
		return $query;
	}
/*akhir tabel jawaban*/

/*tabel ujian*/
	public function ujian() {
		$query=$this->db->query("SELECT *
									FROM ujian AS uj
								LEFT JOIN sd
									ON uj.id_sekolah = sd.id_sekolah
								LEFT JOIN mata_pelajaran AS mp
									ON uj.kode_mapel = mp.kode_mapel
								ORDER BY
									uj.kode_ujian
								DESC")->result();
		
		return $query;
	}

	public function getUjian($id) {
		$query=$this->db->query("SELECT *
									FROM ujian AS uj
								LEFT JOIN sd
									ON uj.id_sekolah = sd.id_sekolah
								LEFT JOIN mata_pelajaran AS mp
									ON uj.kode_mapel = mp.kode_mapel
								WHERE
									uj.kode_ujian = '$id'
								")->row_array();
		return $query;
	}

	public function getUjian2($id) {
		$query=$this->db->query("SELECT * FROM ujian WHERE kode_ujian = '$id'")->row_array();
		return $query;
	}

	public function insertUjian($data){
		$query=$this->db->insert("ujian",$data);
		return $query;
	}

	public function countUjian(){
		$query=$this->db->query("SELECT
									COUNT(kode_ujian) AS jumlah
								FROM ujian
								")->row_array();
		return $query;
	}

	public function dataUjian($order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *,
									sd.nama_sekolah AS nama_sekolah,
									mata_pelajaran.nama AS nama
								FROM ujian
									LEFT JOIN sd
								ON ujian.id_sekolah = sd.id_sekolah
									LEFT JOIN mata_pelajaran
								ON ujian.kode_mapel = mata_pelajaran.kode_mapel
									ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcUjian($search,$order,$dir,$limit,$start){
		$query=$this->db->query("SELECT *,
									sd.nama_sekolah AS nama_sekolah,
									mata_pelajaran.nama AS nama
								FROM ujian
									LEFT JOIN sd
								ON ujian.id_sekolah = sd.id_sekolah
									LEFT JOIN mata_pelajaran
								ON ujian.kode_mapel = mata_pelajaran.kode_mapel
								WHERE
									ujian.kode_ujian LIKE '%$search%'
								OR
									ujian.tanggal LIKE '%$search%'
								OR
									sd.nama_sekolah LIKE '%$search%'
								OR
									mata_pelajaran.nama LIKE '%$search%'
								OR
									ujian.set_aktif LIKE '%$search%'
								OR
									ujian.kelas LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcUjian($search){
		$query=$this->db->query("SELECT
									COUNT(ujian.kode_ujian) AS jumlah
								FROM ujian
									LEFT JOIN sd
								ON ujian.id_sekolah = sd.id_sekolah
									LEFT JOIN mata_pelajaran
								ON ujian.kode_mapel = mata_pelajaran.kode_mapel
								WHERE
									ujian.kode_ujian LIKE '%$search%'
								OR
									ujian.tanggal LIKE '%$search%'
								OR
									sd.nama_sekolah LIKE '%$search%'
								OR
									mata_pelajaran.nama LIKE '%$search%'
								OR
									ujian.set_aktif LIKE '%$search%'
								OR
									ujian.kelas LIKE '%$search%'
								")->row_array();
		return $query;
	}

	public function nuUjian($tgl){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS ujn
								FROM ujian
								WHERE
									tgl_entry
								LIKE
									'%$tgl%'")->row_array();
		return $query;
	}

/*akhir tabel ujian*/

/*tabel detail_soal_ujian*/
	public function insertDSU($data){
		$query=$this->db->insert("detail_soal_ujian",$data);
		return $query;
	}

	public function dsu($id) {
		$query=$this->db->query("SELECT *
									FROM detail_soal_ujian AS dsu
								LEFT JOIN soal AS sl
									ON dsu.kode_soal = sl.kode_soal
								LEFT JOIN ujian AS uj
									ON dsu.kode_ujian = uj.kode_ujian
								WHERE
									dsu.kode_ujian = '$id'
								")->result();
		return $query;
	}

	public function cekSoalUjian($kode_ujian, $kode_soal) {
		$query=$this->db->query("SELECT * FROM detail_soal_ujian WHERE kode_ujian='$kode_ujian' AND kode_soal='$kode_soal'")->num_rows();
		return $query;
	}

	public function cekKUSL($kode_ujian) {
		$query=$this->db->query("SELECT * FROM detail_soal_ujian WHERE kode_ujian='$kode_ujian'")->num_rows();
		return $query;
	}

	public function getDSU($kode_dsu) {
		$query=$this->db->query("SELECT * FROM detail_soal_ujian WHERE kode_dsu='$kode_dsu'")->row_array();
		return $query;
	}

	public function nuDSU($amuj){
		$query=$this->db->query("SELECT
										MAX(no_urut) AS uds
								FROM detail_soal_ujian
								WHERE
									kode_dsu
								LIKE
									'%$amuj%'")->row_array();
		return $query;
	}

	public function countDSU($kode_ujian){
		$query=$this->db->query("SELECT
									COUNT(kode_dsu) AS jumlah
								FROM detail_soal_ujian
								WHERE kode_ujian = '$kode_ujian'
								")->row_array();
		return $query;
	}

	public function dataDSU($order,$dir,$limit,$start,$kode_ujian){
		$query=$this->db->query("SELECT *
								FROM detail_soal_ujian
								LEFT JOIN
									soal
								ON detail_soal_ujian.kode_soal = soal.kode_soal
								WHERE detail_soal_ujian.kode_ujian = '$kode_ujian'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function srcDSU($search,$order,$dir,$limit,$start,$kode_ujian){
		$query=$this->db->query("SELECT *
								FROM detail_soal_ujian
								LEFT JOIN
									soal
								ON detail_soal_ujian.kode_soal = soal.kode_soal
								WHERE detail_soal_ujian.kode_ujian = '$kode_ujian'
								AND
									soal.uraian LIKE '%$search%'
								ORDER BY $order $dir 
        						LIMIT $limit 
        						OFFSET $start
								")->result();
		return $query;
	}

	public function jSrcDSU($search,$kode_ujian){
		$query=$this->db->query("SELECT
									COUNT(detail_soal_ujian.kode_dsu) AS jumlah
								FROM detail_soal_ujian
								LEFT JOIN
									soal
								ON detail_soal_ujian.kode_soal = soal.kode_soal
								WHERE detail_soal_ujian.kode_ujian = '$kode_ujian'
								AND
									soal.uraian LIKE '%$search%'
								")->row_array();
		return $query;
	}
/*akhir tabel detail_soal_ujian*/

/*tabel detail_peserta_ujian*/
	public function insertDPU($data){
		$query=$this->db->insert("detail_peserta_ujian",$data);
		return $query;
	}

	public function dataDPU($id) {
		$query=$this->db->query("SELECT *
									FROM detail_peserta_ujian AS dpu
								LEFT JOIN siswa AS sw
									ON dpu.id_siswa = sw.id_siswa
								WHERE dpu.kode_ujian='$id'")->result();
		return $query;
	}

	public function cekPesertaUjian($kode_ujian, $nisn) {
		$query=$this->db->query("SELECT * FROM detail_peserta_ujian WHERE kode_ujian='$kode_ujian' AND nisn='$nisn'")->num_rows();
		return $query;
	}

	public function dpu($id) {
		$query=$this->db->query("SELECT *
									FROM detail_peserta_ujian AS dpu
								LEFT JOIN siswa AS sw
									ON dpu.nisn = sw.nisn
								LEFT JOIN ujian AS uj
									ON dpu.kode_ujian = uj.kode_ujian
								WHERE
									dpu.kode_ujian = '$id'
								")->result();
		return $query;
	}

	public function cekKUPS($kode_ujian) {
		$query=$this->db->query("SELECT * FROM detail_peserta_ujian WHERE kode_ujian='$kode_ujian'")->num_rows();
		return $query;
	}

	public function dataPesertaUjian($nisn) {
		$query=$this->db->query("SELECT *,
										mp.nama AS nama_mapel
									FROM detail_peserta_ujian AS dpu
									LEFT JOIN siswa AS sw
										ON dpu.nisn = sw.nisn
									LEFT JOIN (ujian AS uj
									LEFT JOIN mata_pelajaran AS mp
										ON uj.kode_mapel = mp.kode_mapel)
										ON dpu.kode_ujian = uj.kode_ujian
									WHERE
										dpu.nisn = '$nisn'
									")->result();
		return $query;
	}

	public function cekPU($nisn) {
		$query=$this->db->query("SELECT *
									FROM detail_peserta_ujian AS dpu
								LEFT JOIN siswa AS sw
									ON dpu.nisn = sw.nisn
								LEFT JOIN ujian AS uj
									ON dpu.kode_ujian = uj.kode_ujian
								WHERE
									dpu.nisn = '$nisn'
								AND
									(uj.set_aktif = '1' OR uj.set_aktif = '2')
								")->num_rows();
		return $query;
	}

	public function dataPU($kode_ujian, $nisn) {
		$query=$this->db->query("SELECT *,
										mp.nama AS nama_mapel,
										sw.nama AS nama_siswa
									FROM detail_peserta_ujian AS dpu
								LEFT JOIN siswa AS sw
									ON dpu.nisn = sw.nisn
								LEFT JOIN (ujian AS uj
								LEFT JOIN mata_pelajaran AS mp
									ON uj.kode_mapel = mp.kode_mapel
								LEFT JOIN sd
									ON uj.id_sekolah = sd.id_sekolah)
									ON dpu.kode_ujian = uj.kode_ujian
								WHERE
									uj.kode_ujian = '$kode_ujian'
								AND
									dpu.nisn = '$nisn'
								")->row_array();
		return $query;
	}
/*akhir tabel detail_peserta_ujian*/

/*tabel detail_jawaban_siswa*/
	public function insertDJS($data){
		$query=$this->db->insert("detail_jawaban_siswa",$data);
		return $query;
	}
/*akhir tabel detail_jawaban_siswa*/

/*tabel detail_siswa_ujian*/
	public function insertDSUJ($data){
		$query=$this->db->insert("detail_siswa_ujian",$data);
		return $query;
	}

	public function cekDSUJ($kode_ujian) {
		$query=$this->db->query("SELECT * FROM detail_siswa_ujian WHERE kode_ujian='$kode_ujian'")->num_rows();
		return $query;
	}

	public function cekDSUJ2($kode_ujian, $nisn) {
		$query=$this->db->query("SELECT * FROM detail_siswa_ujian WHERE kode_ujian='$kode_ujian' AND nisn='$nisn'")->num_rows();
		return $query;
	}

	public function dataDSUJ2($kode_ujian, $nisn) {
		$query=$this->db->query("SELECT * FROM detail_siswa_ujian WHERE kode_ujian='$kode_ujian' AND nisn='$nisn'")->row_array();
		return $query;
	}
/*akhir tabel detail_siswa_ujian*/
}