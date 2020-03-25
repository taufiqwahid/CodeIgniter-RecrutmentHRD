
        <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Hasil Test Peserta Pada Bidang <?=ucfirst($this->uri->segment(3));?></h4>
              <a href="<?=base_url('admin/hasilSeleksi/') ?>">
                <button type="button" class="float-right btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-friends"></i> Hasil Seleksi Semua Peserta</button>
              </a>
            </div>
            <br>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>#</center></th>
                      <th>Username</th>
                      <th>Nama Lengkap</th>
                      <th>Jumlah Soal</th>
                      <th>Jawaban Benar</th>
                      <th><center>Nilai Hasil<br>(Jwb Benar*100/Jml Soal)</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($hasilTestBidang as $no => $hasilTest): ?>
                    <tr>
                      <td><center><?=$no+1;?></center></td>
                      <td><?=$hasilTest->username; ?></td>
                      <td><?=$hasilTest->nama_lengkap; ?></td>
                      <td><?=$hasilTest->jumlahSoal; ?></td>
                      <td><?=$hasilTest->jbenar; ?></td>
                      <td><?=$hasilTest->nilaiHasil; ?></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>                  
                </table>
              </div>
            </div>
          </div>