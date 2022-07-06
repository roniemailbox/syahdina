  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
      $dt = $this->CI->funcSubmenu($subtitle,$data_pegawai['id_pegawai']);

      foreach ($data_blok_cluster as $rowdbc) {
      ?>
        <div class="card card-teal collapsed-card">
          <div class="card-header">
            <h3 class="card-title" data-card-widget="collapse" style="cursor:pointer">
              <i class="fas fa-plus"></i>&ensp;<?php echo $rowdbc->nama.' '.$rowdbc->no_urut.' '.$rowdbc->alias.' <strong>('.$rowdbc->kode_cluster.')</strong>';  ?>
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php
          if ($dt['c']!=0) {
          ?>
            <div class="card card-warning collapsed-card">
              <div class="card-header">
                <h3 class="card-title" data-card-widget="collapse" style="cursor:pointer">
                  <i class="fas fa-plus"></i>&ensp;Tambah Unit
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body pb-1">
                <form id="form" class="form-horizontal" action="<?php echo site_url('MasterBlokCluster/proses_tbc'); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="kode_cluster" name="kode_cluster" value="<?php echo $rowdbc->kode_cluster; ?>">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-sm">Type</label>
                    <div class="col-sm-9 form-group">
                      <select type="text" class="form-control form-control-sm" id="kode_type" name="kode_type">
                      <?php
                      foreach ($data_type as $rowdtp) {
                      ?>
                      <option value="<?php echo $rowdtp->kode_type; ?>"><?php echo $rowdtp->nama_type; ?></option>
                      <?php
                      }
                      ?>
                      </select>
                    </div>
                    <label class="col-sm-3 col-form-label form-control-sm">Blok</label>
                    <div class="col-sm-9 form-group">
                      <select type="text" class="form-control form-control-sm" id="kode_blok" name="kode_blok">
                      <?php
                      foreach ($data_blok as $rowdbl) {
                      ?>
                      <option value="<?php echo $rowdbl->kode_blok; ?>"><?php echo $rowdbl->blok; ?></option>
                      <?php
                      }
                      ?>
                      </select>
                    </div>
                    <label class="col-sm-3 col-form-label form-control-sm">Foto</label>
                    <div class="col-sm-9 form-group">
                      <input type="file" class="form-control-file form-control-sm" id="gambar" name="gambar" accept="image/*" placeholder="File Foto Unit">
                    </div>
                  </div>
                  <div class="form-group float-right" style="margin-top: -10px">
                    <button type="submit" class="btn bg-gradient-warning btn-sm"><i class="fas fa-save"></i>&ensp;Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          <?php
          }
          ?>
          </div>
        </div>
      <?php
      }
      ?>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->