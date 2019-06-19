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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_admin_nip?></label>
				 <div class="col-sm-8">
                    <input type="text" name="nip" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_admin_nip;?>" value="<?php echo $content->nip_admin?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_admin_account?></label>
				<div class="col-sm-8">
                    <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_admin_account;?>" value="<?php echo $content->username_admin?>" required> 
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php if($content->id_admin==NULL) {
                      echo $lang_admin_new; echo ' ';
                  }else{
                      echo $lang_edit; echo ' ';
                  } ?><?php echo $lang_admin_password;?></label>
				<div class="col-sm-8">
                    <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_admin_password;?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_admin_username;?></label>
				<div class="col-sm-8">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_admin_username;?>" value="<?php echo $content->name_admin?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_admin_telp;?></label>
				<div class="col-sm-8">
                    <input type="text" name="telp" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_admin_telp;?>" value="<?php echo $content->telp_admin?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_admin_alamat?></label>
				<div class="col-sm-8">
                    <input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_admin_alamat;?>" value="<?php echo $content->alamat_admin?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_status_pegawai; ?></label>
					<div class="col-sm-8">
                    <select class="form-control" name="paktif" required>
                    	<option value=""><?php echo $lang_choose;?></option>
                    	<?php
$sql = $this->db->get('ap_pegawai_aktif');
foreach ($sql->result() as $val):
?>
                    <option value="<?php echo $val->id_pegawai_aktif;?>" <?php echo $val->id_pegawai_aktif==$content->id_pegawai_aktif ? 'selected':''; ?>>
                      <?php echo $val->uraian_pegawai_aktif;?>
                    </option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_penempatan; ?></label>
					<div class="col-sm-8">
                    <select class="form-control" name="penempatan" required>
                    	<option value=""><?php echo $lang_choose;?></option>
                    	<?php
$sql = $this->db->get('ap_penempatan');
foreach ($sql->result() as $val):
?>
                    <option value="<?php echo $val->id_penempatan;?>" <?php echo $val->id_penempatan==$content->id_penempatan ? 'selected':''; ?>>
                      <?php echo $val->uraian_penempatan;?>
                    </option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_eselon; ?></label>
					<div class="col-sm-8">
                    <select class="form-control" name="eselon" required>
                    	<option value=""><?php echo $lang_choose;?></option>
                    	<?php
$sql = $this->db->get('ap_eselon');
foreach ($sql->result() as $val):
?>
                    <option value="<?php echo $val->id_eselon;?>" <?php echo $val->id_eselon==$content->id_eselon ? 'selected':''; ?>>
                      <?php echo $val->uraian_eselon;?>
                    </option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_admin_rule; ?></label>
					<div class="col-sm-8">
                    <select class="form-control" name="rules" required>
                    	<option value=""><?php echo $lang_choose;?></option>
                    	<?php foreach ($rule as $val):?>
                    	<option value="<?php echo $val->id?>" <?php echo $val->id==$content->rules_id ? 'selected':''; ?>><?php echo $val->name?></option>
                    	<?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_admin_lang; ?></label>
					<div class="col-sm-8">
                    <select class="form-control" name="lang" required>
                    	<option value=""><?php echo $lang_choose;?></option>
                    	<?php foreach ($lang as $val):?>
                    	<option value="<?php echo $val->name?>" <?php echo $val->name==$content->lang_admin?'selected':'';?>><?php echo $val->name?></option>
                    	<?php endforeach;?>
                    </select>
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
      
    </div>
    