	<div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
            <div class="col-sm-1">
              <input type="text" name="bulan" class="form-control datepickerbulan" id="bulan" placeholder="" value="<?php echo $bulan?>" required>              
            </div>
             <div class="col-sm-1">
             	<input type="text" name="tahun" class="form-control datepickertahun" id="tahun" placeholder="" value="<?php echo $tahun?>" required>
             </div>
              <div class="col-sm-1">
              <button type="button" class="btn btn-success" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/')?>'+parseInt(bulan.value)+'/'+tahun.value;"><?php echo $lang_cari;?></button>
              </div>
              <div class="col-sm-9">
                <P><h5 id="msgData">Data Periode Yang Ditampilkan Bulan <?php echo bulan($bulan).' Tahun '.$tahun.' '; ?>/ Silahkan Melakukan Pencarian Untuk Periode Lainnya</h5></p>
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
                  <th><div align="center">Nama</div></th>
                  <th><div align="center">NIP</div></th>
                  <th><div align="center">Status</div></th>
                  <th><div align="center"><?php echo "Tanggal Pengajuan"?></div></th>
                  <th><div align="center">Download</div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($group_dtl as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" ><?php echo $val->name_admin;?></div></td>
							<td><div align="center" ><?php echo $val->nip_admin;?></div></td>
							<td align="center">
              <?php 
              $sqlsum = "SELECT P.id_log_book, date_create_log_book, count(A.paraf_log_book_dtl) as paraf_log_book_dtl, count(A.tolak_log_book_dtl) as tolak_log_book_dtl, count(A.id_log_book) as hitung, P.flag_pengajuan FROM ap_log_book P LEFT JOIN ap_log_book_dtl_new A ON A.id_log_book=P.id_log_book WHERE P.bulan_log_book=? AND P.tahun_log_book=? AND P.id_admin=?";
              $querysum = $this->db->query($sqlsum,array($bulan,$tahun,$val->id_admin));
              $row1 = $querysum->row();
              if (isset($row1))
                {
                  if($row1->hitung > 2 && $row1->paraf_log_book_dtl==0 && $row1->tolak_log_book_dtl==0 && $row1->flag_pengajuan == 1){
                    echo "<small class='label bg-yellow'>Menunggu Persetujuan Atasan</small>";
                  }elseif($row1->hitung <= 2){
                    echo "<small class='label bg-red'>Belum Melakukan Perekaman</small>";
                  }elseif($row1->hitung > 2 && $row1->paraf_log_book_dtl >= 3 && $row1->tolak_log_book_dtl==0){
                    if($bulan >= 3 && $tahun == 2019 && $row1->flag_pengajuan == 1){
                      echo "<small class='label bg-green'>Disetujui Atasan</small>";
                    }elseif($bulan < 3 && $tahun == 2019 || $bulan <= 12 && $tahun < 2019){
                      echo "<small class='label bg-green'>Disetujui Atasan</small>";
                    }elseif($bulan >= 3 && $tahun == 2019 && $row1->flag_pengajuan == 0){
                      echo "<small class='label bg-yellow'>Proses Perekaman</small>";
                    }
                  }elseif($row1->tolak_log_book_dtl >= 1){
                    echo "<small class='label bg-black'>Ditolak Atasan</small>";
                  }elseif($row1->hitung > 2 && $row1->paraf_log_book_dtl==0 && $row1->tolak_log_book_dtl==0 && $row1->flag_pengajuan == 0){
                    if($bulan < 3 && $tahun == 2019 || $bulan <= 12 && $tahun < 2019){
                      echo "<small class='label bg-yellow'>Menunggu Persetujuan Atasan</small>";
                    }else{
                      echo "<small class='label bg-yellow'>Proses Perekaman</small>";
                    }
                  }else{
                    echo "<small class='label bg-red'>Belum Melakukan Perekaman</small>";
                }
              ?>
              </td>
              <td><div align="center" ><?php if($row1->date_create_log_book == NULL || $row1->hitung <= 2){echo '-';}else{echo date('d-m-Y H:i:s',strtotime($row1->date_create_log_book));} ?></div></td>
              				<td><div align="center" >
                      <?php 
                        if($bulan < 3 && $tahun == 2019 || $bulan <= 12 && $tahun <= 2018){
                          if ($row1->hitung > 2 && $row1->paraf_log_book_dtl >= 3 && $row1->tolak_log_book_dtl==0 || $row1->tolak_log_book_dtl >= 1) { ?>
                            <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_pdf/'.$row1->id_log_book);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                          <?php
                          }else{echo "-";}
                        }else{
                          if ($row1->hitung > 2 && $row1->paraf_log_book_dtl >= 3 && $row1->tolak_log_book_dtl==0 && $row1->flag_pengajuan == 1 || $row1->tolak_log_book_dtl >= 1) { ?>
                            <a target="_blank" href="<?php echo base_url($this->uri->rsegment(1).'/unduh_pdf/'.$row1->id_log_book);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                          <?php
                          }else{echo "-";}
                        }
                      }
              				?>
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