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
                    <input type="text" name="nama_peraturan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_nama_peraturan;?>" value="<?php echo $content->nama_peraturan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_name; ?> <?php echo $lang_category?></label>

                  <div class="col-sm-8">
                    <select class="form-control" name="kat_peraturan" required>
                    	<option value="0"><?php echo $lang_without_parent;?></option>
                    	<?php foreach ($peraturan_kate as $val):?>
                    	<option value="<?php echo $val->id_peraturan_kategori?>" <?php echo $val->id_peraturan_kategori==$content->id_peraturan_kategori?'selected':'';?>><?php echo $val->nama_peraturan_kategori?></option>
                    	<?php endforeach;?>
                    </select>
                  </div>
                </div>
        <div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_tanggal_berlaku;?></label>
					<div class="col-sm-8">
						<input type="text" name="tgl_berlaku"
							class="form-control datepicker" id="inputEmail3" value="<?php if($content->date_berlaku_peraturan != null){echo $content->date_berlaku_peraturan==''?date('Y-m-d'):date('Y-m-d',strtotime($content->date_berlaku_peraturan));}?>"
							placeholder="<?php echo $lang_tanggal_berlaku;?>"
							data-date-end-date="+1d" required>
					</div>
        </div>
        <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_peraturan_group; ?></label>
					<div class="col-sm-8">
                    <select class="form-control" name="pgroup" required>
                    	<option value=""><?php echo $lang_choose;?></option>
                    	<?php
$sql = $this->db->get('ap_peraturan_group');
foreach ($sql->result() as $val):
?>
                    <option value="<?php echo $val->id_peraturan_group;?>" <?php echo $val->id_peraturan_group==$content->id_peraturan_group ? 'selected':''; ?>>
                      <?php echo $val->uraian_peraturan_group;?>
                    </option>
                    <?php endforeach;?>
                    </select>
					</div>
        </div>
        <div class="form-group">
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_peraturan_status; ?></label>
					<div class="col-sm-8">
                    <select class="form-control" name="pstatus" required>
                    	<option value=""><?php echo $lang_choose;?></option>
                    	<?php
$sql = $this->db->get('ap_peraturan_status');
foreach ($sql->result() as $val):
?>
                    <option value="<?php echo $val->id_peraturan_status;?>" <?php echo $val->id_peraturan_status==$content->id_peraturan_status ? 'selected':''; ?>>
                      <?php echo $val->uraian_peraturan_status;?>
                    </option>
                    <?php endforeach;?>
                    </select>
					</div>
        </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_ket_peraturan;?></label>
                  <div class="col-sm-8">
                    <input type="text" name="ket_peraturan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_ket_peraturan;?>" value="<?php echo $content->keterangan_peraturan?>" required>
                  </div>
                </div>
                <?php if ($content->file_peraturan!=''){?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_file_peraturan;?></label>
				  <div class="col-sm-8">
                    <a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$content->file_peraturan);?>"><i class="fa fa-download"></i> <?php echo $lang_download;?></a>
                    <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$content->file_peraturan);?>"><i class="fa fa-eye"></i> <?php echo $lang_view;?></a>
                  </div>
                </div>
                <?php }?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_file_peraturan;?></label>
				<div class="col-sm-8">
                    <input type="file" name="file_peraturan" class="" id="exampleInputFile" accept=".pdf">
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
            if ($val->parent_peraturan_kategori==$induk){
                
                echo '<li '.$selected.'><a href="'.$link.'/index/'.$val->id_peraturan_kategori.'">'.$val->nama_peraturan_kategori.'</a>';
                if (in_array($val->id_peraturan_kategori, $induk_list)) {
                    echo '<ul>';
                    pohon_list($all_data, $induk_list, $link, $val->id_peraturan_kategori, $parent);
                    echo '</ul>';
                }
                echo '</li>';
            }
        endforeach;
      }
      ?>