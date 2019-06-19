<script>
  $(function () {
	    $(".select2").select2();
		  $("#example1").DataTable({
		   	  fixedColumns: true,
		    	"scrollX": true
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

	function storeTblValues()
		{
		var TableData = new Array();
		$('#tblhasil tr').each(function(row, tr){
			TableData[row]={
				"keterangan" : $.trim($(tr).find('td:eq(4) textarea').val()),
				"id_cctv" : $(tr).find('td:eq(5)').text(),
				"id_cctv_cek" : $(tr).find('td:eq(6)').text()
			}    
		}); 
		TableData.shift();  // first row will be empty - so remove
		return TableData;
	}

	function setuju_semua(){                
		var TableData;
		TableData = $.toJSON(new storeTblValues());
        //alert(TableData);
		        
		$.ajax({
		type: "POST",
		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_setuju_semua');?>",
		data: "pTableData=" + TableData,
		success: function(result){
			location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/'.$this->uri->rsegment(3));?>';
			}
		});
  }
  
    function setuju(id_cek,id_cctv){
			// alert('test : '+tampung);
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_setuju');?>",
	  		data: {
	  		  	'id_cctv_cek':id_cek,
						'id_cctv':id_cctv,
						'ket':$('#catatan_'+id_cek).val()
	  			},
	  		cache: false,
	  		success: function(result){
	  			location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/'.$this->uri->rsegment(3));?>';
	  		}
	  	});
  }

   function batal_setuju(id_cek,id_cctv){
			// alert('test : '+tampung);
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_batal_setuju');?>",
	  		data: {
	  		  	'id_cctv_cek':id_cek,
						'id_cctv':id_cctv,
						'ket':$('#catatan_'+id_cek).val()
	  			},
	  		cache: false,
	  		success: function(result){
	  			location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/'.$this->uri->rsegment(3));?>';
	  		}
	  	});
  }

  function tidak_setuju(id_cek,id_cctv){
		var id_c=id_cek;
		var id_tv=id_cctv;
		bootbox.confirm({
			message: "Apakah anda setuju untuk klik tidak! <br>Jika setuju silahkan lanjut klik ajukan di halaman awal dan/atau pilihan selanjutanya tidak diperlukan lagi",
			buttons: {
					confirm: {
							label: 'Setuju',
							className: 'btn btn-xs btn-success'
					},
					cancel: {
							label: 'Batal',
							className: 'btn btn-xs btn-danger'
					}
			},
			size: 'small',
			callback: function (result) {
			if(result){
				$.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_tidak_setuju');?>",
	  		data: {
	  		  	'id_cctv_cek':id_c,
						'id_cctv':id_tv,
						'ket':$('#catatan_'+id_c).val()
	  			},
	  		cache: false,
	  		success: function(result){
	  			location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/'.$this->uri->rsegment(3));?>';
	  		}
	  	});
			}else{
				$('#catatan_'+id_c).val('');
			}
			}
	});
  }

    function batal_tidak_setuju(id_cek,id_cctv){
			// alert('test : '+tampung);
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_batal_tidak_setuju');?>",
	  		data: {
	  		  	'id_cctv_cek':id_cek,
						'id_cctv':id_cctv,
						'ket':$('#catatan_'+id_cek).val()
	  			},
	  		cache: false,
	  		success: function(result){
	  			location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/'.$this->uri->rsegment(3));?>';
	  		}
	  	});
  }

</script>
<script src="<?php echo base_url();?>assets/dist/js/bootbox.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery.json-2.4.min.js"></script>