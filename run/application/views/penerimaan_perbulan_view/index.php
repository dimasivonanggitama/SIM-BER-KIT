	<div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header" style="display: none;">
                <div class="col-sm-2">
				<input type="text" name="bulan" class="form-control datepickerbulan" id="bulan" placeholder="" value="<?php echo $bulan?>" required>              
                </div>
             <div class="col-sm-2">
             	<input type="text" name="tahun" class="form-control datepickertahun" id="tahun" placeholder="" value="<?php echo $tahun?>" required>
             </div>
              <div class="col-sm-2">
              <button type="button" class="btn btn-success" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/')?>'+parseInt(bulan.value)+'/'+tahun.value;"><?php echo $lang_cari;?></button>
              
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
                  <th><div align="center"><?php echo 'Bulan' ?></div></th>
                  <th><div align="center"><?php echo 'Tahun' ?></div></th>
                  <th><div align="center"><?php echo 'Pabean' ?></div></th>
                  <th><div align="center"><?php echo 'Cukai' ?></div></th>
                  <th><div align="center"><?php echo 'Tanggal Buat'?></div></th>
                  <th><div align="center"><?php echo 'Tanggal Update'?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" ><?php echo bulan($val->bulan_penerimaan_perbulan)?></div></td>
							<td><div align="center" ><?php echo $val->tahun_penerimaan_perbulan?></div></td>
							<td><div align="center" ><?php echo number_format($val->pabean_penerimaan_perbulan);?></div></td>
							<td><div align="center" ><?php echo number_format($val->cukai_penerimaan_perbulan);?></div></td>
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_create_penerimaan_perbulan));?></div></td>
							<?php if($val->date_update_penerimaan_perbulan==''){?>
							<td></td>
							<?php }else{?>
							<td><div align="center" ><?php echo date('d-m-Y H:i:s',strtotime($val->date_update_penerimaan_perbulan));?></div></td>
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