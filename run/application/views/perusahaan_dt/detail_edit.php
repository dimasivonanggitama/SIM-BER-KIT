	<div class="row">
        <div class="col-md-8">
		  <div class="box">
		    <div class="box-header">
		    	<?php echo $lang_product_image;?>
            </div>
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jenis Doc Transaksi</label>
				 <div class="col-sm-8">
                    	<select class="form-control" name="jenis_doc" required>
                    		<option>-- Pilih --</option>
                    		<?php foreach ($jenis_dt as $val):?>
                    		<option value="<?php echo $val->nama_perusahaan_pjd?>"<?php echo $val->nama_perusahaan_pjd==$content->jenis_doc_perusahaan_dt ? 'selected':'';?>><?php echo $val->nama_perusahaan_pjd?></option>
                    	<?php 
                    	   endforeach;
                    	?>
                    	</select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Bulan</label>
                  <div class="col-sm-8">
                  		<input type="text" name="bulan" class="form-control datepickerbulan" id="inputEmail3" placeholder="" value="<?php echo $content->bulan_perusahaan_dt?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Tahun</label>
				  <div class="col-sm-8">
                    <input type="text" name="tahun" class="form-control datepickertahun" id="inputEmail3" placeholder="" value="<?php echo $content->tahun_perusahaan_dt?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Doc Transaksi</label>
				 <div class="col-sm-8">
                    <input type="number" name="jumlah_doc" class="form-control" id="inputEmail3" placeholder="" value="<?php echo $content->jumlah_doc_perusahaan_dt?>" required>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_add;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
          </div>
          
      </div>
     </div>