<?php if (!empty($this->session->flashdata('status'))){?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('status');?>!
  </div>
<?php }?>

	<div class="row">    
    <div class="col-md-5">
          <div class="box">
            <div class="box-header">
            <div><h6 align="left"><?php echo $hanggar; ?></h6></div>
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo "Perusahaan";?></label>
                  <div class="col-sm-8">
                    <select required class="form-control select2" style="width: 100%;"  name="peru">
                    <option disabled selected>Pilih</option>
                    <?php foreach ($dt_perusahaan as $val):?>
                      <option value="<?php echo $val->id_perusahaan;?>"><?php echo $val->nama_perusahaan;?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
                </div>    
                </div>            
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default"><?php echo $lang_back;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            </div>
          </div>
          <!-- /.box -->
        </div>


<?php if($group != NULL){ ?>
<div class="row">
        <div class="col-md-10">

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
                  <th><div align="center"><?php echo "Nama Perusahaan";?></div></th>
                  <th><div align="center"><?php echo "Hapus";?></div></th>
                  
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($group as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
              <td><div align="center" ><?php echo $val->nama_perusahaan;?></div></td>
							<td><div align="center" ><a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id_penempatan.'/'.$val->id_perusahaan);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></div></td>
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