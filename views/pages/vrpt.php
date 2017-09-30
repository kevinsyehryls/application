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
          <!-- <button type="button" id="id_export" class="btn btn-primary btn-sm pull-right" href="<?php echo base_url(); ?>/controllers/ccrud_excel.php">Eksport</button> -->
        </div>
        <div class="box-body">
          <div id="id_impFile">
              <form name="frm_uploadCsv" id="id_uploadCsv">
                  <div style="display: flex; margin-top: 5px;">
                      <input name="csv" type="file" id="csv" class="btn btn-default btn-xs" accept=".csv"/>&nbsp;&nbsp;
                      <button class="btn btn-default btn-xs" id="id_btnImps" onclick="uploadCsv(event)"><i class="fa fa-check"></i>&nbsp; Upload</button>
                  </div>
              </form>
              <div id="progress"></div>
              <div id="id_staMes"><!-- ajax result load here --></div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
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

  

  function uploadCsv(event){
      event.preventDefault();
      var quest = confirm("lanjut import?");
      if(quest){
          $('#id_staMes').css('display','').html("");
          var formData = new FormData($('#id_uploadCsv')[0]);
          jQuery.ajax({
              type: "POST",
              url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/proc_imp",
              data: formData,
              mimeType: "multipart/form-data",
              contentType: false,
              cache: false,
              processData: false,
              beforeSend: function(){
              },
              success: function(res) {
                  document.getElementById('id_uploadCsv').reset();
                  LoadChartPks();
              },              
              xhr: function(){
                  var xhr = new window.XMLHttpRequest();
                  xhr.addEventListener("progress", function (e) {
                      var progressval = e.currentTarget.response;
                      $("#progress").html(progressval);
                  });
                  return xhr;
              },
              error: function(xhr){
                  console.log(xhr.status);
              }
          });
      } else {
          return false;
      }
  }
</script>