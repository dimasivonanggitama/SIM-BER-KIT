	<div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-sm-3">
               <select class="form-control" name="kat_peraturan" required onchange="filternya()" id="cate">
                      <option value="0">Kategori Perusahaan</option>
                      <?php foreach ($peru_cate as $val):?>
                      <option value="<?php echo $val->id_perusahaan_kategori;?>" <?php echo $val->id_perusahaan_kategori==$this->uri->rsegment(6)?'selected':'';?>> <?php echo $val->nama_perusahaan_kategori?> </option> 
                      <?php endforeach;?>
                </select>
                </div>
              <div class="col-sm-3">
               <select class="form-control" name="kat_peraturan" required onchange="filternya()" id="kota">
                      <option value="0"><?php echo $lang_all_city;?></option>
                      <?php foreach ($kota as $val):?>
                      <?php if ($val->kota_perusahaan!=''){?>
                      <option value="<?php echo str_replace(' ', '_', $val->kota_perusahaan);?>" <?php echo str_replace(' ', '_', $val->kota_perusahaan)==$this->uri->rsegment(3)?'selected':'';?>><?php echo $val->kota_perusahaan?></option>
                      <?php }?>
                      <?php endforeach;?>
                </select>
                </div>
                <div class="col-sm-2">
               <select class="form-control" name="kat_peraturan" required onchange="filternya()" id="status">
                      <option value="0"><?php echo $lang_all_status;?></option>
                      <?php foreach ($status as $val):?>
                      <?php if ($val->status_perusahaan!=''){?>
                      <option value="<?php echo str_replace(' ', '_', $val->status_perusahaan);?>" <?php echo str_replace(' ', '_', $val->status_perusahaan)==$this->uri->rsegment(4)?'selected':'';?>><?php echo $val->status_perusahaan?></option>
                      <?php }?>
                      <?php endforeach;?>
                </select>
                </div>
                
                <div class="col-sm-3">
               <select class="form-control" name="kat_peraturan" required onchange="filternya()" id="skep">
                      <option value="0"><?php echo $lang_all_year;?></option>
                      <?php foreach ($tahun as $val):?>
                      <?php if ($val->tgl_skep_penetapan_perusahaan!=''){?>
                      <?php $skep=explode('-', $val->tgl_skep_penetapan_perusahaan);?>
                      <option value="<?php echo $skep[0];?>" <?php echo $skep[0]==$this->uri->rsegment(5)?'selected':'';?>><?php echo $skep[0]?></option>
                      <?php }?>
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
                  <th><div align="center">#</div></th>
                  <th><div align="center"><?php echo $lang_peru_nama?></div></th>
                  <th><div align="center"><?php echo $lang_peru_alamat;?></div></th>
                  <th><div align="center">Perusahaan Kategori</div></th>
                  <th><div align="center">Skep Perusahaan</div></th>
                  <th><div align="center"><?php echo $lang_action;?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" ><?php echo $val->nama_perusahaan?></div></td>
							<td><div align="left" ><?php echo $val->alamat_perusahaan?></div></td>
							<td><div align="center" ><?php echo $val->nama_perusahaan_kategori?></div></td>
							<td><div align="center" ><?php echo $val->tgl_skep_perubahan_perusahaan?></div></td>
							<td align="center">
								<a href="<?php echo base_url($this->uri->rsegment(1).'/view/'.$val->id_perusahaan);?>" title="Data Transaksi" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
								<a href="<?php echo base_url($this->uri->rsegment(1).'/detail/'.$val->id_perusahaan);?>" title="Data Transaksi" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
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