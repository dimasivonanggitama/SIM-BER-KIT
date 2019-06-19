	<div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-info pull-right" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit/')?>';"><?php echo $lang_add;?></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php if (!empty($this->session->flashdata('status'))){?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('status');?>!
              </div>
              <?php }?>
              <table id="example1" class="table table-bordered table-striped nowrap" cellscpacing="0" width="100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th><div align="center"><?php echo $lang_pm_nama ?></div></th>
                  <th><div align="center"><?php echo $lang_pm_uraian ?></div></th>
                  <th><div align="center"><?php echo $lang_pm_start?></div></th>
                  <th><div align="center"><?php echo $lang_pm_end?></div></th>
                  <th> File Pengumuman </th>
                  <th><div align="center"><?php echo $lang_pm_create?></div></th>
                  <th><div align="center"><?php echo $lang_pm_update?></div></th>
                  <th><div align="center"><?php echo $lang_selisih_pm?></div></th>
                  <th><div align="center"><?php echo $lang_action;?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" ><?php echo $val->nama_pengumuman?></div></td>
							<td><div align="center" ><?php echo $val->uraian_pengumuman?></div></td>
							<td><div align="left" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_start_pengumuman));?></div></td>
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_end_pengumuman));?></div></td>
							<td>
							
								<div align="center" >
								<?php if ($val->file_pengumuman!=''){?>
									<a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$val->file_pengumuman);?>" title="<?php echo $lang_download;?>"><i class="fa fa-download"></i></a>
                    				<a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$val->file_pengumuman);?>" title="<?php echo $lang_view;?>"><i class="fa fa-eye"></i></a>
                    			<?php } else {echo $lang_no_file;}?>
								</div>
								
							</td>
							
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_create_pengumuman));?></div></td>
							<?php if($val->date_update_pengumuman==NULL){?>
							<td><div align="center" ></div></td>
							<?php }else{?>
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_update_pengumuman));?></div></td>
							<?php } ?>
							<td>
								<div align="center">
											<?php 
    											$start_date = new DateTime($val->date_start_pengumuman);
    											$end_date = new DateTime($val->date_end_pengumuman);
                                                
    											echo $end_date->diff($start_date)->format('%a hari %h jam %i menit %s detik'); 
                                                
                                             ?>
								</div>
							</td>	 
							<td align="center">
            					<a href="<?php echo base_url($this->uri->rsegment(1).'/edit/'.$val->id_pengumuman);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
            					<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id_pengumuman);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
				  			</td>
				  			
						</tr>
					<?php 
					$no++;
					endforeach;?>	                	
                	</tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      
        <!-- /.col -->
      </div>
      
</div>     