<script>
  $(function () {
	  $("#example1").DataTable({
	    	"scrollX": true,
				"autoWidth": false,
				"fixedHeader": {
				"header": false,
				"footer": false
				},
				"columnDefs": [
						{ "width": "10px", "targets": 0 }
				]
	        });

			$(".select2").select2();

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
  });
</script>