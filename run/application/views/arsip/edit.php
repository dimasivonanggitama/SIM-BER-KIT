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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_nama_arsip;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="nama_arsip" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_nama_arsip;?>" value="<?php echo $content->nama_arsip?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_arsip_kategori?></label>

                  <div class="col-sm-8">
                    <select class="form-control" name="kat_arsip" required>
                    	<option value="0"><?php echo $lang_without_parent;?></option>
                    	<?php foreach ($arsip_kate as $val):?>
                    	<option value="<?php echo $val->id_arsip_kategori?> "<?php echo $val->id_arsip_kategori==$content->id_arsip_kategori?'selected':'';?>><?php echo $val->nama_arsip_kategori?></option>
                    	<?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_arsip_keterangan;?></label>

                  <div class="col-sm-8">
                    <input type="text" name="ket_arsip" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_ket_peraturan;?>" value="<?php echo $content->ket_arsip?>" required>
                  </div>
                </div>
                <?php if ($content->file_arsip!=''){?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_arsip_file;?></label>
				  <div class="col-sm-8">
                    <a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$content->file_arsip);?>"><i class="fa fa-download"></i> <?php echo $lang_download;?></a>
                    <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$content->file_arsip);?>"><i class="fa fa-eye"></i> <?php echo $lang_view;?></a>
                  </div>
                </div>
                <?php }?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_arsip_file;?></label>
				  <div class="col-sm-8">
                    <input type="file" name="file_arsip" class="" id="exampleInputFile" accept=".pdf">
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

          <div class="box">
            <div class="box-header">
              <?php echo $lang_tree_view;?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="nav">
                <li><a href="<?php echo base_url($this->uri->rsegment(1).'/index/0');?>"><?php echo $lang_parent;?></a>
                  <ul>
                   <?php pohon_list($pohon, $parent_list, base_url($this->uri->rsegment(1)), 0 ,$parent);?>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    
    
	<?php 
      function pohon_list($all_data, $induk_list, $link, $induk, $parent){
        foreach ($all_data as $val):
            if ($val->parent_arsip_kategori==$induk){
                if ($val->id_arsip_kategori==$parent){
                    $selected ='class="selected"';
                } else {
                    $selected ='';
                }
                echo '<li '.$selected.'><a href="'.$link.'/index/'.$val->id_arsip_kategori.'">'.$val->nama_arsip_kategori.'</a>';
                if (in_array($val->id_arsip_kategori, $induk_list)) {
                    echo '<ul>';
                    pohon_list($all_data, $induk_list, $link, $val->id_arsip_kategori, $parent);
                    echo '</ul>';
                }
                echo '</li>';
            }
        endforeach;
      }
      ?>