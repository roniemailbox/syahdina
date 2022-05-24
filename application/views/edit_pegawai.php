  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-body">
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterPegawai/proses_edit'); ?>" method="post">
              <input type="hidden" id="id_pegawai" name="id_pegawai" value="<?php echo $id_pegawai; ?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Nama Lengkap</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Lengkap" maxlength="100" value="<?php echo $nama; ?>" required>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Alamat</label>
                <div class="col-sm-9 form-group">
                  <textarea class="form-control form-control-sm" id="alamat" name="alamat" placeholder="Alamat" maxlength="200"><?php echo $alamat; ?></textarea>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Jenis Kelamin</label>
                <div class="col-sm-9 form-group">
                  <div class="form-check d-inline">
                    <input class="form-check-input" type="radio" id="rbJK" name="rbJK" value="L" <?php if($jk=='L') { echo 'checked'; } ?>>
                    <label class="form-check-label">Laki - laki</label>
                  </div>&ensp;
                  <div class="form-check d-inline">
                    <input class="form-check-input" type="radio" id="rbJK" name="rbJK" value="P" <?php if($jk=='P') { echo 'checked'; } ?>>
                    <label class="form-check-label">Perempuan</label>
                  </div>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Jabatan</label>
                <div class="col-sm-9 form-group">
                  <select class="form-control select2 form-control-sm" id="id_jabatan" name="id_jabatan">
                    <?php
                    foreach ($data_jabatan as $rowdjb) {
                    ?>
                      <option value="<?php echo $rowdjb->id_jabatan; ?>" <?php if($rowdjb->id_jabatan==$id_jabatan) { echo 'selected'; } ?>><?php echo $rowdjb->nama_jabatan; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Status</label>
                <div class="col-sm-9 form-group">
                  <select class="form-control select2 form-control-sm" id="status" name="status">
                    <option value="" <?php if($status=='') { echo 'selected'; } ?>>-</option>
                    <option value="Tetap" <?php if($status=='Tetap') { echo 'selected'; } ?>>Tetap</option>
                    <option value="Probotion" <?php if($status=='Probotion') { echo 'selected'; } ?>>Probotion</option>
                  </select>
                </div>
              </div>
              <div class="form-group float-right" style="margin-top: -10px">
                <button type="submit" class="btn bg-gradient-primary"><i class="fas fa-save"></i>&ensp;Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->