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

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">PKS PENDING PROSES</h3>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="3%">No</th>
                  <th width="12%">NIK</th>
                  <th width="25%">Email</th>
                  <th width="25%">Nama</th>
                  <th width="10%">Area</th>
                  <th width="10%">Level</th>
                  <th width="15%">Opsi</th>
                </tr>
                </thead>
               <tbody>
               <tr>
                  <td>1</td>
                  <td>1300001</td>
                  <td>kevinsyehryls@gmail.com</td>
                  <td>kevin</td>
                  <td>AREA III</td>
                  <td>Administrasi</td>
                  <td>
                  	<button type="button" class="btn btn-primary btn-xs">Tambah</button>
                    <button type="button" class="btn btn-primary btn-xs">Edit</button>
                  </td>
                </tr>
                
              </table>	
        </div>
        <!-- /.box-body -->
          </div>
      <!-- /.box -->

<!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">PKS AKAN BERAKHIR </h3>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="3%">No</th>
                  <th width="12%">NIK</th>
                  <th width="25%">Email</th>
                  <th width="25%">Nama</th>
                  <th width="10%">Area</th>
                  <th width="10%">Level</th>
                  <th width="15%">Opsi</th>
                </tr>
                </thead>
               <tbody>
               <tr>
                  <td>1</td>
                  <td>1300001</td>
                  <td>kevinsyehryls@gmail.com</td>
                  <td>kevin</td>
                  <td>AREA III</td>
                  <td>Administrasi</td>
                  <td>
                  	<button type="button" class="btn btn-primary btn-xs">Tambah</button>
                    <button type="button" class="btn btn-primary btn-xs">Edit</button>
                  </td>
                </tr>
                
              </table>	
        </div>
        <!-- /.box-body -->
          </div>
      <!-- /.box -->


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