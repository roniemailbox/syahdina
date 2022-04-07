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
          <li class="nav-item">
            <a href="<?php echo site_url('Beranda'); ?>" class="nav-link <?php if($ttl=='Beranda') { echo 'active'; } else { echo 'text-light'; } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Profil'); ?>" class="nav-link <?php if($ttl=='Profil') { echo 'active'; } else { echo 'text-light'; } ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>