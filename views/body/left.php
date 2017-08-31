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
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url(); ?>index.php/cpage/halindx">
            <i class="fa fa-list"></i> <span>BERANDA</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i> <span> MENU KELOLA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/cpage/haluser"><i class="fa fa-circle-o"></i> Kelola User</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halppn"><i class="fa fa-circle-o"></i> Kelola Pimpinan Telkomsel</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halstaf"><i class="fa fa-circle-o"></i> Kelola PIC Telkomsel</a></li>
          </ul>
         </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>INPUT DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halcorp"><i class="fa fa-circle-o"></i> Input Corporate</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/cpage/hallist"><i class="fa fa-circle-o"></i> Input List Nomor</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halpks"><i class="fa fa-circle-o"></i> Input PKS</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>REPORT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halrpt"><i class="fa fa-circle-o"></i> Kelola Report</a></li>
          </ul>
        </li>
       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>