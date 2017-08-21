<div class="content-wrapper" style="min-height: 1126px;">    
    
    <div class="modal fade" id="modal-default" style="display: none;">
      <div class="modal-dialog">
        <div id="id_MdlDefault" class="modal-content">
          <!-- isi modal dinamis disini -->
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <?php echo $apptitle?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> MENU KELOLA</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Kelola User</h3>
              <button type="button" id="id_BtnAddUsr" class="btn btn-primary btn-sm pull-right">Tambah User </button>
        </div>
        <div class="box-body">
          <div id="id_DivUsr">
              <!-- data user akan tampil disini -->
            </div>  
        </div>
        <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>

<script>
  // ketika DOM ready
  $(document).ready(function(){
    GenDataUsr();
  });
  
  // ketika tombol tambah user di klik
  $(document).on('click', '#id_BtnAddUsr', function(){
    // tampilkan modal
    $('#modal-default').modal('show');
    // isi modal dengan form add user
    jQuery.ajax({
             type: "POST",
              url: "<?php echo base_url(); ?>" + "index.php/ccrudusr/addusr",
              success: function(res) {
                  $('#id_MdlDefault').html(res);
                 // form validation on ready state
                 $().ready(function(){
                     $('#id_FrmAddUsr').validate({
                         rules:{
                             id_usrnik: {
                                 required: true,
                                 maxlength: 6,
                                 minlength: 5
                             },
                             id_usremail: {
                                 required: true,
                                 email: true
                             },
                             id_usrpass: {
                                 required: true,
                                 maxlength: 9,
                                 minlength: 4
                             },
                             id_usrnama: "required",
                             id_usrlevel: "required"
                         },
                         messages: {
                             id_usrnik: "isi id dengan benar",
                             id_usremail: "isi email dengan benar",
                             id_usrpass: "isi password dengan benar",
                             id_usrnama: "isi nama dengan benar",
                             id_usrlevel: "isi level dengan benar"
                        }
                     });
                 });
          SaveUsr();
              },
              error: function(xhr){
                 $('#id_MdlDefault').html("error");
              }
          });   
   });

  // function untuk populate data user dari table database
  function GenDataUsr(){
    jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudusr/showusr",
            success: function(res) {
                $('#id_DivUsr').html(res);
        $(function() {
          $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          })
        })
            },
            error: function(xhr){
               $('#id_DivUsr').html("error");
            }
        });
  }
  
  // save user
  function SaveUsr(){
    $(document).on('click', '#id_usrbtn', function(e){
        e.preventDefault();
            if($('#id_FrmAddUsr').valid()){
             // jika validasi berhasil
                 jQuery.ajax({
                     type: "POST",
                     url: "<?php echo base_url(); ?>" + "index.php/ccrudusr/saveusr",
                     data: {
                         id_usrnik: $('#id_usrnik').val(),
                         id_usremail: $('#id_usremail').val(),
                         id_usrpass: $('#id_usrpass').val(),
                         id_usrnama: $('#id_usrnama').val(),
                         id_usrlevel: $('#id_usrlevel').val()
                     },
                     success: function(res) {
                        $('#modal-default').modal('hide');
                        alert("Data saved!");
                         GenDataUsr();
                     },
                    error: function(xhr){
                         $('#id_DivUsr').html("error");
                     }
                 });
             } else {
            // dan jika gagal
                 return false;
              }
      })
    }
  
  //Saat Tombol Edit di Klik
  function EditUsr(id_user){
    $('#modal-default').modal('show');
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudusr/showeditusr",
        data: {
          id_usrnik: id_user
        },
        success: function(res) {
          $('#id_MdlDefault').html(res);
        },
        error: function(xhr){
           $('#id_DivUsr').html("error");
        }
      });
  }
  
  //Saat tombol save change di klik
  function UpdUser(){
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>" + "index.php/ccrudusr/editusr",
      data: {
        id_usrnik: $('#id_usrnik').val(),
        id_usremail: $('#id_usremail').val(),
        id_usrpass: $('#id_usrpass').val(),
        id_usrnama: $('#id_usrnama').val(),
        id_usrlevel: $('#id_usrlevel').val()
      },
      success: function(res) {
        $('#modal-default').modal('hide');
        alert("Data Updated!");
        GenDataUsr();
      },
      error: function(xhr){
         $('#id_DivUsr').html("error");
      }
    });
  }
  
  function DelUsr(id_user){
    var delconf = confirm("Hapus data?");
    if(delconf){
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudusr/delusr",
        data: {
          id_usrnik: id_user
        },
        success: function(res) {
          $('#modal-default').modal('hide');
          alert("Data Terhapus!");
          GenDataUsr();
        },
        error: function(xhr){
           $('#id_DivUsr').html("error");
        }
      });
    }   
  }
  
</script>