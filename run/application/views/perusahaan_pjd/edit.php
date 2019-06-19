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
                  <label for="inputEmail3" class="col-sm-4 control-label">Nama Perekaman Jenis Dokumen</label>
				 <div class="col-sm-8">
                    <input type="text" name="nama_pjd" class="form-control" id="inputEmail3" placeholder="Nama Perekaman Jenis Dokumen" value="<?php echo $content->nama_perusahaan_pjd?>" required>
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
</div>   