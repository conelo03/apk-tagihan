<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master Pengguna</a></div>
        <div class="breadcrumb-item"><a href="#">Profil Pengguna</a></div>
        <div class="breadcrumb-item">Update Pengguna</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('setting'); ?>" method="post"  enctype="multipart/form-data">
              <div class="card-header">
                <h4 style="color: #3abaf4;">Informasi Login</h4>
              </div>
              <div class="card-body">

                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $pengguna['username']?>">
                    <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" name="password_lama" class="form-control">
                    <?= form_error('password_lama', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password_baru" class="form-control">
                    <?= form_error('password_baru', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Ulangi Password Baru</label>
                    <input type="password" name="konfirmasi_password_baru" class="form-control">
                    <?= form_error('konfirmasi_password_baru', '<span class="text-danger small">', '</span>'); ?>
                  </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>