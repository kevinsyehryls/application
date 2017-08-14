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
	})
	
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
				SaveList();
            },
            error: function(xhr){
               $('#id_MdlDefault').html("error");
            }
        });		
	})
	
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
		$(document).on('click', '#id_listbtn', function(){
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
		// update pimpinan telkomsel
		var id_pks = $('#id_pks').val();
		var id_SelCorpTlk = $('#id_SelCorpTlk').val();
		alert("update tb_pks set id_corporate = " + id_SelCorpTlk + " where id_pks = "  +  id_pks);
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