        
        <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Data Akun</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th><center>#</center></th>
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Level</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($akun as $no => $akun): ?>
                    <tr>
                      <td><center><?=$no+1;?></center></td>
                      <td><?=$akun->nama_lengkap; ?></td>
                      <td><?=$akun->username; ?></td>
                      <td><?=$akun->password; ?></td>
                      <td><?=$akun->level; ?></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>                  
                </table>
              </div>
            </div>
          </div>