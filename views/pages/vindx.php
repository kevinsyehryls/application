<div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <?php echo $apptitle?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>150</h3>
              <p><strong>TTD TERTUNDA</strong></p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="<?php echo base_url(); ?>index.php/cpage/halpks_ttd" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
               <p><strong>PKS AKAN BERAKHIR</strong></p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
             <a href="<?php echo base_url(); ?>index.php/cpage/halpks_end" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
	<script>
        $(function () {
            $('#example1').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        })
    </script>