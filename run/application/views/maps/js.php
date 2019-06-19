<script>
  $(function () {
	  $("#example1").DataTable({
	   	  fixedColumns: true,
	    	"scrollX": true
	        });
  });

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

  function filternya (){
		var cate = $('#cate').val();
		location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/');?>'+cate;
	  }

	  //var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
  </script>