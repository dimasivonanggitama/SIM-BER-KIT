<div class="row">
        <div class="col-md-12">
		  <div class="box">
            <div class="box-header">
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
                      <th><div align="center"><?php echo $lang_employee_atasan?></div></th>
                      <th><div align="center"><?php echo $lang_bulan_cctv?></div></th>
                      <th><div align="center"><?php echo $lang_tahun_cctv?></div></th>
                      <th><div align="center"><?php echo $lang_kawasan_cctv?></div></th>
                      <th><div align="center"><?php echo $lang_hanggar_cctv?></div></th>
                      <th><div align="center"><?php echo $lang_alamat_cctv?></div></th>
                      <th><div align="center"><?php echo 'Tanggal Pengajuan';?></div></th>
                      <th><div align="center"><?php echo 'Status' ;?></div></th>
                      <th><div align="center"><?php echo $lang_action;?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" >
                <?php
                  $sql = "SELECT * FROM ap_admin WHERE id_admin=?";
                  $query = $this->db->query($sql,array($val->id_atasan));
                  $row = $query->row();
                  if (isset($row))
                  {
                    echo $row->name_admin;
                  }
                ?>
              </div></td>
							<td><div align="center" ><?php echo bulan($val->bulan_cctv)?></div></td>
							<td><div align="center" ><?php echo $val->tahun_cctv?></div></td>
							<td><div align="left" >
              <?php
               if($val->kawasan_berikat_cctv == NULL){
$sql = "SELECT * FROM ap_perusahaan WHERE id_perusahaan=?";
$query = $this->db->query($sql,array($val->id_perusahaan));
$row = $query->row();
if (isset($row))
{
    echo $row->nama_perusahaan;
}
               }else{echo $val->kawasan_berikat_cctv;}
              ?>
              </div></td>
							<td><div align="center" ><?php echo $val->hanggar_cctv;?></div></td>
							<td><div align="left" >
              <?php
               if($val->kawasan_berikat_cctv == NULL){
$sql = "SELECT * FROM ap_perusahaan WHERE id_perusahaan=?";
$query = $this->db->query($sql,array($val->id_perusahaan));
$row = $query->row();
if (isset($row))
{
    echo $row->alamat_perusahaan.' - '.$row->kota_perusahaan;
}
               }else{echo $val->alamat_cctv;}
              ?>
              </div></td>
							<td><div align="center" ><?php if($val->date_create_cctv == NULL){echo '-';}else{echo date('d-m-Y H:i:s',strtotime($val->date_create_cctv));}?></div></td>
							<td><div align="center" >
                  <?php 
                  $sql1 = "SELECT * FROM ap_cctv_cek WHERE id_cctv=? ORDER BY id_cctv_cek DESC LIMIT 1";
                  $query1 = $this->db->query($sql1,array($val->id_cctv));
                  $row1 = $query1->row();
                  if (isset($row1)){
                  if($row1->ya_tidak_cctv_cek == 1 && $val->flag_format_baru == 1 && $val->flag_pengajuan == 1){
                    echo "<small class='label bg-green'>INS-04/BC/2016</small>";
                  }elseif($row1->ya_tidak_cctv_cek == 0 && $val->flag_format_baru == 1 && $val->flag_pengajuan == 1 || $row1->ya_tidak_cctv_cek == 2 && $val->flag_format_baru == 1 && $val->flag_pengajuan == 1){
                    echo "<small class='label bg-orange'>INS-04/BC/2016</small>";
                  }elseif($val->flag_pengajuan == 0 && $val->flag_format_baru == 1){echo "<small class='label bg-red'>Belum Rekam</small>";}else{echo '-';}}
                  if (!isset($row1)){
                    echo "<small class='label bg-red'>Belum Rekam</small>";
                  }
                  ?>
              </div></td>
							<td align="center">
                  <?php if($val->flag_format_baru == 0){ ?>
                        <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_pdf_cctv_old/'.$val->id_cctv);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                  <?php }elseif($val->flag_pengajuan == 1 && $val->flag_format_baru == 1) {?>
                    <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_pdf_cctv/'.$val->id_cctv);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                  <?php }elseif($val->flag_pengajuan == 0 && $val->flag_format_baru == 1){echo '-';} ?>
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
      </div>
      
     </div>