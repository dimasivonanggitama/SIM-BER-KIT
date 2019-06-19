	<div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
              <div class="form-group">
                
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_date_penerimaan;?></label>
                  <div class="col-sm-3">
                    <input type="text" name="tgl_penerimaan" class="form-control datepicker"  value="<?php echo $content->date_penerimaan==''?date('Y-m-d'):date('Y-m-d',strtotime($content->date_penerimaan));?>" required>
                  </div>
                 </div>
                <div class="form-group">
                
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Upload File';?></label>
                  <div class="col-sm-3">
                    <input type="file" name="file" class="form-control"  accept=".xls,.xlsx">
                  </div>
                  <div class="col-sm-3">
                    <input type="submit" name="upload" class="btn btn-info" value="Upload">
                  </div>
                 </div>
             <div style="overflow:auto;">      
             <table class="table table-bordered table-striped">
              <tr>
                <th><div align="center"><?php echo $lang_jenis_penerimaan ?></div></th>
                <th><div align="center"><?php echo $lang_realisasi ?></div></th>
                <th><div align="center"><?php echo $lang_target ?></div></th>
                <th><div align="center"><?php echo $lang_capaian ?></div></th>
               </tr>
                <tr bgcolor="yellow">
                	<td><div align="center">PABEAN</div></td>
                	<td><div><input readonly type="text" name="realisasi_pabean" class="form-control angka" id="total_realisasi"   value="<?php echo $content->realisasi_pabean_penerimaan?>" required></div></td>
                	<td><div><input readonly type="text" name="target_pabean" class="form-control angka" id="total_target"   value="<?php echo $content->target_pabean_penerimaan?>" required></div></td>
                	<td><div><input readonly type="text" name="capaian_pabean" class="form-control angka2" id="total_capaian"   value="<?php echo $content->capaian_pabean_penerimaan?>" required></div></td>
                </tr>
                <?php 
                for ($i=0;$i<count($pabean);$i++){
                    if ($content_pabean){
                        foreach ($content_pabean as $val):
                        if ($val->nama_penerimaan_pabean==strtoupper($pabean[$i])){
                ?>
                 <tr>
                	<td><div align="right"><?php echo strtoupper(str_replace('_', ' ', $pabean[$i]));?></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="pabean_realisasi[]" class="form-control angka" id="<?php echo $pabean[$i];?>_realisasi"    value="<?php echo $val->realisasi_pabean?>" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="pabean_target[]" class="form-control angka" id="<?php echo $pabean[$i];?>_target"    value="<?php echo $val->target_pabean?>" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="pabean_capaian[]" class="form-control angka2" id="<?php echo $pabean[$i];?>_capaian"    value="<?php echo $val->capaian_pabean?>" required></div></td>
                </tr>
                <?php 
                }
                endforeach;
                } else {
                ?>
                
                 <tr>
                	<td><div align="right"><?php echo strtoupper(str_replace('_', ' ', $pabean[$i]));?></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="pabean_realisasi[]" class="form-control angka" id="<?php echo $pabean[$i];?>_realisasi"    value="0" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="pabean_target[]" class="form-control angka" id="<?php echo $pabean[$i];?>_target"    value="0" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="pabean_capaian[]" class="form-control angka2" id="<?php echo $pabean[$i];?>_capaian"    value="0" required></div></td>
                </tr>
                
                <?php    
                }
                }
                ?>
                <tr bgcolor="yellow">
                	<td><div  align="center">CUKAI</div></td>
                	<td><div><input onkeyup="jumlah()" readonly type="text" name="realisasi_cukai" class="form-control angka" id="total_realisasi_cukai"    value="<?php echo $content->realisasi_cukai_penerimaan?>" required></div></td>
                	<td><div><input onkeyup="jumlah()" readonly type="text" name="target_cukai" class="form-control angka" id="total_target_cukai"    value="<?php echo $content->target_cukai_penerimaan?>" required></div></td>
                	<td><div><input onkeyup="jumlah()" readonly type="text" name="capaian_cukai" class="form-control angka2" id="total_capaian_cukai"    value="<?php echo $content->capaian_cukai_penerimaan?>" required></div></td>
                </tr>
                <?php 
                for ($i=0;$i<count($cukai);$i++){
                if ($content_cukai){
                foreach ($content_cukai as $val):
                if ($val->nama_penerimaan_cukai==strtoupper($cukai[$i])){
                ?>
                <tr>
                	<td><div align="right"><?php echo strtoupper(str_replace('_', ' ', $cukai[$i]));?></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="cukai_realisasi[]" class="form-control angka" id="<?php echo $cukai[$i];?>_realisasi"    value="<?php echo $val->realisasi_cukai;?>" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="cukai_target[]" class="form-control angka" id="<?php echo $cukai[$i];?>_target"    value="<?php echo $val->target_cukai;?>" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="cukai_capaian[]" class="form-control angka2" id="<?php echo $cukai[$i];?>_capaian"    value="<?php echo $val->capaian_cukai;?>" required></div></td>
                </tr>
                <?php 
                }
                endforeach;
                } else {
                ?>
                <tr>
                	<td><div align="right"><?php echo strtoupper(str_replace('_', ' ', $cukai[$i]));?></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="cukai_realisasi[]" class="form-control angka" id="<?php echo $cukai[$i];?>_realisasi"    value="0" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="cukai_target[]" class="form-control angka" id="<?php echo $cukai[$i];?>_target"    value="0" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="cukai_capaian[]" class="form-control angka2" id="<?php echo $cukai[$i];?>_capaian"    value="0" required></div></td>
                </tr>
                <?php    
                }
                }
                ?>
                <tr bgcolor="pink">
                	<td><div align="center">TOTAL</div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="total_realisasi" class="form-control angka" id="grand_total_realisasi"    value="<?php echo $content->realisasi_penerimaan?>" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="total_target" class="form-control angka" id="grand_total_target"    value="<?php echo $content->target_penerimaan?>" required></div></td>
                	<td><div><input onkeyup="jumlah()" type="text" name="total_capaian" class="form-control angka2" id="grand_total_capaian"    value="<?php echo $content->capaian_penerimaan?>" required></div></td>
                </tr>
              </table>
              </div>  
                
                <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/'.$this->uri->rsegment(3));?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>    