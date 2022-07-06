  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-body">
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterType/proses_edit'); ?>" method="post">
              <input type="hidden" id="kode_type" name="kode_type" value="<?php echo $kode_type; ?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Type</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="type" name="type" placeholder="Nama Type" maxlength="20" value="<?php echo $type; ?>" readonly>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Luas Bangunan</label>
                <div class="col-sm-9 form-group">
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" onkeypress="return hanyaAngka(event)" value="<?php echo $luas_bangunan; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">meter</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Panjang</label>
                <div class="col-sm-9 form-group">
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="panjang" name="panjang" onkeypress="return hanyaAngka(event)" value="<?php echo $panjang; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">meter</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Lebar</label>
                <div class="col-sm-9 form-group">
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="lebar" name="lebar" onkeypress="return hanyaAngka(event)" value="<?php echo $lebar; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text">meter</span>
                    </div>
                  </div>
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