  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
      $dt = $this->CI->funcSubmenu($subtitle,$data_pegawai['id_pegawai']);

      if ($dt['c']!=0) {
      ?>
        <div class="card card-teal collapsed-card">
          <div class="card-header">
            <h3 class="card-title" data-card-widget="collapse" style="cursor:pointer">
              <i class="fas fa-plus"></i>&ensp;Tambah Blok Cluster
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
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterBlokCluster/proses_tambah'); ?>" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Cluster</label>
                <div class="col-sm-9 form-group">
                  <select type="text" class="form-control form-control-sm" id="kode_cluster" name="kode_cluster">
                  <?php
                  foreach ($data_cluster as $rowdcl) {
                  ?>
                  <option value="<?php echo $rowdcl->kode_cluster; ?>"><?php echo $rowdcl->nama.' '.$rowdcl->no_urut.' '.$rowdcl->alias;  ?></option>
                  <?php
                  }
                  ?>
                  </select>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Type</label>
                <div class="col-sm-9 form-group">
                  <select class="form-control select2 form-control-sm" id="kode_type" name="kode_type">
                  <?php
                  foreach ($data_type as $rowdtp) {
                  ?>
                  <option value="<?php echo $rowdtp->nama_type; ?>"><?php echo $rowdtp->nama_type; ?></option>
                  <?php
                  }
                  ?>
                  </select>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Blok</label>
                <div class="col-sm-9 form-group">
                  <select class="form-control select2 form-control-sm" id="kode_blok" name="kode_blok">
                  <?php
                  foreach ($data_blok as $rowdbl) {
                  ?>
                  <option value="<?php echo $rowdbl->blok; ?>"><?php echo $rowdbl->blok; ?></option>
                  <?php
                  }
                  ?>
                  </select>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Foto</label>
                <div class="col-sm-9 form-group">
                  <input type="file" class="form-control-file form-control-sm" id="foto" name="foto" accept="image/*" placeholder="File Foto Pegawai">
                </div>
              </div>
              <div class="form-group float-right" style="margin-top: -10px">
                <button type="submit" class="btn bg-gradient-teal"><i class="fas fa-save"></i>&ensp;Simpan</button>
              </div>
            </form>
          </div>
        </div>
      <?php
      }
      ?>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-table"></i>&ensp;Daftar Blok Cluster</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table id="tabel" class="table table-bordered table-hover">
                  <thead style="font-size: 13px">
                  <?php
                  $htg = '
                          <tr style="text-align: center">
                            <th>ACTION</th>
                            <th>Foto</th>
                            <th>Cluster</th>
                            <th>Type</th>
                            <th>Blok</th>
                          </tr>
                          ';

                  echo $htg;
                  ?>
                  </thead>
                  <tbody style="font-size: 12px">
                  <!-- isi tabel -->                
                  </tbody>
                  <tfoot style="font-size: 13px">
                  <?php echo $htg; ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->