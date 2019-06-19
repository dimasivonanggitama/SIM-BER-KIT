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
      <?php if ($this->uri->rsegment(3)!=NULL) { ?>
          ajax_detail(<?php echo $this->uri->rsegment(3);?>);
      <?php } ?>
      admSelectCheck($('#getFname').val());
      perusahaan($('#lokasi').val());
      
  });

  function filternya (){
	var kota = $('#kota').val();
	var status = $('#status').val();
	var skep = $('#skep').val();
	var cate = $('#cate').val();
	var pembekuan = $('#pembekuan').val();
	location.href='<?php echo base_url($this->uri->rsegment(1).'/'.$this->uri->rsegment(2).'/');?>'+kota+'/'+status+'/'+skep+'/'+cate+'/'+pembekuan;
  }
  	
  function ajax_detail(id){
	  $.ajax({
	  		type: "POST",
	  		url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_detail');?>",
	  		data: {
	  			'id':id,
	  			},
	  		cache: false,
	  		success: function(result){
	  			$('#isi_detail').html(result);
	  		}
	  	});
  }
  function admSelectCheck(nameSelect)
  {
      if(nameSelect=="0"){
              document.getElementById("admDivCheck").style.display = "";
        
      }
      else{
          document.getElementById("admDivCheck").style.display = "none";
      }
  }


  function perusahaan(nameSelect)
  {
      if(nameSelect=="<?php echo $lang_luar_perusahaan?>"){
          $("#kawasan").prop('disabled',true);
        
      }
      else{
    	  $("#kawasan").prop('disabled',false);
      }
  }
  

  </script>