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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Bulan';?></label>
				<div class="col-sm-8">
                    <input type="text" name="bulan" class="form-control datepickerbulan" id="inputEmail3" placeholder="<?php echo 'Bulan';?>" value="<?php echo $content->bulan_penerimaan_perbulan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo 'Tahun'?></label>

                  <div class="col-sm-8">
                  <input type="text" name="tahun" class="form-control datepickertahun" id="inputEmail3" placeholder="<?php echo 'Tahun'?>" value="<?php echo $content->tahun_penerimaan_perbulan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo 'Pabean'?></label>

                  <div class="col-sm-8">
                  <input type="text" name="pabean" class="form-control angka" id="inputEmail3" placeholder="<?php echo 'Pabean'?>" value="<?php echo $content->pabean_penerimaan_perbulan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo 'Cukai'?></label>

                  <div class="col-sm-8">
                  <input type="text" name="cukai" class="form-control angka" id="inputEmail3" placeholder="<?php echo 'Cukai'?>" value="<?php echo $content->cukai_penerimaan_perbulan?>" required>
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
    
    
	