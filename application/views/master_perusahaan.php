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
                  <a href="#" class="btn bg-gradient-lightblue"><i class="fas fa-image"></i>&ensp;Ubah Logo</a>
                  <a href="#" class="btn bg-gradient-primary"><i class="fas fa-edit"></i>&ensp;Edit Data</a>
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