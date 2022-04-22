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
    tr .fa {
      margin-left: .5rem;
      opacity: 0;
      transition: opacity .1s ease-out;
      cursor: pointer;
      transition-delay: .5s;
    }
    tr:hover .fa {
      opacity: 1;
      transition-delay: 0s;
    }
  </style>
</head>
<body>



<div class="container-fluid">
 <div class="table-responsive">
    <table class="table table-striped table-sm table-hover">
      <thead>
        <tr>
          <th class=" text-center">Item#</th>
          <th class=" text-center">Item Name</th>
          <th class=" text-center">Qty</th>

      </thead>
      <tbody>
        <tr>
          <td>1,001</td>
          <td>Apple<i class="fa fa-trash"></i></td>
          <td class=" text-right">5</td>
        </tr>
        <tr>
          <td>1,002</td>
          <td>Kidney Beans<i class="fa fa-trash"></i></td>
          <td class=" text-right">3</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>



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