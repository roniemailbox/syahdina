  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-body">
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterBlok/proses_edit'); ?>" method="post">
              <input type="hidden" id="kode_blok" name="kode_blok" value="<?php echo $kode_blok; ?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Blok</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="blok" name="blok" placeholder="Nama Blok" maxlength="10" value="<?php echo $blok; ?>" readonly>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Keterangan</label>
                <div class="col-sm-9 form-group">
                  <textarea class="form-control form-control-sm" id="keterangan" name="keterangan" maxlength="200" placeholder="Keterangan / Deskripsi"><?php echo $keterangan; ?></textarea>
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