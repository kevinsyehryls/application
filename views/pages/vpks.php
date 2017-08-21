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
        <li><a href="#"><i class="fa fa-edit"></i> Create PKS</a></li>
        <li class="active"><?php echo $title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data PKS</h3>
             <button type="button" id="id_BtnAddPks" class="btn btn-primary btn-sm pull-right">Tambah PKS	</button>
        </div>
        <div class="box-body">
          <div class="box-body">
          <div id="id_DivPks">
            	<!-- data user akan tampil disini -->
         </div>
        </div>
        <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

<!-- daterange picker -->
<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- date-range-picker -->
<script src="<?=base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<script>
// ketika DOM ready
$(document).ready(function(){
    GenDataPks();
});

// ketika tombol tambah pks di klik
$(document).on('click', '#id_BtnAddPks', function(){
    // tampilkan modal
    $('#modal-default').modal('show');
    // isi modal dengan form add user
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/addpks",
        success: function(res) {
            $('#id_MdlDefault').html(res);
            //Date picker
            $('#id_pksst, #id_pksen').datepicker({
                autoclose: true
            });
            // form validation on ready state
                 $().ready(function(){
                     $('#id_FrmAddPks').validate({
                         rules:{
                             id_pks: "required",
                             id_pksno: "required",
                             id_pksppn: "required",
                             id_pkspic: "required",
                             id_pkscorp: "required",
                             id_pkspkt: "required",
                             id_pksst: "required",
                             id_pksen: "required"
                         },
                         messages: {
                             id_pks: "isi id PKS dengan benar",
                             id_pksno: "isi No PKS dengan benar",
                             id_pksppn: "isi Pimpinan Telkomsel dengan benar",
                             id_pkspic: "isi PIC Telkomsel dengan benar",
                             id_pkscorp: "isi Corporate dengan benar",
                             id_pkspkt: "isi Paket dengan benar",
                             id_pksst: "isi Start Date dengan benar",
                             id_pksen: "isi End Date dengan benar"
                        }
                     });
                 });
                SavePks();
              },
              error: function(xhr){
                 $('#id_MdlDefault').html("error");
              }
          });       
     });

// function untuk populate data user dari table database
function GenDataPks(){
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/showpks",
        success: function(res) {
            $('#id_DivPks').html(res);
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
           $('#id_DivPks').html("error");
        }
    });
}

// save user
function SavePks(){
    $(document).on('click', '#id_pkspbtn', function(e){
        e.preventDefault();
        if($('#id_FrmAddPks').valid()){
        /* get checkboxes value */
        var CbxSignCor1 = $('#id_CbxSignCor1:checked').val();
        var CbxSignCor2 = $('#id_CbxSignCor2:checked').val();
        var CbxSignTel1 = $('#id_CbxSignTel1:checked').val();
        var CbxSignTel2 = $('#id_CbxSignTel2:checked').val();
        // jika validasi berhasil
        jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/savepks",
        data: {
            id_pks: $('#id_pks').val(),
            id_pksno: $('#id_pksno').val(),
            id_pksppn: $('#id_pksppn').val(),
            id_pkspic: $('#id_pkspic').val(),
            id_pkscorp: $('#id_pkscorp').val(),
            id_pkspkt: $('#id_pkspkt').val(),
            id_pksst: $('#id_pksst').val(),
            id_pksen: $('#id_pksen').val(),
            CbxSignCor1 : CbxSignCor1,
            CbxSignCor2 : CbxSignCor2,
            CbxSignTel1 : CbxSignTel1,
            CbxSignTel2 : CbxSignTel2
        },
        success: function(res) {
            $('#modal-default').modal('hide');
            alert("Data saved!");
            GenDataPks();
        },
        error: function(xhr){
           $('#id_DivPks').html("error");
    }
        });
            } else {
            // dan jika gagal
            return false;
        }
    })
}

//Saat Tombol Edit di Klik
function EditPks(id_pks){
    $('#modal-default').modal('show');
    jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/showeditpks",
            data: {
                id_pks: id_pks
            },
            success: function(res) {
                $('#id_MdlDefault').html(res);
                //Date picker
                $('#id_pksst, #id_pksen').datepicker({
                    autoclose: true
                });
            },
            error: function(xhr){
               $('#id_DivPks').html("error");
            }
    });
}



// show combobox select pimpinan Telkomsel
function ShowCbxPimpTlk(){
    $('#id_SelPimpTlk').css('display','block');
    $('#id_BtnSvSelPimpTlk').css('display','block');
    $('#id_BtnCxSelPimpTlk').css('display','block');
}
// save combobox select pimpinan Telkomsel
function id_BtnSvSelPimpTlk(){
    var id_pks = $('#id_pks').val();
    var id_SelPimpTlk = $('#id_SelPimpTlk').val();
    var id_SelPimpTlkTxt = $('#id_SelPimpTlk option:selected').text();
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/updinline_pimptsel",
        data: {
            id_SelPimpTlk: id_SelPimpTlk,
            id_pks: id_pks,
            id_SelPimpTlkTxt: id_SelPimpTlkTxt
        },
        success: function(res) {
            $('#id_aPimpTsel').text(res);
            id_BtnCxSelPimpTlk();
            GenDataPks();
        },
        error: function(xhr){
            $('#id_DivPks').html("error");
        }
    });
}
// cancel combobox select pimpinan Telkomsel
function id_BtnCxSelPimpTlk(){
    $('#id_SelPimpTlk').css('display','none');
    $('#id_BtnSvSelPimpTlk').css('display','none');
    $('#id_BtnCxSelPimpTlk').css('display','none');
}

// show combobox select PIC Telkomsel
function ShowCbxPicTlk(){
    $('#id_SelPicTlk').css('display','block');
    $('#id_BtnSvSelPicTlk').css('display','block');
    $('#id_BtnCxSelPicTlk').css('display','block');
}
// save combobox select PIC Telkomsel
function id_BtnSvSelPicTlk(){
    // update pimpinan telkomsel
    var id_pks = $('#id_pks').val();
    var id_SelPicTlk = $('#id_SelPicTlk').val();
    var id_SelPicTlkTxt = $('#id_SelPicTlk option:selected').text();
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/updinline_pictsel",
        data: {
            id_pks : id_pks,
            id_SelPicTlk : id_SelPicTlk,
            id_SelPicTlkTxt : id_SelPicTlkTxt
        },
        success: function(res) {
            $('#id_aPicTsel').text(res);
            id_BtnCxSelPicTlk();
            GenDataPks();
        },
        error: function(xhr){
            $('#id_DivPks').html("error");
        }
    });
}
// cancel combobox select PIC Telkomsel
function id_BtnCxSelPicTlk(){
    $('#id_SelPicTlk').css('display','none');
    $('#id_BtnSvSelPicTlk').css('display','none');
    $('#id_BtnCxSelPicTlk').css('display','none');
}



// show combobox select Corporate
function ShowCbxCorpTlk(){
    $('#id_SelCorpTlk').css('display','block');
    $('#id_BtnSvSelCorpTlk').css('display','block');
    $('#id_BtnCxSelCorpTlk').css('display','block');
}
// save combobox select Corporate
function id_BtnSvSelCorpTlk(){
    var id_pks = $('#id_pks').val();
    var id_SelCorpTlk = $('#id_SelCorpTlk').val();
    var id_SelCorpTlkTxt = $('#id_SelCorpTlk option:selected').text();
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/updinline_cortsel",
        data: {
            id_pks : id_pks,
            id_SelCorpTlk : id_SelCorpTlk,
            id_SelCorpTlkTxt : id_SelCorpTlkTxt
        },
        success: function(res) {
            $('#id_aCorTsel').text(res);
            id_BtnCxSelCorpTlk();
            GenDataPks();
        },
        error: function(xhr){
            $('#id_DivPks').html("error");
        }
    });
}
// cancel combobox select Corporate
function id_BtnCxSelCorpTlk(){
    $('#id_SelCorpTlk').css('display','none');
    $('#id_BtnSvSelCorpTlk').css('display','none');
    $('#id_BtnCxSelCorpTlk').css('display','none');
}

// show combobox select Paket
function ShowCbxPktTlk(){
    $('#id_SelPktTlk').css('display','block');
    $('#id_BtnSvSelPktTlk').css('display','block');
    $('#id_BtnCxSelPktTlk').css('display','block');
}
// save combobox select Paket
function id_BtnSvSelPktTlk(){
    var id_pks = $('#id_pks').val();
    var id_SelPktTlk = $('#id_SelPktTlk').val();
    var id_SelPktTlkTxt = $('#id_SelPktTlk option:selected').text();
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/updinline_pkttsel",
        data: {
            id_pks : id_pks,
            id_SelPktTlk : id_SelPktTlk,
            id_SelPktTlkTxt : id_SelPktTlkTxt
        },
        success: function(res) {
            $('#id_aPktTsel').text(res);
            id_BtnCxSelPktTlk();
            GenDataPks();
        },
        error: function(xhr){
            $('#id_DivPks').html("error");
        }
    });

}
// cancel combobox select Paket
function id_BtnCxSelPktTlk(){
    $('#id_SelPktTlk').css('display','none');
    $('#id_BtnSvSelPktTlk').css('display','none');
    $('#id_BtnCxSelPktTlk').css('display','none');
}



//Saat tombol save change di klik
function UpdPks(){
    /* get checkboxes value */
    var CbxSignCor1 = $('#id_CbxSignCor1:checked').val();
    var CbxSignCor2 = $('#id_CbxSignCor2:checked').val();
    var CbxSignTel1 = $('#id_CbxSignTel1:checked').val();
    var CbxSignTel2 = $('#id_CbxSignTel2:checked').val();
    console.clear();
    console.log(CbxSignCor1 + ", " + CbxSignCor2 + ", " + CbxSignTel1 + ", " + CbxSignTel2);
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/editpks",
        data: {
            id_pks: $('#id_pks').val(),
            id_pksno: $('#id_pksno').val(),
            id_pksst: $('#id_pksst').val(),
            id_pksen: $('#id_pksen').val(),
            CbxSignCor1 : CbxSignCor1,
            CbxSignCor2 : CbxSignCor2,
            CbxSignTel1 : CbxSignTel1,
            CbxSignTel2 : CbxSignTel2
        },
        success: function(res) {
            $('#modal-default').modal('hide');
            alert("Data Updated!");
            GenDataPks();
        },
        error: function(xhr){
           $('#id_DivPks').html("error");
        }
    });
}


function DelPks(id_pks){
    var delconf = confirm("Hapus data?");
    if(delconf){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/ccrudpks/delpks",
            data: {
                id_pks: id_pks
            },
            success: function(res) {
                $('#modal-default').modal('hide');
                alert("Data Terhapus!");
                GenDataPks();
            },
            error: function(xhr){
               $('#id_DivPks').html("error");
            }
        });
    }
}
</script>