  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-body">
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterPegawai/proses_edit_akun'); ?>" method="post">
              <input type="hidden" id="id_pegawai" name="id_pegawai" value="<?php echo $id_pegawai; ?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Username</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" readonly>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Password Baru</label>
                <div class="col-sm-9 form-group">
                  <input type="password" class="form-control form-control-sm" id="password_baru" name="password_baru" placeholder="Password Baru" maxlength="10" required>
                </div>
              </div>
              <div class="form-group float-right" style="margin-top: -10px">
                <button type="submit" class="btn bg-gradient-fuchsia"><i class="fas fa-save"></i>&ensp;Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->