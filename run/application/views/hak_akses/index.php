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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><div align="center">#</div></th>
                  <th><div align="center"><?php echo $lang_nama_hak ?></div></th>
                  <th><div align="center"><?php echo $lang_action;?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" ><?php echo $val->name?></div></td>
							<td align="center">
								<a href="<?php echo base_url($this->uri->rsegment(1).'/edit/'.$val->id);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
            					<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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