<div class="col-md-10 mt-5">
  <h2>Arsip Surat</h2>
  <p class="w-51">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. Klik "Lihat" pada kolom aksi untuk menampilkan surat</p>


  <div class="blank mt-5"></div>
  <?php if ($this->session->flashdata('success')) {
  ?>
    <div class="col-sm-10 mb-3">
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success') ?>
      </div>
    </div>

  <?php
  }
  ?>

  <table id="tableTest" class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nomor Surat</th>
        <th scope="col">Kategori</th>
        <th scope="col">Judul</th>
        <th scope="col">Waktu Pengarsipan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $query = $this->db->get('test');
      foreach ($query->result() as $row) {
      ?>
        <tr>
          <td><?php echo $row->nomor ?></td>
          <td><?php echo $row->kategori ?></td>
          <td><?php echo $row->judul ?></td>
          <td><?php echo $row->waktu ?></td>

          <td>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= $row->id ?>">
              Hapus
            </button>

            <!-- Modal -->
            <div class="modal fade" id="hapusModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Apakah Anda yakin ingin menghapus arsip ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url(); ?>sertifikasi/hapus?id=<?= $row->id ?>" class="btn btn-danger"> Ya! </a>
                  </div>
                </div>
              </div>
            </div>



            <a href="<?= base_url(); ?>sertifikasi/download/<?= $row->namaFile ?>" class="btn btn-primary"> Unduh </a>
            <a href="<?= base_url(); ?>sertifikasi/lihat?id=<?= $row->id ?>" class="btn btn-success"> Lihat >> </a>
          </td>

        <?php
      }
        ?>
        </tr>
    </tbody>
  </table>

  <a href="<?= base_url(); ?>sertifikasi/post" class="btn btn-primary mt-5">Arsipkan Surat</a>

</div>