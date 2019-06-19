	<div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-info pull-right" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit/')?>';"><?php echo $lang_add;?></button>
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
                  <th><div align="center">NIP</div></th>
                  <th><div align="center">Akun Login</div></th>
                  <th><div align="center">Nama Pengguna</div></th>
                  <th><div align="center">Hak Akses</div></th>
                  <th><div align="center">No Telpon</div></th>
                  <th><div align="center">Penempatan</div></th>
                  <th><div align="center"><?php echo $lang_action;?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
							<td><div align="center" ><?php echo $no;?></div></td>
							<td><div align="center" ><?php echo $val->nip_admin?></div></td>
							<td><div align="center" ><?php echo $val->username_admin?></div></td>
							<td><div align="center" ><?php echo $val->name_admin;?></div></td>
							<td><div align="center" ><?php echo $val->name;?></div></td>
							<td><div align="center" ><?php echo $val->telp_admin;?></div></td>
							<td><div align="center"> <?php
$sql = "SELECT * FROM ap_penempatan WHERE id_penempatan=?";
$query = $this->db->query($sql,array($val->id_penempatan));
$row = $query->row();
if (isset($row))
{
    echo $row->uraian_penempatan;
}
?></div></td>
							<td align="center">
            					<a href="<?php echo base_url($this->uri->rsegment(1).'/edit/'.$val->id_admin);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
            					<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id_admin);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
      
</div>     