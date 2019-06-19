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
                  <label for="inputEmail4" class="col-sm-4 control-label"><?php echo $lang_sharing_kategori?></label>

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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_sharing_keterangan;?></label>

                  <div class="col-sm-8">
                    <input type="text" name="ket_arsip" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_ket_peraturan;?>" value="<?php echo $content->ket_arsip?>" required>
                  </div>
                </div>
                <?php if ($content->file_arsip!=''){?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_sharing_file;?></label>
				  <div class="col-sm-8">
                    <a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$content->file_arsip);?>"><i class="fa fa-download"></i> <?php echo $lang_download;?></a>
                    <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$content->file_arsip);?>"><i class="fa fa-eye"></i> <?php echo $lang_view;?></a>
                  </div>
                </div>
                <?php }?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_sharing_file;?></label>
				            <div class="col-sm-8">
                    <input type="file" name="file_arsip" class="form-control" id="exampleInputFile">
                  </div>
                </div>
              <div class="form-group">
				        <div class="col-sm-8" style="margin: 0px auto; float: right;">

                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><div align="center"><?php echo "Nama Unit";?></div></th>
                  <th><div align="center"><?php echo "View PIC"?></div></th>
                  <th><div align="center"><?php echo "Check Sharing"?></div></th>
                </tr>
                </thead>
                	<tbody>
                    <?php 
                      foreach($dt_ref_sharing as $val):
                        if($dt_ref_sharing != NULL){
                    ?>
                    <tr>
                      <?php $sql1 = "SELECT * FROM ap_penempatan WHERE id_penempatan=?";
                            $query1 = $this->db->query($sql1,array($val->id_penempatan));
                            $penem = $query1->row();
                      ?>
                      <td><div align="center" ><?php echo $penem->uraian_penempatan; ?></div></td>
                      <td><div align="center" >               
                            <a data-toggle="modal" href="#isShow_<?php echo $val->id_penempatan;?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                            <div class="modal fade" id="isShow_<?php echo $val->id_penempatan;?>">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Data PIC</h4>
                            </div>
                            <div class="modal-body">
                            <table class="table">
                            <thead>
                                <th><div align="Left"><?php echo "No.";?></div></th>
                                <th><div align="Left"><?php echo "Nama / NIP";?></div></th>
                            </thead>
                            <tbody>
                                <?php 
                                  $sql3 = "SELECT st1.name_admin, st1.nip_admin FROM ap_admin st1 LEFT JOIN ap_sharing_pic st2 ON (st1.id_admin = st2.id_admin)WHERE st2.id_penempatan=?";
                                  $query3 = $this->db->query($sql3,array($val->id_penempatan));
                                  if (isset($query3)){
                                  $nox=1;
                                  foreach ($query3->result() as $row2):
                                ?>
                                <tr>
                                    <td><div><?php echo $nox; ?></div></td>
                                    <td><div><?php echo $row2->name_admin.' / '.$row2->nip_admin;?></div></td>
                                </tr>
                                    <?php $nox++; endforeach;}?>
                            </tbody>
                            </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
            
                      </div></td>
                      <td><div align="center" >
                        <label>
                          <input <?php echo in_array($val->id_penempatan,$module_saat_ini)?'checked':'';?> type="checkbox" class="minimal-red" name="module[]" value="<?php echo $val->id_penempatan;?>">
                        </label>
                      </div></td>
                    </tr>
                    <?php } endforeach; ?>
                	</tbody>
                </table>
                               
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

<!-- row -->
</div>
    
