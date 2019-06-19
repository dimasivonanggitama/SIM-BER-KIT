	<div class="row">
        <div class="col-md-7">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo "Atasan";?></label>
        <div class="col-sm-8">
                    <select class="form-control select2" style="width: 100%;" name="atasan">
                    <?php foreach ($atasan as $val):?>
                      <option <?php echo $content->id_atasan==$val->id_admin?'selected':'';?> value="<?php echo $val->id_admin;?>"><?php echo $val->nip_admin.' - '.$val->name_admin;?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_bulan_cctv;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="bulan" class="form-control datepickerbulan" id="inputEmail3" placeholder="<?php echo $lang_bulan_cctv;?>" value="<?php echo $content->bulan_cctv?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_tahun_cctv;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="tahun" class="form-control datepickertahun" id="inputEmail3" placeholder="<?php echo $lang_tahun_cctv;?>" value="<?php echo $content->tahun_cctv?>" required>
                  </div>
                </div>
                <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_kawasan_it;?>
              </label>
              <div class="col-sm-8">
                <select class="form-control select2" style="width: 100%;" name="kawasan">
                  <?php
$sql = $this->db->get('ap_perusahaan');
foreach ($sql->result() as $val):
?>
                    <option value="<?php echo $val->id_perusahaan;?>" <?php echo $val->id_perusahaan==$content->id_perusahaan ? 'selected':''; ?>>
                      <?php echo $val->nama_perusahaan;?>
                    </option>
                    <?php endforeach;?>
                </select>
              </div>
            </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_hanggar_cctv;?></label>
				<div class="col-sm-8">
                    <input type="text" name=hanggar class="form-control" id="inputEmail3" placeholder="<?php echo $lang_hanggar_cctv;?>" value="<?php echo $content->hanggar_cctv?>" required>
                  </div>
                </div>
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
    </div>
    