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
  });
  

  function jumlah(){

	  $("#total_realisasi").val(parseFloat($("#bm_realisasi").val())+parseFloat($("#bk_realisasi").val())+parseFloat($("#pab_lain_realisasi").val()));
	  $("#total_target").val(parseFloat($("#bm_target").val())+parseFloat($("#bk_target").val())+parseFloat($("#pab_lain_target").val()));
	  $("#total_capaian").val((parseFloat($("#total_realisasi").val())/parseFloat($("#total_target").val()))*100);
	  $("#bm_capaian").val((parseFloat($("#bm_realisasi").val())/parseFloat($("#bm_target").val()))*100);
	  $("#bk_capaian").val((parseFloat($("#bk_realisasi").val())/parseFloat($("#bk_target").val()))*100);
	  $("#pab_lain_capaian").val((parseFloat($("#pab_lain_realisasi").val())/parseFloat($("#pab_lain_target").val()))*100);

	  $("#total_realisasi_cukai").val(parseFloat($("#ht_realisasi").val())+parseFloat($("#ea_realisasi").val())+parseFloat($("#mmea_realisasi").val())+parseFloat($("#cukai_lain_realisasi").val())+parseFloat($("#plastik_realisasi").val()));
	  $("#total_target_cukai").val(parseFloat($("#ht_target").val())+parseFloat($("#ea_target").val())+parseFloat($("#mmea_target").val())+parseFloat($("#cukai_lain_target").val())+parseFloat($("#plastik_target").val()));
	  $("#total_capaian_cukai").val((parseFloat($("#total_realisasi_cukai").val())/parseFloat($("#total_target_cukai").val()))*100);
	  $("#ht_capaian").val((parseFloat($("#ht_realisasi").val())/parseFloat($("#ht_target").val()))*100);
	  $("#ea_capaian").val((parseFloat($("#ea_realisasi").val())/parseFloat($("#ea_target").val()))*100);
	  $("#mmea_capaian").val((parseFloat($("#mmea_realisasi").val())/parseFloat($("#mmea_target").val()))*100);
	  $("#cukai_lain_capaian").val((parseFloat($("#cukai_lain_realisasi").val())/parseFloat($("#cukai_lain_target").val()))*100);
	  $("#plastik_capaian").val((parseFloat($("#plastik_realisasi").val())/parseFloat($("#plastik_target").val()))*100);



	  $("#grand_total_realisasi").val(parseFloat($("#total_realisasi").val())+parseFloat($("#total_realisasi_cukai").val()));
	  $("#grand_total_target").val(parseFloat($("#total_target").val())+parseFloat($("#total_target_cukai").val()));
	  $("#grand_total_capaian").val((parseFloat($("#grand_total_realisasi").val())/parseFloat($("#grand_total_target").val()))*100);
  }
</script>

<script src="<?php echo base_url();?>assets/chart/code/highcharts.js"></script>
  <script src="<?php echo base_url();?>assets/chart/code/modules/exporting.js"></script>
  
  <script type="text/javascript">

Highcharts.chart('container_cukai', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'CAPAIAN CUKAI'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.2f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    credits:false,
    series: [{
        name: 'Presentase',
        colorByPoint: true,
        data: [{
            name: 'CAPAIAN',
            y: <?php echo $content->capaian_cukai_penerimaan?>,
            sliced: true,
            selected: true
        }, {
            name: 'SISA',
            y: <?php echo 100-$content->capaian_cukai_penerimaan?>
        }]
    }]
});

Highcharts.chart('container_pabean', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'CAPAIAN PABEAN'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.2f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    credits:false,
    series: [{
        name: 'Presentase',
        colorByPoint: true,
        data: [{
            name: 'CAPAIAN',
            y: <?php echo $content->capaian_pabean_penerimaan?>,
            sliced: true,
            selected: true
        }, {
            name: 'SISA',
            y: <?php echo 100-$content->capaian_pabean_penerimaan?>
        }]
    }]
});

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'CAPAIAN PABEAN & CUKAI'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.2f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    credits:false,
    series: [{
        name: 'Presentase',
        colorByPoint: true,
        data: [{
            name: 'CAPAIAN',
            y: <?php echo $content->capaian_penerimaan?>,
            sliced: true,
            selected: true
        }, {
            name: 'SISA',
            y: <?php echo 100-$content->capaian_penerimaan?>
        }]
    }]
});
</script>