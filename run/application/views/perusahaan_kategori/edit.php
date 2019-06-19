	<div class="row">
        <div class="col-md-6">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $lang_name_perukate;?></label>

                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_name_perukate;?>" value="<?php echo $content->nama_perusahaan_kategori;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-2 control-label"><?php echo $lang_parent;?></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="parent" required>
                    	<option value="0"><?php echo $lang_without_parent;?></option>
                    	<?php foreach ($induk as $val ):?>
                    	<?php if ($content->id_perusahaan_kategori!=$val->id_perusahaan_kategori){?>
                    	<option <?php echo $val->id_perusahaan_kategori==$content->parent_perusahaan_kategori?'selected':'';?> value="<?php echo $val->id_perusahaan_kategori;?>"><?php echo $val->nama_perusahaan_kategori;?></option>
                    	<?php }?>
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
            if ($val->parent_perusahaan_kategori==$induk){
                if ($val->id_perusahaan_kategori==$parent){
                    $selected ='class="selected"';
                } else {
                    $selected ='';
                }
                echo '<li '.$selected.'><a href="'.$link.'/index/'.$val->id_perusahaan_kategori.'">'.$val->nama_perusahaan_kategori.'</a>';
                if (in_array($val->id_perusahaan_kategori, $induk_list)) {
                    echo '<ul>';
                    pohon_list($all_data, $induk_list, $link, $val->id_perusahaan_kategori, $parent);
                    echo '</ul>';
                }
                echo '</li>';
            }
        endforeach;
      }
      ?>