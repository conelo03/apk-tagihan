<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Paket</a></div>
        <div class="breadcrumb-item">Tambah Paket</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-paket'); ?>" method="post">
              <div class="card-header">
                <h4>Form Tambah Paket</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Paket</label>
                  <input type="text" name="paket" class="form-control" value="<?= set_value('paket'); ?>" required="">
                  <?= form_error('paket', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Tarif</label>
                  <input type="number" name="tarif" class="form-control" value="<?= set_value('tarif'); ?>" required="">
                  <?= form_error('tarif', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('paket');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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