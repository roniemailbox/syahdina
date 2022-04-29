  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-sm">
    <?php include "templates/konten_header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-table"></i>&ensp;Data Akses</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tabel" class="table table-bordered table-hover">
              <thead style="font-size: 13px">
              <?php
              $htg = '
                      <tr style="text-align: center">
                        <th>ACTION</th>
                        <th>Nama Pegawai</th>
                        <th>Status</th>
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
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->