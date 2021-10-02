<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Tagihan</a></div>
        <div class="breadcrumb-item">Tambah Tagihan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-tagihan'); ?>" method="post">
              <div class="card-header">
                <h4>Form Tambah Tagihan</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Pilih Bulan</label>
                  <select class="form-control barang" name="bulan" id="detail_po_fabrikasi" data-live-search="true">
                    <option disabled selected>-- Pilih Bulan --</option>
                    <?php
                    $jml_bln = count($bulan); 
                    for($i = 0; $i < $jml_bln; $i++){?>
                    <option value="<?= $bulan[$i]?>"><?= $bulan[$i]?></option>
                    <?php }?>
                  </select>
                  <?= form_error('bulan', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Pilih Tahun</label>
                  <select class="form-control barang" name="tahun" id="detail_po_fabrikasi" data-live-search="true">
                    <option disabled selected>-- Pilih Tahun --</option>
                    <?php
                    $jml_thn = count($tahun); 
                    for($i = 0; $i < $jml_thn; $i++){?>
                    <option value="<?= $tahun[$i]?>"><?= $tahun[$i]?></option>
                    <?php }?>
                  </select>
                  <?= form_error('tahun', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
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