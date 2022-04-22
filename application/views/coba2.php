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
    .demo-3 {
  color: #fff;
  display: inline-block;
  text-decoration: none;
  overflow: hidden;
  vertical-align: top;
   background: #1C3044;
  -webkit-perspective: 600px;
  -moz-perspective: 600px;
  -ms-perspective: 600px;
  perspective: 600px;
  -webkit-perspective-origin: 50% 50%;
  -moz-perspective-origin: 50% 50%;
  -ms-perspective-origin: 50% 50%;
  perspective-origin: 50% 50%;
}
 .demo-3:hover span {
  background: #314559;
  -webkit-transform: translate3d(0px, 0px, -30px) rotateX(90deg);
  -moz-transform: translate3d(0px, 0px, -30px) rotateX(90deg);
  -ms-transform: translate3d(0px, 0px, -30px) rotateX(90deg);
  transform: translate3d(0px, 0px, -30px) rotateX(90deg);
}
  .demo-3 span {
  display: block;
  position: relative;
  padding: 10px 20px;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  transition: all 0.3s ease;
  -webkit-transform-origin: 50% 0%;
  -moz-transform-origin: 50% 0%;
  -ms-transform-origin: 50% 0%;
  transform-origin: 50% 0%;
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  transform-style: preserve-3d;
}
 
 .demo-3 span:after {
  content: attr(data-text);
  -webkit-font-smoothing: antialiased;
  padding: 10px 20px;
  color: #fff;
  background: #0e6957;
  display: block;
  position: absolute;
 
  left: 0;
  top: 0;
  -webkit-transform-origin: 50% 0%;
  -moz-transform-origin: 50% 0%;
  -ms-transform-origin: 50% 0%;
  transform-origin: 50% 0%;
  -webkit-transform: translate3d(0px, 105%, 0px) rotateX(-90deg);
  -moz-transform: translate3d(0px, 105%, 0px) rotateX(-90deg);
  -ms-transform: translate3d(0px, 105%, 0px) rotateX(-90deg);
  transform: translate3d(0px, 105%, 0px) rotateX(-90deg);
}
  </style>
</head>
<body>



<nav>
      <a href="#" class="demo-3"> <span data-text="Demo 1">Demo 1</span></a>
      <a href="#" class="demo-3"><span data-text="Demo 2">Demo 2</span></a>
      <a href="#" class="demo-3"><span data-text="Demo 3">Demo 3</span></a>
      <a href="#" class="demo-3"><span data-text="Demo 4">Demo 4</span></a>
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