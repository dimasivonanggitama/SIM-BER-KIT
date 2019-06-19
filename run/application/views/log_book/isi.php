<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <?php echo form_open_multipart('','class="form-horizontal"');?>
        <div class="box-body">
          <?php echo validation_errors();?>
            <div class="form-group" style="display: none">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_admin_username;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_admin_username;?>" value="<?php echo $user_info->name_admin?>" readonly>
              </div>
            </div>
            <div class="form-group" style="display: none">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_nip;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="nip" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_nip;?>" value="<?php echo $user_info->nip_admin?>" readonly>
              </div>
            </div>
            <div class="form-group" style="display: none">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_jabatan;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="jabatan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_jabatan;?>" value="<?php echo $user->name?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_iku_label;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="iku" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_iku;?>" value="" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_formula;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="formula" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_formula_rincian;?>" value="" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_perhitungan;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="perhitungan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_perhitungan_rincian;?>" value="" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_realisasi_pada;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="rpd" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_ipa;?>" value="" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_realisasi_sd;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="rsd" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_ipa;?>" value="" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_target;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="target" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_target_rincian;?>" value="" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_keterangan;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="keterangan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_keterangan_rincian;?>" value="" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Komponen Data</label>
              <div class="col-sm-8">
                <select required class="form-control" onchange="kate(this.value);" name="komponen" id="contoh">
                  <option disabled selected>Pilih</option>
                  <option value="1">Penugasan</option>
                  <option value="2">Surat Dinas</option>
                  <option value="3">Dokumen</option>
                  <option value="4">Kegiatan/Pekerjaan</option>
                </select>
              </div>
            </div>
            <div id="admDivCheck" style="display:none;">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_surat_dinas_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn2" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_surat_dinas;?>" value="-" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_hal;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn2a" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_hal;?>" value="-" required>
                </div>
              </div>
            </div>
            <div id="penugasan" style="display:none;">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_penugasan_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn1" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_penugasan;?>" value="-" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_pelaporan_label;?>
                </label>
                <div class="col-sm-8">
                  <input name="komponenmn1a" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_pelaporan;?>" value="-" required>
                </div>
              </div>
            </div>
            <div id="dokumen" style="display:none;">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_dokumen_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn3" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_dokumen;?>" value="-" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_waktu_penyelesaian_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn3a" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_waktu_penyelesaian;?>" value="-" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_waktu_standar_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn3b" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_waktu_standar_label;?>" value="-" required>
                </div>
              </div>
            </div>
            <div id="kp_lain_v" style="display:none;">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_kp_lain_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn4" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_kp_lain;?>" value="-" required>
                </div>
              </div>
            </div>
        </div>
        <div class="box-footer">
          <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default">
            <?php echo $lang_cancel;?>
          </button>
          <button type="submit" class="btn btn-info pull-right">
            <?php echo $lang_save;?>
          </button>
          <div style="text-align: center">
            <?php $klik_id=$content->id_log_book; ?>
            <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_pdf/'.$klik_id);?>" title="Donwload Pdf" class="btn btn-md btn-success">View PDF &nbsp;<i class="fa fa-download"></i></a>
          </div>
        </div>
        <!-- /.box-footer -->
        <?php echo form_close();?>

    </div>
    <!-- /.box -->
  </div>

</div>


<div class="row">
  <div class="col-md-12">

    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div style="overflow: auto;">
          <div align="center">
            <h4>BUKU CATATAN (LOGBOOK)<br>CAPAIAN KINERJA PEGAWAI TAHUN  <?php echo $content->tahun_log_book;?></h4>
          </div>
          <?php echo $lang_nama_label?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            <?php echo $user_info->name_admin?>
              <br>
              <?php echo $lang_nip ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                <?php echo $user_info->nip_admin?>
                  <br>
                  <?php echo $lang_jabatan?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                    <?php echo $content->jabatan_d?>
                      <br>
                      <br>
                      
                      <?php
$no=1;
foreach ($isi_detail as $val):?>

                        <table>
                          <tr>
                            <td>
                              <?php echo $lang_nm_iku ?>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
                              <?php echo $val->iku?>
                            </td>
                          </tr>
                        </table>

                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>
                                <div align="center">
                                  <?php echo 'Edit';?>
                                </div>
                              </th>
                              <th>
                                <div align="center">
                                  <?php echo 'Hapus';?>
                                </div>
                              </th>
                              <th>
                                <div align="center">
                                  <?php echo $lang_periode_pelaporan?>
                                </div>
                              </th>
                              <th>
                                <div align="center">
                                  <?php echo $lang_formula?>
                                </div>
                              </th>
                              <?php if($val->jns_komponen_data!=0){?>
                              <th>
                                <div align="center">
                                  <?php if($val->jns_komponen_data==1){?>
                                    <div align="center">
                                      <?php echo $lang_penugasan_label?>
                                    </div>
                                    <?php }?>
                                      <?php if($val->jns_komponen_data==2){?>
                                        <div align="center">
                                          <?php echo $lang_surat_dinas_label?>
                                        </div>
                                        <?php }?>
                                          <?php if($val->jns_komponen_data==3){?>
                                            <div align="center">
                                              <?php echo $lang_dokumen_label?>
                                            </div>
                                            <?php }?>
                                              <?php if($val->jns_komponen_data==4){?>
                                                <div align="center">
                                                  <?php echo $lang_kp_lain_label?>
                                                </div>
                                                <?php }?>
                                </div>
                              </th>
                              <?php }?>

                              <?php if($val->jns_komponen_data != 4 && $val->jns_komponen_data != 0){?>
                                <th>
                                  <div align="center">
                                    <?php if($val->jns_komponen_data==1){?>
                                      <div align="center">
                                        <?php echo $lang_pelaporan_label?>
                                      </div>
                                      <?php }?>
                                        <?php if($val->jns_komponen_data==2){?>
                                          <div align="center">
                                            <?php echo $lang_hal?>
                                          </div>
                                          <?php }?>
                                            <?php if($val->jns_komponen_data==3){?>
                                              <div align="center">
                                                <?php echo $lang_waktu_penyelesaian_label?>
                                              </div>
                                              <?php }?>
                                  </div>
                                </th>
                                <?php }?>

                                  <?php if($val->jns_komponen_data==3){?>
                                    <th>
                                      <div align="center">
                                        <?php echo $lang_waktu_standar_label?>
                                      </div>
                                    </th>
                                    <?php }?>
                                      <th>
                                        <div align="center">
                                          <?php echo $lang_perhitungan_label?>
                                        </div>
                                      </th>
                                      <th>
                                        <div align="center">
                                          <?php echo $lang_realisasi_pd_bln_pelaporan_label?>
                                        </div>
                                      </th>
                                      <th>
                                        <div align="center">
                                          <?php echo $lang_realisasi_sd_bln_pelaporan?>
                                        </div>
                                      </th>
                                      <th>
                                        <div align="center">
                                          <?php echo $lang_target_label?>
                                        </div>
                                      </th>
                                      <th>
                                        <div align="center">
                                          <?php echo $lang_keterangan_label?>
                                        </div>
                                      </th>
                                      <th>
                                        <div align="center">
                                          <?php echo $lang_keterangan_approve?>
                                        </div>
                                      </th>
                            </tr>
                          </thead>
                          <tbody>

                            <tr>
                              <td>
                                <div align="center">
                                  <?php if($val->paraf_log_book_dtl == 1){echo "-";}else{ ?>                             
                                  <a href="<?php echo base_url($this->uri->rsegment(1).'/edit_isi/'.$this->uri->rsegment(3).'/'.$val->id_log_book_dtl);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                  <?php } ?>
                                </div>
                              </td>
                              <td>
                                <div align="center">
                                <?php if($val->paraf_log_book_dtl == 1){echo "-";}else{ ?>
                                  <a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete_dtl/'.$val->id_log_book.'/'.$val->id_log_book_dtl);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                                </div>
                              </td>
                              <td>
                                <div align="center">
                                  <?php echo strtoupper(bulan($content->bulan_log_book));?>
                                </div>
                              </td>
                              <td>
                                <div align="left">
                                  <?php echo $val->formula?>
                                </div>
                              </td>
                              
                              <?php if($val->jns_komponen_data!=0){?>
                              <td>
                                <?php if($val->jns_komponen_data==1){?>
                                  <div align="left">
                                    <?php echo $val->komponen_dt_mn1_penugasan?>
                                  </div>
                                  <?php }?>
                                    <?php if($val->jns_komponen_data==2){?>
                                      <div align="left">
                                        <?php echo $val->komponen_dt_mn2_surat_dinas?>
                                      </div>
                                      <?php }?>
                                        <?php if($val->jns_komponen_data==3){?>
                                          <div align="left">
                                            <?php echo $val->komponen_dt_mn3_dokumen?>
                                          </div>
                                          <?php }?>
                                            <?php if($val->jns_komponen_data==4){?>
                                              <div align="left">
                                                <?php echo $val->komponen_dt_mn4_lain?>
                                              </div>
                                              <?php }?>
                              </td>
                              <?php }?>

                              <?php if($val->jns_komponen_data != 4 && $val->jns_komponen_data!=0){?>
                                <td>
                                  <?php if($val->jns_komponen_data==1){?>
                                    <div align="left">
                                      <?php echo $val->komponen_dt_mn1_a_pelaporan?>
                                    </div>
                                    <?php }?>
                                      <?php if($val->jns_komponen_data==2){?>
                                        <div align="left">
                                          <?php echo $val->komponen_dt_mn2_a_hal?>
                                        </div>
                                        <?php }?>
                                          <?php if($val->jns_komponen_data==3){?>
                                            <div align="left">
                                              <?php echo $val->komponen_dt_mn3_a_wk_penyelesaian?>
                                            </div>
                                            <?php }?>
                                </td>
                                <?php }?>

                                  <?php if($val->jns_komponen_data == 3){?>
                                    <td>
                                      <div align="left">
                                        <?php echo $val->komponen_dt_mn3_b_wk_standar?>
                                      </div>
                                    </td>
                                    <?php }?>

                                      <td>
                                        <div align="left">
                                          <?php echo $val->perhitungan?>
                                        </div>
                                      </td>

                                      <td>
                                        <div align="left">
                                          <?php echo $val->realisasi_pd_bln_pelaporan?>
                                        </div>
                                      </td>

                                      <td>
                                        <div align="center">
                                          <?php echo $val->realisasi_sd_bln_pelaporan?>
                                        </div>
                                      </td>

                                      <td>
                                        <div align="left">
                                          <?php echo $val->target?>
                                        </div>
                                      </td>

                                      <td>
                                        <div align="left">
                                          <?php echo $val->keterangan?>
                                        </div>
                                      </td>

                                      <td>
                                        <div align="left">
                                          <?php if($val->paraf_log_book_dtl == 1)
                                                    {echo "Disetujui";}
                                                elseif($val->tolak_log_book_dtl == 1){
                                                    if($val->ket_tolak_log_book_dtl == NULL)
                                                      {echo 'Tidak Disetujui Atasan';}
                                                    else{echo 'Tidak Disetujui Atasan : '.$val->ket_tolak_log_book_dtl;}
                                                }
                                                elseif($val->tolak_log_book_dtl == NULL){
                                                  echo '';
                                                }
                                                ?>
                                        </div>
                                      </td>
                            </tr>
                            <?php
$no++;
?>
                              <?php   endforeach;?>
                          </tbody>
                        </table>
                        <br>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$('#contoh').select2();
</script>