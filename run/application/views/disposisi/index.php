<div class="row">
      <div class="col-md-12">

        <div class="box">
          <div class="box-header">
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
                    <th><div align="left"><?php echo $lang_employee;?></div></th>
                    <th><div align="center"><?php echo $lang_agenda ?></div></th>
                    <th><div align="center"><?php echo $lang_naskahdinas_surat ?></div></th>
                    <th><div align="center"><?php echo $lang_lampiran_surat ?></div></th>
                    <th><div align="center"><?php echo $lang_dari_surat?></div></th>
                    <th><div align="center"><?php echo $lang_hal_surat?></div></th>
                    <th><div align="center"><?php echo $lang_filesurat?></div></th>
                    <th><div align="center"><?php echo $lang_catatankepala?></div></th>
                    <th><div align="center"><?php echo $lang_ketentuan?></div></th>
                    <th><div align="center"><?php echo $lang_action;?></div></th>
              </tr>
              </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($content as $val):?>
          <tr>
            <td><div align="center" ><?php echo $no;?></div></td>
            <td><div align="center" ><?php echo $val->name_admin;?></div></td>
            <td><div align="center" ><?php echo $val->id_agenda?></div></td>
            <td><div align="center" ><?php echo $val->nomor_naskah?></div></td>
            <td><div align="center" ><?php echo $val->lampiran_naskah?></div></td>
            <td><div align="center" ><?php echo $val->dari_naskah?></div></td>
            <td><div align="center" ><?php echo $val->perihal_naskah?></div></td>
            <td>
              <div align="center" >
              <?php if ($val->file_surat!=''){?>
                <a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$val->file_surat);?>" title="<?php echo $lang_download;?>"><i class="fa fa-download"></i></a>
                          <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$val->file_surat);?>" title="<?php echo $lang_view;?>"><i class="fa fa-eye"></i></a>
                        <?php } else {echo $lang_no_file;}?>
              </div>
            </td>

            <td><div align="center" ><?php echo $val->catatan_kep?></div></td>
            <td><div align="center" ><?php echo $val->nama_ketentuan?></div></td>
            <td align="center">
              <a href="<?php echo base_url($this->uri->rsegment(1).'/isi/'.$val->id_agenda);?>" title="<?php echo $lang_obrolan;?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                  </td>
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
