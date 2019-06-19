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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_log_book_group;?></label>
				<div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_log_book_group;?>" value="<?php echo $content->nama_log_book_group?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_atasan_log_book_group?></label>
				  <div class="col-sm-8">
                 	<select name="atasan" class="form-control">
                 		<option value=""><?php echo $lang_choose;?></option>
                 		<?php foreach ($all_user as $val):?>
                 		<option value="<?php echo $val->id_admin?>" <?php echo $val->id_admin==$content->id_admin ? 'selected':'';?>><?php echo $val->name_admin?></option>
                 		<?php endforeach;?>
                 	</select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_employee;?></label>
				  <div class="col-sm-8">
                  
                <?php foreach ($all_rules as $val):?>
                  <div align="center" class="checkbox">
                    <label>
                      <input id="module_<?php echo $val->id;?>" type="checkbox" name="modulex[]" value="<?php echo $val->id;?>" onclick="parent(<?php echo $val->id;?>)">
                      <strong><?php echo $lang_all;?> <?php echo $val->name;?></strong>
                    </label>
                  </div>
                  <?php foreach ($all_user as $vall):?>
                  <?php if ($val->id==$vall->rules_id){?>
                  <div class="checkbox">
                    <label>
                      <input <?php echo in_array($vall->id_admin,$module_saat_ini)?'checked':'';?> class="module_child_<?php echo $val->id;?>" type="checkbox" name="module[]" value="<?php echo $vall->id_admin;?>">
                      <strong><?php echo $vall->name_admin;?></strong>
                    </label>
                  </div>
                  <?php }?>
                  <?php endforeach;?>
                <?php endforeach;?>
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
    
    
	