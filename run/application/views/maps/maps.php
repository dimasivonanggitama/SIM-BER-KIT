	<div class="row">
        <div class="col-md-8">
		  <div class="box">
		  <div class="box-header">
              <button type="button" class="btn btn-info pull-left" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/config_maps/1')?>';"><?php echo $lang_setting;?></button>
            </div>
            <div class="box-body">
              <head><?php echo $map['js']; ?></head>
			  <body><?php echo $map['html']; ?></body>
             </div>
          </div>
      </div>
      <div class="col-md-4">
		  <div class="box">
		  <div class="box-header">
              <?php echo $lang_detail;?>
            </div>
            <div class="box-body">
              <div id="isi_detail"></div>
             </div>
          </div>
      </div>
      
     </div>