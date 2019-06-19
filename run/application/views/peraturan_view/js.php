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
						{ "width": "10px", "targets": 0 },
						{ "width": "200px", "targets": 1 },
						{ "width": "50px", "targets": 2 },
						{ "width": "50px", "targets": 3 },
						{ "width": "50px", "targets": 4 },
						{ "width": "200px", "targets": 5 },
						{ "width": "50px", "targets": 6 },
						{ "width": "50px", "targets": 7 },
						{ "width": "50px", "targets": 8 }
				]
	        });
  });

  function changeLink($namafile){
	//   $.ajax({
	//   		type: "POST",
	// 		dataType: "pdf",
	//   		url: "<?php echo base_url($this->uri->rsegment(1).'/ambil');?>",
	//   		data: {
	//   			'namafilepost':namafile,
	//   			},
	//   		cache: false,
	//   		success: function(result){
	// 			var iframe = document.createElement('iframe');
	// 			iframe.id = "IFRAMEID";
	// 			iframe.style.display = 'none';
	// 			document.body.appendChild(iframe);
	// 			iframe.src = result;
	// 			console.info(result);
	//   		}
	//   	});
		var iframe = document.createElement('iframe');
		iframe.id = "IFRAMEID";
		iframe.style.display = 'none';
		document.body.appendChild(iframe);
		iframe.src = '<?php echo base_url($this->uri->rsegment(1).'/ambil');?>';
		iframe.addEventListener("load", function () {
			console.log("FILE LOAD DONE.. Download should start now");
		});
  }
  </script>