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
          <h3 class="box-title">Tambah List Nomor</h3>
             <button type="button" id="id_BtnAddList" class="btn btn-primary btn-sm pull-right">Tambah List Nomor	</button>
        </div>
        <div class="box-body">
         <div id="id_DivList">
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
		GenDataList();
	});
	
	// ketika tombol tambah user di klik
	$(document).on('click', '#id_BtnAddList', function(){
		// tampilkan modal
		$('#modal-default').modal('show');
		// isi modal dengan form add user
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudlist/addlist",
            success: function(res) {
                $('#id_MdlDefault').html(res);
				 // form validation on ready state
                 $().ready(function(){
                     $('#id_FrmAddList').validate({
                         rules:{
                             id_list: "required",
                             id_listcorp: "required",
                             id_listmsisdn: "required",
                             id_listuser: "required",
                             id_listdiv: "required",
                             id_listshort: "required",
                             id_listdes:  "required",
                         },
                         messages: {
                             id_list: "isi id dengan benar",
                             id_listcorp: "isi nama dengan benar",
                             id_listmsisdn: "isi jabatan dengan benar",
                             id_listuser: "isi No HP dengan benar",
                             id_listdiv: "isi email dengan benar",
                             id_listshort: "isi Telphone kantor dengan benar",
                             id_listdes: "isi alamat dengan benar"
                        }
                     });
                 });
  				SaveList();
              },
              error: function(xhr){
                 $('#id_MdlDefault').html("error");
              }
          });		
	 });
	
	// function untuk populate data user dari table database
	function GenDataList(){
		jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudlist/showlist",
            success: function(res) {
                $('#id_DivList').html(res);
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
               $('#id_DivList').html("error");
            }
        });
	}
	
	// save user
	function SaveList(){
		$(document).on('click', '#id_listbtn', function(e){
			e.preventDefault();
            if($('#id_FrmAddList').valid()){
             // jika validasi berhasil
			jQuery.ajax({
	            type: "POST",
	            url: "<?php echo base_url(); ?>" + "index.php/ccrudlist/savelist",
				data: {
					id_list: $('#id_list').val(),
					id_listcorp: $('#id_listcorp').val(),
					id_listmsisdn: $('#id_listmsisdn').val(),
					id_listuser: $('#id_listuser').val(),
					id_listdiv: $('#id_listdiv').val(),
					id_listshort: $('#id_listshort').val(),
					id_listdes: $('#id_listdes').val()		
				},
	            success: function(res) {
					$('#modal-default').modal('hide');
					alert("Data saved!" + res);
					GenDataList();
				},
	            error: function(xhr){
	               $('#id_DivList').html("error");
	             }
            });
            } else {
            // dan jika gagal
                 return false;
              }
  		})
  	}
	
	//Saat Tombol Edit di Klik
	function EditList(id_list_msisdn){
		$('#modal-default').modal('show');
		jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudlist/showeditlist",
				data: {
					id_list: id_list_msisdn
				},
				success: function(res) {
					$('#id_MdlDefault').html(res);
				},
				error: function(xhr){
				   $('#id_DivList').html("error");
				}
			});
	}
	
	// show combobox select Corporate
	function ShowCbxCorpTlk(){
		$('#id_SelCorpTlk').css('display','block');
		$('#id_BtnSvSelCorpTlk').css('display','block');
		$('#id_BtnCxSelCorpTlk').css('display','block');
	}
	
	// save combobox select Corporate
	function id_BtnSvSelCorpTlk(){
    	var id_list = $('#id_list').val();
		var id_SelCorpTlk = $('#id_SelCorpTlk').val();
		var id_SelCorpTlkTxt = $('#id_SelCorpTlk option:selected').text();
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/ccrudlist/updinline_cortsel",
			data: {
				id_list : id_list,
				id_SelCorpTlk : id_SelCorpTlk,
				id_SelCorpTlkTxt : id_SelCorpTlkTxt
			},
			success: function(res) {
				$('#id_aCorTsel').text(res);
				id_BtnCxSelCorpTlk();
				GenDataList();
			},
			error: function(xhr){
				$('#id_DivList').html("error");
			}
    });
}
	
	// cancel combobox select Corporate
	function id_BtnCxSelCorpTlk(){
		$('#id_SelCorpTlk').css('display','none');
		$('#id_BtnSvSelCorpTlk').css('display','none');
		$('#id_BtnCxSelCorpTlk').css('display','none');
	}
	
	//Saat tombol save change di klik
	function UpdList(){
		jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "index.php/ccrudlist/editlist",
			data: {
				id_list: $('#id_list').val(),
				id_listmsisdn: $('#id_listmsisdn').val(),
				id_listuser: $('#id_listuser').val(),
				id_listdiv: $('#id_listdiv').val(),
				id_listshort: $('#id_listshort').val(),
				id_listdes: $('#id_listdes').val()
			},
			success: function(res) {
				$('#modal-default').modal('hide');
				alert("Data Updated!");
				GenDataList();
			},
			error: function(xhr){
			   $('#id_DivList').html("error");
			}
		});
	}
	
	function DelList(id_list_msisdn){
		var delconf = confirm("Hapus data?");
		if(delconf){
			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/ccrudlist/dellist",
				data: {
					id_list: id_list_msisdn
				},
				success: function(res) {
					$('#modal-default').modal('hide');
					alert("Data Terhapus!");
					GenDataList();
				},
				error: function(xhr){
				   $('#id_DivList').html("error");
				}
			});
		}		
	}
	
</script>