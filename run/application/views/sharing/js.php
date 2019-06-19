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
  </script>