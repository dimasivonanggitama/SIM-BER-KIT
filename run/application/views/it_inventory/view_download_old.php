<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<?php
$nama_file = "CCTV_".$user_info->name_admin.'_'.bulan($cctv->bulan_cctv).'_'.$cctv->tahun_cctv.".doc";
?>

<h4 align="center">LAPORAN MONITORING IT INVENTORY<br>BULAN <?php echo strtoupper(bulan($cctv->bulan_cctv));?> <?php echo $cctv->tahun_cctv?></h4>
<table   width="100%">
        		<tr>
       				<td valign="top" align="left"  width="20%"><div><?php echo $lang_kawasan_cctv?></div></th>
       				<td valign="top" align="left" width="auto"><div align="left"><?php echo ':'?></div></td>
       				<td valign="top" align="left"><div align="left">
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
       				<td valign="top" align="left"><div><?php echo $lang_alamat_cctv?></div></th>
       				<td valign="top" align="left" width="auto"><div align="left"><?php echo ':'?></div></td>
       				<td valign="top" align="left"><div align="left">
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
       				<td valign="top" align="left"><div><?php echo $lang_periode_cctv?></div></th>
       				<td valign="top" align="left" width="auto"><div align="left"><?php echo ':'?></div></td>
       				<td valign="top" align="left"><div align="left"><?php echo $lang_bulan_cctv ?>  <?php echo bulan($cctv->bulan_cctv);?>  <?php echo $cctv->tahun_cctv?></div></td>
       			</tr>
       			<tr>
       				<td valign="top" align="left"><div><?php echo $lang_hanggar_cctv?></div></th>
       				<td valign="top" align="left" width="auto"><div align="left"><?php echo ':'?></div></td>
       				<td valign="top" align="left"><div align="left"><?php echo $cctv->hanggar_cctv?></div></td>
       			</tr>
				   <tr>
       				<td valign="top" align="left"><div><?php echo 'Tanggal Pengajuan'?></div></th>
       				<td valign="top" align="left" width="auto"><div align="left"><?php echo ':'?></div></td>
       				<td valign="top" align="left"><div align="left"><?php echo date('d-m-Y H:i:s',strtotime($cctv->date_create_cctv));?></div></td>
       			</tr>
       </table>

       
       <br>
       
       <table style="overflow:wrap" border="1" cellpadding="0" cellspacing="0" width="100%">
    	   		<tr>
				   	<th align="center"><div align="center"><?php echo '&nbsp;&nbsp;No.&nbsp;&nbsp;';?></div></th>
					<th align="center"><div align="center"><?php echo $lang_desc_cctv?></div></th>
					<th align="center"><div align="center"><?php echo '&nbsp;&nbsp;&nbsp;'.$lang_ya_cctv.'&nbsp;&nbsp;&nbsp;';?></div></th>
					<th align="center"><div align="center"><?php echo '&nbsp;&nbsp;'.$lang_tidak_cctv.'&nbsp;&nbsp;';?></div></th>	
					<th align="center"><div align="center"><?php echo '&nbsp;'.$lang_Keterangan_cctv.'&nbsp;';?></div></th>
				</tr>
           <?php 
           $no=1;
           foreach ($cctv_cek as $val):?>
           		<tr>
           			<td align="center"><div align="center"><?php echo $no;?></div></td>
           			<td align="left"><div align="left"><?php echo $val->desc_cctv_cek?></div></td>
           			<td align="center"><div align="center">
           			<?php if ($val->ya_tidak_cctv_cek==1) { ?>
						<p>&#x2714;</p>
           			<?php }elseif($val->ya_tidak_cctv_cek==0){?>
						<p>&#8722;</p>
					   <?php } ?>
           			</div></td>
           			<td align="center"><div align="center">
					<?php if ($val->ya_tidak_cctv_cek==0) { ?>
						<p>&#x2714;</p>
           			<?php }elseif($val->ya_tidak_cctv_cek==1){?>
						<p>&#8722;</p>
					   <?php } ?>
           			</div></td>
           			<td align="left"><div align="left"><?php echo $val->ket_cctv_cek?></div></td>
           		</tr>
           <?php 
           $no++;
           endforeach;?>		
           </table>
              
    <br>
    
       <table style="overflow:wrap" border="1" cellpadding="0" cellspacing="0" width="100%">
           		<tr>
				   	<th align="center"><div align="center"><?php echo '&nbsp;&nbsp;No.&nbsp;&nbsp;';?></div></th>
					<th><div align="center"><?php echo '&nbsp;'.$lang_date_kegiatan_cctv.'&nbsp;';?></div></th>
					<th><div align="center"><?php echo '&nbsp;'.$lang_jam_kegiatan_cctv.'&nbsp;';?></div></th>
					<th><div align="center"><?php echo $lang_uraian_kegiatan_cctv;?></div></th>
						
				</tr>
           <?php 
           $no=1;
           foreach ($cctv_kegi as $val):?>
           		<tr>
           			<td align="center"><div align="center"><?php echo $no;?></div></td>
           			<td align="center"><div align="center"><?php echo date('d-m-Y',strtotime($val->date_cctv_kegiatan))?></div></td>
           			<td align="center"><div align="center"><?php echo $val->time_start_cctv_kegiatan?> s.d <?php echo $val->time_end_cctv_kegiatan?> </div></td>
           			<td align="left"><div align="left"><?php echo $val->uraian_cctv_kegiatan?></div></td>
           	   </tr>        
           <?php 
           $no++;
           endforeach;?>		
           </table>