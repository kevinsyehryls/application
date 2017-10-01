<div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <?php echo $apptitle?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <section class="content">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-body">
              <div id="container"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
</div>

<script>
  // DOM ready
  $(document).ready(function(){
    LoadChartPks();
  });

  // load chart
  var LoadChartPks = function(){
      jQuery.ajax({
        type: "POST",
        dataType : "json",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/ShowGrafikPKS",
        beforeSend: function () {
            console.log("is loading chart");
        },
        success: function(res) {
            console.log("chart is loaded");

            // deklarasi variable array
            var bulans = [];
            var jml    = [];

            // push data ke variable array
            for(var i in res){
                bulans.push(res[i].bulans);
                jml.push(parseInt(res[i].jml));
            }   

            // draw chart
            Highcharts.chart('container', {
              chart: {
                  type: 'column'
              },
              title: {
                  text: 'Grafik Jumlah PKS'
              },
              xAxis: {
                  categories: bulans,
                  crosshair: true
              },
              yAxis: {
                  allowDecimals: false,
                  min: 0,
                  title: {
                      text: 'Jumlah PKS'
                  }
              },
              series: [{
                  name: 'PKS',
                  data: jml,
                  stack: 'a'
              }]
            });

        },
        error: function (xhr) {
            console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
        }
    });
  }  


</script>