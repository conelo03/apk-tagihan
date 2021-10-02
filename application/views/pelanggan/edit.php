<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Kelola Pelanggan</a></div>
        <div class="breadcrumb-item">Edit Pelanggan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-pelanggan/'.$pelanggan['id_pelanggan']); ?>" method="post">
              <div class="card-header">
                <h4>Form Edit Pelanggan</h4>
              </div>
               <div class="card-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?= set_value('nama', $pelanggan['nama']); ?>" required="">
                  <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>No. HP</label>
                  <input type="text" name="no_hp" class="form-control" value="<?= set_value('no_hp', $pelanggan['no_hp']); ?>" required="">
                  <?= form_error('no_hp', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat', $pelanggan['alamat']); ?>" required="">
                  <?= form_error('alamat', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>" >
                  <span class="text-danger small">*) Kosoongkan jika tidak perlu</span>
                  <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="password2" class="form-control" value="<?= set_value('password2'); ?>" >
                  <span class="text-danger small">*) Kosoongkan jika tidak perlu</span>
                  <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Pilih paket</label>
                  <select class="form-control barang" name="id_paket" id="detail_po_fabrikasi" data-live-search="true">
                    <option disabled selected>-- Pilih Paket --</option>
                    <?php foreach ($paket as $b):?>
                    <option value="<?= $b['id_paket']?>" <?= set_value('id_paket', $pelanggan['id_paket']) == $b['id_paket'] ? 'selected' : '' ; ?> ><?= $b['paket'].' - '."Rp ".number_format($b['tarif'], 2, ',', '.'); ?></option>
                    <?php endforeach;?>
                  </select>
                  <?= form_error('id_paket', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('pelanggan');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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