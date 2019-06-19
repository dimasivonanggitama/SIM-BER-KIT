	<div class="row">
        <div class="col-md-8">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Center Config Map</label>
				 <div class="col-sm-4">
                    <input type="text" name="latitude" class="form-control" id="inputEmail3" placeholder="Latitude" value="<?php echo $content->latitude_config_map?>">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" name="longitude" class="form-control" id="inputEmail3" placeholder="Longitude" value="<?php echo $content->longitude_config_map?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Zoom Config Map</label>
				 <div class="col-sm-8">
                    <input type="number" name="zoom" class="form-control" id="inputEmail3" placeholder="Zoom Config Map" value="<?php echo $content->zoom_config_map?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Kantor Maps</label>
				 <div class="col-sm-3">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Kantor Map" value="<?php echo $content->nama_map?>" required>
                  </div>
                  <div class="col-md-2">
                    <input type="text" name="latitude_map" class="form-control" id="inputEmail3" placeholder="Latitude" value="<?php echo $content->latitude_map?>">
                  </div>
                  <div class="col-md-2">
                    <input type="text" name="longitude_map" class="form-control" id="inputEmail3" placeholder="Longitude" value="<?php echo $content->longitude_map?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Alamat Map</label>
				 <div class="col-sm-8">
                    <input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="Alamat Map" value="<?php echo $content->alamat_map?>" required>
                  </div>
                </div>
                
              <div class="box-footer">
               <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/'.$this->uri->rsegment(3));?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
    </div>
    
</div>   