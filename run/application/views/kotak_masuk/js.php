<script>
  $(function() {
    $(".select2").select2();
    $("#example1").DataTable({
      fixedColumns: true,
      "scrollX": true
    });
  });

  $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'

  });

  $(".timepicker").timepicker({
    showInputs: false,
    showSeconds: true,
    showMeridian: false
  });


  $('.datepickerbulan').datepicker({
    autoclose: true,
    format: 'm',
    viewMode: 'months',
    minViewMode: 'months'



  });

  $('.datepickertahun').datepicker({
    autoclose: true,
    format: 'yyyy',
    viewMode: 'years',
    minViewMode: 'years'



  });


  function kate(nameSelect) {
    if (nameSelect == "2") {
      document.getElementById("admDivCheck").style.display = "";

    } else {
      document.getElementById("admDivCheck").style.display = "none";
    }

    if (nameSelect == "1") {
      document.getElementById("penugasan").style.display = "";

    } else {

      document.getElementById("penugasan").style.display = "none";
    }


    if (nameSelect == "3") {
      document.getElementById("dokumen").style.display = "";

    } else {

      document.getElementById("dokumen").style.display = "none";
    }

    if (nameSelect == "4") {
      document.getElementById("kp_lain_v").style.display = "";

    } else {

      document.getElementById("kp_lain_v").style.display = "none";
    }


  }


  function parent(val) {
    if ($('#module_' + val).is(':checked')) {
      $('.module_child_' + val).prop('checked', true);
    } else {
      $('.module_child_' + val).prop('checked', false);
    }
  }
</script>
