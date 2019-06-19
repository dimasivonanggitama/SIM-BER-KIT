	<div class="row">
        <div class="col-md-8">
          <div class="box">
		    <div class="box-header">
              <?php echo $lang_product_image;?>
            </div>
            <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo $lang_product_image;?></th>
                  <th><?php echo $lang_product_name;?></th>
                  <th><?php echo $lang_product_desc;?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($produk as $val):
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td>
					<img width="200px" class="img-responsive" src="<?php echo base_url();?>uploads/<?php echo $val->image_perusahaan_produk;?>" alt="Photo">
				  </td>
				  <td><?php echo $val->nama_perusahaan_produk;?></td>
				  <td><?php echo $val->ket_perusahaan_produk;?></td>
                </tr>
                <?php
                $no++;
                endforeach;
                ?>
                </tbody>
              </table>	  
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