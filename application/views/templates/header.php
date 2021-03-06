<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SYAHDINA LAND DEVELOPMENT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="<?php echo base_url('img/icon.png'); ?>" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/summernote/summernote-bs4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

  <style type="text/css">
    table.dataTable tbody td {
     vertical-align: middle;
    }

    .icon-tools .o {
      margin-left: .5rem;
      opacity: 0;
      transition: opacity .1s ease-out;
      cursor: pointer;
      transition-delay: .5s;
    }

    .icon-tools:hover .o {
      opacity: 1;
      transition-delay: 0s;
    }

<?php
if ($subtitle=='Menu') {
?>
    @font-face {
      font-family:'FO';
      src:url(<?php echo base_url('assets/'); ?>plugins/fontawesome-free/webfonts/fa-solid-900.ttf);
    }

    select {
      font-family: 'FO';
    }
<?php
}
?>
  </style>

<?php
if($subtitle=='Daftar Menu') {
?>
<script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<?php
}
?>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <a href="<?php echo site_url('Beranda'); ?>" class="nav-link">Syahdina Land Project</a>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="btn bg-gradient-danger btn-danger btn-xs" href="#" role="button" data-toggle="modal" data-target="#modal-logout">
          Keluar
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <div class="modal fade mt-5" id="modal-logout">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <p>Yakin ingin keluar ?</p>
        </div>
        <div class="modal-footer text-right">
          <button type="button" class="btn bg-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
          <a href="<?php echo site_url('Beranda/logout'); ?>" class="btn bg-danger btn-xs">Ya</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->