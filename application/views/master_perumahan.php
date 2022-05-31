  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
      if($data_perumahan['gambar']==''){
        $path_foto = base_url('img/default-foto.png');
      } else {
        $path_foto = base_url('file/perumahan/gambar/'.$data_perumahan['gambar']);
      }
      ?>

        <div class="row">
          <div class="col-12">
            <div class="card pt-3 pl-3 pr-3 pb-2">
              <div class="row">
                <div class="col-md-3">
                <!-- Bagian Foto -->
                  <div class="card card-default color-palette-box">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-image"></i>
                        Gambar Perumahan
                      </h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <img src="<?php echo $path_foto; ?>" alt="Gambar Perumahan" style="width: 100%; border-radius: 10px">
                        <!-- <a href="#" class="btn bg-gradient-lightblue w-100 mt-2"><i class="fas fa-edit"></i>&ensp;Ubah gambar</a> -->
                      </div>
                    </div>
                  </div>
                <!-- Akhir Bagian Foto -->
                </div>
                <div class="col-md-9">
                <!-- Bagian Rinci -->
                  <div class="card card-default color-palette-box">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-list"></i>
                        Data Rinci
                      </h3>
                    </div>
                    <div class="card-body text-left">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label form-control-sm">Nama Perumahan</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $data_perumahan['nama']; ?>
                        </label>
                      </div>
                      <div class="form-group row" style="margin-top: -20px">
                        <label class="col-sm-3 col-form-label form-control-sm">Alamat</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $data_perumahan['alamat']; ?>
                        </label>
                      </div>
                      <div class="form-group row" style="margin-top: -20px">
                        <label class="col-sm-3 col-form-label form-control-sm">No Telp</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $data_perumahan['no_telp']; ?>
                        </label>
                      </div>
                      <!-- <div class="form-group row" style="margin-top: -20px">
                        <label class="col-sm-3 col-form-label form-control-sm">Status</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php
                        if($data_perumahan['status']) {
                        ?>
                          <small class="badge bg-primary btn-flat mt-1">Aktif</small>
                        <?php
                        } else {
                        ?>
                          <small class="badge bg-danger btn-flat mt-1">Non-Aktif</small>
                        <?php
                        }
                        ?>
                        </label>
                      </div> -->
                      <div class="form-group row" style="margin-top: -20px">
                        <label class="col-sm-3 col-form-label form-control-sm">Keterangan</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $data_perumahan['keterangan']; ?>
                        </label>
                      </div>
                      <!-- <p>
                        <a href="#" class="btn bg-gradient-primary"><i class="fas fa-edit"></i>&ensp;Ubah Data</a>
                      </p> -->
                    </div>
                  </div>
                <!-- Akhir Bagian Rinci -->
                </div>
                <?php
                $dt = $this->CI->funcSubmenu($subtitle,$data_pegawai['id_pegawai']);
                
                if ($dt['u']!=0) {
                ?>
                <div class="col-12 text-center">
                  <a href="#" class="btn bg-gradient-lightblue" data-toggle="modal" data-target="#modal-foto"><i class="fas fa-image"></i>&ensp;Ubah gambar</a>
                  <a href="#" class="btn bg-gradient-primary" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i>&ensp;Edit Data</a>
                </div>
                <?php
                }
                ?>
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

<div class="modal fade mt-4" id="modal-foto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Gambar Perumahan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form" class="form-horizontal" action="<?php echo site_url('MasterPerumahan/proses_foto'); ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" id="id_perumahan" name="id_perumahan" value="<?php echo $data_perumahan['id_perumahan']; ?>">
          <div class="form-group row text-center">
            <img src="<?php echo $path_foto; ?>" class="col-sm-12" style="width: 100px; height: auto">
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">File Gambar</label>
            <div class="col-sm-9 form-group">
              <input type="file" class="form-control-file form-control-sm" id="gambar" name="gambar" placeholder="File Gambar" accept="image/*">
            </div>
          </div>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <button type="submit" class="btn bg-gradient-lightblue btn-xs" id="btnGL" name="btnGL"><i class="fas fa-save"></i>&ensp;Simpan Perubahan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade mt-4" id="modal-edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Edit Data Perumahan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('MasterPerumahan/proses_edit'); ?>" method="post">
          <input type="hidden" id="id_perumahan" name="id_perumahan" value="<?php echo $data_perumahan['id_perumahan']; ?>">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Perumahan</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Perumahan" maxlength="100" value="<?php echo $data_perumahan['nama']; ?>" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Alamat</label>
            <div class="col-sm-9 form-group">
              <textarea class="form-control form-control-sm" id="alamat" name="alamat" placeholder="Alamat" maxlength="200"><?php echo $data_perumahan['alamat']; ?></textarea>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">No Telp</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="no_telp" name="no_telp" placeholder="08XXXXXXXX" maxlength="15" value="<?php echo $data_perumahan['no_telp']; ?>">
            </div>
          </div>
          <!-- <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Status</label>
            <div class="col-sm-9 form-group">
              
            </div>
          </div> -->
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Keterangan</label>
            <div class="col-sm-9 form-group">
              <textarea class="form-control form-control-sm" id="keterangan" name="keterangan" placeholder="Keterangan / Deskripsi" maxlength="200"><?php echo $data_perumahan['keterangan']; ?></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <button type="submit" class="btn bg-gradient-primary btn-xs"><i class="fas fa-save"></i>&ensp;Simpan Perubahan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->