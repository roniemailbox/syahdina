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
              <i class="fas fa-plus"></i>&ensp;Tambah Type
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
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterType/proses_tambah'); ?>" method="post">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Type</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="type" name="type" placeholder="Nama Type" maxlength="20" required>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Luas Bangunan</label>
                <div class="col-sm-9 form-group">
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" onkeypress="return hanyaAngka(event)">
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
                    <input type="text" class="form-control" id="panjang" name="panjang" onkeypress="return hanyaAngka(event)">
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
                    <input type="text" class="form-control" id="lebar" name="lebar" onkeypress="return hanyaAngka(event)">
                    <div class="input-group-append">
                      <span class="input-group-text">meter</span>
                    </div>
                  </div>
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
                <h3 class="card-title"><i class="fas fa-table"></i>&ensp;Daftar Type</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table id="tabel" class="table table-bordered table-hover">
                  <thead style="font-size: 13px">
                  <?php
                  $htg = '
                          <tr style="text-align: center">
                            <th>ACTION</th>
                            <th>Type</th>
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