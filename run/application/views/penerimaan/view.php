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
                
                  <label for="inputEmail3" class="col-sm-7 control-label"><?php echo $lang_date_penerimaan;?> <?php echo date('Y-m-d',strtotime($content->date_penerimaan))?></label>
                  
                 </div>  
             <div style="overflow:auto;">
             <table class="table">
             <thead>
              <tr>
                <th><div align="center"><?php echo $lang_jenis_penerimaan ?></div></th>
                <th><div align="center"><?php echo $lang_realisasi ?></div></th>
                <th><div align="center"><?php echo $lang_target ?></div></th>
                <th><div align="center"><?php echo $lang_capaian ?></div></th>
               </tr>
               </thead>
               <tbody>
                <tr bgcolor="yellow">
                	<td><div align="center">PABEAN</div></td>
                	<td><div align="right"><?php echo number_format($content->realisasi_pabean_penerimaan)?></div></td>
                	<td><div align="right"><?php echo number_format($content->target_pabean_penerimaan)?></div></td>
                	<td><div align="right"><?php echo number_format($content->capaian_pabean_penerimaan,2)?></div></td>
                </tr>
                <?php 
                foreach ($content_pabean as $val):
                ?>
                 <tr>
                	<td><div align="right"><?php echo strtoupper(str_replace('_', ' ', $val->nama_penerimaan_pabean));?></div></td>
                	<td><div align="right"><?php echo number_format($val->realisasi_pabean);?></div></td>
                	<td><div align="right"><?php echo number_format($val->target_pabean);?></div></td>
                	<td><div align="right"><?php echo number_format($val->capaian_pabean,2);?></div></td>
                </tr>
                <?php 
                
                endforeach;
                
                ?>
                <tr bgcolor="yellow">
                	<td><div  align="center">CUKAI</div></td>
                	<td><div align="right"><?php echo number_format($content->realisasi_cukai_penerimaan)?></div></td>
                	<td><div align="right"><?php echo number_format($content->target_cukai_penerimaan)?></div></td>
                	<td><div align="right"><?php echo number_format($content->capaian_cukai_penerimaan,2)?></div></td>
                </tr>
                
                <?php 
                foreach ($content_cukai as $val):
                ?>
                 <tr>
                	<td><div align="right"><?php echo strtoupper(str_replace('_', ' ', $val->nama_penerimaan_cukai));?></div></td>
                	<td><div align="right"><?php echo number_format($val->realisasi_cukai);?></div></td>
                	<td><div align="right"><?php echo number_format($val->target_cukai);?></div></td>
                	<td><div align="right"><?php echo number_format($val->capaian_cukai,2);?></div></td>
                </tr>
                <?php 
                
                endforeach;
                
                ?>
                <tr bgcolor="pink">
                	<td><div align="center">TOTAL</div></td>
                	<td><div align="right"><?php echo number_format($content->realisasi_penerimaan)?></div></td>
                	<td><div align="right"><?php echo number_format($content->target_penerimaan)?></div></td>
                	<td><div align="right"><?php echo number_format($content->capaian_penerimaan,2)?></div></td>
                </tr>
                </tbody>
              </table>
                </div>
                
                <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/'.$this->uri->rsegment(3));?>';" class="btn btn-default"><?php echo $lang_back;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
    </div>
    <div class="col-md-12">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            
              <div class="box-body">
             <div id="container_pabean" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
             <div id="container_cukai" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
             <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>  
                
                <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/'.$this->uri->rsegment(3));?>';" class="btn btn-default"><?php echo $lang_back;?></button>
              </div>
              <!-- /.box-footer -->
           
            
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>