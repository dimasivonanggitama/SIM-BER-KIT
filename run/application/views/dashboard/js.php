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
      <?php if (count($popup)!=0){?>
          $('#modal-default').modal('show');
          <?php }?>
  }
  );


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
<script src="<?php echo base_url();?>assets/chart/code/modules/export-data.js"></script>


<script type="text/javascript">
Highcharts.setOptions({
    colors: ['#11fff3', '#ffef11', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#CB2326', '#6AF9C4'],
});
Highcharts.setOptions({
   colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7
      },
      stops: [
        [0, color],
        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
      ]
    };
  })
});

// Make monochrome colors
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
		        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());

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
            name: 'Capaian',
            <?php if($content->capaian_cukai_penerimaan >= 100){?>
				y: <?php echo 100?>
            <?php }?>
            <?php if($content->capaian_cukai_penerimaan < 100){?>
                y: <?php echo $content->capaian_cukai_penerimaan?>
            <?php }?>,
            sliced: true,
            selected: true
        }, {
            <?php if($content->capaian_cukai_penerimaan > 100){?>
                name: 'Lebih',
				y: <?php echo 100-$content->capaian_cukai_penerimaan?>
            <?php }?>
            <?php if($content->capaian_cukai_penerimaan <= 100){?>
                name: 'Kurang',
                y: <?php echo 100-$content->capaian_cukai_penerimaan?>
            <?php }?>
        }]
    }]
});
</script>
<script type="text/javascript">
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
            name: 'Capaian',
            <?php if($content->capaian_pabean_penerimaan >= 100){?>
                y: <?php echo 100?>
            <?php }?>
            <?php if($content->capaian_pabean_penerimaan < 100){?>
                y: <?php echo $content->capaian_pabean_penerimaan?>
            <?php }?>,
            sliced: true,
            selected: true
		 }, {
            <?php if($content->capaian_pabean_penerimaan > 100){?>
                name: 'Lebih',
                y: <?php echo 100-$content->capaian_pabean_penerimaan?>
            <?php }?>
            <?php if($content->capaian_pabean_penerimaan <= 100){?>
                name: 'Kurang',
                y: <?php echo 100-$content->capaian_pabean_penerimaan?>
            <?php }?>
        }]
    }]
});
</script>
<script type="text/javascript">
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
            name: 'Capaian',
            <?php if($content->capaian_penerimaan >= 100){?>
                y: <?php echo 100?>
            <?php }?>
            <?php if($content->capaian_penerimaan < 100){?>
                y: <?php echo $content->capaian_penerimaan?>
            <?php }?>,
            sliced: true,
            selected: true
        }, {
            <?php if($content->capaian_penerimaan > 100){?>
                name: 'Lebih',
                y: <?php echo 100-$content->capaian_penerimaan?>
            <?php }?>
            <?php if($content->capaian_penerimaan <= 100){?>
                name: 'Kurang',
                y: <?php echo 100-$content->capaian_penerimaan?>
            <?php }?>
        }]
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('databulancukai', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Perbandingan Penerimaan Cukai Per Bulan'
  },
  subtitle: {
    text: 'Source: Perbend BC Sidoarjo TA '+<?php echo date("Y");  ?>
  },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  yAxis: {
    title: {
      text: 'Penerimaan'
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: true
    }
  },
  credits:false,
  series: [{
    name: 'Cukai',
    data: [<?php 
    $query = $this->db->query("SELECT realisasi_pabean_penerimaan as ppabean, realisasi_cukai_penerimaan as pcukai FROM ap_penerimaan WHERE id_penerimaan IN( SELECT MAX(id_penerimaan) AS id_penerimaan FROM ap_penerimaan WHERE YEAR(date_penerimaan)=YEAR(CURDATE()) GROUP BY MONTH(date_penerimaan)) ORDER BY date_penerimaan ASC");
    $hasil=$query->result();
    if (isset($hasil)){
        foreach($hasil as $nilai){
            $datac[]=$nilai->pcukai;
            $datap[]=$nilai->ppabean;
       }
    }
        if($datac[0] != NULL){
        $tampungc[0]=$datac[0];
        }if($datac[1] != NULL){
        $tampungc[1]=$datac[1]-$datac[0];
        }if($datac[2] != NULL){
        $tampungc[2]=$datac[2]-$datac[1];
        }if($datac[3] != NULL){
        $tampungc[3]=$datac[3]-$datac[2];
        }if($datac[4] != NULL){
        $tampungc[4]=$datac[4]-$datac[3];
        }if($datac[5] != NULL){
        $tampungc[5]=$datac[5]-$datac[4];
        }if($datac[6] != NULL){
        $tampungc[6]=$datac[6]-$datac[5];
        }if($datac[7] != NULL){
        $tampungc[7]=$datac[7]-$datac[6];
        }if($datac[8] != NULL){
        $tampungc[8]=$datac[8]-$datac[7];
        }if($datac[9] != NULL){
        $tampungc[9]=$datac[9]-$datac[8];
        }if($datac[10] != NULL){
        $tampungc[10]=$datac[10]-$datac[9];
        }if($datac[11] != NULL){
        $tampungc[11]=$datac[11]-$datac[10];
        }
    echo join($tampungc, ',') ?>],
    color: '#FF0000',
    negativeColor: '#0088FF'
  }]
});
</script>

<script type="text/javascript">
Highcharts.chart('databulanpabean', {
  chart: {
    type: 'line'
  },
  title: {
    text: 'Perbandingan Penerimaan Pabean Per Bulan'
  },
  subtitle: {
    text: 'Source: Perbend BC Sidoarjo TA '+<?php echo date("Y");  ?>
  },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  yAxis: {
    title: {
      text: 'Penerimaan'
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: true
    }
  },
  credits:false,
  series: [{
    name: 'Pabean',
    data: [<?php 
    if($datap[0] != NULL){
        $tampungp[0]=$datap[0];
        }if($datap[1] != NULL){
        $tampungp[1]=$datap[1]-$datap[0];
        }if($datap[2] != NULL){
        $tampungp[2]=$datap[2]-$datap[1];
        }if($datap[3] != NULL){
        $tampungp[3]=$datap[3]-$datap[2];
        }if($datap[4] != NULL){
        $tampungp[4]=$datap[4]-$datap[3];
        }if($datap[5] != NULL){
        $tampungp[5]=$datap[5]-$datap[4];
        }if($datap[6] != NULL){
        $tampungp[6]=$datap[6]-$datap[5];
        }if($datap[7] != NULL){
        $tampungp[7]=$datap[7]-$datap[6];
        }if($datap[8] != NULL){
        $tampungp[8]=$datap[8]-$datap[7];
        }if($datap[9] != NULL){
        $tampungp[9]=$datap[9]-$datap[8];
        }if($datap[10] != NULL){
        $tampungp[10]=$datap[10]-$datap[9];
        }if($datap[11] != NULL){
        $tampungp[11]=$datap[11]-$datap[10];
        }
    echo join($tampungp, ',') ?>]
  }]
});
</script>

<script type="text/javascript">
Highcharts.chart('penerimaanPerTahun', {
colors: ['#ff5555','#24CBE5', '#a4ff55'],
chart: {
  type: 'column'
},

title: {
  text: 'Perbandingan Penerimaan TA '+<?php echo date("Y")-2;?>+', TA '+<?php echo date("Y")-1;?>+' dan TA '+<?php echo date("Y");?>
},
xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    crosshair: true
},
yAxis: {
    min: 0,
    title: {
        text: 'Penerimaan (Rp)'
    }
},
tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}&nbsp;:&nbsp; </td>' +
        '<td style="padding:0"><b>{point.y}&nbsp;(Rp)</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
},
plotOptions: {
    column: {
        pointPadding: 0.2,
        borderWidth: 0
    }
},
credits:false,
series: [{
    <?php
    $ptahunlaludua = $this->db->query("SELECT realisasi_penerimaan as penerimaan_laludua FROM ap_penerimaan WHERE id_penerimaan IN( SELECT MAX(id_penerimaan) AS id_penerimaan FROM ap_penerimaan WHERE YEAR(date_penerimaan)=(YEAR(CURDATE())-2) GROUP BY MONTH(date_penerimaan)) ORDER BY date_penerimaan ASC"); 
    $ptahunlalu = $this->db->query("SELECT realisasi_penerimaan as penerimaan_lalu FROM ap_penerimaan WHERE id_penerimaan IN( SELECT MAX(id_penerimaan) AS id_penerimaan FROM ap_penerimaan WHERE YEAR(date_penerimaan)=(YEAR(CURDATE())-1) GROUP BY MONTH(date_penerimaan)) ORDER BY date_penerimaan ASC");
    $ptahunnew = $this->db->query("SELECT realisasi_penerimaan as penerimaan_new FROM ap_penerimaan WHERE id_penerimaan IN( SELECT MAX(id_penerimaan) AS id_penerimaan FROM ap_penerimaan WHERE YEAR(date_penerimaan)=YEAR(CURDATE()) GROUP BY MONTH(date_penerimaan)) ORDER BY date_penerimaan ASC");
    $phasillaludua=$ptahunlaludua->result();
    $phasillalu=$ptahunlalu->result();
    $phasilnew=$ptahunnew->result();
    if (isset($phasillaludua)){
        foreach($phasillaludua as $pnilailaludua){
            $pdatalaludua[]=$pnilailaludua->penerimaan_laludua;
       }
    }
    if (isset($phasillalu)){
        foreach($phasillalu as $pnilailalu){
            $pdatalalu[]=$pnilailalu->penerimaan_lalu;
       }
    }
    if (isset($phasilnew)){
      foreach($phasilnew as $pnilainew){
          $pdatanew[]=$pnilainew->penerimaan_new;
     }
  }
      //penerimaan lalu dua    
      if($pdatalaludua[0] != NULL){
        $tampungldua[0]=$pdatalaludua[0];
        }if($pdatalaludua[1] != NULL){
        $tampungldua[1]=$pdatalaludua[1]-$pdatalaludua[0];
        }if($pdatalaludua[2] != NULL){
        $tampungldua[2]=$pdatalaludua[2]-$pdatalaludua[1];
        }if($pdatalaludua[3] != NULL){
        $tampungldua[3]=$pdatalaludua[3]-$pdatalaludua[2];
        }if($pdatalaludua[4] != NULL){
        $tampungldua[4]=$pdatalaludua[4]-$pdatalaludua[3];
        }if($pdatalaludua[5] != NULL){
        $tampungldua[5]=$pdatalaludua[5]-$pdatalaludua[4];
        }if($pdatalaludua[6] != NULL){
        $tampungldua[6]=$pdatalaludua[6]-$pdatalaludua[5];
        }if($pdatalaludua[7] != NULL){
        $tampungldua[7]=$pdatalaludua[7]-$pdatalaludua[6];
        }if($pdatalaludua[8] != NULL){
        $tampungldua[8]=$pdatalaludua[8]-$pdatalaludua[7];
        }if($pdatalaludua[9] != NULL){
        $tampungldua[9]=$pdatalaludua[9]-$pdatalaludua[8];
        }if($pdatalaludua[10] != NULL){
        $tampungldua[10]=$pdatalaludua[10]-$pdatalaludua[9];
        }if($pdatalaludua[11] != NULL){
        $tampungldua[11]=$pdatalaludua[11]-$pdatalaludua[10];
        }

      //penerimaan lalu
      if($pdatalalu[0] != NULL){
      $tampungl[0]=$pdatalalu[0];
      }if($pdatalalu[1] != NULL){
      $tampungl[1]=$pdatalalu[1]-$pdatalalu[0];
      }if($pdatalalu[2] != NULL){
      $tampungl[2]=$pdatalalu[2]-$pdatalalu[1];
      }if($pdatalalu[3] != NULL){
      $tampungl[3]=$pdatalalu[3]-$pdatalalu[2];
      }if($pdatalalu[4] != NULL){
      $tampungl[4]=$pdatalalu[4]-$pdatalalu[3];
      }if($pdatalalu[5] != NULL){
      $tampungl[5]=$pdatalalu[5]-$pdatalalu[4];
      }if($pdatalalu[6] != NULL){
      $tampungl[6]=$pdatalalu[6]-$pdatalalu[5];
      }if($pdatalalu[7] != NULL){
      $tampungl[7]=$pdatalalu[7]-$pdatalalu[6];
      }if($pdatalalu[8] != NULL){
      $tampungl[8]=$pdatalalu[8]-$pdatalalu[7];
      }if($pdatalalu[9] != NULL){
      $tampungl[9]=$pdatalalu[9]-$pdatalalu[8];
      }if($pdatalalu[10] != NULL){
      $tampungl[10]=$pdatalalu[10]-$pdatalalu[9];
      }if($pdatalalu[11] != NULL){
      $tampungl[11]=$pdatalalu[11]-$pdatalalu[10];
      }
      //penerimaan now
      if($pdatanew[0] != NULL){
          $tampungn[0]=$pdatanew[0];
          }if($pdatanew[1] != NULL){
          $tampungn[1]=$pdatanew[1]-$pdatanew[0];
          }if($pdatanew[2] != NULL){
          $tampungn[2]=$pdatanew[2]-$pdatanew[1];
          }if($pdatanew[3] != NULL){
          $tampungn[3]=$pdatanew[3]-$pdatanew[2];
          }if($pdatanew[4] != NULL){
          $tampungn[4]=$pdatanew[4]-$pdatanew[3];
          }if($pdatanew[5] != NULL){
          $tampungn[5]=$pdatanew[5]-$pdatanew[4];
          }if($pdatanew[6] != NULL){
          $tampungn[6]=$pdatanew[6]-$pdatanew[5];
          }if($pdatanew[7] != NULL){
          $tampungn[7]=$pdatanew[7]-$pdatanew[6];
          }if($pdatanew[8] != NULL){
          $tampungn[8]=$pdatanew[8]-$pdatanew[7];
          }if($pdatanew[9] != NULL){
          $tampungn[9]=$pdatanew[9]-$pdatanew[8];
          }if($pdatanew[10] != NULL){
          $tampungn[10]=$pdatanew[10]-$pdatanew[9];
          }if($pdatanew[11] != NULL){
          $tampungn[11]=$pdatanew[11]-$pdatanew[10];
      }    
    ?>
  name: <?php echo date("Y")-2;?>,
  data: [<?php echo join($tampungldua, ',') ?>]
}, {
  name: <?php echo date("Y")-1;?>,
  data: [<?php echo join($tampungl, ',') ?>],
}, {
  name: <?php echo date("Y");?>,
  data: [<?php echo join($tampungn, ',') ?>],
}]

});
</script>