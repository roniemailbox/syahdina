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
              <i class="fas fa-plus"></i>&ensp;Tambah Jabatan
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
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterJabatan/proses_tambah'); ?>" method="post">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Nama Jabatan</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="nama_jabatan" name="nama_jabatan" placeholder="Nama Jabatan" maxlength="30" required>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Standard Requirement</label>
                <div class="col-sm-9 form-group">
                  <textarea class="form-control form-control-sm" id="sr" name="sr" placeholder="Deskripsi" style="white-space: pre-line;"></textarea>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Job Description</label>
                <div class="col-sm-9 form-group">
                  <textarea class="form-control form-control-sm" id="jd" name="jd" placeholder="Deskripsi" style="white-space: pre-line;"></textarea>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Keterangan</label>
                <div class="col-sm-9 form-group">
                  <textarea class="form-control form-control-sm" id="keterangan" name="keterangan" placeholder="Optional" maxlength="40"></textarea>
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
                <h3 class="card-title"><i class="fas fa-table"></i>&ensp;Daftar Jabatan</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table id="tabel" class="table table-bordered table-hover">
                  <thead style="font-size: 13px">
                  <?php
                  $htg = '
                          <tr style="text-align: center">
                            <th>ACTION</th>
                            <th>Nama Jabatan</th>
                            <th>Keterangan</th>
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