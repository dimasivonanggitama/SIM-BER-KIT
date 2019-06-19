<div class="row">
        <div class="col-md-12">

          <div class="box">
          
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
                  <th><div align="center"><?php echo 'No.'; ?></div</th>
                  <th><div align="center"><?php echo $lang_realisasi_penerimaan; ?></div></th>
                  <th><div align="center"><?php echo $lang_target_penerimaan; ?></div></th>
                  <th><div align="center"><?php echo $lang_capaian_penerimaan; ?></div></th>
                  <th><div align="center"><?php echo $lang_date_create_penerimaan; ?></div></th>
                  <th><div align="center"><?php echo $lang_date_update_penerimaan; ?></div></th>
                  <th><div align="center"><?php echo $lang_date_penerimaan; ?></div></th>
                  <th><div align="center"><?php echo $lang_action; ?></div></th>
                </tr>
              </thead>
              <tbody>
            <?php 
            $no=1;
            foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" ><?php echo number_format($val->realisasi_penerimaan);?></div></td>
							<td><div align="center" ><?php echo number_format($val->target_penerimaan);?></div></td>
							<td><div align="center" ><?php echo number_format($val->capaian_penerimaan,2);?></div></td>
							<td><div align="center" ><?php echo date('Y-m-d H:i:s',strtotime($val->date_create_penerimaan));?></div></td>
							<td><div align="center" ><?php if($val->date_update_penerimaan==NULL){echo '-';}else{echo date('Y-m-d H:i:s',strtotime($val->date_update_penerimaan));}?></div></td>
							<td><div align="center"><?php echo $val->date_penerimaan?></div></td>
							<td><div align="center">
            	  <a href="<?php echo base_url($this->uri->rsegment(1).'/view/'.$val->id_penerimaan);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
            	</div></td>
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