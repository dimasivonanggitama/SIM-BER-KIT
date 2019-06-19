<script>
  $(function () {
	  $("#example1").DataTable({
	   	  fixedColumns: true,
	    	"scrollX": true
	        });
  });

  $('.datepicker').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
          
    });

  
  $('.datepickerbulan').datepicker({
      autoclose: true,
      format : 'm',
      viewMode: 'months', 
      minViewMode: 'months'          
    });

  $('.datepickertahun').datepicker({
      autoclose: true,
      format : 'yyyy',
      viewMode: 'years', 
      minViewMode: 'years'
  });

  function parent(val){
	  if ($('#module_'+val).is(':checked')) {
		  $('.module_child_'+val).prop('checked', true);
	  } else {
		  $('.module_child_'+val).prop('checked', false);
	  }
  }

  function setuju(id){
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_setuju');?>",
	  		data: {
	  			'id':id,
	  		  	'ket':$('#keterangan_'+id).val()
	  			},
	  		cache: false,
	  		success: function(result){
	  			location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/'.$this->uri->rsegment(3));?>';
	  		}
	  	});
  }

   function batal_setuju(id){
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_batal_setuju');?>",
	  		data: {
	  			'id':id
	  			},
	  		cache: false,
	  		success: function(result){
	  			location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/'.$this->uri->rsegment(3));?>';
	  		}
	  	});
  }

  function tidak_setuju(id){
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_tidak_setuju');?>",
	  		data: {
	  			'id':id,
	  		  	'ket':$('#keterangan_'+id).val()
	  			},
	  		cache: false,
	  		success: function(result){
	  			location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/'.$this->uri->rsegment(3));?>';
	  		}
	  	});
  }

    function batal_tidak_setuju(id){
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_batal_tidak_setuju');?>",
	  		data: {
	  			'id':id
	  			},
	  		cache: false,
	  		success: function(result){
	  			location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/'.$this->uri->rsegment(3));?>';
	  		}
	  	});
  }
  </script>