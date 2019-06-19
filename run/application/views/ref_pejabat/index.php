<?php if (!empty($this->session->flashdata('status'))){?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('status');?>!
  </div>
<?php }?>

<?php if($ref_jabatan != NULL){ ?>
	<div class="row">    
    <div class="col-md-5">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo "Jabatan";?></label>
                  <div class="col-sm-8">
                    <select required class="form-control select2" style="width: 100%;"  name="id_jabatan">
                    <option disabled selected>Jabatan</option>
                    <?php foreach ($ref_jabatan as $val1):?>
                      <option value="<?php echo $val1->id_jabatan;?>"><?php echo $val1->uraian_jabatan;?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo "Pejabat";?></label>
                  <div class="col-sm-8">
                    <select required class="form-control select2" style="width: 100%;"  name="id_pejabat">
                    <option disabled selected>Pejabat</option>
                    <?php foreach ($ref_pegawai as $val2):?>
                      <option value="<?php echo $val2->id_admin;?>"><?php echo $val2->name_admin;?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>   
                </div>            
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            </div>
          </div>
          <!-- /.box -->
        </div>
<?php } ?>

<?php if($dt_pejabat != NULL){ ?>
<div class="row">
        <div class="col-md-7">
		  <div class="box">
            <div class="box-body">
              <?php if (!empty($this->session->flashdata('status'))){?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('status');?>!
              </div>
              <?php }?>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><div align="center"><?php echo "No.";?></div></th>
                  <th><div align="center"><?php echo "Jabatan";?></div></th>
                  <th><div align="center"><?php echo "Pejabat";?></div></th>
                  <th><div align="center"><?php echo "Hapus";?></div></th>
                </tr>
                </thead>
                	<tbody>
                    <?php 
                	$no=1;
                	foreach ($dt_pejabat as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
                            <td><div align="center" ><?php echo $val->uraian_jabatan;?></div></td>
                            <td><div align="center" ><?php echo $val->name_admin;?></div></td>
                            <td><div align="center" ><a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id_pejabat);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></div></td>
						</tr>
                        <?php 
					$no++;
					endforeach;?>
                	</tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php } ?>