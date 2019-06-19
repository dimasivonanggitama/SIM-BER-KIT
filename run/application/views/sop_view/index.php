	<div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
             <div class="col-sm-4">
               <select class="form-control" name="kat_peraturan" required onchange="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/')?>'+this.value;">
                    	<option value="0"><?php echo $lang_semua;?> <?php echo $lang_category?></option>
                    	<?php foreach ($sop_kate as $val):?>
                    	<option value="<?php echo $val->id_sop_kategori?>" <?php echo $val->id_sop_kategori==$this->uri->rsegment(3)?'selected':'';?>><?php echo $val->nama_sop_kategori?></option>
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
                  <th><div align="center"><?php echo $lang_nama_sop ?></div></th>
                  <th><div align="center"><?php echo $lang_sop_kategori ?></div></th>
                  <th><div align="center"><?php echo $lang_sop_keterangan?></div></th>
                  <th><div align="center"><?php echo $lang_sop_file?></div></th>
                  <th><div align="center"><?php echo $lang_sop_create?></div></th>
                  <th><div align="center"><?php echo $lang_sop_update?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" ><?php echo $val->nama_sop?></div></td>
							<td><div align="center" ><?php echo $val->nama_sop_kategori?></div></td>
							<td><div align="center" ><?php echo $val->keterangan_sop;?></div></td>
							<td>
								<div align="center" >
								<?php if ($val->file_sop!=''){?>
									<a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$val->file_sop);?>" title="<?php echo $lang_download;?>"><i class="fa fa-download"></i></a>
                    				<a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$val->file_sop);?>" title="<?php echo $lang_view;?>"><i class="fa fa-eye"></i></a>
                    			<?php } else {echo $lang_no_file;}?>
								</div>
							</td>
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_create_sop));?></div></td>
							<?php if($val->date_update_sop==NULL){?>
							<td></td>
							<?php }else{?>
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_update_sop));?></div></td>
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