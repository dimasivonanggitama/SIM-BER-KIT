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
$(document).ready(function(){
    $('.check').click(function() {
        $('.check').not(this).prop('checked', false);
    });
});

  });
  

  </script>
