<!DOCTYPE html>
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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url('img/bg-login.jpg'); ?>); background-size: cover">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="pt-2" style="border-radius: 5px; border: none">
    <div class="card-body login-card-body">
      <div class="pb-4 pt-3" style="text-align: center">
        <p style="text-align: center">
          <img src="<?php echo base_url('img/logo.png'); ?>" style="width: 70%">
        </p>
        <!-- <p style="font-size: 16px"><strong>SYAHDINA LAND PROJECT</strong></p> -->
      </div>

      <form action="<?php echo site_url('Login/login'); ?>" method="post">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text" style="border: none">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="text" class="form-control form-control-sm" id="id" name="id" placeholder="ID" style="border: none">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text" style="border: none">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control form-control-sm" id="psw" name="psw" placeholder="Password" style="border: none">
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12 text-center">
            <button type="submit" class="btn bg-gradient-teal btn-block"><i class="fas fa-sign-in-alt"></i>&ensp;Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-2 pt-1 text-center" style="font-size: 12px; margin-bottom: -15px; border-top: 1px solid silver">
        <b>&copy; Copyright 2022 </b>- Syahdina Land
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/'); ?>dist/js/adminlte.min.js"></script>

<script type="text/javascript">
$("#id").focus();

$(function() {
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000
  });

<?php
if ($this->session->flashdata('message')) {
?>
  Toast.fire({
    icon: 'error',
    title: "<?php echo $this->session->flashdata('message'); ?>"
  })
<?php
} elseif ($this->session->flashdata('warning')) {
?>
  Toast.fire({
    icon: 'warning',
    title: "<?php echo $this->session->flashdata('warning'); ?>"
  })
<?php
} elseif ($this->session->flashdata('info')) {
?>
  Toast.fire({
    icon: 'info',
    title: "<?php echo $this->session->flashdata('info'); ?>"
  })
<?php
}
?>
});
</script>

</body>
</html>
