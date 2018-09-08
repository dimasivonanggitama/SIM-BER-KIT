<html>
			<?php $this->load->library('session');
				for ($i = 1; $i <= $this->session->userdata('total_news', $count_result); $i++) { ?>
                    	<div class="col-md-4 col-sm-6 construction">
			    <div class="movearea" id="obj<?php echo $i;?>">
               			<div class="cns-img">
                       			<img src="assets/images/Antara.png" alt="">
               			</div>
              			<br>
                       		<div class="cns-content">
                            		<a href="#">News </a>
                            		<p><?php echo $this->session->userdata['news']['deskripsi'][$i]; ?></p>
                       		</div>
                    	    </div>
                         </div>
			<?php } ?>
</html>