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
                      <td>
                        <i class="nav-icon fas <?php echo $m_icon[$nn]; ?>"></i>&ensp;&ensp;<?php echo $menu[$nn]; ?>
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
                                <td style="padding-left: 3%">
                                  <i class="far fa-circle nav-icon"></i>&ensp;<?php echo $submenu[$nn][$oo]; ?></td>
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
                                          <td class="border-0" style="padding-left: 3%"><i class="far fa-dot-circle nav-icon"></i>&ensp;<?php echo $subsubmenu[$nn][$oo][$ss]; ?></td>
                                        </tr>
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
                                <td class="border-0" style="padding-left: 3%"><i class="far fa-circle nav-icon"></i>&ensp;<?php echo $submenu[$nn][$oo]; ?></td>
                              </tr>
                  <?php
                        }
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
                      <td class="border-0"><i class="nav-icon fas <?php echo $m_icon[$nn]; ?>"></i>&ensp;&ensp;<?php echo $menu[$nn]; ?></td>
                    </tr>
                  <?php
                    }
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