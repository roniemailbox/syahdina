  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-teal collapsed-card">
          <div class="card-header">
            <h3 class="card-title" data-card-widget="collapse" style="cursor:pointer">
              <i class="fas fa-plus"></i>&ensp;Tambah Menu
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
            <form id="form" class="form-horizontal" action="<?php echo site_url('Akses/proses_tambah_menu'); ?>" method="post">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label form-control-sm">Nama Menu</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="menu" name="menu" placeholder="Nama Menu" maxlength="100" required>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Link</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="link" name="link" placeholder="Link" maxlength="100" required>
                </div>
              </div>
              <div class="form-group row" style="margin-top: -20px">
                <label class="col-sm-3 col-form-label form-control-sm">Icon</label>
                <div class="col-sm-9 form-group">
                  <input type="text" class="form-control form-control-sm" id="icon" name="icon" placeholder="Icon" maxlength="100" required>
                </div>
              </div>
              <div class="form-group float-right" style="margin-top: -10px">
                <button type="submit" class="btn bg-gradient-teal"><i class="fas fa-save"></i>&ensp;Simpan</button>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-table"></i>&ensp;Data Menu</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body p-0">
                <table class="table table-hover">
                  <tbody>
                  <?php
                  for ($nn=1; $nn <= $jum_menu ; $nn++) {
                    if ($jumjf[$nn]!=0) {
                      $tanda = TRUE;
                    } else {
                      $tanda = FALSE;
                    }

                    if ($tanda==TRUE) {
                  ?>
                    <tr data-widget="expandable-table" aria-expanded="true">
                      <td class="icon-tools">
                        <i class="nav-icon <?php echo $m_icon[$nn]; ?>"></i>&ensp;&ensp;<?php echo $menu[$nn]; ?>&ensp;
                        <?php
                        if ($m_status[$nn]==1) {
                        ?>
                          <small class="badge bg-primary btn-flat mt-1">Aktif</small>
                        <?php
                        } else {
                        ?>
                          <small class="badge bg-danger btn-flat mt-1">Non-Aktif</small>
                        <?php
                        }
                        ?>
                        &ensp;
                        <a href="#" class="text-success o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Tambah Submenu" data-target="#modal-tb<?php echo $kode_menu[$nn]; ?>">
                          <i class="fas fa-plus"></i>
                        </a>
                        <a href="#" class="text-primary o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-em<?php echo $kode_menu[$nn]; ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="text-danger o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus"data-target="#modal-hm<?php echo $kode_menu[$nn]; ?>">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <tr class="expandable-body">
                      <td>
                        <div class="p-0">
                          <table class="table table-hover">
                            <tbody>
                  <?php
                      for ($oo=1; $oo <= $jumjf[$nn] ; $oo++) {
                        if ($jumji[$nn][$oo]!=0) {
                          $tanda2 = TRUE;
                        } else {
                          $tanda2 = FALSE;
                        }

                        if ($tanda2==TRUE) {
                  ?>
                              <tr data-widget="expandable-table" aria-expanded="true">
                                <td class="icon-tools" style="padding-left: 3%">
                                  <i class="far fa-circle nav-icon"></i>&ensp;<?php echo $submenu[$nn][$oo]; ?>&ensp;
                                  <?php
                                  if ($s_status[$nn][$oo]==1) {
                                  ?>
                                    <small class="badge bg-primary btn-flat mt-1">Aktif</small>
                                  <?php
                                  } else {
                                  ?>
                                    <small class="badge bg-danger btn-flat mt-1">Non-Aktif</small>
                                  <?php
                                  }
                                  ?>
                                  &ensp;
                                  <a href="#" class="text-success o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Tambah Subsubmenu" data-target="#modal-tsb<?php echo $kode_submenu[$nn][$oo]; ?>">
                                    <i class="fas fa-plus"></i>
                                  </a>
                                  <a href="#" class="text-primary o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-esm<?php echo $kode_submenu[$nn][$oo]; ?>">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  <a href="#" class="text-danger o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hsm<?php echo $kode_submenu[$nn][$oo]; ?>">
                                    <i class="fas fa-trash"></i>
                                  </a>
                                </td>
                              </tr>
                              <tr class="expandable-body">
                                <td>
                                  <div class="p-0">
                                    <table class="table table-hover">
                                      <tbody>
                  <?php
                          for ($ss=1; $ss <= $jumji[$nn][$oo] ; $ss++) {
                  ?>
                                        <tr>
                                          <td class="border-0 icon-tools" style="padding-left: 3%"><i class="far fa-dot-circle nav-icon"></i>&ensp;<?php echo $subsubmenu[$nn][$oo][$ss]; ?>&ensp;
                                            <?php
                                            if ($ss_status[$nn][$oo][$ss]==1) {
                                            ?>
                                              <small class="badge bg-primary btn-flat mt-1">Aktif</small>
                                            <?php
                                            } else {
                                            ?>
                                              <small class="badge bg-danger btn-flat mt-1">Non-Aktif</small>
                                            <?php
                                            }
                                            ?>
                                            &ensp;
                                            <a href="#" class="text-primary o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-ess<?php echo $kode_subsubmenu[$nn][$oo][$ss]; ?>">
                                              <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="text-danger o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hss<?php echo $kode_subsubmenu[$nn][$oo][$ss]; ?>">
                                              <i class="fas fa-trash"></i>
                                            </a>
                                          </td>
                                        </tr>

<div class="modal fade mt-4" id="modal-ess<?php echo $kode_subsubmenu[$nn][$oo][$ss]; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Edit Data Subsubmenu</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Akses/proses_edit_subsubmenu'); ?>" method="post">
          <input type="hidden" id="kode_subsubmenu" name="kode_subsubmenu" value="<?php echo $kode_subsubmenu[$nn][$oo][$ss]; ?>">
          <input type="hidden" id="kode_submenu" name="kode_submenu" value="<?php echo $kode_submenu[$nn][$oo]; ?>">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Menu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="menu" name="menu" placeholder="Nama Menu" maxlength="100" value="<?php echo $menu[$nn]; ?>" readonly>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Submenu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="submenu" name="submenu" placeholder="Nama Submenu" maxlength="100" value="<?php echo $submenu[$nn][$oo]; ?>" readonly>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Subsubmenu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="subsubmenu" name="subsubmenu" placeholder="Nama Subsubmenu" maxlength="100" value="<?php echo $subsubmenu[$nn][$oo][$ss]; ?>" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Link</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="link" name="link" placeholder="Link" maxlength="100" value="<?php echo $ss_link[$nn][$oo][$ss]; ?>" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px; margin-bottom: -10px">
            <label class="col-sm-3 col-form-label form-control-sm">Status</label>
            <div class="col-sm-9 form-group">
              <select class="form-control form-control-sm" id="status_aktif" name="status_aktif">
                <option value="1" <?php if ($ss_status[$nn][$oo][$ss]==1) {echo 'selected';} ?>>Aktif</option>
                <option value="0" <?php if ($ss_status[$nn][$oo][$ss]==0) {echo 'selected';} ?>>Non-Aktif</option>
              </select>
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

<div class="modal fade mt-4" id="modal-hss<?php echo $kode_subsubmenu[$nn][$oo][$ss]; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Hapus Data Subsubmenu</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus subsubmenu <b><?php echo $subsubmenu[$nn][$oo][$ss]; ?></b> ?<br></p>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <a href="<?php echo site_url('Akses/proses_hapus_subsubmenu/'.$kode_subsubmenu[$nn][$oo][$ss]); ?>" class="btn bg-gradient-danger btn-xs"><i class="fas fa-check"></i>&ensp;Ya !</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
                  <?php
                          }
                  ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                  <?php
                        } else {
                  ?>
                              <tr>
                                <td class="border-0 icon-tools" style="padding-left: 3%">
                                  <i class="far fa-circle nav-icon"></i>&ensp;<?php echo $submenu[$nn][$oo]; ?>&ensp;
                                  <?php
                                  if ($s_status[$nn][$oo]==1) {
                                  ?>
                                    <small class="badge bg-primary btn-flat mt-1">Aktif</small>
                                  <?php
                                  } else {
                                  ?>
                                    <small class="badge bg-danger btn-flat mt-1">Non-Aktif</small>
                                  <?php
                                  }
                                  ?>
                                  &ensp;
                                  <a href="#" class="text-success o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Tambah Subsubmenu" data-target="#modal-tsb<?php echo $kode_submenu[$nn][$oo]; ?>">
                                    <i class="fas fa-plus"></i>
                                  </a>
                                  <a href="#" class="text-primary o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-esm<?php echo $kode_submenu[$nn][$oo]; ?>">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  <a href="#" class="text-danger o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hsm<?php echo $kode_submenu[$nn][$oo]; ?>">
                                    <i class="fas fa-trash"></i>
                                  </a>
                                </td>
                              </tr>
                  <?php
                        }
                  ?>
<div class="modal fade mt-4" id="modal-tsb<?php echo $kode_submenu[$nn][$oo]; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Tambah Subsubmenu</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Akses/proses_tambah_subsubmenu'); ?>" method="post">
          <input type="hidden" id="kode_submenu" name="kode_submenu" value="<?php echo $kode_submenu[$nn][$oo]; ?>">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Menu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="menu" name="menu" placeholder="Nama Menu" maxlength="100" value="<?php echo $menu[$nn]; ?>" readonly>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Submenu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="submenu" name="submenu" placeholder="Nama Submenu" maxlength="100" value="<?php echo $submenu[$nn][$oo]; ?>" readonly>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Subsubmenu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="subsubmenu" name="subsubmenu" placeholder="Nama Subsubmenu" maxlength="100" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Link</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="link" name="link" placeholder="Link" maxlength="100" required>
            </div>
          </div>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <button type="submit" class="btn bg-gradient-teal btn-xs"><i class="fas fa-save"></i>&ensp;Simpan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade mt-4" id="modal-esm<?php echo $kode_submenu[$nn][$oo]; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Edit Data Submenu</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Akses/proses_edit_submenu'); ?>" method="post">
          <input type="hidden" id="kode_submenu" name="kode_submenu" value="<?php echo $kode_submenu[$nn][$oo]; ?>">
          <input type="hidden" id="kode_menu" name="kode_menu" value="<?php echo $kode_menu[$nn]; ?>">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Menu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="menu" name="menu" placeholder="Nama Menu" maxlength="100" value="<?php echo $menu[$nn]; ?>" readonly>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Submenu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="submenu" name="submenu" placeholder="Nama Submenu" maxlength="100" value="<?php echo $submenu[$nn][$oo]; ?>" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Link</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="link" name="link" placeholder="Link" maxlength="100" value="<?php echo $s_link[$nn][$oo]; ?>" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px; margin-bottom: -10px">
            <label class="col-sm-3 col-form-label form-control-sm">Status</label>
            <div class="col-sm-9 form-group">
              <select class="form-control form-control-sm" id="status_aktif" name="status_aktif">
                <option value="1" <?php if ($s_status[$nn][$oo]==1) {echo 'selected';} ?>>Aktif</option>
                <option value="0" <?php if ($s_status[$nn][$oo]==0) {echo 'selected';} ?>>Non-Aktif</option>
              </select>
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

<div class="modal fade mt-4" id="modal-hsm<?php echo $kode_submenu[$nn][$oo]; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Hapus Data Submenu</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus submenu <b><?php echo $submenu[$nn][$oo]; ?></b> ?<br></p>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <a href="<?php echo site_url('Akses/proses_hapus_submenu/'.$kode_submenu[$nn][$oo]); ?>" class="btn bg-gradient-danger btn-xs"><i class="fas fa-check"></i>&ensp;Ya !</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
                  <?php
                      }
                  ?>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                  <?php
                    } else {
                  ?>
                    <tr>
                      <td class="border-0 icon-tools">
                          <i class="nav-icon <?php echo $m_icon[$nn]; ?>"></i>&ensp;&ensp;<?php echo $menu[$nn]; ?>&ensp;
                          <?php
                          if ($m_status[$nn]==1) {
                          ?>
                            <small class="badge bg-primary btn-flat mt-1">Aktif</small>
                          <?php
                          } else {
                          ?>
                            <small class="badge bg-danger btn-flat mt-1">Non-Aktif</small>
                          <?php
                          }
                          ?>
                          &ensp;
                          <a href="#" class="text-success o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Tambah Submenu" data-target="#modal-tb<?php echo $kode_menu[$nn]; ?>">
                            <i class="fas fa-plus"></i>
                          </a>
                          <a href="#" class="text-primary o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-em<?php echo $kode_menu[$nn]; ?>">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="#" class="text-danger o" onmouseover="$(this).tooltip(show)" onmouseout="$(this).tooltip(hide)" onblur="$(this).tooltip(hide)" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hm<?php echo $kode_menu[$nn]; ?>">
                            <i class="fas fa-trash"></i>
                          </a>
                      </td>
                    </tr>
                  <?php
                    }
                  ?>
<div class="modal fade mt-4" id="modal-tb<?php echo $kode_menu[$nn]; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Tambah Submenu</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Akses/proses_tambah_submenu'); ?>" method="post">
          <input type="hidden" id="kode_menu" name="kode_menu" value="<?php echo $kode_menu[$nn]; ?>">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Menu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="menu" name="menu" placeholder="Nama Menu" maxlength="100" value="<?php echo $menu[$nn]; ?>" readonly>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Submenu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="submenu" name="submenu" placeholder="Nama Submenu" maxlength="100" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Link</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="link" name="link" placeholder="Link" maxlength="100" required>
            </div>
          </div>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <button type="submit" class="btn bg-gradient-teal btn-xs"><i class="fas fa-save"></i>&ensp;Simpan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade mt-4" id="modal-em<?php echo $kode_menu[$nn]; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Edit Data Menu</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Akses/proses_edit_menu'); ?>" method="post">
          <input type="hidden" id="kode_menu" name="kode_menu" value="<?php echo $kode_menu[$nn]; ?>">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label form-control-sm">Nama Menu</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="menu" name="menu" placeholder="Nama Menu" maxlength="100" value="<?php echo $menu[$nn]; ?>" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Link</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="link" name="link" placeholder="Link" maxlength="100" value="<?php echo $m_link[$nn]; ?>" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px">
            <label class="col-sm-3 col-form-label form-control-sm">Icon</label>
            <div class="col-sm-9 form-group">
              <input type="text" class="form-control form-control-sm" id="icon" name="icon" placeholder="Icon" maxlength="100" value="<?php $jmn = strlen($m_icon[$nn]); $ambil[$nn] = $jmn - 6; echo substr($m_icon[$nn], 7); ?>" required>
            </div>
          </div>
          <div class="form-group row" style="margin-top: -20px; margin-bottom: -10px">
            <label class="col-sm-3 col-form-label form-control-sm">Status</label>
            <div class="col-sm-9 form-group">
              <select class="form-control form-control-sm" id="status_aktif" name="status_aktif">
                <option value="1" <?php if ($m_status[$nn]==1) {echo 'selected';} ?>>Aktif</option>
                <option value="0" <?php if ($m_status[$nn]==0) {echo 'selected';} ?>>Non-Aktif</option>
              </select>
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

<div class="modal fade mt-4" id="modal-hm<?php echo $kode_menu[$nn]; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Hapus Data Menu</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus menu <b><?php echo $menu[$nn]; ?></b> ?<br></p>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn bg-gradient-secondary btn-xs" data-dismiss="modal" aria-label="Close">Batal</button>
        <a href="<?php echo site_url('Akses/proses_hapus_menu/'.$kode_menu[$nn]); ?>" class="btn bg-gradient-danger btn-xs"><i class="fas fa-check"></i>&ensp;Ya !</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
                  <?php
                  }
                  ?>                    
                  </tbody>
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