<?php
$id_pengguna = $this->session->userdata('id_pengguna');
$get_user = $this->db->get_where('tb_pengguna', ['id_pengguna' => $id_pengguna])->row_array();
?>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-auto">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/img/profile/user.png'); ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $get_user['nama_pengguna'] ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('setting');?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Edit Akun
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">KENZIE NET</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">K-NET</a>
          </div>
          <?php
            $judul = explode(' ', $title);
          ?>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="<?= $title == 'Dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('dashboard');?>"><i class="fas fa-circle"></i> <span>Dashboard</span></a></li>  

            <li class="menu-header">Data Master</li>
            <?php if(is_admin()):?>        
            <li class="<?= $title == 'Kelola Pengguna' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('pengguna');?>"><i class="fas fa-circle"></i> <span>Kelola Pengguna</span></a></li> 
            <?php endif;?>
            <li class="<?= $title == 'Kelola Paket' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('paket');?>"><i class="fas fa-circle"></i> <span>Kelola Paket</span></a></li>
            <li class="<?= $title == 'Kelola Pelanggan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('pelanggan');?>"><i class="fas fa-circle"></i> <span>Kelola Pelanggan</span></a></li>  

            <li class="menu-header">Transaksi</li>

            <li class="<?= $title == 'Tambah Tagihan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('tambah-tagihan');?>"><i class="fas fa-circle"></i> <span>Tambah Tagihan</span></a></li> 
            <li class="<?= $title == 'Data Tagihan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('tagihan');?>"><i class="fas fa-circle"></i> <span>Data Tagihan</span></a></li> 
            <li class="<?= $title == 'Riwayat Tagihan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('riwayat-tagihan');?>"><i class="fas fa-circle"></i> <span>Riwayat Tagihan</span></a></li> 
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <button class="btn btn-danger btn-lg btn-block btn-icon-split" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fa fa-sign-out-alt"></i> Logout</button>
          </div>
        </aside>
      </div>
      