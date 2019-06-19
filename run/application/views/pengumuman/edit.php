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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_pm_nama;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="nama_pengumuman" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_pm_nama;?>" value="<?php echo $content->nama_pengumuman?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_pm_uraian; ?></label>
				<div class="col-sm-8">
                    <input type="text" name="uraian_pengumuman" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_pm_uraian;?>" value="<?php echo $content->uraian_pengumuman?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_pm_start;?></label>
				<div class="col-sm-4">
                    <input type="text" name="start" class="form-control datepicker"  value="<?php echo $content->date_start_pengumuman==''?date('Y-m-d'):date('Y-m-d',strtotime($content->date_start_pengumuman));?>" required>
                  </div>
                  <div class="col-sm-4 bootstrap-timepicker">
                    <input type="text" name="time_start" class="form-control timepicker" value="<?php  echo $content->date_start_pengumuman==''?date('H:i:s'):date('H:i:s',strtotime($content->date_start_pengumuman))?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_pm_end;?></label>
				<div class="col-sm-4">
                    <input type="text" name="end" class="form-control datepicker"  value="<?php echo $content->date_end_pengumuman==''?date('Y-m-d'):date('Y-m-d',strtotime($content->date_end_pengumuman));?>" required>
                  </div>
                  <div class="col-sm-4 bootstrap-timepicker">
                    <input type="text" name="time_end" class="form-control timepicker"  value="<?php echo $content->date_end_pengumuman==''?date('H:i:s'):date('H:i:s',strtotime($content->date_end_pengumuman))?>" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">File Pengumuman</label>
				  <div class="col-sm-8">
                    <input type="file" name="file_pengumuman" class="" id="exampleInputFile" accept=".pdf">
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
    
    
	