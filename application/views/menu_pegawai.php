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
                <form action="<?php echo site_url('Akses/proses_update_ha'); ?>" method="post">
                <input type="hidden" id="id_pegawai" name="id_pegawai" value="<?php echo $id_pegawai; ?>">
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
                            <th>Select All</th>
                          </tr>
                          ';

                  echo $htg;
                  ?>
                  </thead>
                  <tbody style="font-size: 12px">
                  <?php
                  $e = 1;
                  $k = 1;
                  $n = 1;

                  foreach ($all_menu as $rowamn) {
                  ?>
                    <tr>
                      <td><?php echo $rowamn->menu; ?></td>
                      <td></td>
                      <td></td>
                  <?php
                    $data = $this->CI->HMenuArray($rowamn->kode_menu, $id_pegawai);
                  ?>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbC<?php echo $e; ?>" name="cbC<?php echo $e; ?>" value="1" <?php if($data['c']==1) { echo 'checked'; } ?>>
                          <label for="cbC<?php echo $e; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbR<?php echo $e; ?>" name="cbR<?php echo $e; ?>" value="1" <?php if($data['r']==1) { echo 'checked'; } ?>>
                          <label for="cbR<?php echo $e; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbU<?php echo $e; ?>" name="cbU<?php echo $e; ?>" value="1" <?php if($data['u']==1) { echo 'checked'; } ?>>
                          <label for="cbU<?php echo $e; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbD<?php echo $e; ?>" name="cbD<?php echo $e; ?>" value="1" <?php if($data['d']==1) { echo 'checked'; } ?>>
                          <label for="cbD<?php echo $e; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbP<?php echo $e; ?>" name="cbP<?php echo $e; ?>" value="1" <?php if($data['p']==1) { echo 'checked'; } ?>>
                          <label for="cbP<?php echo $e; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="cbE<?php echo $e; ?>" value="" <?php if($data['c']==1&&$data['r']==1&&$data['u']==1&&$data['d']==1&&$data['p']==1) { echo 'checked'; } ?>>
                          <label class="custom-control-label" for="cbE<?php echo $e; ?>"></label>
                        </div>
                      </td>
                    </tr>
<script type="text/javascript">
$(function () {
    jQuery('#cbE<?php echo $e; ?>').on('click', function(e) {
      if($(this).is(':checked',true)) {
        /*$("#cbC<?php echo $e; ?>").prop('disabled', false);
        $("#cbR<?php echo $e; ?>").prop('disabled', false);
        $("#cbU<?php echo $e; ?>").prop('disabled', false);
        $("#cbD<?php echo $e; ?>").prop('disabled', false);
        $("#cbP<?php echo $e; ?>").prop('disabled', false);*/

        $("#cbC<?php echo $e; ?>").prop('checked', true);
        $("#cbR<?php echo $e; ?>").prop('checked', true);
        $("#cbU<?php echo $e; ?>").prop('checked', true);
        $("#cbD<?php echo $e; ?>").prop('checked', true);
        $("#cbP<?php echo $e; ?>").prop('checked', true);
      }
      else {
        /*$("#cbC<?php echo $e; ?>").prop('disabled', true);
        $("#cbR<?php echo $e; ?>").prop('disabled', true);
        $("#cbU<?php echo $e; ?>").prop('disabled', true);
        $("#cbD<?php echo $e; ?>").prop('disabled', true);
        $("#cbP<?php echo $e; ?>").prop('disabled', true);*/

        $("#cbC<?php echo $e; ?>").prop('checked',false);
        $("#cbR<?php echo $e; ?>").prop('checked',false);
        $("#cbU<?php echo $e; ?>").prop('checked',false);
        $("#cbD<?php echo $e; ?>").prop('checked',false);
        $("#cbP<?php echo $e; ?>").prop('checked',false);
      }
    });
  });
</script>
                  <?php
                    $ccek2 = $this->CI->cekMnSbm($rowamn->kode_menu);

                    if ($ccek2!=0) {
                      $data1 = $this->CI->getMnSbm($rowamn->kode_menu);

                      foreach ($data1 as $rowsbm) {
                  ?>
                    <tr>
                      <td></td>
                      <td><?php echo $rowsbm->submenu; ?></td>
                      <td></td>
                  <?php
                      $data2 = $this->CI->HSubmenuArray($rowsbm->kode_submenu, $id_pegawai);
                  ?>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbCC<?php echo $k; ?>" name="cbCC<?php echo $k; ?>" value="1" <?php if($data2['c']==1) { echo 'checked'; } ?>>
                          <label for="cbCC<?php echo $k; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbRR<?php echo $k; ?>" name="cbRR<?php echo $k; ?>" value="1" <?php if($data2['r']==1) { echo 'checked'; } ?>>
                          <label for="cbRR<?php echo $k; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbUU<?php echo $k; ?>" name="cbUU<?php echo $k; ?>" value="1" <?php if($data2['u']==1) { echo 'checked'; } ?>>
                          <label for="cbUU<?php echo $k; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbDD<?php echo $k; ?>" name="cbDD<?php echo $k; ?>" value="1" <?php if($data2['d']==1) { echo 'checked'; } ?>>
                          <label for="cbDD<?php echo $k; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbPP<?php echo $k; ?>" name="cbPP<?php echo $k; ?>" value="1" <?php if($data2['p']==1) { echo 'checked'; } ?>>
                          <label for="cbPP<?php echo $k; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="cbEE<?php echo $k; ?>" value="" <?php if($data2['c']==1&&$data2['r']==1&&$data2['u']==1&&$data2['d']==1&&$data2['p']==1) { echo 'checked'; } ?>>
                          <label class="custom-control-label" for="cbEE<?php echo $k; ?>"></label>
                        </div>
                      </td>
                    </tr>
<script type="text/javascript">
$(function () {
    jQuery('#cbEE<?php echo $k; ?>').on('click', function(e) {
      if($(this).is(':checked',true)) {
        /*$("#cbCC<?php echo $k; ?>").prop('disabled', false);
        $("#cbRR<?php echo $k; ?>").prop('disabled', false);
        $("#cbUU<?php echo $k; ?>").prop('disabled', false);
        $("#cbDD<?php echo $k; ?>").prop('disabled', false);
        $("#cbPP<?php echo $k; ?>").prop('disabled', false);*/

        $("#cbCC<?php echo $k; ?>").prop('checked', true);
        $("#cbRR<?php echo $k; ?>").prop('checked', true);
        $("#cbUU<?php echo $k; ?>").prop('checked', true);
        $("#cbDD<?php echo $k; ?>").prop('checked', true);
        $("#cbPP<?php echo $k; ?>").prop('checked', true);
      }
      else {
        /*$("#cbCC<?php echo $k; ?>").prop('disabled', true);
        $("#cbRR<?php echo $k; ?>").prop('disabled', true);
        $("#cbUU<?php echo $k; ?>").prop('disabled', true);
        $("#cbDD<?php echo $k; ?>").prop('disabled', true);
        $("#cbPP<?php echo $k; ?>").prop('disabled', true);*/

        $("#cbCC<?php echo $k; ?>").prop('checked',false);
        $("#cbRR<?php echo $k; ?>").prop('checked',false);
        $("#cbUU<?php echo $k; ?>").prop('checked',false);
        $("#cbDD<?php echo $k; ?>").prop('checked',false);
        $("#cbPP<?php echo $k; ?>").prop('checked',false);
      }
    });
  });
</script>
                  <?php
                    $ccek3 = $this->CI->cekMnSbb($rowsbm->kode_submenu);

                    if ($ccek3!=0) {
                      $data3 = $this->CI->getMnSbb($rowsbm->kode_submenu);

                      foreach ($data3 as $rowsbb) {
                  ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><?php echo $rowsbb->subsubmenu; ?></td>
                  <?php
                      $data4 = $this->CI->HSubsubmenuArray($rowsbb->kode_subsubmenu, $id_pegawai);
                  ?>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbCCC<?php echo $n; ?>" name="cbCCC<?php echo $n; ?>" value="1" <?php if($data4['c']==1) { echo 'checked'; } ?>>
                          <label for="cbCCC<?php echo $n ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbRRR<?php echo $n; ?>" name="cbRRR<?php echo $n; ?>" value="1" <?php if($data4['r']==1) { echo 'checked'; } ?>>
                          <label for="cbRRR<?php echo $n; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbUUU<?php echo $n; ?>" name="cbUUU<?php echo $n; ?>" value="1" <?php if($data4['u']==1) { echo 'checked'; } ?>>
                          <label for="cbUUU<?php echo $n; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbDDD<?php echo $n; ?>" name="cbDDD<?php echo $n; ?>" value="1" <?php if($data4['d']==1) { echo 'checked'; } ?>>
                          <label for="cbDDD<?php echo $n; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="cbPPP<?php echo $n; ?>" name="cbPPP<?php echo $n; ?>" value="1" <?php if($data4['p']==1) { echo 'checked'; } ?>>
                          <label for="cbPPP<?php echo $n; ?>" class="custom-control-label"></label>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="cbEEE<?php echo $n; ?>" value="" <?php if($data4['c']==1&&$data4['r']==1&&$data4['u']==1&&$data4['d']==1&&$data4['p']==1) { echo 'checked'; } ?>>
                          <label class="custom-control-label" for="cbEEE<?php echo $n; ?>"></label>
                        </div>
                      </td>
                    </tr>
<script type="text/javascript">
$(function () {
    jQuery('#cbEEE<?php echo $n; ?>').on('click', function(e) {
      if($(this).is(':checked',true)) {
        /*$("#cbCCC<?php echo $n; ?>").prop('disabled', false);
        $("#cbRRR<?php echo $n; ?>").prop('disabled', false);
        $("#cbUUU<?php echo $n; ?>").prop('disabled', false);
        $("#cbDDD<?php echo $n; ?>").prop('disabled', false);
        $("#cbPPP<?php echo $n; ?>").prop('disabled', false);*/

        $("#cbCCC<?php echo $n; ?>").prop('checked', true);
        $("#cbRRR<?php echo $n; ?>").prop('checked', true);
        $("#cbUUU<?php echo $n; ?>").prop('checked', true);
        $("#cbDDD<?php echo $n; ?>").prop('checked', true);
        $("#cbPPP<?php echo $n; ?>").prop('checked', true);
      }
      else {
        /*$("#cbCCC<?php echo $n; ?>").prop('disabled', true);
        $("#cbRRR<?php echo $n; ?>").prop('disabled', true);
        $("#cbUUU<?php echo $n; ?>").prop('disabled', true);
        $("#cbDDD<?php echo $n; ?>").prop('disabled', true);
        $("#cbPPP<?php echo $n; ?>").prop('disabled', true);*/

        $("#cbCCC<?php echo $n; ?>").prop('checked',false);
        $("#cbRRR<?php echo $n; ?>").prop('checked',false);
        $("#cbUUU<?php echo $n; ?>").prop('checked',false);
        $("#cbDDD<?php echo $n; ?>").prop('checked',false);
        $("#cbPPP<?php echo $n; ?>").prop('checked',false);
      }
    });
  });
</script>
                  <?php
                            $n++;
                          }
                        }
                        $k++;
                      }
                    }

                    $e++;
                  }
                  ?>                  
                  </tbody>
                  <tfoot style="font-size: 13px">
                  <?php echo $htg; ?>
                  </tfoot>
                </table>
                <button type="submit" class="btn bg-gradient-teal btn-lg btn-block mt-3"><i class="fas fa-check"></i>&ensp;Update</button>
                </form>
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