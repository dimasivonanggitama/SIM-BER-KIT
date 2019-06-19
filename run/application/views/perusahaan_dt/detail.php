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
                    		<option value="<?php echo $val->nama_perusahaan_pjd?>"><?php echo $val->nama_perusahaan_pjd?></option>
                    	<?php 
                    	   endforeach;
                    	?>
                    	</select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Bulan</label>
                  <div class="col-sm-8">
                  		<input type="text" name="bulan" class="form-control datepickerbulan" id="inputEmail3" placeholder="" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Tahun</label>
				  <div class="col-sm-8">
                    <input type="text" name="tahun" class="form-control datepickertahun" id="inputEmail3" placeholder="" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Jumlah Doc Transaksi</label>
				 <div class="col-sm-8">
                    <input type="number" name="jumlah_doc" class="form-control" id="inputEmail3" placeholder="" value="0" required>
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
                  <th> Jenis Doc Transaksi </th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Jumlah</th>
                  <th><div align="center"><?php echo $lang_action;?></div></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($content as $val):
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td>
					<?php echo $val->jenis_doc_perusahaan_dt?>
				  </td>
				  <td><?php echo bulan($val->bulan_perusahaan_dt)?></td>
				  <td><?php echo $val->tahun_perusahaan_dt;?></td>
				  <td align="center"><?php echo $val->jumlah_doc_perusahaan_dt;?></td>
				  <td align="center">
				  	<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete_dt/'.$this->uri->rsegment(3).'/'.$val->id_perusahaan_dt);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> |
				  	<a href="<?php echo base_url($this->uri->rsegment(1).'/detail_edit/'.$this->uri->rsegment(3).'/'.$val->id_perusahaan_dt);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
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