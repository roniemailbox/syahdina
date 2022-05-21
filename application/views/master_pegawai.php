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
              <i class="fas fa-plus"></i>&ensp;Tambah Pegawai
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
            <form id="form" class="form-horizontal" action="<?php echo site_url('MasterPegawai/proses_tambah'); ?>" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Nama Lengkap</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Pegawai" maxlength="100" required>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Alamat</label>
                <div class="col-sm-9 form-group">
                  <textarea class="form-control form-control-sm" id="alamat" name="alamat" placeholder="Alamat Lengkap" maxlength="200"></textarea>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Jenis Kelamin</label>
                <div class="col-sm-9 form-group">
                  <div class="form-check d-inline">
                    <input class="form-check-input" type="radio" id="rbJK" name="rbJK" value="L" checked>
                    <label class="form-check-label">Laki - laki</label>
                  </div>&ensp;
                  <div class="form-check d-inline">
                    <input class="form-check-input" type="radio" id="rbJK" name="rbJK" value="P">
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
                      <option value="<?php echo $rowdjb->id_jabatan; ?>"><?php echo $rowdjb->nama_jabatan; ?></option>
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
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Status</label>
                <div class="col-sm-9 form-group">
                  <select class="form-control select2 form-control-sm" id="status" name="status">
                    <option value="">-</option>
                    <option value="Tetap">Tetap</option>
                    <option value="Probotion">Probotion</option>
                  </select>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Username</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Username" maxlength="10" required>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Password</label>
                <div class="col-sm-9 form-group">
                  <input type="password" class="form-control form-control-sm" id="psw" name="psw" placeholder="Password" maxlength="10" required>
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
                <h3 class="card-title"><i class="fas fa-table"></i>&ensp;Daftar Pegawai</h3>
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
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Status</th>
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