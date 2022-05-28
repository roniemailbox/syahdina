  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
      $dt = $this->CI->funcSubmenu($subtitle,$data_pegawai['id_pegawai']);

      if ($dt['c']!=0) {
        /*tampilan tambah perusahaan*/
      }

      if($data_perusahaan['logo']==''){
        $path_foto = base_url('img/default-foto.png');
      } else {
        $path_foto = base_url('file/perusahaan/logo/'.$data_perusahaan['logo']);
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
                        Logo Perusahaan
                      </h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <img src="<?php echo $path_foto; ?>" alt="Logo Perusahaan" style="width: 100%; border-radius: 10px">
                        <!-- <a href="#" class="btn bg-gradient-lightblue w-100 mt-2"><i class="fas fa-edit"></i>&ensp;Ubah Logo</a> -->
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
                        <label class="col-sm-3 col-form-label form-control-sm">Nama Perusahaan</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $data_perusahaan['nama_perusahaan']; ?>
                        </label>
                      </div>
                      <div class="form-group row" style="margin-top: -20px">
                        <label class="col-sm-3 col-form-label form-control-sm">Alamat</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $data_perusahaan['alamat']; ?>
                        </label>
                      </div>
                      <div class="form-group row" style="margin-top: -20px">
                        <label class="col-sm-3 col-form-label form-control-sm">No Telp</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $data_perusahaan['no_telp']; ?>
                        </label>
                      </div>
                      <div class="form-group row" style="margin-top: -20px">
                        <label class="col-sm-3 col-form-label form-control-sm">Keterangan</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $data_perusahaan['keterangan']; ?>
                        </label>
                      </div>
                      <!-- <p>
                        <a href="#" class="btn bg-gradient-primary"><i class="fas fa-edit"></i>&ensp;Ubah Data</a>
                      </p> -->
                    </div>
                  </div>
                <!-- Akhir Bagian Rinci -->
                </div>
                <div class="col-12 text-center">
                  <a href="#" class="btn bg-gradient-lightblue" data-toggle="modal" data-target="#modal-foto"><i class="fas fa-image"></i>&ensp;Ubah Logo</a>
                  <a href="#" class="btn bg-gradient-primary" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit"></i>&ensp;Edit Data</a>
                </div>
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
        <h6 class="modal-title">Logo Perusahaan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form" class="form-horizontal" action="<?php echo site_url('MasterPerusahaan/proses_foto'); ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" id="id_perusahaan" name="id_perusahaan" value="<?php echo $data_perusahaan['id_perusahaan']; ?>">
          <div class="form-group row text-center">
            <img src="<?php echo $path_foto; ?>" class="col-sm-12" style="width: 100px; height: auto">
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">File Logo</label>
            <div class="col-sm-9 form-group">
              <input type="file" class="form-control-file form-control-sm" id="logo" name="logo" placeholder="File Logo" accept="image/*">
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
        <h6 class="modal-title">Edit Data Perusahaan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('MasterPerusahaan/proses_edit'); ?>" method="post">
          <input type="hidden" id="id_perusahaan" name="id_perusahaan" value="<?php echo $data_perusahaan['id_perusahaan']; ?>">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Perusahaan</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" maxlength="100" value="<?php echo $data_perusahaan['nama_perusahaan']; ?>" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Alamat</label>
            <div class="col-sm-9 form-group">
              <textarea class="form-control form-control-sm" id="alamat" name="alamat" placeholder="Alamat" maxlength="200"><?php echo $data_perusahaan['alamat']; ?></textarea>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">No Telp</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="no_telp" name="no_telp" placeholder="08XXXXXXXX" maxlength="15" value="<?php echo $data_perusahaan['no_telp']; ?>">
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Keterangan</label>
            <div class="col-sm-9 form-group">
              <textarea class="form-control form-control-sm" id="keterangan" name="keterangan" placeholder="Keterangan / Deskripsi" maxlength="200"><?php echo $data_perusahaan['keterangan']; ?></textarea>
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