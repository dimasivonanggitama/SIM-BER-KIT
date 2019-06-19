<div class="row">
    <div class="col-md-12">
        <div class="box">
           <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
            <div class="row">
                <!-- Row 1 -->
            <div class="col-md-6">
              <div class="box-body">
                <?php if (count($content)){?>
                <?php echo validation_errors();?>
                  <div class="form-group">

                  <label for="inputEmail3" class="col-sm-7 control-label"><?php echo $lang_date_penerimaan;?> <?php echo date('d-m-Y',strtotime($content->date_penerimaan))?></label>

                 </div>
                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
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
                          <tr bgcolor="#d4ff00">
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
                          <tr bgcolor="#23ffb5">
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
                          <tr bgcolor="#e2e1e0">
                            <td><div align="center">TOTAL</div></td>
                            <td><div align="right"><?php echo number_format($content->realisasi_penerimaan)?></div></td>
                            <td><div align="right"><?php echo number_format($content->target_penerimaan)?></div></td>
                            <td><div align="right"><?php echo number_format($content->capaian_penerimaan,2)?></div></td>
                          </tr>
                          </tbody>
                        </table>
                          </div>

                    <div class="carousel-caption">

                    </div>
                  </div>
                  <div class="item" style="overflow:auto;">
                    <div id="container_pabean" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                    <div class="carousel-caption">

                    </div>
                  </div>
                  <div class="item" style="overflow:auto;">
                    <div id="container_cukai" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                    <div class="carousel-caption">

                    </div>
                  </div>
                  <div class="item" style="overflow:auto;">
                    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                    <div class="carousel-caption">

                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
<!-- /.box-body -->

              <!-- /.box-footer -->
            <?php echo form_close();?>
                <?php } else { echo '<center>Tidak ada data</center><br>'; }?>
                </div>
              </div>
              <!-- row2 -->
              <div class="col-md-6">
                  <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Peraturan</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
    <!-- /.box-header -->
    <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <?php
                          echo "<img src='data:image/jpg;base64,".base64_encode(file_get_contents('./uploads/'.$gambaradmin1->image_admin))."' class='user-image' alt='Image'>";
                        ?>
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title"><?php echo $rctu1->uraian_peraturan_group ?>
                        <span class="label label-warning pull-right"><?php echo date('d-m-Y',strtotime($rct1->wk_rekam)) ?></span></a>
                        <span class="product-description"><?php echo $rct1->nama_peraturan ?></span>
                      </div>
                    </li>
                    <!-- /.item -->
                    <li class="item">
                      <div class="product-img">
                        <?php
                          echo "<img src='data:image/jpg;base64,".base64_encode(file_get_contents('./uploads/'.$gambaradmin2->image_admin))."' class='user-image' alt='Image'>";
                        ?>
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title"><?php echo $rctu2->uraian_peraturan_group ?>
                        <span class="label label-warning pull-right"><?php echo date('d-m-Y',strtotime($rct2->wk_rekam)) ?></span></a>
                        <span class="product-description"><?php echo $rct2->nama_peraturan ?></span>
                      </div>
                    </li>
                    <!-- /.item -->
                    <li class="item">
                    <div class="product-img">
                        <?php
                          echo "<img src='data:image/jpg;base64,".base64_encode(file_get_contents('./uploads/'.$gambaradmin3->image_admin))."' class='user-image' alt='Image'>";
                        ?>
                    </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title"><?php echo $rctu3->uraian_peraturan_group?>
                        <span class="label label-info pull-right"><?php echo date('d-m-y',strtotime($rct3->wk_rekam)) ?></span></a>
                        <span class="product-description"><?php echo $rct3->nama_peraturan ?></span>
                      </div>
                    </li>
                    <!-- /.item -->
                    <li class="item">
                    <div class="product-img">
                        <?php
                          echo "<img src='data:image/jpg;base64,".base64_encode(file_get_contents('./uploads/'.$gambaradmin4->image_admin))."' class='user-image' alt='Image'>";
                        ?>
                    </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title"><?php echo $rctu4->uraian_peraturan_group?>
                          <span class="label label-info pull-right"><?php echo date('d-m-y',strtotime($rct4->wk_rekam)) ?></span></a>
                        <span class="product-description"><?php echo $rct4->nama_peraturan ?></span>
                      </div>
                    </li>
                    <!-- /.item -->
                    <li class="item">
                    <div class="product-img">
                        <?php
                          echo "<img src='data:image/jpg;base64,".base64_encode(file_get_contents('./uploads/'.$gambaradmin5->image_admin))."' class='user-image' alt='Image'>";
                        ?>
                    </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title"><?php echo $rctu5->uraian_peraturan_group?>
                        <span class="label label-info pull-right"><?php echo date('d-m-y',strtotime($rct5->wk_rekam)) ?></span></a>
                        <span class="product-description"><?php echo $rct5->nama_peraturan ?></span>
                      </div>
                    </li>
                    <!-- /.item -->
                  </ul>
                </div>
                </div>           
              </div>
              <!-- row 2 -->
          </div>
          <!-- /.box -->
        </div>
    </div>

		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Berita Terbaru</h4>
              </div>
              <div class="modal-body">
                <?php $no=1; foreach ($popup as $val):?>
                    <p><strong><?php echo $no;?>. <?php echo $val->nama_popup?></strong></p>
                    <p><?php echo $val->desc_popup?></p>
                <?php $no++; endforeach;?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<div class="row">
<div class="col-md-12">
<div class="box">
            <div class="box-header">
            <div class="box-body">
            <div id="penerimaanPerTahun"></div>
            </div>
            </div>
 </div>
</div>
<!-- row  -->
</div>

<div class="row">
<div class="col-md-12">
<!-- row -->
<div class="col-md-6">
<div class="box">
            <div class="box-header">
            <div class="box-body">
            <div id="databulancukai"></div>
            </div>
            </div>
  </div>
</div>
<!-- row -->
<!-- row -->
<div class="col-md-6">
<div class="box">
            <div class="box-header">
            <div class="box-body">
            <div id="databulanpabean"></div>
            </div>
            </div>
 </div>
</div>
<!-- row -->
</div>
<div>