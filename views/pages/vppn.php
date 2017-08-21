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
          <h3 class="box-title">Kelola Pimpinan Telkomsel</h3>
             <button type="button" id="id_BtnAddPpn" class="btn btn-primary btn-sm pull-right">Tambah Pimpinan	</button>
        </div>
        <div class="box-body">
         <div id="id_DivPpn">
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
		GenDataPpn();
	});
	
	// ketika tombol tambah user di klik
	$(document).on('click', '#id_BtnAddPpn', function(){
		// tampilkan modal
		$('#modal-default').modal('show');
		// isi modal dengan form add ppn
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudppn/addppn",
            success: function(res) {
                $('#id_MdlDefault').html(res); 
                // form validation on ready state
                 $().ready(function(){
                     $('#id_FrmAddPpn').validate({
                         rules:{
                             id_ppnnik: {
                                required: true,
                                maxlength: 5
                             },
                             id_ppnnama: "required",
                             id_ppnjbt: "required",
                         },
                         messages: {
                             id_ppnnik: "isi NIK dengan benar",
                             id_ppnnama: "isi nama dengan benar",
                             id_ppnjbt: "isi Jabatan dengan benar"
                        }
                     });
                 });
  				SavePpn();
              },
              error: function(xhr){
                 $('#id_MdlDefault').html("error");
              }
          });		
	 });

	
	// function untuk populate data user dari table database
	function GenDataPpn(){
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudppn/showppn",
            success: function(res) {
                $('#id_DivPpn').html(res);
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
               $('#id_DivPpn').html("error");
            }
        });
	}
	
	// save user
	function SavePpn(){
		$(document).on('click', '#id_ppnbtn', function(e){
			e.preventDefault();
            	if($('#id_FrmAddPpn').valid()){
             		// jika validasi berhasil
                 jQuery.ajax({
                     type: "POST",
                     url: "<?php echo base_url(); ?>" + "index.php/ccrudppn/saveppn",
                     data: {
                         id_ppnnik: $('#id_ppnnik').val(),
                         id_ppnnama: $('#id_ppnnama').val(),
                         id_ppnjbt: $('#id_ppnjbt').val()
                     },
                     success: function(res) {
                        $('#modal-default').modal('hide');
                        alert("Data saved!");
                         GenDataPpn();
                     },
                    error: function(xhr){
                         $('#id_DivPpn').html("error");
                     }
                 });
             	} else {
            	// dan jika gagal
                 return false;
              	}
  		})
  	}
	
	//Saat Tombol Edit di Klik
	function EditPpn(id_pimpinan_telkomsel){
		$('#modal-default').modal('show');
		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudppn/showeditppn",
				data: {
					id_ppnnik: id_pimpinan_telkomsel
				},
				success: function(res) {
					$('#id_MdlDefault').html(res);
				},
				error: function(xhr){
				   $('#id_DivPpn').html("error");
				}
			});
	}
	
	//Saat tombol save change di klik
	function UpdPpn(){
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/ccrudppn/editppn",
			data: {
				id_ppnnik: $('#id_ppnnik').val(),
				id_ppnnama: $('#id_ppnnama').val(),
				id_ppnjbt: $('#id_ppnjbt').val()
			},
			success: function(res) {
				$('#modal-default').modal('hide');
				alert("Data Updated!");
				GenDataPpn();
			},
			error: function(xhr){
			   $('#id_DivPpn').html("error");
			}
		});
	}
	
	function DelPpn(id_pimpinan_telkomsel){
		var delconf = confirm("Hapus data?");
		if(delconf){
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudppn/delppn",
				data: {
					id_ppnnik: id_pimpinan_telkomsel
				},
				success: function(res) {
					$('#modal-default').modal('hide');
					alert("Data Terhapus!");
					GenDataPpn();
				},
				error: function(xhr){
				   $('#id_DivPpn').html("error");
				}
			});
		}		
	}
	
</script>