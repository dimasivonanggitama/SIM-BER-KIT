<?php ob_start();?>
<div class="modal modal-warning fade bs-example-modal-sm" id="modal-warning">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Attention !</h4>
              </div>
              <div class="modal-body">
                <p><div id="msgAtt"></div></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
              </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<button id="idbtn" type="button" style="display: none" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning"></button>
<div class="row">
        <div class="col-md-12">
		  <div class="box">
            <div class="box-header">
              <div class="col-sm-2">
              <select required class="form-control"  name="komponen" id="semester">
                  <option disabled selected>Semester</option>
                  <option value="1">Semester 1</option>
                  <option value="2">Semester 2</option>
                </select>
              </div>
             <div class="col-sm-2">
             	<input type="text" name="tahun" class="form-control datepickertahun" id="tahun" placeholder="<?php echo 'Tahun';?>" value="<?php echo $tahun?>" required>
             </div>
              <div class="col-sm-1">
                <a href="javascript:void(0)" onclick="cari()" title="<?php echo 'Cari';?>" class="btn btn-info pull-right"><i class="fa fa-search">&nbsp;&nbsp;Cari</i></a>
              </div>
              <div class="col-sm-1">
              <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_excel/'.$thissmt.'/'.$periode[1]);?>" title="<?php echo 'Download';?>" class="btn btn-warning pull-right"><i class="fa fa-eye">&nbsp;&nbsp;Download</i></a>
              </div>
              <div class="col-sm-6">
                <P><h5 id="msgData">Data Periode Yang Ditampilkan <?php echo $periode[0].' Tahun '.$periode[1].' '; ?>/ Silahkan Melakukan Pencarian Untuk Periode Lainnya</h5></p>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if (!empty($this->session->flashdata('status'))){?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('status');?>!
              </div>
              <?php }?>
              <form class="form-horizontal">
              <!-- <div class="table-responsive"> -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><div align="center"><?php echo "No.";?></div></th>
                    <th><div align="center"><?php echo "Hanggar";?></div></th>
                    <th><div align="center"><?php echo "Periode Laporan";?></div></th>
                    <th><div align="center"><?php echo "Status"?></div></th>
                    <th><div align="center"><?php echo "Tgl Pengajuan"?></div></th>
                    <th><div align="center"><?php echo "Seksie"?></div></th>
                  </tr>
                </thead>
              <tbody>
                <?php 
                	$no=1;
                	foreach ($dt_hanggar as $dt):?>
                <tr>
                  <td><div align="center" ><?php echo $no;?></div></td>
                  <td><div align="center" ><?php echo $dt->uraian_penempatan;?></div></td>
                  <?php
                    $isIsi = FALSE;
                    if($contentspv != NULL){
                    foreach($contentspv as $val):
                      if($dt->id_penempatan == $val->id_penempatan){
                        $isIsi = TRUE;
                        $sql1 = "SELECT COUNT(id_micro) as total FROM `ap_micro_dtl` WHERE id_micro=? AND jml_tenaga_kerja IS NOT NULL AND n_investasi IS NOT NULL AND n_penangguhan IS NOT NULL AND n_ekspor IS NOT NULL AND n_jual_lokal IS NOT NULL";
                        $query1 = $this->db->query($sql1,array($val->id_micro));
                        $juml_input = $query1->row();

                        $sql2 = "SELECT COUNT(id_micro) as total FROM `ap_micro_dtl` WHERE id_micro=?";
                        $query2 = $this->db->query($sql2,array($val->id_micro));
                        $total_data = $query2->row();  
                    
                  ?>
                  <td><div align="center" ><?php if($val->flag_pengajuan == 1){echo ' Tahun : '.$val->tahun.' Semester '.$val->semester;}else{echo '-';}?></div></td>
                  <td><div align="center" ><?php 
                    if($val->flag_pengajuan == 0){
                        if (isset($juml_input)){
                          if (isset($total_data)){
                            if($juml_input->total == 0){
                              echo "<small class='label label-danger'>Belum Melakukan Perekaman</small>";
                            }elseif($juml_input->total > 0 && $juml_input->total < $total_data->total){
                              echo "<small class='label label-warning'>Data Belum Lengkap</small>";  
                            }elseif($juml_input->total == $total_data->total){
                              echo "<small class='label label-success'>Menunggu Klik Pengajuan</small>";  
                            }
                          } 
                        }
                    }elseif($val->flag_pengajuan == 1){
                      echo "<small class='label label-primary'>Sudah Dilaporkan</small>";
                    }
                  ?>                  
                  </div></td>
                  <td><div align="center" >
                    <?php
                      if($val->flag_pengajuan == 0){
                        echo "-";
                      }elseif($val->flag_pengajuan == 1){
                        echo date('d-m-Y H:i:s',strtotime($val->tgl_pengajuan));
                      }
                    ?>
                  </div></td>
                  <?php } endforeach;} 
                    if($isIsi == FALSE){
                  ?>
                    <td><div align="center" ><?php echo '-';?></div></td>
                    <td><div align="center" ><?php echo "<small class='label label-danger'>Belum Melakukan Perekaman</small>";?></div></td>
                    <td><div align="center" ><?php echo '-';?></div></td>
                  <?php } ?>
                  <td><div align="center" >
                      <?php 
                        $sql4 = "SELECT P.id_pejabat as id_jabatan, B.uraian_jabatan as uraian_jabatan, A.name_admin as name_admin FROM `ap_hanggar_group_dtl` P LEFT JOIN ap_pejabat T ON T.id_jabatan = P.id_pejabat LEFT JOIN ap_jabatan_ref B ON B.id_jabatan = T.id_jabatan LEFT JOIN ap_admin A ON A.id_admin = T.id_admin WHERE P.id_penempatan =? ORDER BY B.id_jabatan ASC";
                        $query4 = $this->db->query($sql4,array($dt->id_penempatan));
                        $row4 = $query4->row();
                        if (isset($row4)){
                          echo $row4->uraian_jabatan.' / '.$row4->name_admin;
                        }
                      ?>
                  </div></td>
                </tr>
                <?php 
                  $no++;
                  endforeach;
                  ?>
              </tbody>
            </table>
            <!-- </div> -->
            </form>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      
     </div>