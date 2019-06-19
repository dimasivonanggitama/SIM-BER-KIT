	<div class="row">
        <div class="col-md-12">
		  <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-info pull-right" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit/')?>';"><?php echo $lang_add;?></button>
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
                      <th><div align="center"><?php echo "Atasan";?></div></th>
                      <th><div align="center"><?php echo $lang_bulan_cctv?></div></th>
                      <th><div align="center"><?php echo $lang_tahun_cctv?></div></th>
                      <th><div align="center"><?php echo $lang_kawasan_cctv?></div></th>
                      <th><div align="center"><?php echo $lang_hanggar_cctv?></div></th>
                      <th><div align="center"><?php echo $lang_alamat_cctv?></div></th>
                      <th><div align="center"><?php echo "Tanggal Pengajuan"?></div></th>
                      <th><div align="center"><?php echo $lang_action;?></div></th>
                      <th><div align="center"><?php echo "Status"?></div></th>
                      <th><div align="center"><?php echo "Ajukan Ke Atasan"?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
              <td><div align="center" ><?php echo $val->name_admin;?></div></td>
							<td><div align="center" ><?php echo bulan($val->bulan_cctv)?></div></td>
							<td><div align="center" ><?php echo $val->tahun_cctv?></div></td>
							<td><div align="center" >
              <?php
              if($val->kawasan_berikat_cctv == NULL){
                  $sqlB = "SELECT * FROM ap_perusahaan WHERE id_perusahaan=?";
                  $queryB = $this->db->query($sqlB,array($val->id_perusahaan));
                  $rowB = $queryB->row();
                  if (isset($rowB))
                  {
                      echo $rowB->nama_perusahaan;
                  }
              }else{echo $val->kawasan_berikat_cctv; }
              ?>
              </div></td>
							<td><div align="center" ><?php echo $val->hanggar_cctv;?></div></td>
							<td><div align="center" >
              <?php
                $sqlA = "SELECT * FROM ap_perusahaan WHERE id_perusahaan=?";
                $queryA = $this->db->query($sqlA,array($val->id_perusahaan));
                $rowA = $queryA->row();
                if (isset($rowA))
                {
                    echo $rowA->alamat_perusahaan.' - '.$rowA->kota_perusahaan;
                }
              ?>
              </div></td>
							<td><div align="center" ><?php if($val->date_create_cctv == NULL){echo '-';}else{echo date('d-m-Y H:i:s',strtotime($val->date_create_cctv));}?></div></td>
              <?php 
                $sql = "SELECT * FROM ap_cctv_cek WHERE id_cctv=?";
                $query = $this->db->query($sql,array($val->id_cctv));
                $row = $query->row();
                $sql1 = "SELECT COUNT(id_cctv) as total FROM ap_cctv_kegiatan WHERE id_cctv=?";
                $query1 = $this->db->query($sql1,array($val->id_cctv));
                $kegi = $query1->row();
                $sql2 = "SELECT * FROM ap_cctv_cek WHERE id_cctv=? ORDER BY id_cctv_cek DESC LIMIT 1";
                $query2 = $this->db->query($sql2,array($val->id_cctv));
                $ceker = $query2->row();
              ?>
							<td><div align="center" >
              <?php if($val->flag_format_baru == 1 && $val->flag_pengajuan == 0){ ?>
                  <a href="<?php echo base_url($this->uri->rsegment(1).'/cek/'.$val->id_cctv);?>" title="<?php echo $lang_isi;?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                  <a href="<?php echo base_url($this->uri->rsegment(1).'/edit/'.$val->id_cctv);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                  <a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id_cctv);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
              <?php }else{echo '-';} ?>
              </div></td>
              <td><div align="center" >
                  <?php
                    if(!isset($kegi) || !isset($row) || !isset($ceker)){echo "<small class='label bg-red'>Silahkan Melakukan Perekaman</small>";}
                    if (isset($kegi)){
                    if (isset($ceker)){
                        if($val->flag_format_baru == 0 && $val->flag_pengajuan == 0){echo '-';}
                          elseif($val->flag_format_baru == 1 && $val->flag_pengajuan == 0 && $ceker->ya_tidak_cctv_cek == 0 && $ceker->ya_tidak_cctv_cek != NULL || $kegi->total >= 10 && $val->flag_format_baru == 1 && $val->flag_pengajuan == 0 && $ceker->ya_tidak_cctv_cek == 1 && $ceker->ya_tidak_cctv_cek != NULL || $val->flag_format_baru == 1 && $val->flag_pengajuan == 0 && $ceker->ya_tidak_cctv_cek == 2 && $ceker->ya_tidak_cctv_cek != NULL){
                          echo "<small class='label bg-yellow'>Silahkan Klik Ajukan</small>";
                         }elseif($kegi->total <= 9 && $val->flag_format_baru == 1 && $val->flag_pengajuan == 0 || $ceker->ya_tidak_cctv_cek == NULL){
                          echo "<small class='label bg-red'>Silahkan Melakukan Perekaman</small>";
                        }elseif($val->flag_pengajuan == 1){
                          echo "<small class='label bg-green'>Sudah Dilaporkan</small>";
                          }
                        }
                      }
                  ?>
              </div></td>
              <td><div align="center" >
                <?php 
                  if(!isset($kegi) || !isset($row) || !isset($ceker)){echo '-';}
                  if (isset($kegi)){
                  if (isset($ceker)){
                  if($val->flag_format_baru == 0){ ?>
                    <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_pdf_cctv_old/'.$val->id_cctv);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                  <?php }elseif($val->flag_format_baru == 1 && $val->flag_pengajuan == 0 && $ceker->ya_tidak_cctv_cek == 0 && $ceker->ya_tidak_cctv_cek != NULL || $kegi->total >= 10 && $val->flag_format_baru == 1 && $val->flag_pengajuan == 0 && $ceker->ya_tidak_cctv_cek == 1 && $ceker->ya_tidak_cctv_cek != NULL || $val->flag_format_baru == 1 && $val->flag_pengajuan == 0 && $ceker->ya_tidak_cctv_cek == 2 && $ceker->ya_tidak_cctv_cek != NULL){ ?>
                    <a href="<?php echo base_url($this->uri->rsegment(1).'/ajukan/'.$val->id_cctv);?>" title="<?php echo 'Ajukan';?>" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a>
                <?php }elseif($val->flag_pengajuan == 1){ ?>
                    <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_pdf_cctv/'.$val->id_cctv);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                <?php } elseif($kegi->total < 10 && $val->flag_format_baru == 1){echo '-';}}} ?>
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
      </div>
    </div>