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
                  <label for="inputEmail3" class="col-sm-4 control-label">Jenis Perusahaan Dokumen</label>
				 <div class="col-sm-8">
                    <select required class="form-control" name="jenis_dok">
                  <option><?php echo $lang_choose?></option>
                  <?php foreach ($pjd as $val):?>
                    <option <?php echo $val->id_perusahaan_pjd==$content->jenis_doc_perusahaan_dt?'selected':'';?> value="<?php echo $val->id_perusahaan_pjd?>"><?php echo $val->nama_perusahaan_pjd?></option>
                    <?php endforeach;?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Bulan</label>
				 <div class="col-sm-8">
                    <input type="text" name="bulan" class="form-control datepickerbulan" id="inputEmail3" placeholder="<?php echo date('m')?>" value="<?php echo $content->bulan_perusahaan_dt?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Tahun</label>
                 <div class="col-sm-8">
                  	<input type="text" name="tahun" class="form-control datepickertahun" id="inputEmail3" placeholder="<?php echo date('Y')?>" value="<?php echo $content->tahun_perusahaan_dt?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Dokumen</label>
                 <div class="col-sm-8">
                  	<input type="number" name="jumlah_dok" class="form-control" id="inputEmail3" placeholder="Jumlah Dokumen" value="<?php echo $content->jumlah_doc_perusahaan_dt?>" required>
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