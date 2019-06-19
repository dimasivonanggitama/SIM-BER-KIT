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
<!-- /.modal -->
<button id="idbtn" type="button" style="display: none" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning"></button>

<div class="row">
        <div class="col-md-12">

		  <div class="box">
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
                  <th><div align="center"><?php echo "No.";?></div></th>
                  <th><div align="center"><?php echo "Nama Unit";?></div></th>
                  <th><div align="center"><?php echo "Jumlah Record Pegawai"?></div></th>
                  <th><div align="center"><?php echo "Rekam Data"?></div></th>
                  <th><div align="center"><?php echo "View Data"?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
              <?php 
                $sql1 = "SELECT COUNT(id_penempatan) as total FROM ap_sharing_pic WHERE id_penempatan=?";
                $query1 = $this->db->query($sql1,array($val->id_penempatan));
                $kegi = $query1->row();
              ?>
							<td><div align="center" ><?php echo $no;?></div></td>
              <td><div align="center" ><?php echo $val->uraian_penempatan;?></div></td>
              <td><div align="center" ><?php 
                if (isset($kegi)){
                  if($kegi->total > 0){
                    echo $kegi->total.' Pegawai';
                  }else{
                    echo '-';
                  }
              ?></div></td>
							<td><div align="center" >
                <a href="<?php echo base_url($this->uri->rsegment(1).'/idata/'.$val->id_penempatan);?>" title="<?php echo 'Rekam Perusahaan';?>" class="btn btn-xs btn-warning"><i class="fa fa-list-ul"></i></a>
              </div></td>
              <td><div align="center" >
                  <?php if($kegi->total > 0){  ?>
                      <a data-toggle="modal" href="#isShow_<?php echo $val->id_penempatan;?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                      <div class="modal fade" id="isShow_<?php echo $val->id_penempatan;?>">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Data Pegawai</h4>
                      </div>
                      <div class="modal-body">
                      <table id="example1" class="table">
                      <thead>
                          <th><div align="Left"><?php echo "No.";?></div></th>
                          <th><div align="Left"><?php echo "Pegawai";?></div></th>
                      </thead>
                      <tbody>
                          <?php 
                            $sql = "SELECT st2.name_admin, st2.nip_admin FROM ap_sharing_pic st1 LEFT JOIN ap_admin st2 ON (st1.id_admin = st2.id_admin) WHERE st1.id_penempatan=?";
                            $query = $this->db->query($sql,array($val->id_penempatan));
                            if (isset($query)){
                            $nox=1;
                            foreach ($query->result() as $row2):
                          ?>
                          <tr>
                              <td><div><?php echo $nox; ?></div></td>
                              <td><div><?php echo $row2->name_admin.' / '.$row2->nip_admin; ?></div></td>
                          </tr>
                              <?php $nox++; endforeach;}?>
                      </tbody>
                      </table>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                  <?php }else{echo '-';}} ?>
              </div></td>
						</tr>
					<?php 
					$no++;
					endforeach;?>	                	
                	</tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>