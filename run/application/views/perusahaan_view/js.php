<script>
  $(function () {
	  $("#example1").DataTable({
	   	  fixedColumns: true,
	    	"scrollX": true
	        });

	  $('.datepicker').datepicker({
	        autoclose: true,
	        format : 'yyyy-mm-dd'
	            
	      });
      <?php if ($this->uri->rsegment(3)!=NULL) { ?>
          ajax_detail(<?php echo $this->uri->rsegment(3);?>);
      <?php } ?>
  });

  function filternya (){
	var kota = $('#kota').val();
	var status = $('#status').val();
	var skep = $('#skep').val();
	var cate = $('#cate').val();
	location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/');?>'+kota+'/'+status+'/'+skep+'/'+cate;
  }
  	
  function ajax_detail(id){
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_detail');?>",
	  		data: {
	  			'id':id,
	  			},
	  		cache: false,
	  		success: function(result){
	  			$('#isi_detail').html(result);
	  		}
	  	});
  }
  </script>