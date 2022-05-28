  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- Profile Image -->
            <div class="card col-12">
              <div class="card-body box-profile">
                <div class="text-center">
                <?php
                if ($data_pegawai['foto']=='') {
                  $letter = substr($data_pegawai['nama'], 0, 1);
                  $path_foto = base_url('img/'.$letter.'.png');
                } else {
                  $path_foto = base_url('file/petugas/foto_profil/'.$data_pegawai['foto']);
                }
                ?>
                  <a href="#" data-toggle="modal" data-target="#modal-foto">
                    <img src="<?php echo $path_foto; ?>" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                  </a>
                </div>

                <h4 class="profile-username text-center"><?php echo $data_pegawai['nama']; ?></h4>

                <hr>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label form-control-sm">ID</label>
                  <div class="col-sm-10 form-group text-teal">
                    <label><?php echo $data_pegawai['id_pegawai']; ?></label>
                  </div>
                </div>
                <div class="form-group row" style="margin-top: -15px">
                  <label class="col-sm-2 col-form-label form-control-sm">Alamat</label>
                  <div class="col-sm-10 form-group">
                    <?php if($data_pegawai['alamat']=='') { echo "-"; } else { echo $data_pegawai['alamat']; } ?>
                  </div>
                </div>
                <div class="form-group row" style="margin-top: -15px">
                  <label class="col-sm-2 col-form-label form-control-sm">Jenis Kelamin</label>
                  <div class="col-sm-10 form-group">
                    <?php
                    if ($data_pegawai['jk']=='L') {
                      echo "Laki-laki";
                    } else {
                      echo "Perempuan";
                    }
                    ?>
                  </div>
                </div>
                <div class="form-group row" style="margin-top: -15px">
                  <label class="col-sm-2 col-form-label form-control-sm">Jabatan</label>
                  <div class="col-sm-10 form-group">
                    <?php if($data_pegawai['nama_jabatan']=='') { echo "-"; } else { echo $data_pegawai['nama_jabatan']; } ?>
                  </div>
                </div>
                <div class="form-group row" style="margin-top: -15px">
                  <label class="col-sm-2 col-form-label form-control-sm">Username</label>
                  <div class="col-sm-10 form-group">
                    <?php if($data_pegawai['username']=='') { echo "-"; } else { echo $data_pegawai['username']; } ?>
                  </div>
                </div>

                <hr>

                <div class="form-group row">
                  <div class="col-sm-10 pt-1">
                    <a href="#" class="btn bg-gradient-teal btn-block" data-toggle="modal" data-target="#modal-edit"><b><i class="fas fa-edit"></i>&ensp;Edit Profil</b></a>
                  </div>
                  <div class="col-sm-2 pt-1">
                    <a href="#" class="btn bg-gradient-fuchsia btn-block" data-toggle="modal" data-target="#modal-password"><b><i class="fas fa-key"></i>&ensp;Ganti Password</b></a>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<div class="modal fade mt-4" id="modal-foto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Foto Profil</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form" class="form-horizontal" action="<?php echo site_url('Beranda/proses_foto'); ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" id="id_petugas" name="id_petugas" value="<?php echo $data_petugas['id_petugas']; ?>">
          <div class="form-group row text-center">
            <img src="<?php echo $path_foto; ?>" class="col-sm-12" style="width: 100px; height: auto">
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">File Foto</label>
            <div class="col-sm-9 form-group">
              <input type="file" class="form-control-file form-control-sm" id="foto" name="foto" placeholder="File Foto Baru" accept="image/*">
            </div>
          </div>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <button type="submit" class="btn bg-gradient-warning btn-xs" id="btnGP" name="btnGP"><i class="fas fa-save"></i>&ensp;Simpan Perubahan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->