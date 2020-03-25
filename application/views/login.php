<?php require_once '_Header.php'; ?>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>
                  <form class="user" method="post" action="<?= base_url('login/cekLogin/')?>">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username">
                      <?= form_error('username','<small class="text-danger mx-auto">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      <?= form_error('password','<small class="text-danger mx-auto">','</small>'); ?>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">
                      <b>Login</b>
                      <?= form_error('submit','<small class="text-danger mx-auto">','</small>'); ?>
                    </button>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <!-- <a class="small" href="#"> -->
                      <button type="button" class="rounded btn btn-success btn-sm mx-1" data-toggle="modal" data-target="#membuatAkun">Membuat Akun</button>
                    <!-- </a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


      <!-- Modal -->
      <div class="modal fade" id="membuatAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title font-weight-bold" id="exampleModalLabel">Membuat Akun</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= base_url('login/membuatAkun/') ?>" method="post">
                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input required="" id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap">
                  <?= form_error('nama_lengkap','<small class="text-danger mx-auto">','</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input required="" id="username" name="username" type="text" class="form-control" placeholder="Masukkan Username">
                  <?= form_error('username','<small class="text-danger mx-auto">','</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input required="" id="password" name="password" type="password" class="form-control" placeholder="Masukkan Password">
                  <?= form_error('password','<small class="text-danger mx-auto">','</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="repassword">RePassword</label>
                  <input required="" id="repassword" name="repassword" type="password" class="form-control" placeholder="Masukkan Kembali Password">
                  <?= form_error('repassword','<small class="text-danger mx-auto">','</small>'); ?>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="buat" class="btn btn-primary">Buat</button>
              <?= form_error('buat','<small class="text-danger mx-auto">','</small>'); ?>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php require '_Footer.php'; ?>