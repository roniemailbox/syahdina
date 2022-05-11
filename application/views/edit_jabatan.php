  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-body">
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterJabatan/proses_edit'); ?>" method="post">
              <input type="hidden" id="id_jabatan" name="id_jabatan" value="<?php echo $data_jabatan['id_jabatan']; ?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Nama Jabatan</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="nama_jabatan" name="nama_jabatan" placeholder="Nama Jabatan" maxlength="30" value="<?php echo $data_jabatan['nama_jabatan']; ?>" required>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Keterangan</label>
                <div class="col-sm-9 form-group">
                  <textarea class="form-control form-control-sm" id="keterangan" name="keterangan" placeholder="Optional" maxlength="40"><?php echo $data_jabatan['keterangan']; ?></textarea>
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