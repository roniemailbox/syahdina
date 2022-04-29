  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card pt-2 pl-3" style="background-color: mintcream">
          <p><strong>Nama : </strong><?php echo $data_pegawai['nama']; ?></p>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-table"></i>&ensp;Daftar Hak Akses Menu</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table id="tabel" class="table table-bordered table-hover">
                  <thead style="font-size: 13px">
                  <?php
                  $htg = '
                          <tr style="text-align: center">
                            <th>Menu</th>
                            <th>Submenu</th>
                            <th>Subsubmenu</th>
                            <th>Create</th>
                            <th>Read</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>Print</th>
                            <th>Enabled</th>
                          </tr>
                          ';

                  echo $htg;
                  ?>
                  </thead>
                  <tbody style="font-size: 12px">
                    <!-- isi tabel master kota -->
                  </tbody>
                  <tfoot style="font-size: 13px">
                  <?php echo $htg; ?>
                  </tfoot>
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