<?php if (!empty($this->session->flashdata('status'))){?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('status');?>!
  </div>
<?php }?>
<?php if($cctv_cek_kondisi == NULL){ ?>
	<div class="row">    
    <div class="col-md-6">
          <div class="box">
            <div class="box-header">
            <?php echo $cctv_cek_kondisi->ya_tidak_cctv_cek;?>
            <div><h6 align="left">**perekaman kegiatan harian dan isi sampai 'STATUS' berubah ke PENGAJUAN di halaman depan(klik kembali)</h6></div>
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_tgl_kegiatan_cctv;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="date" class="form-control datepicker" id="inputEmail3" placeholder="<?php echo $lang_tgl_kegiatan_cctv;?>" value="<?php echo $content->desc_cctv_cek?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_time_start_keg_cctv;?></label>
				 <div class="col-sm-8 bootstrap-timepicker" >
                    <input type="text" name="start" class="form-control timepicker" id="inputEmail3" placeholder="<?php echo $lang_time_start_keg_cctv;?>" value="<?php echo date('07:30:00')?>">
                  </div>
                </div>
                <div class="form-group " >
                  <label for="inputEmail3 " class="col-sm-4 control-label"><?php echo $lang_time_end_keg_cctv;?></label>
				 <div class="col-sm-8 bootstrap-timepicker" >
                    <input type="text" name="end" class="form-control timepicker" id="inputEmail3" placeholder="<?php echo $lang_time_end_keg_cctv;?>" value="<?php echo date('17:00:00')?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_uraian_keg_cctv;?></label>
				 <div class="col-sm-8">
                    <textarea name="uraian" class="textarea" placeholder="<?php echo $lang_uraian_keg_cctv;?>" required></textarea>
                  </div>
                </div>
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default"><?php echo $lang_back;?></button>
                <button type="submit" name="kegiatan" value="kegiatan" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            </div>
          </div>
          <!-- /.box -->
        </div>
    </div>
<?php } ?>

<!-- isian sesuai ins-04 -->
  <div class="row">
    <div class="col-md-12">
	 <div class="box">
   <div class="box-header">
            </div>
        <div class="box-body">
         <div style="overflow: auto;">  
         <h4 align="center">--# LAPORAN KEGIATAN HARIAN DAPAT ANDA REKAM SETELAH MELAKUKAN CHECK LIST SECARA KESELURUHAN #--<br><br>LAPORAN MONITORING IT INVENTORY<br>BULAN <?php echo strtoupper(bulan($cctv->bulan_cctv));?> <?php echo $cctv->tahun_cctv?></h4>
       <table class="" width="100%">
         <thead>
       			<tr>
       				<td  width="12%"><div><?php echo $lang_kawasan_cctv?></div></th>
       				<td><div align="center"><?php echo ':&nbsp;'?></div></td>
       				<td><div align="left">
               <?php
               if($cctv->kawasan_berikat_cctv == NULL){
$sql = "SELECT * FROM ap_perusahaan WHERE id_perusahaan=?";
$query = $this->db->query($sql,array($cctv->id_perusahaan));
$row = $query->row();
if (isset($row))
{
    echo $row->nama_perusahaan;
}
               }else{echo $cctv->kawasan_berikat_cctv;}
              ?>
               </div></td>
       			</tr>
       			<tr>
       				<td><div><?php echo $lang_alamat_cctv?></div></th>
       				<td><div align="center"><?php echo ':&nbsp;'?></div></td>
       				<td><div align="left">
               <?php
               if($cctv->kawasan_berikat_cctv == NULL){
$sql = "SELECT * FROM ap_perusahaan WHERE id_perusahaan=?";
$query = $this->db->query($sql,array($cctv->id_perusahaan));
$row = $query->row();
if (isset($row))
{
    echo $row->alamat_perusahaan.' - '.$row->kota_perusahaan;
}
               }else{echo $cctv->alamat_cctv;}
              ?>
               </div></td>
       			</tr>
       			<tr>
       				<td><div><?php echo $lang_periode_cctv?></div></th>
       				<td><div align="center"><?php echo ':&nbsp;'?></div></td>
       				<td><div align="left"><?php echo $lang_bulan_cctv ?>  <?php echo bulan($cctv->bulan_cctv);?>  <?php echo $cctv->tahun_cctv?></div></td>
       			</tr>
       			<tr>
       				<td><div><?php echo $lang_hanggar_cctv?></div></th>
       				<td><div align="center"><?php echo ':&nbsp;'?></div></td>
       				<td><div align="left"><?php echo $cctv->hanggar_cctv?></div></td>
       			</tr>
       		</thead>
       </table>
       
       <br>

       <table id="tblhasil" class="table table-bordered">
           	<thead>
           		<tr>
              <th><div align="center"><?php echo 'No.';?></div></th>
              <th><div align="center"><?php echo $lang_desc_cctv?></div></th>	
              <th><div align="center"><?php echo 'Penjelasan Deskripsi'?></div></th>
              <th><div align="center"><?php echo 'Hasil Pemantaun(ya/tidak)'?></div></th>
              <th><div align="center"><?php echo 'Keterangan'?></div></th>
              <th style="display:none;"><div align="center"><?php echo 'ID CCTV'?></div></th>
              <th style="display:none;"><div align="center"><?php echo 'ID CCTV CEK'?></div></th>
				</tr>
           	</thead>
           	<tbody>
           
           <?php 
           $no=1;
           foreach ($cctv_cek as $cek):
           ?>
           		<tr>
               <?php if($cek->ya_tidak_cctv_cek != '2'){ ?>
           			<td><div align="center"><?php echo $no;?></div></td>
                <?php foreach($cctv_ref as $ref): 
                  if($cek->desc_cctv_cek == $ref->id_cctv_ref){
                  ?>
           			<td><div align="left"><?php echo $ref->uraian?></div></td>
                <td><div align="left"><?php if($ref->keterangan !=NULL){echo $ref->keterangan;}else{echo '-';}?></div></td>
                <?php } endforeach; ?>
           			<td><div align="center">
                <?php if($cek->ya_tidak_cctv_cek == '1'){ ?>
                  <?php echo 'Ya : '; ?>
                  <a href="javascript:void(0)" onclick="batal_setuju('<?php echo $cek->id_cctv_cek;?>', '<?php echo $cek->id_cctv; ?>')" title="<?php echo 'Batal Ya';?>" class="btn btn-xs btn-primary"><i class="fa  fa-times"></i></a>   
                <?php }elseif($cek->ya_tidak_cctv_cek == '0'){ ?>
                  <?php echo 'Tidak : '; ?>
                  <a href="javascript:void(0)" onclick="batal_tidak_setuju('<?php echo $cek->id_cctv_cek;?>', '<?php echo $cek->id_cctv; ?>')" title="<?php echo 'Batal Tidak';?>" class="btn btn-xs btn-danger"><i class="fa  fa-times"></i></a>
                <?php }elseif($cek->ya_tidak_cctv_cek == NULL){ ?>
                 <a href="javascript:void(0)" onclick="setuju('<?php echo $cek->id_cctv_cek;?>', '<?php echo $cek->id_cctv; ?>')" title="<?php echo 'Ya';?>" class="btn btn-xs btn-info"><i class="fa  fa-check-circle"></i></a>
                 <a href="javascript:void(0)" onclick="tidak_setuju('<?php echo $cek->id_cctv_cek;?>', '<?php echo $cek->id_cctv; ?>')" title="<?php echo 'Tidak';?>" class="btn btn-xs btn-danger"><i class="fa  fa-ban"></i></a>
                <?php }?>
                </div></td>
                <td>  
                  <textarea class="form-control" name="catatan" id="catatan_<?php echo $cek->id_cctv_cek;?>" rows="2" placeholder="Catatan ..."><?php if($cek->ket_cctv_cek != NULL){echo $cek->ket_cctv_cek;} ?></textarea>
                </td>
               <?php } ?>
               <td style="display:none;"><div align="center"><?php echo $cek->id_cctv?></div></td>
               <td style="display:none;"><div align="center"><?php echo $cek->id_cctv_cek?></div></td>
           		</tr>
           <?php 
           $no++;
           endforeach;?>		
           	</tbody>
           </table>
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default">
                  <?php echo $lang_back;?>
                </button>
                  <?php 
                  $sql2 = "SELECT * FROM ap_it_cek WHERE id_cctv=? ORDER BY id_cctv_cek DESC LIMIT 1";
                  $query2 = $this->db->query($sql2,array($cctv->id_cctv));
                  $ceker = $query2->row();
                  if (isset($ceker)){
                  if($ceker->ya_tidak_cctv_cek == 1){ ?>
                    <a href="<?php echo base_url($this->uri->rsegment(1).'/batal_setuju_semua/'.$this->uri->rsegment(3));?>" onclick="return confirm('<?php echo $lang_are_you_sure?>')" title="<?php echo $lang_cancel;?>" class="btn btn-md btn-danger pull-right ">Batal Semua &nbsp;<i class="fa  fa-check-circle"></i></a>
                  <?php }elseif($ceker->ya_tidak_cctv_cek == NULL){ ?>
                    <a href="javascript:void(0)" onclick="setuju_semua()" title="<?php echo $lang_aprove;?>" class="btn btn-md btn-success pull-right ">Klik Ya Semua &nbsp;<i class="fa  fa-check-circle"></i></a>
                <?php }} ?>
              </div>
           </div>
    </div>
  </div>
  </div>
  </div>
<!-- end isian sesuai ins-04 -->        

<?php if($cctv_cek_kondisi == NULL){ ?>
     <div class="row">
        <div class="col-md-12">
	 <div class="box">
            <div class="box-header">
            </div>
        <div class="box-body"> 
         <div style="overflow: auto;">  
         <h4 align="center">LAPORAN KEGIATAN HARIAN CCTV</h4>
       <table class="table table-bordered">
           	<thead>
           		<tr>
           			<th><div align="center"><?php echo 'No.';?></div></th>
					<th><div align="center"><?php echo $lang_date_kegiatan_cctv?></div></th>
					<th><div align="center"><?php echo $lang_jam_kegiatan_cctv?></div></th>
					<th><div align="center"><?php echo $lang_uraian_kegiatan_cctv?></div></th>
					<th><div align="center"><?php echo $lang_action?></div></th>	
				</tr>
           	</thead>
           	<tbody>
           
           <?php 
           $no=1;
           foreach ($cctv_kegi as $val):?>
           		<tr>
           			<td><div align="center"><?php echo $no;?></div></td>
           			<td><div align="center"><?php echo $val->date_cctv_kegiatan?></div></td>
           			<td><div align="center"><?php echo $val->time_start_cctv_kegiatan?> s.d <?php echo $val->time_end_cctv_kegiatan?> </div></td>
           			<td><div align="center"><?php echo $val->uraian_cctv_kegiatan?></div></td>
           			<td><div align="center">
           				<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete_kegi/'.$val->id_cctv_kegiatan .'/'.$cctv->id_cctv);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
  </div>
  <?php echo form_close();?>
<?php } ?>