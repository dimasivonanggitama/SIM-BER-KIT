<?php if (!empty($this->session->flashdata('status'))){?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('status');?>!
  </div>
<?php }?>

<!-- /.modal -->
<div class="modal modal-warning fade bs-example-modal-sm" id="modal-warning">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Attention !</h4>
              </div>
              <div class="modal-body">
                <p><div id="msgAtt"></div></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
              </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<button id="idbtn" type="button" style="display: none" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning"></button>
<!-- /.modal -->

<div class="row">
        <div class="col-md-12">
		  <div class="box">
          <div class="box-header">
            <h4 align="center">PEREKAMAN LAPORAN EVALUASI MICRO PKB/PDKB - <?php echo $dt_micro[0]->uraian_penempatan ?><br>SEMESTER <?php echo $dt_micro[0]->semester; ?> TAHUN <?php echo $dt_micro[0]->tahun; ?></h4>
            <h6 align="left">*Untuk bisa mengajukan laporan wajib mengisi semua data dan apabila ada perbedaan data Perusahaan silahkan menghubungi PDAD untuk update data</h6>
          </div>
          <!-- box header -->
            <div class="box-body">
              <?php if (!empty($this->session->flashdata('status'))){?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('status');?>!
              </div>
              <?php }?>
              <table id="example1" class="table table-bordered table-striped table-highlight">
                <thead>
                <tr>
                  <th><div align="center"><?php echo "No.";?></div></th>
                  <th><div align="center"><?php echo "Nama Perusahaan";?></div></th>
                  <th><div align="center"><?php echo "Skep PKB/PDKB Terakhir";?></div></th>
                  <th><div align="center"><?php echo "Tgl Skep PKB/PDKB";?></div></th>
                  <th><div align="center"><?php echo "Bidang Usaha/Hasil Produksi";?></div></th>
                  <th><div align="center"><?php echo "Jumlah Tenaga Kerja (orang)<br>-Isi Kolom-";?></div></th>
                  <th><div align="center"><?php echo "Nilai Invenstasi(Rp)<br>-Isi Kolom-";?></div></th>
                  <th><div align="center"><?php echo "Nilai Penangguhan(Rp)<br>-Isi Kolom-";?></div></th>
                  <th><div align="center"><?php echo "Nilai Ekspor(USD)<br>-Isi Kolom-";?></div></th>
                  <th><div align="center"><?php echo "Nilai Jual Lokal(Rp)<br>-Isi Kolom-";?></div></th>
                  <th><div align="center"><?php echo "Aksi";?></div></th>

                </tr>
                </thead>
                <tbody>
                  <?php 
                    $no=1;
                    foreach ($dtl_micro as $val):?>
                  <tr id="tester">
                    <td><div align="center" ><?php echo $no;?></div></td>     
                    <td><div align="center" ><?php echo $val->nama_perusahaan;?></div></td>     
                    <td><div align="center" ><?php echo $val->skep_penetapan_perusahaan;?></div></td>     
                    <td><div align="center" ><?php echo date('d-m-Y',strtotime($val->tgl_skep_penetapan_perusahaan));?></div></td>     
                    <td><div align="center" ><?php echo $val->hasil_produksi_perusahaan;?></div></td>     
                    <td><div align="center" ><input id="id_tamp1_<?php echo $val->id_micro_dtl;?>" STYLE="text-align: right;" type="text" class="form-control ongkon" placeholder="<?php echo 'Angka';?>" value="<?php echo $val->jml_tenaga_kerja;?>" required></div></td>     
                    <td><div align="center" ><input id="id_tamp2_<?php echo $val->id_micro_dtl;?>" STYLE="text-align: right;" type="text" class="form-control ongko" placeholder="<?php echo 'Angka, poin koma';?>" value="<?php echo $val->n_investasi;?>" required></div></td> 
                    <td><div align="center" ><input id="id_tamp3_<?php echo $val->id_micro_dtl;?>" STYLE="text-align: right;" type="text" class="form-control ongko" placeholder="<?php echo 'Angka, poin koma';?>" value="<?php echo $val->n_penangguhan;?>" required></div></td>      
                    <td><div align="center" ><input id="id_tamp4_<?php echo $val->id_micro_dtl;?>" STYLE="text-align: right;" type="text" class="form-control ongko" placeholder="<?php echo 'Angka, poin koma';?>" value="<?php echo $val->n_ekspor;?>" required></div></td> 
                    <td><div align="center" ><input id="id_tamp5_<?php echo $val->id_micro_dtl;?>" STYLE="text-align: right;" type="text" class="form-control ongko" placeholder="<?php echo 'Angka, poin koma';?>" value="<?php echo $val->n_jual_lokal;?>" required></div></td>
                    <td><div align="center" ><a href="javascript:void(0)" onclick="save_data('<?php echo $val->id_micro_dtl;?>')" title="<?php echo 'Simpan/Update';?>" class="btn btn-xs btn-info"><i class="fa  fa-check-circle"></i></a></div></td>
                  </tr>
                  <?php $no++;
					        endforeach;?>
                </tbody>
                </table>
            </div>
            <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default"><?php echo $lang_back;?></button>
                <!-- <button type="submit" name="kegiatan" value="kegiatan" class="btn btn-info pull-right"><?php echo $lang_save;?></button> -->
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
