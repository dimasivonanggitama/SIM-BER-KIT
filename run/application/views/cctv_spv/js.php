<script>
  $(function () {
	  $("#example1").DataTable({
	   	  fixedColumns: true,
	    	"scrollX": true
	        });
	  $(".textarea").wysihtml5();
  });

  $('.datepicker').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd',
      
    });

  $(".timepicker").timepicker({
      showInputs: false,
      showSeconds:true,
      showMeridian:false
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
      viewMode: 'year', 
      minViewMode: 'years'
    });
  
  
  </script>