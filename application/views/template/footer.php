      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Dibuat dan Dikembangkan oleh <a href="#">Dijey Cell</a>
        </div>
        <div class="footer-right">
          Version 1.1
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/vendor/izitoast/js/iziToast.min.js'?>"></script>

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>assets/js/page/index-0.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#datatables-user').DataTable({
        "ordering": false,
      });
      $('#datatables-pegawai').DataTable({
        "ordering": false,
      });
      $('#datatables-jabatan').DataTable({
        "ordering": false,
      });
      $('#datatables-bidang').DataTable({
        "ordering": false,
      });
      $('#datatables-golongan').DataTable({
        "ordering": false,
      });
      $('#datatables-cuti').DataTable({
        "ordering": false,
      });
      $('#datatables-izin').DataTable({
        "ordering": false,
      });
      $('#select-pegawai').selectpicker({
        search : true,
      });
      $('#select-golruang').selectpicker({
        search : true,
      });
      $('#select-bidang').selectpicker({
        search : true,
      });
      $('#select-jabatan').selectpicker({
        search : true,
      });
      $('#select-atasan').selectpicker({
        search : true,
      });
      $('#select-pejabat').selectpicker({
        search : true,
      });
    });

  </script>
  <?php if($this->session->flashdata('msg')=='success'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Data berhasil disimpan!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='error'):?>
    <script type="text/javascript">
      iziToast.error({
          title: 'Gagal!',
          message: 'Data gagal disimpan!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='pembayaran-success'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Pemabayaran Berhasil!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='edit'):?>
    <script type="text/javascript">
      iziToast.info({
          title: 'Sukses!',
          message: 'Data berhasil diedit!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='hapus'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Data berhasil dihapus!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='password-salah'):?>
    <script type="text/javascript">
      iziToast.error({
          title: 'Gagal!',
          message: 'Password Lama Salah!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='verifikasi'):?>
    <script type="text/javascript">
      iziToast.success({
          title: 'Sukses!',
          message: 'Data berhasil diverifikasi!',
          position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      });
    </script>
  <?php endif; ?>
</body>
</html>
