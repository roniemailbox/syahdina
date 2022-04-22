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
  <style type="text/css">
    .box{
  color: #fff;
  padding: 10px;
}
 
.box:hover{
  background: #fff;
  color: #26425E;
}
 
.demo-1 {
  position: relative;
}
 
.demo-1:before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  top: 0;
  right: 0;
 
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -ms-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.2s;
 
  -webkit-transition-property: top, left, right, bottom;
  -moz-transition-property: top, left, right, bottom;
  -ms-transition-property: top, left, right, bottom;
  -o-transition-property: top, left, right, bottom;
  transition-property: top, left, right, bottom;
}
 
.demo-1:hover:before, .demo-1:focus:before{
  -webkit-transition-delay: .1s;
  -moz-transition-delay: .1s;
  -ms-transition-delay: .1s;
  -o-transition-delay: .1s;
  transition-delay: .1s; 
 
  border: #fff solid 3px;
  bottom: -7px;
  left: -7px;
  top: -7px;
  right: -7px;
}
  </style>
</head>
<body class="hold-transition login-page">



<nav>
      <a href="#" class="box demo-1"> <i class="fa fa-hand-o-right"></i> <span>Demo 1</span> </a>
      <a href="#" class="box demo-1"> <i class="fa fa-hand-o-up"></i> <span>Demo 2</span></a>
      <a href="#" class="box demo-1"> <i class="fa fa-hand-o-left"></i>  </i> <span>Demo 3</span></a>
      <a href="#" class="box demo-1">  <i class="fa fa-thumbs-o-up"></i> <span>Demo 4</span></a>
</nav>












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