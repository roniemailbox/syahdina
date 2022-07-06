  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-body">
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterCluster/proses_edit'); ?>" method="post">
              <input type="hidden" id="kode_cluster" name="kode_cluster" value="<?php echo $kode_cluster; ?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Cluster</label>
                <div class="col-sm-9 form-group">
                  <div class="input-group input-group-sm">
                    <div class="input-group-append">
                      <span class="input-group-text"><?php echo $nama.' '.$no_urut; ?></span>
                    </div>
                    <input type="text" class="form-control" id="alias" name="alias" maxlength="60" placeholder="Nama Cluster" value="<?php echo $alias; ?>" required>
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