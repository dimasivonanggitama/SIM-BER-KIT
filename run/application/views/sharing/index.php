	<div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-info pull-right" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit/')?>';"><?php echo $lang_add;?></button>
             <div class="col-sm-4">
               <select class="form-control" name="kat_peraturan" required onchange="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/')?>'+this.value;">
                    	<option value="0"><?php echo $lang_semua;?> <?php echo $lang_category?></option>
                    	<?php foreach ($arsip_kate as $val):?>
                    	<option value="<?php echo $val->id_arsip_kategori?>" <?php echo $val->id_arsip_kategori==$this->uri->rsegment(3)?'selected':'';?>><?php echo $val->nama_arsip_kategori?></option>
                    	<?php endforeach;?>
                </select>
                </div>
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
                  <th><div align="center"><?php echo $lang_sharing_create?></div></th>
                  <th><div align="center"><?php echo $lang_sharing_update?></div></th>
                  <th><div align="center"><?php echo $lang_action;?></div></th>
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
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_create_arsip));?></div></td>
							<?php if($val->date_update_arsip==NULL){?>
							<td></td>
							<?php }else{?>
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_update_arsip));?></div></td>
							<?php }?>
							<td align="center">
            					<a href="<?php echo base_url($this->uri->rsegment(1).'/edit/'.$val->id_arsip);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
            					<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id_arsip);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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