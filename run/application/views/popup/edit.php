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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Nama';?></label>
				 <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="<?php echo 'Nama';?>" value="<?php echo $content->nama_popup?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo 'Deskripsi'; ?></label>
				<div class="col-sm-8">
                    <input type="text" name="desc" class="form-control" id="inputEmail3" placeholder="<?php echo 'Deskripsi';?>" value="<?php echo $content->desc_popup?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Mulai Popup';?></label>
				<div class="col-sm-4">
                    <input type="text" name="start" class="form-control datepicker"  value="<?php echo $content->start_popup==''?date('Y-m-d'):date('Y-m-d',strtotime($content->start_popup));?>" required>
                  </div>
                  <div class="col-sm-4 bootstrap-timepicker">
                    <input type="text" name="time_start" class="form-control timepicker" value="<?php  echo $content->start_popup==''?date('H:i:s'):date('H:i:s',strtotime($content->start_popup))?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Berakhir Popup';?></label>
				<div class="col-sm-4">
                    <input type="text" name="end" class="form-control datepicker"  value="<?php echo $content->end_popup==''?date('Y-m-d'):date('Y-m-d',strtotime($content->end_popup));?>" required>
                  </div>
                  <div class="col-sm-4 bootstrap-timepicker">
                    <input type="text" name="time_end" class="form-control timepicker"  value="<?php echo $content->end_popup==''?date('H:i:s'):date('H:i:s',strtotime($content->end_popup))?>" required>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/'.$this->uri->rsegment(3));?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
        <!-- /.box -->
        </div>
    </div>
    
    
	