  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-light bg-teal elevation-4 text-sm">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('Beranda'); ?>" class="brand-link navbar-teal">
      <img src="<?php echo base_url('img/logo-sj.png') ?>" alt="Korwil Ngawi Logo" class="brand-image img-circle elevation-3"
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
          for ($nn=1; $nn <= $jum_menu ; $nn++) {
          ?>
          <li class="nav-item">
            <a href="<?php echo site_url($m_link[$nn]); ?>" class="nav-link <?php if($ttl==$menu[$nn]) { echo 'active'; } else { echo 'text-light'; } ?>">
              <i class="nav-icon fas <?php echo $m_icon[$nn]; ?>"></i>
              <p>
                <?php
                echo $menu[$nn];

                if ($jumjf[$nn]!=0) {
                  $tanda = '<i class="right fas fa-angle-left"></i>';
                } else {
                  $tanda = '';
                }

                echo $tanda;
                ?>
              </p>
            </a>
          <?php
          if ($jumjf[$nn]!=0) {
          ?>
            <ul class="nav nav-treeview ml-2">
          <?php
              for ($oo=1; $oo <= $jumjf[$nn] ; $oo++) {
          ?>
              <li class="nav-item">
                <a href="<?php echo site_url($s_link[$nn][$oo]); ?>" class="nav-link <?php if($subtitle==$submenu[$nn][$oo]) { echo 'text-light active'; } else { echo 'text-light'; }  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
          <?php
                  echo $submenu[$nn][$oo];

                  if ($jumji[$nn][$oo]!=0) {
                    $tanda2 = '<i class="right fas fa-angle-left"></i>';
                  } else {
                    $tanda2 = '';
                  }

                  echo $tanda2;
          ?>
                  </p>
                </a>
          <?php
                if ($jumji[$nn][$oo]!=0) {
          ?>
            <ul class="nav nav-treeview ml-2">
          <?php
              for ($ss=1; $ss <= $jumji[$nn][$oo] ; $ss++) {
          ?>
              <li class="nav-item">
                <a href="<?php echo site_url($ss_link[$nn][$oo]); ?>" class="nav-link <?php if($ttl==$subsubmenu[$nn][$oo]) { echo 'text-light active'; } else { echo 'text-light'; }  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
          <?php
                  echo $subsubmenu[$nn][$oo];
          ?>
                  </p>
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
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>