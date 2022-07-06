  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
      if($gambar==''){
        $path_foto = base_url('img/default-foto.png');
      } else {
        $path_foto = base_url('file/blok_cluster/gambar/'.$gambar);
      }
      ?>

        <div class="row">
          <div class="col-12">
            <div class="card pt-3 pl-3 pr-3 pb-3">
              <div class="row">
                <div class="col-md-4">
                <!-- Bagian Foto -->
                  <div class="card card-default color-palette-box">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-image"></i>
                        Foto Blok Cluster
                      </h3>
                    </div>
                    <div class="card-body pb-2">
                      <div class="form-group">
                        <img src="<?php echo $path_foto; ?>" alt="Logo Blok Cluster" style="width: 100%; border-radius: 10px">
                        <!-- <a href="#" class="btn bg-gradient-lightblue w-100 mt-2"><i class="fas fa-edit"></i>&ensp;Ubah Logo</a> -->
                      </div>
                <?php
                $dt = $this->CI->funcSubmenu($alternate,$data_pegawai['id_pegawai']);
                
                if ($dt['u']!=0) {
                ?>
                    <form action="<?php echo site_url('MasterBlokCluster/proses_foto'); ?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" id="kode_bc" name="kode_bc" value="<?php echo($kode_bc); ?>">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label form-control-sm">Foto</label>
                        <div class="col-sm-9 form-group">
                          <input type="file" class="form-control-file form-control-sm" id="gambar" name="gambar" accept="image/*" placeholder="File Foto Blok Cluster">
                        </div>
                      </div>
                      <div class="form-group" style="margin-top: -10px">
                        <button type="submit" class="btn bg-gradient-indigo btn-block"><i class="fas fa-save"></i>&ensp;Simpan Perubahan</button>
                      </div>
                    </form>
                <?php
                }
                ?>
                    </div>
                  </div>
                <!-- Akhir Bagian Foto -->
                </div>
                <div class="col-md-8">
                <!-- Bagian Rinci -->
                  <div class="card card-default color-palette-box">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-list"></i>
                        Form Detail
                      </h3>
                    </div>
                    <div class="card-body text-left">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label form-control-sm">Cluster</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $nama_cluster; ?>
                        </label>
                      </div>
                      <div class="form-group row" style="margin-top: -20px">
                        <label class="col-sm-3 col-form-label form-control-sm">Type</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $type; ?>
                        </label>
                      </div>
                      <div class="form-group row" style="margin-top: -20px">
                        <label class="col-sm-3 col-form-label form-control-sm">Blok</label>
                        <label class="col-sm-9 col-form-label form-control-sm" style="font-weight: normal">
                        <?php echo $blok; ?>
                        </label>
                      </div>
                    </div>
                  </div>
                <!-- Akhir Bagian Rinci -->
                </div>
                <div class="col-12 text-center">
                  <a href="<?php echo site_url('MasterBlokCluster') ?>" class="btn bg-gradient-secondary"><i class="fas fa-arrow-left"></i>&ensp;Kembali</a>
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