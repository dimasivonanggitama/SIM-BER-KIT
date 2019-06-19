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
	});
	
	function save_seksie(id_penem){
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_simpan');?>",
	  		data: {
						'id_penempatan':id_penem,
						'id_jabatan':$('#id_jab_'+id_penem).val()
	  			},
				dataType : 'json',
	  		cache: false,
	  		success: function(response){
	  			var len = response.id.length;
					if(response.angka != 0){
						$("#msgAtt").text(response.cata);
						$("#isSeksie_"+response.id).modal("hide");
						$("#idbtn").click();
					}else{
						location.href='<?php echo base_url($this->uri->rsegment(1));?>';
					}
				}
	  	});
  }
</script>