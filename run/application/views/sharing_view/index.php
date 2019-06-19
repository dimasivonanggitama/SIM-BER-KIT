	<div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
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
                  <th>#</th>
                  <th><div align="center"><?php echo $lang_nama_arsip ?></div></th>
                  <th><div align="center"><?php echo $lang_sharing_kategori ?></div></th>
                  <th><div align="center"><?php echo $lang_sharing_keterangan?></div></th>
                  <th><div align="center"><?php echo $lang_sharing_file?></div></th>
                  <th><div align="center"><?php echo 'Dari'?></div></th>
                  <th><div align="center"><?php echo $lang_sharing_create?></div></th>
                  <th><div align="center"><?php echo $lang_sharing_update?></div></th>
                  
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" ><?php echo $val->nama_arsip?></div></td>
							<td><div align="center" ><?php echo $val->nama_arsip_kategori?></div></td>
							<td><div align="center" ><?php echo $val->ket_arsip;?></div></td>
							<td>
								<div align="center" >
								<?php if ($val->file_arsip!=''){?>
									<a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$val->file_arsip);?>" title="<?php echo $lang_download;?>"><i class="fa fa-download"></i></a>
                    				<a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$val->file_arsip);?>" title="<?php echo $lang_view;?>"><i class="fa fa-eye"></i></a>
                    			<?php } else {echo $lang_no_file;}?>
								</div>
							</td>
							<td><div align="center" ><?php echo $val->name_admin;?></div></td>
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_create_arsip));?></div></td>
							<?php if($val->date_update_arsip==NULL){?>
							<td></td>
							<?php }else{?>
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_update_arsip));?></div></td>
							<?php }?>
							
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