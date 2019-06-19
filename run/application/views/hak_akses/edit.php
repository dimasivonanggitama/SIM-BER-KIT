	<div class="row">
	<?php echo form_open_multipart('','class="form-horizontal"');?>
        <div class="col-md-6">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->

              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_nama_hak;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_nama_hak;?>" value="<?php echo $content->name?>" required>
                  </div>
                </div>
                </div>
        	 <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/'.$this->uri->rsegment(3));?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->


          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">

          <div class="box">
            <div class="box-header">
            <?php echo $lang_module;?>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
              <?php foreach ($all_module as $val):?>
              	  <div align="center" class="checkbox">
                    <label>
                      <input <?php echo in_array($val->id,$module_saat_ini)?'checked':'';?> type="checkbox" name="module[]" id="module_<?php echo $val->id?>" value="<?php echo $val->id?>_<?php echo $val->parent?>" onchange="parent(<?php echo $val->id?>)">
                      <strong><?php echo $val->$mylanguages_field;?></strong>
                    </label>
                  </div>
                  <?php
                  foreach ($all_module_child as $value):
                  if ($val->id==$value->parent){
                  ?>
                  <div align="center" class="checkbox">
                    <label>
                      <input class="module_child_<?php echo $val->id?>" <?php echo in_array($value->id,$module_saat_ini)?'checked':'';?> type="checkbox" name="module[]" value="<?php echo $value->id?>_<?php echo $value->parent?>" onchange="child(<?php echo $value->parent?>)">
                      <?php echo $value->$mylanguages_field;?>
                    </label>
                  </div>
                  <?php
                  }
                  endforeach;
                  ?>
                  <hr>
              <?php endforeach;?>
              </div>
        	 <!-- /.box-body -->

              <!-- /.box-footer -->


          </div>
          <!-- /.box -->
        </div>
        <?php echo form_close();?>
    </div>
