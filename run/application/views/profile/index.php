	<div class="row">	
		<div class="col-md-6">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
              	<div align="center"><?php echo $this->session->flashdata('status_profil');?></div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_nip;?></label>
                  <div class="col-sm-8">
                    <input type="text" name="nip" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_nip;?>" value="<?php echo $user_info->nip_admin;?>" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_name;?></label>
                  <div class="col-sm-8">
                    <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_name;?>" value="<?php echo $user_info->name_admin;?>" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_telp;?></label>
                  <div class="col-sm-8">
                    <input type="text" name="telp" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_telp;?>" value="<?php echo $user_info->telp_admin;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_address;?></label>
                  <div class="col-sm-8">
                    <input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_address;?>" value="<?php echo $user_info->alamat_admin;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_image;?></label>
                  <div class="col-sm-8">
                    <img class="img-responsive" width="120px" src="<?php echo base_url('uploads/'.$user_info->image_admin)?>" alt="Photo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_image_new;?></label>
                  <div class="col-sm-8">
                    <input type="file" accept=".gif,.png,.jpg,.jpeg" name="image" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_image_new;?>" value="">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url();?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right" value="ganti_profil" name="ganti_profil"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
              	<div align="center"><?php echo $this->session->flashdata('status');?></div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_password_new;?></label>
                  <div class="col-sm-8">
                    <input type="password" name="password_new" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_password_new;?>" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_password_confirm;?></label>
                  <div class="col-sm-8">
                    <input type="password" name="password_confirm" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_password_confirm;?>" value="" required>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url();?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right" value="ganti_password" name="ganti_password"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
     </div>