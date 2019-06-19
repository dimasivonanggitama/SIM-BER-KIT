<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
      </div>
      <?php echo form_open_multipart('','class="form-horizontal"');?>
        <div class="box-body">
          <?php echo validation_errors();?>
            <div style="overflow: auto;">
              <div align="center">
                <h4>BUKU KONTROL KINERJA PEGAWAI<br>(LOG BOOK) - BULAN <?php echo strtoupper(bulan($content->bulan_log_book));?> <?php echo $content->tahun_log_book;?></h4></div>
              <?php echo $lang_nama_pegawai_label?>&nbsp; &nbsp; &nbsp; :
                <?php
$sql = "SELECT * FROM ap_admin WHERE id_admin=?";
$query = $this->db->query($sql,array($content->id_admin));
$row = $query->row();
if (isset($row))
{
    echo $row->name_admin;
}
?>
                  <br>

                  <?php echo $lang_nip ?> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                    <?php
$sql = "SELECT * FROM ap_admin WHERE id_admin=?";
$query = $this->db->query($sql,array($content->id_admin));
$row = $query->row();
if (isset($row))
{
    echo $row->nip_admin;
}
?>
                      <br>
                      <?php echo $lang_jabatan?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
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
                                <td>&nbsp;&nbsp;&nbsp;:&nbsp;
                                  <?php echo $val->iku?>
                                </td>
                              </tr>
                            </table>
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>
                                    <div align="center">
                                      <?php echo '#';?>
                                    </div>
                                  </th>
                                  <th>
                                    <div align="center">
                                      <?php echo $lang_formula?>
                                    </div>
                                  </th>

                                  <?php if($val->jns_komponen_data!= 0){?>
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

                                  <?php if($val->jns_komponen_data != 4 && $val->jns_komponen_data!= 0){?>
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
                                              <?php echo $lang_paraf?>
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
                                      <?php echo $no;?>
                                    </div>
                                  </td>
                                  <td>
                                    <div align="left">
                                      <?php echo $val->formula?>
                                    </div>
                                  </td>
                                  <?php if($val->jns_komponen_data!= 0){?>
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

                                  <?php if($val->jns_komponen_data != 4 && $val->jns_komponen_data!= 0){?>
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
                                            <div align="center">
                                              <?php if ($val->paraf_log_book_dtl==1){?>
                                                <?php echo "{$lang_approved} : ";?>
                                                <a href="javascript:void(0)" onclick="batal_setuju(<?php echo $val->id_log_book_dtl;?>)" title="Batal" class="btn btn-xs btn-info"><i class="fa  fa-edit"></i></a>
                                                  <br>
                                                  <?php } elseif(($val->paraf_log_book_dtl==NULL && $val->tolak_log_book_dtl==NULL)) {?>
                                                    <a href="javascript:void(0)" onclick="setuju(<?php echo $val->id_log_book_dtl;?>)" title="<?php echo $lang_aprove;?>" class="btn btn-xs btn-warning"><i class="fa  fa-check-circle"></i></a>
                                                    <?php }?>
                                                      <?php if ($val->tolak_log_book_dtl==1){?>
                                                        <?php echo "{$lang_not_approved} : ";?>
                                                        <a href="javascript:void(0)" onclick="batal_tidak_setuju(<?php echo $val->id_log_book_dtl;?>)" title="Batal" class="btn btn-xs btn-info"><i class="fa  fa-edit"></i></a>
                                                          <?php } elseif($val->tolak_log_book_dtl==NULL && $val->paraf_log_book_dtl==NULL) {?>
                                                            <a href="javascript:void(0)" onclick="tidak_setuju(<?php echo $val->id_log_book_dtl;?>)" title="<?php echo $lang_no_aprove;?>" class="btn btn-xs btn-danger"><i class="fa  fa-close"></i></a>
                                                            <?php }?>
                                            </div>
                                          </td>
                                          <td>  
                                              <textarea class="form-control" name="keterangan" id="keterangan_<?php echo $val->id_log_book_dtl;?>" rows="3" placeholder="Enter ..."><?php if($val->paraf_log_book_dtl==1){echo $val->ket_paraf_log_book_dtl;}elseif($val->tolak_log_book_dtl==1){echo $val->ket_tolak_log_book_dtl;}?></textarea>
                                          </td>
                                </tr>
                                <?php
$no++;
endforeach;?>
                              </tbody>
                            </table>
                            <div class="box-footer">
                              <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default">
                                <?php echo $lang_back;?>
                              </button>
                              <?php if(count($isi_detail) > 2){ ?> 
                              <a href="<?php echo base_url($this->uri->rsegment(1).'/setuju_semua/'.$this->uri->rsegment(3));?>" onclick="return confirm('<?php echo $lang_are_you_sure?>')" title="<?php echo $lang_aprove;?>" class="btn btn-md btn-success pull-right ">Setuju Semua &nbsp;<i class="fa  fa-check-circle"></i></a>
                              <?php }?>
                            </div>
                            <?php echo form_close();?>
            </div>
        </div>
    </div>
  </div>
</div>