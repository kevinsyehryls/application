<div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <?php echo $apptitle?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> MENU </a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <section class="content">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" id="id_usrnik" name="id_usrnik" placeholder="Ketik NIK" value="" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="id_usremail" name="id_usremail" placeholder="Enter email" value="" required>
                    <label for="id_usremail" class="error"></label>
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" class="form-control" id="id_usrpass" name="id_usrpass" placeholder="Password" value="" required>
                    <label for="id_usremail" class="error"></label>
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="id_usrnama" name="id_usrnama" placeholder="Ketik Nama" value="" required>
                    <label for="id_usremail" class="error"></label>
                </div>
              </div>          
            </div>
            <div class="modal-footer">
                <button id="id_usrbtn1" type="button" class="btn btn-primary" onclick="UpdUser()">Save changes</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>