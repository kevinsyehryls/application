<?php
  $apptitle = $this->session->userdata('apptitle');
  $appver = $this->session->userdata('appver');
  $email = $this->session->userdata('email');
  $passw = $this->session->userdata('passw');
  $nama = $this->session->userdata('nama');
  $level = $this->session->userdata('level');
  $login_state = $this->session->userdata('login_state');
?>

<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nama ?></p>
          <a href="<?php echo base_url(); ?>index.php/cpage/halprof"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
          </span>
        </div>
      </form>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>        
        <?php
        if ($level == 'Administrasi') {
          $this->load->view('body/menu/menu_adm');
        } elseif ($level == 'SPV') {
          $this->load->view('body/menu/menu_spv');
        } else {
          echo '<script>alert("User level not recognize")</script>';
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>