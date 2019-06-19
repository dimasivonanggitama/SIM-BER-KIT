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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_nama_peraturan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="nama_peraturan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_nama_peraturan;?>" value="<?php echo $content->nama_peraturan?>" required  disabled>
                  </div>
                </div>
                <?php if ($content->nama_slide!=''){?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_file_slide;?></label>
				  <div class="col-sm-8">
                    <a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$content->nama_slide);?>"><i class="fa fa-download"></i> <?php echo $lang_download;?></a>
                  </div>
                </div>
                <?php }?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_upload_slide;?></label>
				<div class="col-sm-8">
                    <input type="file" name="file_nama_slide" class="" id="exampleInputFile" accept=".pdf, .doc, .docx, application/vnd.ms-powerpoint,
                    application/vnd.openxmlformats-officedocument.presentationml.slideshow,
                    application/vnd.openxmlformats-officedocument.presentationml.presentation" required>
                  </div>
                </div>
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">

         