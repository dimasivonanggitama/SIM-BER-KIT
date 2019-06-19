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
                  <th><div align="center"><?php echo "Nama Hanggar";?></div></th>
                  <th><div align="center"><?php echo "Jumlah Record Perusahaan"?></div></th>
                  <th><div align="center"><?php echo "Seksie"?></div></th>
                  <th><div align="center"><?php echo "View Perusahaan"?></div></th>
                  <th><div align="center"><?php echo "Kota Perusahaan"?></div></th>
                </tr>
                </thead>
                	<tbody>
                	<?php 
                	$no=1;
                	foreach ($content as $val):?>
						<tr>
              <?php 
                $sql1 = "SELECT COUNT(id_penempatan) as total FROM ap_hanggar_group WHERE id_penempatan=?";
                $query1 = $this->db->query($sql1,array($val->id_penempatan));
                $kegi = $query1->row();
              ?>
							<td><div align="center" ><?php echo $no;?></div></td>
              <td><div align="center" ><?php echo $val->uraian_penempatan;?></div></td>
              <td><div align="center" ><?php 
                if (isset($kegi)){
                  if($kegi->total > 0){
                    echo $kegi->total.' Perusahaan';
                  }else{
                    echo '-';
                  }
              ?></div></td>
              <td><div align="center" >
                <?php $sql = "SELECT P.id_pejabat as id_jabatan, B.uraian_jabatan as uraian_jabatan, A.name_admin as name_admin FROM `ap_hanggar_group_dtl` P LEFT JOIN ap_pejabat T ON T.id_jabatan = P.id_pejabat LEFT JOIN ap_jabatan_ref B ON B.id_jabatan = T.id_jabatan LEFT JOIN ap_admin A ON A.id_admin = T.id_admin WHERE P.id_penempatan =? ORDER BY B.id_jabatan ASC";
                      $query = $this->db->query($sql,array($val->id_penempatan));
                      $row = $query->row();
                      if(isset($row)){
                        echo $row->uraian_jabatan.' / '.$row->name_admin;
                      }else{
                        echo '-';
                      }
                ?>
              </div></td>
              <td><div align="center" >
                  <?php if($kegi->total > 0){  ?>
                      <a data-toggle="modal" href="#isShow_<?php echo $val->id_penempatan;?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                      <div class="modal fade" id="isShow_<?php echo $val->id_penempatan;?>">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Data Perusahaan</h4>
                      </div>
                      <div class="modal-body">
                      <table id="example1" class="table">
                      <thead>
                          <th><div align="Left"><?php echo "No.";?></div></th>
                          <th><div align="Left"><?php echo "Jenis";?></div></th>
                          <th><div align="Left"><?php echo "Nama Perusahaan";?></div></th>
                      </thead>
                      <tbody>
                          <?php 
                            $sql = "SELECT * FROM ap_perusahaan st1 LEFT JOIN ap_hanggar_group st2 ON (st1.id_perusahaan = st2.id_perusahaan) WHERE st2.id_penempatan=?";
                            $query = $this->db->query($sql,array($val->id_penempatan));
                            if (isset($query)){
                            $nox=1;
                            foreach ($query->result() as $row2):
                          ?>
                          <tr>
                              <td><div><?php echo $nox; ?></div></td>
                              <td><div><?php 
                                $sql3 = "SELECT * FROM ap_perusahaan_kategori WHERE id_perusahaan_kategori=?";
                                $query3 = $this->db->query($sql3,array($row2->id_perusahaan_kategori));
                                $row3 = $query3->row();
                                if (isset($row3))
                                {
                                    echo $row3->nama_perusahaan_kategori;
                                }
                              ?></div></td>
                              <td><div><?php echo $row2->nama_perusahaan; ?></div></td>
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
              <td><div align="center" >
                <?php 
                  $sql3 = "SELECT A.kota_perusahaan as kota_perusahaan FROM `ap_hanggar_group` P LEFT JOIN ap_perusahaan A ON A.id_perusahaan = P.id_perusahaan WHERE P.id_penempatan=? GROUP BY A.kota_perusahaan";
                  $query3 = $this->db->query($sql3,array($val->id_penempatan));
                  $row3 = $query3->result_array();
                  
                  if (isset($row3)){
                    for ($x = 0; $x < count($row3); $x++) {
                      //$row3[$x]['kota_perusahaan']
                    print_r('- '.$row3[$x]['kota_perusahaan'].'<br>');
                    }
                  }
                ?>
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