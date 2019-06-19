<?php
$this->load->helper('string'); 
$tampung = random_string('alnum', 4);
$this->session->m_acak;
$this->session->set_userdata('m_acak', $tampung); 
//echo 'apa'.$this->session->userdata('m_acak');
//$namaf='uploads\Untitled_20181127094604.png';
//echo APPPATH.'application/uploads/Untitled_20181127094604.png';
$ma=$this->session->userdata('m_acak');
// $file=APPPATH.'application/uploads/Untitled_20181127094604.png';
//echo $_SERVER['DOCUMENT_ROOT'].'/run/application/uploads';
//echo realpath(APPPATH.'/uploads/');
//echo anchor('application/uploads/' . $attachment['id'], $attachment['file_name']);
echo base_url().'uploads/';
?>
<div class="row">
  <div class="col-md-12">

    <div class="box">
      <div class="box-header">
        <div class="col-sm-4">
          <select class="form-control" name="kat_peraturan" id="kat_peraturan" required onchange="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/')?>'+$('#kat_peraturan').val()+'/'+$('#kat_peraturan_sub').val();">
            <option value="0">
              <?php echo $lang_semua;?>
                <?php echo $lang_category?>
            </option>
            <?php foreach ($peraturan_kate as $val):?>
              <option value="<?php echo $val->id_peraturan_kategori?>" <?php echo $val->id_peraturan_kategori==$this->uri->rsegment(3)?'selected':'';?>>
                <?php echo $val->nama_peraturan_kategori?>
              </option>
              <?php endforeach;?>
          </select>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="kat_peraturan_sub" id="kat_peraturan_sub" required onchange="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/')?>'+$('#kat_peraturan').val()+'/'+$('#kat_peraturan_sub').val();">
            <option value="0">
              <?php echo $lang_semua;?> Sub
                <?php echo $lang_category?>
            </option>
            <?php foreach ($peraturan_kate_sub as $val):?>
              <option value="<?php echo $val->id_peraturan_kategori?>" <?php echo $val->id_peraturan_kategori==$this->uri->rsegment(4)?'selected':'';?>>
                <?php echo $val->nama_peraturan_kategori?>
              </option>
              <?php endforeach;?>
          </select>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php if (!empty($this->session->flashdata('status'))){?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-ban"></i>
            <?php echo $this->session->flashdata('status');?>!
          </div>
          <?php }?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>
                    <div align="center">
                      <?php echo $lang_nama_peraturan?>
                    </div>
                  </th>
                  <th>
                    <div align="center">
                      <?php echo $lang_category?>
                    </div>
                  </th>
                  <th><div align="center"><?php echo $lang_peraturan_group?></div></th>
                  <th><div align="center"><?php echo $lang_peraturan_status?></div></th>
                  <th>
                    <div align="center">
                      <?php echo $lang_ket_peraturan?>
                    </div>
                  </th>
                  <th>
                    <div align="center">
                      <?php echo $lang_file_peraturan?>
                    </div>
                  </th>
                  <th><div align="center"><?php echo $lang_file_slide?></div></th>
                  <th>
                    <div align="center">
                      <?php echo $lang_peraturan_create?>
                    </div>
                  </th>
                  <!-- <th><div align="center"><?php echo $lang_peraturan_update?></div></th> -->
                </tr>
              </thead>
              <tbody>
                <?php
$no=1;
foreach ($content as $val):?>
                  <tr>
                    <td>
                      <div align="center">
                        <?php echo $no;?>
                      </div>
                    </td>
                    <td>
                      <div align="left">
                        <?php echo $val->nama_peraturan?>
                      </div>
                    </td>
                    <td>
                      <div align="center">
                        <?php echo $val->nama_peraturan_kategori?>
                      </div>
                    </td>
                    <td><div align="center"> <?php
$sql = "SELECT * FROM ap_peraturan_group WHERE id_peraturan_group=?";
$query = $this->db->query($sql,array($val->id_peraturan_group));
$row = $query->row();
if (isset($row))
{
    echo $row->uraian_peraturan_group;
}
?></div></td>
              <td><div align="center"> <?php
$sql = "SELECT * FROM ap_peraturan_status WHERE id_peraturan_status=?";
$query = $this->db->query($sql,array($val->id_peraturan_status));
$row = $query->row();
if (isset($row))
{
    echo $row->uraian_peraturan_status;
}
?></div></td>
                    <td>
                      <div align="left">
                        <?php echo $val->keterangan_peraturan;?>
                      </div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if ($val->file_peraturan!=''){?>
                          <a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$val->file_peraturan);?>" title="<?php echo $lang_download;?>"><i class="fa fa-download"></i></a>
                          <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$val->file_peraturan);?>" title="<?php echo $lang_download;?>"><i class="fa fa-download"></i></a>                      
                          <?php } else {echo $lang_no_file;}?>

                      </div>
                    </td>
                    <td>	<div align="center" >
								<?php if ($val->nama_slide!=''){?>
									<a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$val->nama_slide);?>" title="<?php echo $lang_download;?>"><i class="fa fa-download"></i></a>
                    			<?php } else {echo $lang_no_file;}?>
									
								</div></td>
                    <td>
                      <div align="center">
                        <?php echo date('d-m-Y',strtotime($val->date_berlaku_peraturan));?>
                      </div>
                    </td>
                    <!-- <?php if($val->date_update_peraturan==NULL){?>
    <td></td>
<?php }else{?>
    <td><div align="center" ><?php echo date('Y-m-d H:i:s',strtotime($val->date_update_peraturan));?></div></td>
<?php }?> -->
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