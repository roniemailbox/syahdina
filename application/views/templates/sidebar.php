  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-light bg-teal elevation-4 text-sm">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('Beranda'); ?>" class="brand-link navbar-teal">
      <img src="<?php echo base_url('img/logo.png') ?>" alt="Korwil Ngawi Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><h6>SYAHDINA</h6></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          if ($data_pegawai['foto']=='') {
            $letter = substr($data_pegawai['nama'], 0, 1);
            $path_foto = base_url('img/'.$letter.'.png');
          } else {
            $path_foto = base_url('file/pegawai/'.$data_pegawai['foto']);
          }
          ?>
          <img src="<?php echo $path_foto; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-light"><?php echo ucwords($data_pegawai['nama']); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
          foreach ($menu as $rowmnu) {
          
            if($rowmnu->menu != "") {
          ?>
          <li class="nav-item">
            <a href="<?php echo site_url($rowmnu->link); ?>" class="nav-link <?php if($ttl==$rowmnu->menu) { echo 'active'; } else { echo 'text-light'; } ?>">
              <i class="nav-icon fas <?php echo $rowmnu->icon; ?>"></i>
              <p>
                <?php
                echo $rowmnu->menu;

                foreach ($submenu as $rowsmn) {
                  if ($rowsmn->kode_menu==$rowmnu->kode_menu) {
                    $tanda = '<i class="right fas fa-angle-left"></i>';
                  } else {
                    $tanda = '';
                  }
                }

                echo $tanda;
                ?>
              </p>
            </a>
          <?php
              foreach ($submenu as $rowsmn) {
          ?>
            <ul class="nav nav-treeview ml-2">
          <?php
                if ($rowsmn->kode_menu==$rowmnu->kode_menu) {
          ?>
              <li class="nav-item">
                <a href="<?php echo site_url($rowsmn->link); ?>" class="nav-link <?php if($ttl==$rowmnu->submenu) { echo 'text-light active'; } else { echo 'text-light'; }  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
          <?php
                  echo $rowsmn->submenu;

                  $h=1;

                  foreach ($subsubmenu as $rowssm) {
                    if ($rowssm->kode_submenu==$rowsmn->kode_submenu) {
                      $tanda2 = '<i class="right fas fa-angle-left"></i>';
                    } else {
                      $tanda2 = '';
                    }
                  }

                  echo $tanda2;
          ?>
                  </p>
                </a>
          <?php
                  foreach ($subsubmenu as $rowssm) {
          ?>
                <ul class="nav nav-treeview ml-2">
          <?php
                    if ($rowssm->kode_submenu==$rowsmn->kode_submenu) {
          ?>
                  <li class="nav-item">
                    <a href="<?php echo site_url($rowssm->link); ?>" class="nav-link <?php if($ttl==$rowssm->subsubmenu) { echo 'text-light active'; } else { echo 'text-light'; }  ?>">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p><?php echo $rowssm->subsubmenu; ?></p>
                    </a>
                  </li>
          <?php
                    }
          ?>
                </ul>
          <?php
                  }
          ?>
              </li>
          <?php
                }
          ?>
            </ul>
          <?php
              }
          ?>
          </li>
          <?php
            }
          }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>