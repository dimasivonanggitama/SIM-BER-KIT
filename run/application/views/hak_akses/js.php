<script>
  $(function () {
	  $("#example1").DataTable({
	   	  fixedColumns: true,
	    	"scrollX": true
	        });
  });

  function parent(val){
	  if ($('#module_'+val).is(':checked')) {
		  $('.module_child_'+val).prop('checked', true);
	  } else {
		  $('.module_child_'+val).prop('checked', false);
	  }
  }

  function child(val){
	  	var favorite = [];
	    $.each($("input[name='module[]']:checked"), function(){
		    var ambil = $(this).val().split("_");
		    if(parseFloat(ambil[1])==val){
		    	favorite.push($(this).val());
		    }         
	    });
	    
	    if(parseFloat(favorite.length)==0){
	    	$('#module_'+val).prop('checked', false);	    	
	    } else {
	    	$('#module_'+val).prop('checked', true);
	    }
  }
  </script>