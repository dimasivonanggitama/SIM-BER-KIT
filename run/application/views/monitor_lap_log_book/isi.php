	<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group" style="display: none">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_admin_username;?></label>
				<div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_admin_username;?>" value="<?php echo $user_info->name_admin?>"  readonly>
                  </div>
                </div>
                <div class="form-group" style="display: none">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_nip;?></label>
				<div class="col-sm-8">
                    <input type="text" name="nip" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_nip;?>" value="<?php echo $user_info->nip_admin?>" readonly>
                  </div>
                </div>
                <div class="form-group" style="display: none">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_jabatan;?></label>
				<div class="col-sm-8">
                    <input type="text" name="jabatan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_jabatan;?>" value="<?php echo $user->name?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_iku;?></label>
				<div class="col-sm-8">
                    <input type="text" name="iku" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_iku;?>" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_target;?> %</label>
				<div class="col-sm-8">
                    <input type="number" name="target" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_target;?>" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_tanggal_pelapor;?></label>
				<div class="col-sm-8">
                    <input type="text" name="tgl_pelapor" class="form-control datepicker" id="inputEmail3" placeholder="<?php echo $lang_tanggal_pelapor;?>" data-date-end-date="+1d" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_dasar;?></label>
				<div class="col-sm-8">
                    <input type="text" name="dasar" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_dasar;?>" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_kegiatan;?></label>
				<div class="col-sm-8">
                    <input type="text" name="kegiatan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_kegiatan;?>" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Kategori Perkerjaan</label>
				<div class="col-sm-8">
                	<select class="form-control" onchange="kate(this.value);" name="kategori" required>
                    	<option value="0">Pilih</option>
                    	<option value="1">Waktu</option>
                    	<option value="2">Dockumen</option>
                    	<option value="3">Kegiatan</option>
                  </select>       
                  </div>
                </div>
                <div id="admDivCheck" style="display:none;">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_jumlah_docter;?></label>
				<div class="col-sm-8">
                    <input type="number" name="docter" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_jumlah_docter;?>" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_jumlah_docser;?></label>
				<div class="col-sm-8">
                    <input type="number" name="docser" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_jumlah_docser;?>" value="">
                  </div>
                </div>
                </div>
                <div id="waktu" style="display:none;">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">waktu Perkerjaan Mulai</label>
				<div class="col-sm-4">
                    <input  name="tgl_mulai" class="form-control datepicker" id="inputEmail3" placeholder="" value="<?php echo date('Y-m-d')?>">
                  </div>
                  <div class="col-sm-4 bootstrap-timepicker">
                    <input  name="waktu_mulai" class="form-control timepicker" id="inputEmail3" placeholder="Waktu Mulai" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">waktu Perkerjaan selesai</label>
				<div class="col-sm-4">
                    <input  name="tgl_selesai" class="form-control datepicker" id="inputEmail3" placeholder="" value="<?php echo date('Y-m-d')?>">
                  </div>
                  <div class="col-sm-4 bootstrap-timepicker">
                    <input  name="waktu_selesai" class="form-control timepicker" id="inputEmail3" placeholder="Waktu Selesai" value="">
                  </div>
                </div>
                </div>
                <div id="kegiatan" style="display:none;">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Kegiatan yang dilaksanakan</label>
				<div class="col-sm-8">
                    <input type="text" name="kegi_mulai" class="form-control" id="inputEmail3" placeholder="Kegiatan yang dilaksanakan" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Kegiatan yang diselesaikan</label>
				<div class="col-sm-8">
                    <input type="text" name="kegi_selesai" class="form-control" id="inputEmail3" placeholder="Kegiatan yang diselesaikan" value="">
                  </div>
                </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
    
    </div>
    
    <div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
           <div class="box-body">
         <div style="overflow: auto;">
         	<div align="center"><h4>BUKU KONTROL KINERJA PEGAWAI<br>(LOG BOOK) - BULAN <?php echo strtoupper(bulan($content->bulan_log_book));?> <?php echo $content->tahun_log_book;?></h4></div>  
           <?php echo $lang_admin_username?>&nbsp;  : <?php echo $user_info->name_admin?> <br>
           <?php echo $lang_nip ?>  &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    : <?php echo $user_info->nip_admin?><br>
           <?php echo $lang_jabatan?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        : <?php echo $user->name?><br>
           <br>
           	<?php 
           	$no=1;
           	foreach ($isi_detail as $val):?>
           	
           <table>
           		<tr>
           			<td><?php echo $lang_iku ?></td>
           			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $val->iku_log_book_dtl?></td>
           		</tr>
           		<tr>
           			<td><?php echo $lang_target?></td>
           			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $val->target_log_book_dtl?> %</td>
           		</tr>
           
           </table>
           
           
           <table class="table table-bordered">
           	<thead>
           		<tr>
           			<th><div align="center"><?php echo '#';?></div></th>
					<th><div align="center"><?php echo $lang_tanggal_pelapor?></div></th>
					<th><div align="center"><?php echo $lang_dasar?></div></th>
					<th><div align="center"><?php echo $lang_kegiatan?></div></th>	
					<th>
						<?php if($val->jenis_log_book_dtl==1){?>
							<div align="center">Waktu Perkerjaan dimulai <br> (Tggl & waktu)</div>
						<?php }?>
						
						<?php if($val->jenis_log_book_dtl==2){?>
							<div align="center"><?php echo $lang_jumlah_docter?></div>
						<?php }?>
						<?php if($val->jenis_log_book_dtl==3){?>
							<div align="center">Kegiatan Kegiatan yang dilaksanakan</div>
						<?php }?>
					</th>
					<th>
						<?php if($val->jenis_log_book_dtl==1){?>
						<div align="center">Waktu Perkerjaan Selesai <br> (Tggl & waktu)</div>
						<?php }?>
						
						<?php if($val->jenis_log_book_dtl==2){?>
						<div align="center"><?php echo $lang_jumlah_docser?></div>
						<?php }?>
						
						<?php if($val->jenis_log_book_dtl==3){?>
						<div align="center">Kegiatan Kegiatan yang diselesaikan</div>
						<?php }?>
					</th>
					<th><div align="center"><?php echo $lang_paraf?></div></th>
					<th><div align="center"><?php echo $lang_keterangan?></div></th>
				</tr>
           	</thead>
           	<tbody>
           
           		<tr>
           			<td><div align="center">
					<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete_dtl/'.$val->id_log_book.'/'.$val->id_log_book_dtl);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
					</div></td>
           			<td><div align="center"><?php echo $val->date_log_book_dtl?></div></td>
           			<td><div align="center"><?php echo $val->dasar_log_book_dtl?></div></td>
           			<td><div align="center"><?php echo $val->kegiatan_log_book_dtl?></div></td>
           			<td>
           				<?php if($val->jenis_log_book_dtl==1){?>         			
           				<div align="center"><?php echo $val->waktu_mulai_log_book_dtl?></div>
           				<?php }?>
           				
  						<?php if($val->jenis_log_book_dtl==2){?>         			
           				<div align="center"><?php echo $val->doc_terima_log_book_dtl?></div>
           				<?php }?>
           				
           				<?php if($val->jenis_log_book_dtl==3){?>         			
           				<div align="center"><?php echo $val->kegiatan_mulai_log_book_dtl?></div>
           				<?php }?>
           				
           			</td>
           			<td>
           				<?php if($val->jenis_log_book_dtl==1){?>
           				<div align="center"><?php echo $val->waktu_selesai_log_book_dtl?></div>
           				<?php }?>
           			
           				<?php if($val->jenis_log_book_dtl==2){?>
           				<div align="center"><?php echo $val->doc_selesai_log_book_dtl?></div>
           				<?php }?>
           				
           				<?php if($val->jenis_log_book_dtl==3){?>
           				<div align="center"><?php echo $val->kegiatan_selesai_log_book_dtl?></div>
           				<?php }?>
           			</td>
           			<td>
           			<div align="center">
           			<?php if ($val->paraf_log_book_dtl==1){?>
           				<?php echo $lang_approved;?>
           			<?php } elseif ($val->tolak_log_book_dtl==1){?>
           				<?php echo $lang_not_approved;?>
           			<?php }?>
           			</div>
           			</td>
           			<td>
           			<div align="center">
           			<?php if ($val->paraf_log_book_dtl==1){?>
           				<?php echo $val->ket_paraf_log_book_dtl;?>
           			<?php } elseif ($val->tolak_log_book_dtl==1){?>
           				<?php echo $val->ket_tolak_log_book_dtl;?>
           			<?php }?>
           			</div>
           			</td>
           		</tr>
           <?php 
           $no++;
           endforeach;?>		
           	</tbody>
           </table>
              
              </div>
              </div>
          </div>
        </div>
    
    </div>
    
	