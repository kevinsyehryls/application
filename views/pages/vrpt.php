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

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Contoh box title</h3>
          <button type="button" id="id_export" class="btn btn-primary btn-sm pull-right" href="<?php echo base_url(); ?>/controllers/ccrud_excel.php">Eksport</button>
        </div>
        <div class="box-body">
        sss
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript">
  var chart = Highcharts.chart('container', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Total fruit consumtion, grouped by gender'
    },

    xAxis: {
          categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'Number of fruits'
        }
    },
    series: [{
        name: 'PKS',
        data: [5, 3, 4, 7, 2, 1, 2, 4, 6, 7, 5, 3],
        stack: 'a'
    }]
});
</script>