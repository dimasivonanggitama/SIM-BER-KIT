<div class="row">
        <div class="col-md-6">

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
                    <option disabled selected>Atasan</option>
                    <?php foreach ($atasan as $val):?>
                      <option <?php echo $content->id_atasan==$val->id_admin?'selected':'';?> value="<?php echo $val->id_admin;?>"><?php echo $val->nip_admin.' - '.$val->name_admin;?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_bulan_book;?></label>
				<div class="col-sm-8">
                    <input type="text" name="bulan" class="form-control datepickerbulan" id="inputEmail3" placeholder="<?php echo $lang_bulan_book;?>" value="<?php echo $content->bulan_log_book?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_tahun_book?></label>

                  <div class="col-sm-8">
                  <input type="text" name="tahun" class="form-control datepickertahun" id="inputEmail3" placeholder="<?php echo $lang_tahun_book?>" value="<?php echo $content->tahun_log_book?>" required>
                  </div>
                </div> -->

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_jabatan_label;?></label>
				<div class="col-sm-8">
                    <input type="text" name="jabatann" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_jabatan_isi;?>" value="<?php echo $content->jabatan_d?>" required>
                  </div>
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