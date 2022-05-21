  <footer class="main-footer text-sm">
    <strong>Copyright &copy; 2022 - Syahdina Land Project</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php
if($subtitle!='Daftar Menu') {
?>
<script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<?php
}
?>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url('assets/'); ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/'); ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/'); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/'); ?>dist/js/demo.js"></script>

<script type="text/javascript">
  $('.select2').select2()
  
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000
  });

  $(function() {
<?php
if ($this->session->flashdata('message')) {
?>
  Toast.fire({
    icon: 'error',
    title: "<?php echo $this->session->flashdata('message'); ?>"
  })
<?php
} elseif ($this->session->flashdata('sukses')) {
?>
  Toast.fire({
    icon: 'success',
    title: "<?php echo $this->session->flashdata('sukses'); ?>"
  })
<?php
}
?>

    $('#tabel').DataTable({
      "autoWidth": false,
      "responsive": true,
<?php
if ($subtitle=='Atur Akses') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('Akses/data_akses'); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "nama" },
          { "data": "status" },
      ]
<?php
} elseif ($subtitle=='Daftar Menu') {
?>
      "searching": false,
      "ordering": false,
      "paging": false,
<?php
} elseif ($subtitle=='Master Icon') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('MasterIcon/data_icon/'.str_replace(" ", "_", $subtitle)); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "picture" },
          { "data": "nama" },
      ]
<?php
} elseif ($subtitle=='Master Jabatan') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('MasterJabatan/data_jabatan/'.str_replace(" ", "_", $subtitle)); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "nama" },
          { "data": "keterangan" },
      ]
<?php
} elseif ($subtitle=='Master Pegawai') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('MasterPegawai/data_pegawai/'.str_replace(" ", "_", $subtitle)); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "foto" },
          { "data": "nama" },
          { "data": "jk" },
          { "data": "jabatan" },
          { "data": "status" },
      ]
<?php
} elseif ($ttl=='Master Kota') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('MasterKota/data_kota'); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "nama_kota" },
          { "data": "nama_provinsi" },
      ]
<?php
} elseif ($ttl=='Master Lembaga') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('MasterLembaga/data_lembaga'); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "nama_sekolah" },
          { "data": "alamat" },
          { "data": "no_telp" },
      ]
<?php
} elseif ($ttl=='Master Siswa') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('MasterSiswa/data_siswa'); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "nisn" },
          { "data": "nama" },
          { "data": "jk" },
          { "data": "id_sekolah" },
          { "data": "kelas_siswa" },
      ]
<?php
} elseif ($ttl=='Master Mata Pelajaran') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('MasterMapel/data_mapel'); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "nama" },
          { "data": "kelas_mapel" },
          { "data": "status" },
      ]
<?php
} elseif ($ttl=='Master Soal') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('MasterMapel/data_soal/'.$imp); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "no" },
          { "data": "uraian" },
      ]
<?php
} elseif ($ttl=='Ujian') {
?>
      "processing": true,
      "serverSide": true,
      "order": [[ 1, "desc" ]],
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
              "url": "<?php echo site_url('Ujian/data_ujian'); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "tanggal" },
          { "data": "id_sekolah" },
          { "data": "judul_awal" },
          { "data": "judul_akhir" },
          { "data": "nama_mapel" },
          { "data": "kelas" },
          /*{ "data": "sesi" },*/
          { "data": "status" },
      ]
<?php
} elseif ($ttl=='Detail Soal Ujian') {
?>
      "processing": true,
      "serverSide": true,
      "ajax":{
               /*"url": "ajax/ajax_kontak.php?action=table_data",*/
               "url": "<?php echo site_url('Ujian/data_dsu/'.$iuj); ?>",
               "dataType": "json",
               "type": "POST"
             },
      "columns": [
          { "data": "aksi" },
          { "data": "uraian" },
      ]
<?php
}
?>
    });

  });

function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
  return true;
}

function hanyaHuruf(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32) {
      return false;
  }
  return true;
}
</script>

</body>
</html>