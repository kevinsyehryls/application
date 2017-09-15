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
          <div id="id_DivIndx">
              <!-- data user akan tampil disini -->
    </section>
    <!-- /.content -->
  </div>


<script>
// ketika DOM ready
$(document).ready(function(){
    GenDataIndx();
});

// function untuk populate data user dari table database
function GenDataIndx(){
    jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/ccrudindx/showindex",
        success: function(res) {
            $('#id_DivIndx').html(res);
        },
        error: function(xhr){
           $('#id_DivIndx').html("error");
        }
    });
}

</script>