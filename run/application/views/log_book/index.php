	<div class="row">
    <div class="col-md-12">
<!-- row -->
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
                  <th><div align="center"><?php echo "Atasan" ?></div></th>
                  <th><div align="center"><?php echo $lang_bulan_book ?></div></th>
                  <th><div align="center"><?php echo $lang_tahun_book ?></div></th>
                  <th><div align="center"><?php echo $lang_jabatan_label ?></div></th>
                  <th><div align="center"><?php echo "Tanggal Pengajuan"?></div></th>
                  <th><div align="center">Status</div></th>
                  <th><div align="center"><?php echo $lang_action;?></div></th>
                  <th><div align="center"><?php echo 'Ajukan';?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                  foreach ($content as $val):
                  ?>
						<tr>
              <?php
                $sqlsum = "SELECT count(paraf_log_book_dtl) as paraf_log_book_dtl, count(tolak_log_book_dtl) as tolak_log_book_dtl, count(*) as hitung FROM ap_log_book_dtl_new WHERE id_log_book=?";
                $querysum = $this->db->query($sqlsum,array($val->id_log_book));
                $row1 = $querysum->row();
                if (isset($row1)){
              ?>
							<td><div align="center" ><?php echo $no?></div></td>
              <td><div align="center" ><?php echo $val->name_admin?></div></td>
							<td><div align="center" ><?php echo bulan($val->bulan_log_book)?></div></td>
							<td><div align="center" ><?php echo $val->tahun_log_book?></div></td>
              <td><div align="left" ><?php echo $val->jabatan_d?></div></td>
              <td><div align="center" ><?php 
                if($row1->hitung > 2 && $row1->paraf_log_book_dtl >= 1 && $row1->tolak_log_book_dtl==0)
                  {echo date('d-m-Y H:i:s',strtotime($val->date_create_log_book));}
                elseif($val->flag_pengajuan == 0 && $row1->hitung <= 2)
                  {echo '-';}
                elseif($row1->tolak_log_book_dtl >= 1 && $val->flag_pengajuan == 1)
                  {echo date('d-m-Y H:i:s',strtotime($val->date_create_log_book));}
                elseif($row1->hitung > 2 && $row1->paraf_log_book_dtl==0 && $row1->tolak_log_book_dtl==0 && $val->flag_pengajuan == 0)
                  {echo '-';}
                elseif($val->flag_pengajuan == 1)
                  {echo '-';}
                elseif($val->flag_pengajuan == 0)
                  {echo '-';}
              ?></div></td>
              <td><div align="center" ><?php
                  if($row1->hitung > 2 && $row1->tolak_log_book_dtl==0 && $val->flag_pengajuan == 0 && $row1->paraf_log_book_dtl < $row1->hitung){
                    echo "<small class='label bg-yellow'>Silahkan Klik Ajukan Jika Sudah Sesuai</small>";
                  }elseif($row1->hitung <= 2 && $val->flag_pengajuan == 0){
                    echo "<small class='label bg-red'>Belum Melakukan Perekaman</small>";
                  }elseif($row1->hitung > 2 && $row1->paraf_log_book_dtl == $row1->hitung && $row1->tolak_log_book_dtl==0){
                    echo "<small class='label bg-green'>Disetujui Atasan</small>";
                  }elseif($row1->tolak_log_book_dtl >= 1){
                    echo "<small class='label bg-black'>Ditolak Atasan</small>";
                  }elseif($val->flag_pengajuan == 1){
                    echo "<small class='label bg-yellow'>Menunggu Persetujuan Atasan</small>";
                  }
              ?>
              </div></td>
							<td align="center"><?php if($row1->hitung > 2 && $row1->paraf_log_book_dtl >= 3 && $row1->tolak_log_book_dtl==0){ 
                $klik_id=$val->id_log_book; ?>
                <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_pdf_approve/'.$klik_id);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
              <?php }else{ ?>
                    <?php if($row1->paraf_log_book_dtl==0 && $row1->tolak_log_book_dtl==0 && $val->flag_pengajuan == 0){ ?>
                      <a href="<?php echo base_url($this->uri->rsegment(1).'/isi/'.$val->id_log_book);?>" title="<?php echo $lang_isi;?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
            					<a href="<?php echo base_url($this->uri->rsegment(1).'/edit_aj/'.$val->id_log_book);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
            					<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id_log_book);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    <?php }elseif($row1->tolak_log_book_dtl >= 1 || $row1->hitung > 2 && $row1->tolak_log_book_dtl==0 && $val->flag_pengajuan == 0 && $row1->paraf_log_book_dtl < $row1->hitung){ ?>
                      <a href="<?php echo base_url($this->uri->rsegment(1).'/isi/'.$val->id_log_book);?>" title="<?php echo $lang_isi;?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                    <?php }elseif($row1->hitung > 2 && $row1->paraf_log_book_dtl >= 1 && $row1->tolak_log_book_dtl==0){echo '-';} 
                          elseif($row1->hitung > 2 && $row1->paraf_log_book_dtl == 0 && $row1->tolak_log_book_dtl==0 && $val->flag_pengajuan == 1){echo '-';} ?>
              <?php } ?>
				  			</td>
                <td><div align="center" >
                  <?php if($row1->hitung > 2 && $row1->paraf_log_book_dtl >= 1 && $row1->tolak_log_book_dtl==0 || $val->flag_pengajuan == 1){echo '-'; }
                        elseif($row1->hitung > 2 && $row1->tolak_log_book_dtl==0 && $row1->paraf_log_book_dtl < $row1->hitung && $val->flag_pengajuan == 0){ ?>
                    <a href="<?php echo base_url($this->uri->rsegment(1).'/ajukan/'.$val->id_log_book);?>" title="<?php echo 'Ajukan';?>" class="btn btn-xs btn-warning"><i class="fa fa-upload"></i></a>
                  <?php }else{echo '-';}?>
                </div></td>
                <?php } ?>
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
        <!-- row -->
  </div>
</div>     