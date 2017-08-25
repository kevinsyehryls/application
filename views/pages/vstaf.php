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
          <h3 class="box-title">Kelola Staff Telkomsel</h3>
              <button type="button" id="id_BtnAddStaf" class="btn btn-primary btn-sm pull-right">Tambah Staff	</button>
        </div>
        <div class="box-body">
         <div id="id_DivStaf">
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
		GenDataStaf();
	});
	
	// ketika tombol tambah user di klik
	$(document).on('click', '#id_BtnAddStaf', function(){
		// tampilkan modal
		$('#modal-default').modal('show');
		// isi modal dengan form add user
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudstaf/addstaf",
            success: function(res) {
                $('#id_MdlDefault').html(res);
				        // form validation on ready state
                 $().ready(function(){
                     $('#id_FrmAddStaf').validate({
                         rules:{
                             id_stafnik: {
                                 required: true,
                                 maxlength: 5,
                                 minlength: 5
                             },
                             id_stafnama: "required",
                             id_stafjbt: "required",
                             id_stafhp: "required",
                             id_stafemail: {
                                 required: true,
                                 email: true
                             },
                             id_stafnotlp: "required",
                             id_stafalmt: "required"
                         },
                         messages: {
                             id_stafnik: "isi id dengan benar",
                             id_stafnama: "isi nama dengan benar",
                             id_stafjbt: "isi jabatan dengan benar",
                             id_stafhp: "isi No HP dengan benar",
                             id_stafemail: "isi email dengan benar",
                             id_stafnotlp: "isi Telphone kantor dengan benar",
                             id_stafalmt: "isi alamat dengan benar"
                        }
                     });
                 });
  				SaveStaf();
              },
              error: function(xhr){
                 $('#id_MdlDefault').html("error");
              }
          });		
	 });
	
	// function untuk populate data user dari table database
	function GenDataStaf(){
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudstaf/showstaf",
            success: function(res) {
                $('#id_DivStaf').html(res);
				$(function() {
					$('#example1').DataTable({
            'retrieve'    : true,
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
               $('#id_DivStaf').html("error");
            }
        });
	}
	
	// save user
	function SaveStaf(){
		$(document).on('click', '#id_stafbtn', function(e){
			e.preventDefault();
            if($('#id_FrmAddStaf').valid()){
             // jika validasi berhasil
                 jQuery.ajax({
                     type: "POST",
                     url: "<?php echo base_url(); ?>" + "index.php/ccrudstaf/savestaf",
                     data: {
                         id_stafnik: $('#id_stafnik').val(),
                         id_stafnama: $('#id_stafnama').val(),
                         id_stafjbt: $('#id_stafjbt').val(),
                       	 id_stafhp: $('#id_stafhp').val(),
                         id_stafemail: $('#id_stafemail').val(),
                       	 id_stafnotlp: $('#id_stafnotlp').val(),
                         id_stafalmt: $('#id_stafalmt').val()
                     },
                     success: function(res) {
                        $('#modal-default').modal('hide');
                        alert("Data saved!");
                         GenDataStaf();
                     },
                    error: function(xhr){
                         $('#id_DivStaf').html("error");
                     }
                 });
             } else {
            // dan jika gagal
                 return false;
              }
  		})
  	}

	//Saat Tombol Edit di Klik
	function EditStaf(id_pic_telkomsel){
		$('#modal-default').modal('show');
		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudstaf/showeditstaf",
				data: {
					id_stafnik: id_pic_telkomsel
				},
				success: function(res) {
					$('#id_MdlDefault').html(res);
          // form validation on ready state
                 $().ready(function(){
                     $('#id_FrmUpdStaf').validate({
                         rules:{
                             id_stafnama: "required",
                             id_stafjbt: "required",
                             id_stafhp: "required",
                             id_stafemail: {
                                 required: true,
                                 email: true
                             },
                             id_stafnotlp: "required",
                             id_stafalmt: "required"
                         },
                         messages: {
                             id_stafnik: "isi id dengan benar",
                             id_stafnama: "isi nama dengan benar",
                             id_stafjbt: "isi jabatan dengan benar",
                             id_stafhp: "isi No HP dengan benar",
                             id_stafemail: "isi email dengan benar",
                             id_stafnotlp: "isi Telphone kantor dengan benar",
                             id_stafalmt: "isi alamat dengan benar"
                        }
                     });
                 });
          UpdStaf();
              },
              error: function(xhr){
                 $('#id_MdlDefault').html("error");
              }
          });   
   }
	
	//Saat tombol save change di klik
	function UpdStaf(){
    $(document).off('click', '#id_stafbtn1');
      $(document).on('click', '#id_stafbtn1', function(e){
      e.preventDefault();
        if($('#id_FrmUpdStaf').valid()){
          // jika validasi berhasil
      		jQuery.ajax({
      			type: "POST",
      			url: "<?php echo base_url(); ?>" + "index.php/ccrudstaf/editstaf",
      			data: {
      				id_stafnik: $('#id_stafnik').val(),
      				id_stafnama: $('#id_stafnama').val(),
      				id_stafjbt: $('#id_stafjbt').val(),
      				id_stafhp: $('#id_stafhp').val(),
      				id_stafemail: $('#id_stafemail').val(),
      				id_stafnotlp: $('#id_stafnotlp').val(),
      				id_stafalmt: $('#id_stafalmt').val()
      			},
      			success: function(res) {
      				$('#modal-default').modal('hide');
      				alert("Data Updated!");
      				GenDataStaf();
      			},
      			error: function(xhr){
      			   $('#id_DivStaf').html("error");
      			}
      });
        } else {
        // dan jika gagal
        return false;
      }
    })
  }
	
	function DelStaf(id_pic_telkomsel){
		var delconf = confirm("Hapus data?");
		if(delconf){
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudstaf/delstaf",
				data: {
					id_stafnik: id_pic_telkomsel
				},
				success: function(res) {
					$('#modal-default').modal('hide');
					alert("Data Terhapus!");
					GenDataStaf();
				},
				error: function(xhr){
				   $('#id_DivStaf').html("error");
				}
			});
		}		
	}
	
</script>