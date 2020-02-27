<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo site_url()?>admin/Dashboard/">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Utama</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Data Mahasiswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url()?>admin/Mahasiswa"><i class="fa fa-circle-o"></i>+ Tambah Mahasiswa</a></li>
            <li><a href="<?php echo site_url()?>admin/Mahasiswa/view_mahasiswa"><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
          </ul>
        </li>
        <li class="header">DATA MASTER</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>Data Sekolah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url()?>admin/C_sekolah"><i class="fa fa-circle-o"></i>+ Tambah Sekolah</a></li>
            <li><a href="<?php echo site_url()?>admin/C_sekolah/view_sekolah"><i class="fa fa-circle-o"></i> Data Sekolah</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-map"></i>
            <span>Data Daerah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Data Provinsi</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Data Kabupaten</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Data Kecamatan</a></li>
          </ul>
        </li>

        <li class="header">SETTING</li>
        <li><a href="<?php echo base_url('login/keluar'); ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Keluar</span></a></li>
      </ul>