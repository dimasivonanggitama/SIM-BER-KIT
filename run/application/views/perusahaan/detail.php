	<div class="row">
        <div class="col-md-12">
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
                    <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_product_name;?>" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_product_desc;?></label>
                  <div class="col-sm-8">
                    <input type="text" name="ket" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_product_desc;?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Gambar Perusahaan';?></label>
				  <div class="col-sm-8">
                    <input type="file" name="filex" class="" id="exampleInputFile" accept=".gif,.png,.jpg,.jpeg" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Gambar Produk';?></label>
				  <div class="col-sm-8">
                    <input type="file" name="file" class="" id="exampleInputFile" accept=".gif,.png,.jpg,.jpeg" required>
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
          <div class="box">
		    <div class="box-header">
              
            </div>
            <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo 'Gambar Perusahaan';?></th>
                  <th><?php echo 'Gambar Produk';?></th>
                  <th><?php echo $lang_product_name;?></th>
                  <th><?php echo $lang_product_desc;?></th>
                  <th><?php echo $lang_action;?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($produk as $val):
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td>
                  <?php if ($val->imagex_perusahaan_produk!=NULL){?>
					<img width="200px" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $val->imagex_perusahaan_produk;?>" alt="Photo">
				  <?php }?>
				  </td>
                  <td>
					<img width="200px" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $val->image_perusahaan_produk;?>" alt="Photo">
				  </td>
				  <td><?php echo $val->nama_perusahaan_produk;?></td>
				  <td><?php echo $val->ket_perusahaan_produk;?></td>
				  <td align="center">
				  	<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete_produk/'.$this->uri->rsegment(3).'/'.$val->id_perusahaan_produk);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> |
				  	<a href="<?php echo base_url($this->uri->rsegment(1).'/detail_edit/'.$this->uri->rsegment(3).'/'.$val->id_perusahaan_produk);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
				  </td>
                </tr>
                <?php
                $no++;
                endforeach;
                ?>
                </tbody>
              </table>	  
             </div>
          </div>
      </div>
      <div class="col-md-8">
		  <div class="box">
		  <div class="box-header">
            </div>
            <div class="box-body">
              <head><?php echo $map['js']; ?></head>
			  <body><?php echo $map['html']; ?></body>
             </div>
          </div>
      </div>
      <div class="col-md-4">
		  <div class="box">
		  <div class="box-header">
              <?php echo $lang_detail;?>
            </div>
            <div class="box-body">
              <div id="isi_detail"></div>
             </div>
          </div>
      </div>
      
     </div>