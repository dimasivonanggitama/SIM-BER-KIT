  <div class="row">
        <div class="col-md-8">
		  <div class="box">
		  <div class="box-header">
              <button type="button" class="btn btn-info pull-left" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/config_maps/1')?>';"><?php echo $lang_setting;?></button>
              <div class="col-sm-4">
               <select class="form-control" name="kat_peraturan" required onchange="filternya()" id="cate">
                    	<option value="0">Kategori Perusahaan</option>
                    	<?php foreach ($peru_cate as $val):?>
                    	<option value="<?php echo $val->id_perusahaan_kategori;?>" <?php echo $val->id_perusahaan_kategori==$this->uri->rsegment(3)?'selected':'';?>> <?php echo $val->nama_perusahaan_kategori?> </option>	
                    	<?php endforeach;?>
                </select>
                </div>
                <div class="col-sm-4">
                	<?php echo count($content);?> Perusahaan Ditemukan
                </div>
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