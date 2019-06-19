<div class="row">
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
            <div class="col-sm-4">
              <select class="form-control" name="kat_peraturan" required onchange="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/')?>'+this.value;">
                     <option value="0"><?php echo $lang_semua;?> <?php echo $lang_category?></option>
                     <?php foreach ($sifat_srt as $val):?>
                     <option value="<?php echo $val->id_kep?>" <?php echo $val->id_kep==$this->uri->rsegment(3)?'selected':'';?>><?php echo $val->nama_kep?></option>
                     <?php endforeach;?>
               </select>
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
                <th><div align="center"><?php echo $lang_disposisi ?></div></th>
                <th><div align="center"><?php echo $lang_untuk_surat?></div></th>
                <th><div align="center"><?php echo $lang_hal_surat?></div></th>
                <th><div align="center"><?php echo $lang_filesurat?></div></th>

                <th><div align="center"><?php echo $lang_catatankasi?></div></th>

              </tr>
              </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($content as $val):?>
          <tr>
            <td><div align="center" ><?php echo $no;?></div></td>
            <td><div align="center" ><?php echo $val->nama_kep?></div></td>
            <td><div align="center" ><?php echo $val->dari_naskah?></div></td>
            <td><div align="center" ><?php echo $val->perihal_naskah;?></div></td>


            <td>
              <div align="center" >
              <?php if ($val->file_surat!=''){?>
                <a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$val->file_surat);?>" title="<?php echo $lang_download;?>"><i class="fa fa-download"></i></a>
                          <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$val->file_surat);?>" title="<?php echo $lang_view;?>"><i class="fa fa-eye"></i></a>
                        <?php } else {echo $lang_no_file;}?>
              </div>
            </td>


            <td><div align="center" ><?php echo $val->catatan_kep;?></div></td>

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
