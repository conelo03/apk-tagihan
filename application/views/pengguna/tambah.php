<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Pengguna</a></div>
        <div class="breadcrumb-item">Tambah Pengguna</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-pengguna'); ?>" method="post">
              <div class="card-header">
                <h4>Form Tambah Pengguna</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_pengguna" class="form-control" value="<?= set_value('nama_pengguna'); ?>" required="">
                  <?= form_error('nama_pengguna', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>" required="">
                  <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>" required="">
                  <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="password2" class="form-control" value="<?= set_value('password2'); ?>" required="">
                  <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label class="d-block">Role</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="level" value="admin" id="exampleRadios3" <?= set_value('level') == 'admin' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios3">
                      Administrator
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="level" value="pegawai" id="exampleRadios4" <?= set_value('level') == 'pegawai' ? 'checked' : '' ; ?> >
                    <label class="form-check-label" for="exampleRadios4">
                      Pegawai
                    </label>
                  </div>
                </div>
                <?= form_error('level', '<span class="text-danger small">', '</span>'); ?>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('pengguna');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>