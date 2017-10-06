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
          <h3 class="box-title">Data Corporate</h3>
          <button type="button" id="id_BtnAddCorp" class="btn btn-primary btn-sm pull-right">Tambah Corporte	</button>
        </div>
        <div class="box-body">
          <div id="id_DivCorp">
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
		GenDataCorp();
	});
	
	// ketika tombol tambah user di klik
	$(document).on('click', '#id_BtnAddCorp', function(){
		// tampilkan modal
		$('#modal-default').modal('show');
		// isi modal dengan form add user
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudcorp/addcorp",
            success: function(res) {
                $('#id_MdlDefault').html(res);
				 // form validation on ready state
                 $().ready(function(){
                     $('#id_FrmAddCorp').validate({
                         rules:{
                             id_corp: "required",
                             id_corpnama: "required",
                             id_corpalmt: "required",
                             id_corpnamapn: "required",
                             id_corpjbtpn: "required",
                             id_corpnamapi: "required",
                             id_corpjbtpi: "required",
                             id_corpnohp: "required",
                             id_corpemail: {
                                 required: true,
                                 email: true
                             },
                             id_corpnotlpn: "required"
						 },                             	
                         messages: {
                             id_corp: "isi id dengan benar",
                             id_corpnama: "isi nama Corporate dengan benar",
                             id_corpalmt: "isi Alamat dengan benar",
                             id_corpnamapn: "isi Nama Pimpinan dengan benar",
                             id_corpjbtpn: "isi Jabatan Pimpinan dengan benar",
                             id_corpnamapi: "isi Nama PIC dengan benar",
                             id_corpjbtpi: "isi Jabatan Pimpinan dengan benar",
                             id_corpnohp: "isi No HP PIC dengan benar",
                             id_corpemail: "isi email PIC dengan benar",
                             id_corpnotlpn: "isi Telphone kantor dengan benar"
                       	}
                     });
                 });
  				SaveCorp();
              },
              error: function(xhr){
                 $('#id_MdlDefault').html("error");
              }
          });		
	 });

	// function untuk populate data user dari table database
	function GenDataCorp(){
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudcorp/showcorp",
            success: function(res) {
                $('#id_DivCorp').html(res);
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
               $('#id_DivCorp').html("error");
            }
        });
	}
	
	// save user
	function SaveCorp(){
		$(document).on('click', '#id_corpbtn', function(e){
			e.preventDefault();
            if($('#id_FrmAddCorp').valid()){
	             // jika validasi berhasil
				jQuery.ajax({
		            type: "POST",
		            url: "<?php echo base_url(); ?>" + "index.php/ccrudcorp/savecorp",
					data: {
						id_corp: $('#id_corp').val(),
						id_corpnama: $('#id_corpnama').val(),
						id_corpalmt: $('#id_corpalmt').val(),
						id_corpnamapn: $('#id_corpnamapn').val(),
						id_corpjbtpn: $('#id_corpjbtpn').val(),
						id_corpnamapi: $('#id_corpnamapi').val(),
						id_corpjbtpi: $('#id_corpjbtpi').val(),
						id_corpnohp: $('#id_corpnohp').val(),
						id_corpemail: $('#id_corpemail').val(),
						id_corpnotlpn: $('#id_corpnotlpn').val()				
					},
		            success: function(res) {
						$('#modal-default').modal('hide');
						alert("Data saved!");
						GenDataCorp();
					},
		            error: function(xhr){
		               $('#id_DivCorp').html("error");
		                     }
	                 });
	             } else {
	            // dan jika gagal
	                 return false;
	              }
  		})
  	}
	//Saat Tombol Edit di Klik
	function EditCorp(id_corporate){
		$('#modal-default').modal('show');
		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudcorp/showeditcorp",
				data: {
					id_corp: id_corporate
				},
				success: function(res) {
					$('#id_MdlDefault').html(res);
				 // form validation on ready state
                 $().ready(function(){
                     $('#id_FrmUpdCorp').validate({
                         rules:{
                             id_corpnama: "required",
                             id_corpalmt: "required",
                             id_corpnamapn: "required",
                             id_corpjbtpn: "required",
                             id_corpnamapi: "required",
                             id_corpjbtpi: "required",
                             id_corpnohp: "required",
                             id_corpemail: {
                                 required: true,
                                 email: true
                             },
                             id_corpnotlpn: "required"
						 },                             	
                         messages: {
                             id_corpnama: "isi nama Corporate dengan benar",
                             id_corpalmt: "isi Alamat dengan benar",
                             id_corpnamapn: "isi Nama Pimpinan dengan benar",
                             id_corpjbtpn: "isi Jabatan Pimpinan dengan benar",
                             id_corpnamapi: "isi Nama PIC dengan benar",
                             id_corpjbtpi: "isi Jabatan Pimpinan dengan benar",
                             id_corpnohp: "isi No HP PIC dengan benar",
                             id_corpemail: "isi email PIC dengan benar",
                             id_corpnotlpn: "isi Telphone kantor dengan benar"
                       	}
                     });
                 });
  				UpdCorp();
              },
              error: function(xhr){
                 $('#id_MdlDefault').html("error");
               }
          });   
   }
	
	//Saat tombol save change di klik
	function UpdCorp(){
		$(document).off('click', '#id_corpbtn1');
  		$(document).on('click', '#id_corpbtn1', function(e){
   	 	e.preventDefault();
      	if($('#id_FrmUpdCorp').valid()){
       		// jika validasi berhasil
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/ccrudcorp/editcorp",
			data: {
				id_corp: $('#id_corp').val(),
				id_corpnama: $('#id_corpnama').val(),
				id_corpalmt: $('#id_corpalmt').val(),
				id_corpnamapn: $('#id_corpnamapn').val(),
				id_corpjbtpn: $('#id_corpjbtpn').val(),
				id_corpnamapi: $('#id_corpnamapi').val(),
				id_corpjbtpi: $('#id_corpjbtpi').val(),
				id_corpnohp: $('#id_corpnohp').val(),
				id_corpemail: $('#id_corpemail').val(),
				id_corpnotlpn: $('#id_corpnotlpn').val()
			},
			success: function(res) {
				$('#modal-default').modal('hide');
				alert("Data Updated!");
				GenDataCorp();
			},
			error: function(xhr){
			   $('#id_DivCorp').html("error");
			}
			});
	      } else {
	      // dan jika gagal
	      return false;
	    }
	  })
	}
	
	function DelCorp(id_corporate){
		var delconf = confirm("Hapus data?");
		if(delconf){
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudcorp/delcorp",
				data: {
					id_corp: id_corporate
				},
				success: function(res) {
					$('#modal-default').modal('hide');
					alert("Data Terhapus!");
					GenDataCorp();
				},
				error: function(xhr){
				   $('#id_DivCorp').html("error");
				}
			});
		}		
	}
	
</script>