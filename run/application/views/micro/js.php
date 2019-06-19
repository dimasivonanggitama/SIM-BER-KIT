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
		
			$('.ongko').focusout(function () {
					var value=commaSeparateNumber(this.value);
					$(this).val(value)
			});
			
			forceNumber($('.ongko'));
			
			$('.ongkon').on('input',function () {
					var value=addCommas(this.value);
					$(this).val(value)
			});
			
	});

	function storeTblValues(){
		var TableData = new Array();
		$('#example1 tr').each(function(row, tr){
			TableData[row]={
				"kt_kerja" : $.trim($(tr).find('td:eq(5) input').val()),
				"n_inves" : $.trim($(tr).find('td:eq(6) input').val()),
				"n_penangguhan" : $.trim($(tr).find('td:eq(7) input').val()),
				"n_ekspor" : $.trim($(tr).find('td:eq(8) input').val()),
				"n_jual" : $.trim($(tr).find('td:eq(9) input').val())
			}    
		}); 
		TableData.shift();  // first row will be empty - so remove
		return TableData;
	}

	$(document).ready(function(){
		var dataCount = new storeTblValues().length;	
		for (var i = 0; i < dataCount; i++) {
				var tampung1 = new storeTblValues()[i].kt_kerja;
				var value1=addCommas(tampung1);
				$('#example1 tr:eq('+(i+1)+') td:eq(5) input').val(value1);

				var tampung2 = new storeTblValues()[i].n_inves;
				var value2=tampung2.replace(".", ",");
				$('#example1 tr:eq('+(i+1)+') td:eq(6) input').val(commaSeparateNumber(value2));

				var tampung3 = new storeTblValues()[i].n_penangguhan;
				var value3=tampung3.replace(".", ",");
				$('#example1 tr:eq('+(i+1)+') td:eq(7) input').val(commaSeparateNumber(value3));

				var tampung4 = new storeTblValues()[i].n_ekspor;
				var value4=tampung4.replace(".", ",");
				$('#example1 tr:eq('+(i+1)+') td:eq(8) input').val(commaSeparateNumber(value4));

				var tampung5 = new storeTblValues()[i].n_jual;
				var value5=tampung5.replace(".", ",");
				$('#example1 tr:eq('+(i+1)+') td:eq(9) input').val(commaSeparateNumber(value5));
    }
	});

	function addCommas(str){
			return str.replace(/^0+/, '').replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

	function commaSeparateNumber(val){
		while (/(\d+)(\d{3})/.test(val.toString())){
		val = val.toString().replace(/(\d+)(\d{3})/, '$1'+'.'+'$2');
		}
		return val;
	}

	function forceNumber(element) {
		element
			.data("oldValue", '')
			.bind("paste", function(e) {
			var validNumber = /^[-]?\d+(\,\d{1,2})?$/;
			element.data('oldValue', element.val())
			setTimeout(function() {
				if (!validNumber.test(element.val()))
				element.val(element.data('oldValue'));
			}, 0);
			});
		element
			.keypress(function(event) {
				var text = $(this).val();
				if ((event.which != 44 || text.indexOf(',') != -1) && //if the keypress is not a . or there is already a decimal point
					((event.which < 48 || event.which > 57) && //and you try to enter something that isn't a number
					(event.which != 45 || (element[0].selectionStart != 0 || text.indexOf('-') != -1)) && //and the keypress is not a -, or the cursor is not at the beginning, or there is already a -
					(event.which != 0 && event.which != 8))) { //and the keypress is not a backspace or arrow key (in FF)
					event.preventDefault(); //cancel the keypress
				}

				if ((text.indexOf(',') != -1) && (text.substring(text.indexOf(',')).length > 2) && //if there is a decimal point, and there are more than two digits after the decimal point
					((element[0].selectionStart - element[0].selectionEnd) == 0) && //and no part of the input is selected
					(element[0].selectionStart >= element.val().length - 2) && //and the cursor is to the right of the decimal point
					(event.which != 45 || (element[0].selectionStart != 0 || text.indexOf('-') != -1)) && //and the keypress is not a -, or the cursor is not at the beginning, or there is already a -
					(event.which != 0 && event.which != 8)) { //and the keypress is not a backspace or arrow key (in FF)
					event.preventDefault(); //cancel the keypress
				}
			});
	}

	$('.ongko').bind("paste", function(e) {
		var text = e.originalEvent.clipboardData.getData('Text');
		if ($.isNumeric(text)) {
				if ((text.substring(text.indexOf('.')).length > 3) && (text.indexOf('.') > -1)) {
						e.preventDefault();
						$(this).val(text.substring(0, text.indexOf('.') + 3));
			}
		}
		else {
						e.preventDefault();
				}
	});

	
	$('.datepickertahun').datepicker({
      autoclose: true,
      format : 'yyyy',
      viewMode: 'years', 
      minViewMode: 'years'
	});

	function add_data(){
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_add');?>",
	  		data: {
						'id_hanggar':$('#id_hanggar').val()
	  			},
	  		cache: false,
	  		success: function(result){
					var len = result.length;
					if(len > 0){
						$("#msgAtt").text(result);
						$("#btnIsMicro").click();
						$("#idbtn").click();
						setTimeout(
						function() 
						{
							location.href='<?php echo base_url($this->uri->rsegment(1));?>';
						}, 2700);
						
					}else{
						$("#msgAtt").text(result);
						location.href='<?php echo base_url($this->uri->rsegment(1));?>';
					}
				}
	  	});
	}

	function save_data(id_micro_dtl){
			// alert('test : '+tampung);
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_save');?>",
	  		data: {
	  		  	'id_micro_dtl':id_micro_dtl,
						'jml_tenaga_kerja':$('#id_tamp1_'+id_micro_dtl).val(),
						'n_investasi':$('#id_tamp2_'+id_micro_dtl).val(),
						'n_penangguhan':$('#id_tamp3_'+id_micro_dtl).val(),
						'n_ekspor':$('#id_tamp4_'+id_micro_dtl).val(),
						'n_jual_lokal':$('#id_tamp5_'+id_micro_dtl).val()
	  			},
				dataType : 'json',
	  		cache: false,
	  		success: function(result){
	  			if(result.angka == 0){
						$("#msgAtt").text(result.note);
						$("#idbtn").click();
					}else{
						$("#msgAtt").text(result.note);
						$("#idbtn").click();
					}
	  		},
				error: function(jqXHR, textStatus, errorThrown) {
          alert('Koneksi dengan server terputus!');
				}
	  	});
  }

</script>