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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_product_name;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_product_name;?>" value="<?php echo $gambar->nama_perusahaan_produk?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_product_desc;?></label>
                  <div class="col-sm-8">
                    <input type="text" name="ket" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_product_desc;?>" value="<?php echo $gambar->ket_perusahaan_produk?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Gambar Lama</label>
				  <div class="col-sm-8">
                    <img width="200px" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $gambar->imagex_perusahaan_produk;?>" alt="Photo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Gambar Perusahaan';?></label>
				  <div class="col-sm-8">
                    <input type="file" name="filex" class="" id="exampleInputFilex" accept=".gif,.png,.jpg,.jpeg">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Gambar Lama</label>
				  <div class="col-sm-8">
                    <img width="200px" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $gambar->image_perusahaan_produk;?>" alt="Photo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Gambar Produk';?></label>
				  <div class="col-sm-8">
                    <input type="file" name="file" class=""  id="exampleInputFile" accept=".gif,.png,.jpg,.jpeg">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/detail/'.$this->uri->rsegment(3));?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_add;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
          </div>
      </div>
    </div>