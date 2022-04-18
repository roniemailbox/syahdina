  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default collapsed-card">
          <div class="card-header">
            <h3 class="card-title" data-card-widget="collapse">
              Tambah Menu
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

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