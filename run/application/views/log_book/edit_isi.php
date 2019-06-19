<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <?php echo form_open_multipart('','class="form-horizontal"');?>
        <div class="box-body">
          <?php echo validation_errors();?>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_iku_label;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="iku" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_iku;?>" value="<?php echo $detail->iku?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_formula;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="formula" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_formula_rincian;?>" value="<?php echo $detail->formula?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_perhitungan;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="perhitungan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_perhitungan_rincian;?>" value="<?php echo $detail->perhitungan?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_realisasi_pada;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="rpd" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_ipa;?>" value="<?php echo $detail->realisasi_pd_bln_pelaporan?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_realisasi_sd;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="rsd" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_ipa;?>" value="<?php echo $detail->realisasi_sd_bln_pelaporan?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_target;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="target" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_target_rincian;?>" value="<?php echo $detail->target?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_keterangan;?>
              </label>
              <div class="col-sm-8">
                <input type="text" name="keterangan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_keterangan_rincian;?>" value="<?php echo $detail->keterangan?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Komponen Data</label>
              <div class="col-sm-8">
                <select required class="form-control" onchange="kate(this.value);" name="komponen" id="contoh">
                  <option disabled selected>Pilih</option>
                  <option value="1" <?php if($detail->jns_komponen_data == 1) echo "selected"; ?>>Penugasan</option>
                  <option value="2" <?php if($detail->jns_komponen_data == 2) echo "selected"; ?>>Surat Dinas</option>
                  <option value="3" <?php if($detail->jns_komponen_data == 3) echo "selected"; ?>>Dokumen</option>
                  <option value="4" <?php if($detail->jns_komponen_data == 4) echo "selected"; ?>>Kegiatan/Pekerjaan</option>
                </select>
              </div>
            </div>
              <div id="admDivCheck" <?php if($detail->jns_komponen_data == 2){ ?>style="display:'';" <?php }else{ ?>style="display:none;"<?php } ?>>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_surat_dinas_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn2" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_surat_dinas;?>" value="<?php echo $detail->komponen_dt_mn2_surat_dinas?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_hal;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn2a" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_hal;?>" value="<?php echo $detail->komponen_dt_mn2_a_hal?>" required>
                </div>
              </div>
            </div>
            <div id="penugasan" <?php if($detail->jns_komponen_data == 1){ ?>style="display:'';" <?php }else{ ?>style="display:none;"<?php } ?>>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_penugasan_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn1" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_penugasan;?>" value="<?php echo $detail->komponen_dt_mn1_penugasan?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_pelaporan_label;?>
                </label>
                <div class="col-sm-8">
                  <input name="komponenmn1a" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_pelaporan;?>" value="<?php echo $detail->komponen_dt_mn1_a_pelaporan?>" required>
                </div>
              </div>
            </div>
            <div id="dokumen" <?php if($detail->jns_komponen_data == 3){ ?>style="display:'';" <?php }else{ ?>style="display:none;"<?php } ?>>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_dokumen_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn3" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_dokumen;?>" value="<?php echo $detail->komponen_dt_mn3_dokumen?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_waktu_penyelesaian_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn3a" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_waktu_penyelesaian;?>" value="<?php echo $detail->komponen_dt_mn3_a_wk_penyelesaian?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_waktu_standar_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn3b" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_waktu_standar_label;?>" value="<?php echo $detail->komponen_dt_mn3_b_wk_standar?>" required>
                </div>
              </div>
            </div>
              <div id="kp_lain_v" <?php if($detail->jns_komponen_data == 4){ ?>style="display:'';" <?php }else{ ?>style="display:none;"<?php } ?>>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">
                  <?php echo $lang_kp_lain_label;?>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="komponenmn4" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_kp_lain;?>" value="<?php echo $detail->komponen_dt_mn4_lain?>" required>
                </div>
              </div>
            </div>
        </div>
        <div class="box-footer">
        <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/isi/'.$this->uri->rsegment(3));?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
          <button type="submit" class="btn btn-info pull-right">
            <?php echo $lang_save;?>
          </button>
        </div>
        <!-- /.box-footer -->
        <?php echo form_close();?>

    </div>
    <!-- /.box -->
  </div>
</div>
<script>
$('#contoh').select2();
</script>