<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header">
          </div>
          <!-- /.box-header -->
          <?php echo form_open_multipart('','class="form-horizontal"');?>
            <div class="box-body">
              <?php echo validation_errors();?>
              <div class="form-group">

                <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_tanggalterima_surat;?></label>
       <div class="col-sm-4">
                  <h4><?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y'); ?></h4>
                </div>

              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_naskahdinas_surat;?></label>

                <div class="col-sm-8">
                  <input type="text" name="nomor_naskah" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_naskahdinas_surat;?>" value="<?php echo $content->nomor_naskah?>" required>
                </div>
              </div>
              <script>
                  $(document).ready(function(){
                      var date_input=$('input[name="date"]'); //our date input has the name "date"
                      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                      date_input.datepicker({
                          format: 'mm/dd/yyyy',
                          container: container,
                          todayHighlight: true,
                          autoclose: true,
                      })
                  })
              </script>
              <div class="form-group">
                <label  for="date" class="col-sm-4 control-label"><?php echo $lang_tgldinas_surat;?></label>
                <div class="col-sm-8">
                  <input class="form-control"  id="date" name="date" placeholder="<?php echo $lang_tgldinas_surat;?>" type="text" value="<?php echo $content->tgl_naskah?>" required autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_lampiran_surat;?></label>

                <div class="col-sm-8">
                  <input type="text" name="lampiran_naskah" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_lampiran_surat;?>" value="<?php echo $content->lampiran_naskah?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_sifat_surat?></label>
                <div class="col-sm-8">
                  <select class="form-control" name="sifat_kategori" required>
                    <option value="0"><?php echo $lang_without_parent;?></option>
                    <?php foreach ($sifat as $val):?>
                    <option value="<?php echo $val->id_sifat_kategori?> "<?php echo $val->id_sifat_kategori==$content->id_sifat_kategori?'selected':'';?>><?php echo $val->nama_sifat_kategori?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_jenissurat?></label>
                <div class="col-sm-8">
                  <select class="form-control" name="jenis_kategori" required>
                    <option value="0"><?php echo $lang_without_parent;?></option>
                    <?php foreach ($jenis as $val):?>
                    <option value="<?php echo $val->id_jenis_kategori?> "<?php echo $val->id_jenis_kategori==$content->id_jenis_kategori?'selected':'';?>><?php echo $val->nama_jenis_kategori?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_untuk_surat;?></label>

                <div class="col-sm-8">
                  <input type="text" name="dari_naskah" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_untuk_surat;?>" value="<?php echo $content->dari_naskah?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_hal_surat;?></label>

                <div class="col-sm-8">
                  <input type="text" name="perihal_naskah" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_hal_surat;?>" value="<?php echo $content->perihal_naskah?>" required>
                </div>
              </div>
              <?php if ($content->file_surat!=''){?>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_filesurat;?></label>
        <div class="col-sm-8">
                </div>
              </div>
              <?php }?>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_filesurat;?></label>
      <div class="col-sm-8">
                  <input type="file" name="file_surat" class="" id="exampleInputFile">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" onclick="location.href='<?php echo base_url();?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
              <button type="submit" class="btn btn-info pull-right" onclick="return confirm('<?php echo $lang_are_you_sure;?>?');"><?php echo $lang_save;?></button>
            </div>
            <!-- /.box-footer -->
          <?php echo form_close();?>

        </div>
        <!-- /.box -->
      </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      </div>
      <div class="col-md-3">
      </div>
</div>
