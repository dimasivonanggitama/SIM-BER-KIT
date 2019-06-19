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
              <label for="inputEmail3" class="col-sm-4 control-label">
                <?php echo $lang_obrolan;?>
              </label>
              <div class="col-sm-4">
                <input type="text" name="isi_chat" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_obrolan;?>" value="" required autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_filesurat;?></label>
                <div class="col-sm-8">
                <input type="file" name="file_surat" class="" id="exampleInputFile">
              </div>
            </div>

        </div>
        <div class="box-footer">
          <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default">
            <?php echo $lang_cancel;?>
          </button>
          <button type="submit" class="btn btn-info pull-right">
            <?php echo $lang_kirim;?>
          </button>
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
          <div align="center">

                        <table class="table table-bordered">
                          <thead>
                            <tr>
                                      <th>#</th>

                                      <th>
                                        <div align="center">
                                          <?php echo $lang_obrolan?>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                      </th>
                                      <th>
                                        <div align="center">
                                          <?php echo $lang_filesurat?>
                                        </div>
                                      </th>
                                      <th>
                                        <div align="center">
                                          <?php echo $lang_dari_surat?>
                                        </div>
                                      </th>

                            </tr>
                          </thead>
                          <!-- isi bawah -->
                          <?php
    $no=1;
    foreach ($isi_detail as $val):?>
                          <tbody>
                            <tr>
                                      <td><div align="center" ><?php echo $no;?></div></td>
                                      <td>
                                        <div align="center">
                                          <?php echo $val->isi_chat?>
                                        </div>
                                      </td>

                                      <td>
                                        <div align="center" >
                                        <?php if ($val->file_surat!=''){?>
                                          <a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$val->file_surat);?>" title="<?php echo $lang_download;?>"><i class="fa fa-download"></i></a>
                                                    <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$val->file_surat);?>" title="<?php echo $lang_view;?>"><i class="fa fa-eye"></i></a>
                                                  <?php } else {echo $lang_no_file;}?>
                                        </div>
                                      </td>
                                      <td>
                                        <div align="center">
                                          <?php echo $val->name_admin?>
                                        </div>
                                      </td>
                            </tr>
                            <?php
$no++;
?>
                              <br>
                              <?php   endforeach;?>
                          </tbody>
                        </table>

        </div>
    </div>
  </div>
</div>
</div>
