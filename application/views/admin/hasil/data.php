        <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Hasil Semua Test Peserta</h4>
              <button type="button" class="float-right btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> nnti print</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="table thead-dark">
                    <tr>
                      <th><center>#</center></th>
                      <th>Username</th>
                      <th>Nama Lengkap</th>
                      <th>Bidang</th>
                      <th>Jumlah Soal</th>
                      <th>Benar</th>
                      <th>Salah</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($peserta as $no => $peserta): ?> 
                    <tr>
                      <td><?=$no+1;?></td>
                      <td><?=$peserta->username; ?></td>
                      <td><?=$peserta->nama_lengkap; ?></td>
                      <td><?=$peserta->bidang; ?></td>
                      <td><?=$peserta->jumlahSoal; ?></td>
                      <td><?=$peserta->jbenar; ?></td>
                      <td><?=$peserta->jsalah; ?></td>
                      <td><?=$peserta->nilaiHasil; ?></td>
                    </tr> 
                     <?php endforeach ?>
                  </tbody>                  
                </table>
              </div>
            </div>
          </div>