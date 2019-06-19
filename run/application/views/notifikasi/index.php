	<div class="row">	
		<div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <a onclick="return confirm('<?php echo $lang_are_you_sure;?>?');" class="btn btn-info pull-right" href="<?php echo base_url('notifikasi?semua=true');?>"><?php echo 'Baca Semua';?></a>
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo 'Notifikasi';?></th>
                  <th><?php echo 'Tanggal';?></th>
                  <th><div align="center"><?php echo $lang_action;?></div></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($notifikasi as $valuex):
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $valuex->content_notification;?></td>
                  <td>
                  <?php echo date('d M Y', strtotime($valuex->date_notification))?>
                  </td>
                  <td align="center">
					<a href="<?php echo base_url('notifikasi?id='.$valuex->id_notification_rules.'&link='.$valuex->link_notification);?>" title="<?php echo $lang_view;?>" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>
				  </td>
                </tr>
                <?php
                $no++;
                endforeach;
                ?>
                </tbody>
              </table>
            
          </div>
          <!-- /.box -->
        </div>
        
     </div>