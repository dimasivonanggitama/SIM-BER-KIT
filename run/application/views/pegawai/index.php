<div class="row">
        <div class="col-md-12">

          <div class="box">
         
          <div class="box-header">
             <div class="col-sm-4">
               <select class="form-control select2" name="kat_pegawai" required onchange="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/')?>'+this.value;">
                    	<option value="0"><?php echo $lang_semua;?> <?php echo $lang_category?></option>
                    	<?php foreach ($pegawai_kate as $val):?>
                    	<option value="<?php echo $val->id_penempatan?>" <?php echo $val->id_penempatan==$this->uri->rsegment(3)?'selected':'';?>><?php echo $val->uraian_penempatan?></option>
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
                  <th><div align="center">No.</div></th>
                  <th><div align="center">NIP</div></th>
                  <!-- <th><div align="center">Akun Login</div></th> -->
                  <th><div align="center">Nama Pegawai</div></th>
                  <!-- <th><div align="center">Hak Akses</div></th> -->
                  <th><div align="center">No Telpon</div></th>
                  <th><div align="center">Penempatan</div></th>
                </tr>
                </thead>
                        <tbody>
                        <?php
                        $no=1;
                        foreach ($content as $val):?>
                                                <tr>
                                                        <td><div align="center" ><?php echo $no;?></div></td>
                                                        <td><div align="center" ><?php echo $val->nip_admin?></div></td>
                                                        <td><div align="left" ><?php echo $val->name_admin;?></div></td>
                                                        <td><div align="center" ><?php echo $val->telp_admin;?></div></td>
                                                        <td><div align="left"> <?php
$sql = "SELECT * FROM ap_penempatan WHERE id_penempatan=?";
$query = $this->db->query($sql,array($val->id_penempatan));
$row = $query->row();
if (isset($row))
{
    echo $row->uraian_penempatan;
}
?></div></td>
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

