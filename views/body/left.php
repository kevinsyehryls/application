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
        <li>
          <a href="<?php echo base_url(); ?>index.php/cpage/halindx">
            <i class="fa fa-list"></i> <span>BERANDA</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>index.php/cpage/haluser">
            <i class="fa  fa-cogs"></i> <span>KELOLA USER</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i> <span> KELOLA PEJABAT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halppn"><i class="fa fa-cog"></i> Kelola Pimpinan Telkomsel</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halstaf"><i class="fa fa-cog"></i> Kelola PIC Telkomsel</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>PELANGGAN CORPORATE</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halcorp"><i class="fa fa-group"></i> Corporate</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/cpage/hallist"><i class="fa fa-file-text-o"></i> List Nomor Corporate</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>PKS CORPORATE</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halpks"><i class="fa  fa-file-o"></i> PKS</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halpks_ttd"><i class="fa fa-minus-square"></i> Pending Tanda Tangan</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halpks_end"><i class="fa fa-sign-out"></i> PKS Akan Berakhir</a></li>
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
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halrpt"><i class="fa fa-arrow-circle-down"></i> Eksport Data</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/cpage/halgraf"><i class="fa fa-line-chart"></i> Lihat Grafik</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>