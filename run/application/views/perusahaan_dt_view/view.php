	<div class="row">
        <div class="col-md-8">
		      <div class="box">
		    <div class="box-header">
            </div>
            <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Perusahaan</th>
                  <th> Jenis Doc Transaksi </th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Jumlah</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach ($content as $val):
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $val->nama_perusahaan?></td>
                  <td>
					<?php echo $val->jenis_doc_perusahaan_dt?>
				  </td>
				  <td><?php echo bulan($val->bulan_perusahaan_dt)?></td>
				  <td><?php echo $val->tahun_perusahaan_dt;?></td>
				  <td align="center"><?php echo $val->jumlah_doc_perusahaan_dt;?></td>
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