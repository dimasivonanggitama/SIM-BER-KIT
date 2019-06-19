
  <div align="center">
    <h4>BUKU CATATAN (LOGBOOK)<br>CAPAIAN KINERJA PEGAWAI BULAN <?php echo strtoupper(bulan($content->bulan_log_book));?>  TAHUN  <?php echo $content->tahun_log_book;?></h4></div>
    <?php $sql = "SELECT * FROM ap_admin WHERE id_admin=?";
          $query = $this->db->query($sql,array($content->id_admin));
          $row = $query->row();
          $query1 = $this->db->query($sql,array($content->id_atasan));
          $row1 = $query1->row();
  ?>
  <table width="100%"> 
        <tr>
          <td valign="top" align="left" width="4%"><div><?php echo $lang_nama_label;?></div></th>
       		<td valign="top" align="left" width="auto"><div align="left"><?php echo ':'?></div></td>
       		<td valign="top" align="left"><div align="left"><?php echo $row->name_admin?></div></td>
        </tr>
        <tr>
          <td valign="top" align="left" width="4%"><div><?php echo $lang_nip;?></div></th>
       		<td valign="top" align="left" width="auto"><div align="left"><?php echo ':'?></div></td>
           <td valign="top" align="left"><div align="left"><?php echo $row->nip_admin?></div></td>
        </tr>
        <tr>
          <td valign="top" align="left" width="4%"><div><?php echo $lang_jabatan;?></div></th>
       		<td valign="top" align="left" width="auto"><div align="left"><?php echo ':'?></div></td>
       		<td valign="top" align="left"><div align="left"><?php echo $content->jabatan_d?></div></td>
        </tr>
        <tr>
          <td valign="top" align="left" width="4%"><div><?php echo 'Atasan';?></div></th>
       		<td valign="top" align="left" width="auto"><div align="left"><?php echo ':'?></div></td>
          <td valign="top" align="left"><div align="left"><?php echo $row1->name_admin.'&nbsp;/&nbsp;'.$row1->nip_admin; ?></div></td>
        </tr>
      </table>
              <br>
              <?php
$no=1;
foreach ($isi_detail as $val):
?>

                <table>
                  <tr>
                    <td>
                      <?php echo $lang_nm_iku ?>
                    </td>
                    <td>&nbsp;&nbsp;:&nbsp;
                      <?php echo $val->iku?>
                    </td>
                  </tr>
                </table>

                <table style="overflow:wrap" border="1" width="100%" cellpadding="0" cellspacing="0">
                  <tr>
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
                                <?php echo $lang_paraf?>
                              </div>
                            </th>
                  </tr>

                  <tr>
                    <td valign="top" style="text-align:center">
                      <div>
                        <?php echo strtoupper(bulan($content->bulan_log_book));?>
                      </div>
                    </td>
                    <td valign="top">
                      <div align="left">
                        <?php echo $val->formula?>
                      </div>
                    </td>
                    
                    <?php if($val->jns_komponen_data!=0){?>
                    <td valign="top">
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

                    <?php if($val->jns_komponen_data != 4 && $val->jns_komponen_data != 0){?>
                      <td valign="top">
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
                          <td valign="top">
                            <div align="left">
                              <?php echo $val->komponen_dt_mn3_b_wk_standar?>
                            </div>
                          </td>
                          <?php }?>

                            <td valign="top">
                              <div align="left">
                                <?php echo $val->perhitungan?>
                              </div>
                            </td>

                            <td valign="top">
                              <div align="left">
                                <?php echo $val->realisasi_pd_bln_pelaporan?>
                              </div>
                            </td>

                            <td valign="top">
                              <div align="left">
                                <?php echo $val->realisasi_sd_bln_pelaporan?>
                              </div>
                            </td>

                            <td valign="top">
                              <div align="left">
                                <?php echo $val->target?>
                              </div>
                            </td>

                            <td valign="top">
                              <div align="left">
                                <?php echo $val->keterangan?>
                              </div>
                            </td>

                            <td valign="top" style="text-align:center">
                              <div>
                                <?php if ($val->paraf_log_book_dtl==1){?>
                                  <?php echo $lang_approved;?>
                                    <?php } elseif ($val->tolak_log_book_dtl==1){?>
                                      <?php echo $lang_not_approved;?>
                                        <?php }?>
                              </div>
                            </td>
                  </tr>
                </table>
                <br />
                <?php
$no++;
endforeach;
?>