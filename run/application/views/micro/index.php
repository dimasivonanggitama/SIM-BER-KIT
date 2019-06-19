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
    <div class="box box-info">
      <div class="box-header">
          <a data-toggle="modal" href="#isMicro" title="<?php echo 'Tambah';?>" class="btn btn-info pull-right"><i class="fa fa-save">&nbsp;&nbsp;<?php echo $lang_add;?></i></a>
          <div class="modal fade" id="isMicro">
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 align="center" class="modal-title">Add Laporan Micro</h4>
          </div>
          <div class="modal-body">
          <table width="100%">
            <tr>
            <td valign="top" align="left"  width="14%"><div><?php echo 'Hanggar'?></div></th>
            <td valign="top" align="left" width="3%"><div align="left"><?php echo ':'?></div></td>
            <td valign="top" align="left"><div align="left">
              <select required class="form-control select2" style="width: 100%;" name="name_hanggar"  id="id_hanggar">
                <option disabled selected>Hanggar</option>
                <?php 
                    foreach ($dt_hanggar as $val):
                ?>  
                  <option value="<?php echo $val->id_penempatan;?>"><?php echo $val->uraian_penempatan;?></option>
                <?php endforeach; ?>
              </select>
          </div></td>
            </tr>
          </table>                               
          </div>
          <div class="modal-footer">
              <button id="btnIsMicro" type="button" class="btn btn-square btn-danger" data-dismiss="modal" title="<?php echo 'Close';?>">Close&nbsp;&nbsp;<i class="fa fa-close"></i></button>
              <a href="javascript:void(0)" onclick="add_data()" title="<?php echo $lang_save;?>" class="btn btn-square btn-info">Simpan&nbsp;&nbsp;<i class="fa fa-indent"></i></a>
          </div>
          </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
      </div>
      <!-- /.box-header -->
      <?php echo form_open_multipart('','class="form-horizontal"');?>
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
                    <th><div align="center"><?php echo "Aksi"?></div></th>
                    <th><div align="center"><?php echo "Tgl Pengajuan"?></div></th>
                    <th><div align="center"><?php echo "Ajukan"?></div></th>
                  </tr>
                </thead>
              <tbody>
                <?php 
                	$no=1;
                	foreach ($content as $val):?>
                <tr>
                  <?php
                    $sql1 = "SELECT COUNT(id_micro) as total FROM `ap_micro_dtl` WHERE id_micro=? AND jml_tenaga_kerja IS NOT NULL AND n_investasi IS NOT NULL AND n_penangguhan IS NOT NULL AND n_ekspor IS NOT NULL AND n_jual_lokal IS NOT NULL";
                    $query1 = $this->db->query($sql1,array($val->id_micro));
                    $juml_input = $query1->row();

                    $sql2 = "SELECT COUNT(id_micro) as total FROM `ap_micro_dtl` WHERE id_micro=?";
                    $query2 = $this->db->query($sql2,array($val->id_micro));
                    $total_data = $query2->row();  
                  ?>
                  <td><div align="center" ><?php echo $no;?></div></td>
                  <td><div align="center" ><?php echo $val->uraian_penempatan;?></div></td>
                  <td><div align="center" ><?php echo ' Tahun : '.$val->tahun.' Semester '.$val->semester;?></div></td>
                  <td><div align="center" ><?php 
                    if($val->flag_pengajuan == 0){
                        if (isset($juml_input)){
                          if (isset($total_data)){
                            if($juml_input->total == 0){
                              echo "<small class='label label-danger'>Silahkan Melakukan Perekaman</small>";
                            }elseif($juml_input->total > 0 && $juml_input->total < $total_data->total){
                              echo "<small class='label label-warning'>Silahkan Lengkapi Data</small>";  
                            }elseif($juml_input->total == $total_data->total){
                              echo "<small class='label label-success'>Silahkan Klik Ajukan</small>";  
                            }
                          } 
                        }
                      }elseif($val->flag_pengajuan == 1){
                      echo "<small class='label label-primary'>Sudah Dilaporkan</small>";
                    }
                  ?>                  
                  </div></td>
                  <td><div align="center" >
                    <?php if($val->flag_pengajuan == 0){ ?>
                      <a href="<?php echo base_url($this->uri->rsegment(1).'/rekam/'.$val->id_micro);?>" title="<?php echo $lang_isi;?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id_micro);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    <?php }elseif($val->flag_pengajuan == 1){
                      echo "-";
                    } ?>
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
                  <td><div align="center" >
                    <?php
                    if($val->flag_pengajuan == 0){
                      if (isset($juml_input)){
                        if (isset($total_data)){
                          if($juml_input->total > 0 && $juml_input->total < $total_data->total || $total_data->total == 0){
                            echo "-";
                          }elseif($juml_input->total == $total_data->total){ ?>
                            <a href="<?php echo base_url($this->uri->rsegment(1).'/ajukan/'.$val->id_micro);?>" title="<?php echo 'Ajukan';?>" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a>
                          <?php }
                        }
                      }
                    }elseif($val->flag_pengajuan == 1){ ?>
                      <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_excel/'.$val->id_micro);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                    <?php } ?>
                  </div></td>
                </tr>
                <?php 
                  $no++;
                  endforeach;?>
              </tbody>
            </table>
            <!-- </div> -->
            </form>
          </div>
        <!-- /.box-footer -->
        </div>
    </div>
    <!-- /.box -->
  </div>

    