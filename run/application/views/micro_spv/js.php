<script>
	$(function () {
			$(".select2").select2();
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

	function cari(){
			var semester=$("#semester option:selected").val();
			if(semester == 1 || semester ==2){
				var tahun=$('#tahun').val();
				if ($.isNumeric(tahun)) {
					$.ajax({
						type: "POST",
						url: "<?php echo base_url($this->uri->rsegment(1).'/search');?>",
						data: {
								'semester':semester,
								'tahun':tahun
							},
						dataType : 'json',
						cache: false,
						success: function(result){
							window.location.href='<?php echo base_url($this->uri->rsegment(1)).'/'.$this->uri->rsegment(2);?>'+'/'+result.semester+'/'+result.tahun;
						}
					});
				}else{
					$("#msgAtt").text('Pilih periode tahun');
					$("#idbtn").click();
					//alert('Pilih periode tahun');
				}
			}else{
				$("#msgAtt").text('Pilih periode semester');
				$("#idbtn").click();
				//alert ('Pilih periode semester');
			}
	}

	function unduh(semester,tahun){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url($this->uri->rsegment(1).'/unduh_excel');?>",
			data: {
					'semester':semester,
					'tahun':tahun
				},
			dataType : 'json',
			cache: false,
			success: function(result){
				if(result.nihil == 1){
						alert('Tidak ada data yang didownload!');
					}else{
						window.location='<?php echo base_url($this->uri->rsegment(1)).'/unduh_excel/9';?>';
					}
			},
			error: function (ajaxContext) {
        alert('Export error: '+ajaxContext.responseText);
      }
		});
	}
</script>