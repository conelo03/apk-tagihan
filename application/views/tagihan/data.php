<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Tagihan</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Tagihan</h4>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-tagihan ');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Nama</th>
                      <th>Tagihan</th>
                      <th>Bulan-Tahun</th>
                      <th>Status</th>
                      <th class="text-center" style="width: 200px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($tagihan as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['nama'];?></td>
                      <td><?= "Rp ".number_format($u['tagihan'], 2, ',', '.');?></td>
                      <td><?= $u['bulan'].'-'.$u['tahun'];?></td>
                      <td>
                        <?php if($u['status'] == 'BL'):?>
                          <span class="badge badge-danger">Belum Bayar</span>
                        <?php else:?>
                          <span class="badge badge-success">Sudah Bayar</span>
                        <?php endif;?>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-info" data-confirm="Konfirmasi Pembayaran?" data-confirm-yes="document.location.href='<?= base_url('bayar-tagihan/'.$u['id_tagihan']); ?>';"><i class="fa fa-edit"></i> Bayar</button>
                        <a href="<?= base_url('notif-pelanggan/'.$u['id_tagihan']);?>" target="_blank" class="btn btn-success"><i class="fa fa-paper-plane"></i> WA</a>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>