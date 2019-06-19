	<div class="row">
        <div class="col-md-8">

          <div class="box">
            <div class="box-header">
              <button type="button" class="btn btn-info pull-right" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit/'.$parent)?>';"><?php echo $lang_add;?></button>
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
                  <th><?php echo $lang_category;?></th>
                  <th><?php echo $lang_parent;?></th>
                  <th><div align="center"><?php echo $lang_action;?></div></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($content as $val):
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $val->nama_peraturan_kategori;?></td>
                  <td>
                  <?php if ($val->parent_peraturan_kategori==0){echo $lang_parent;}else {echo $content_parent->nama_peraturan_kategori;}?>
                  </td>
                  <td align="center">
					<a href="<?php echo base_url($this->uri->rsegment(1).'/edit/'.$parent.'/'.$val->id_peraturan_kategori);?>" title="<?php echo $lang_edit;?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
					<a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" href="<?php echo base_url($this->uri->rsegment(1).'/delete/'.$parent.'/'.$val->id_peraturan_kategori);?>" title="<?php echo $lang_delete;?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
				  </td>
                </tr>
                <?php
                $no++;
                endforeach;
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-4">

          <div class="box">
            <div class="box-header">
              <?php echo $lang_tree_view;?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="nav">
                <li><a href="<?php echo base_url($this->uri->rsegment(1).'/index/0');?>"><?php echo $lang_parent;?></a>
                  <ul>
                  <?php pohon_list($pohon, $parent_list, base_url($this->uri->rsegment(1)), 0 ,$parent);?>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      
      <?php 
      function pohon_list($all_data, $induk_list, $link, $induk, $parent){
        foreach ($all_data as $val):
            if ($val->parent_peraturan_kategori==$induk){
                if ($val->id_peraturan_kategori==$parent){
                    $selected ='class="selected"';
                } else {
                    $selected ='';
                }
                echo '<li '.$selected.'><a href="'.$link.'/index/'.$val->id_peraturan_kategori.'">'.$val->nama_peraturan_kategori.'</a>';
                if (in_array($val->id_peraturan_kategori, $induk_list)) {
                    echo '<ul>';
                    pohon_list($all_data, $induk_list, $link, $val->id_peraturan_kategori, $parent);
                    echo '</ul>';
                }
                echo '</li>';
            }
        endforeach;
      }
      ?>