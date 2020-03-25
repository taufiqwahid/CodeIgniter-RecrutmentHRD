        <div class="row justify-content-center">
              <div class="mr-xl-1 mb-3" style="width: 200px">
                    <img src="<?=base_url('temp/gambar/'.$peserta->foto); ?>" class="card-img-top img-thumbnail" alt="foto">
              </div>
              <div class="card shadow" style="width: 30rem;">
                <br>
                <h5 class="font-weight-bold mx-auto text-dark">PROFIL</h5>
                <hr class="mx-5">
                <div class="card-body">
                  <b><h6 class="card-title font-weight-bold">Nama Lengkap</h6></b>
                  <p class="card-text"><?=$peserta->nama_lengkap; ?></p>
                  <b><h6 class="card-title font-weight-bold">Tanggal Lahir</h6></b>
                  <p class="card-text"><?=$peserta->tgl_lahir; ?></p>
                  <b><h6 class="card-title font-weight-bold">alamat</h6></b>
                  <p class="card-text"><?=$peserta->alamat; ?></p>
                  <b><h6 class="card-title font-weight-bold">Pendidikan</h6></b>
                  <p class="card-text"><?=$peserta->pendidikan; ?></p>
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <b><h6 class="card-title font-weight-bold">Keahlihan</h6></b>
                    <p class="card-text"><i class="fas fa-file"></i> <?= $peserta->keahlihan ?></p>
                    <!-- <li class="list-group-item">Masukkan Yang</li> -->
                    <!-- <li class="list-group-item">Penting Saja</li> -->
                    <!-- <li class="list-group-item"></li> -->
                  </ul>
                  <b><h6 class="card-title font-weight-bold">Pengalaman</h6></b>
                    <p class="card-text"><i class="fas fa-file"></i> <?= $peserta->pengalaman ?></p>
                </div>
                <div class="card-body">
                  <b><h6 class="card-title font-weight-bold">Surat Lamaran Kerja</h6></b>
                  <!-- <p class="card-text"><i class="fas fa-file"></i> <?= $peserta->surat_lamaran ?></p> -->
                  <a href="<?=base_url('temp/surat_lamaran/'.$peserta->surat_lamaran) ?>"><button class="btn btn-primary"><i class="fas fa-file"></i><?=$peserta->surat_lamaran; ?></button></a>
                </div>
                <div class="card-body">
                  <b><h6 class="card-title font-weight-bold">CV Portofolio atau Keahlihan</h6></b>
                  <a href="<?=base_url('temp/surat_lamaran/'.$peserta->surat_lamaran) ?>"><button class="btn btn-primary"><i class="fas fa-file"></i><?=$peserta->cv_portofolio; ?></button></a>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary m-3 shadow" data-toggle="modal" data-target="#exampleModal">Ubah Data Yang Sesuai (<i>Wajib</i>)
                </button>
              </div>
               
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Ubah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('perekrutan/profil/') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8"> 
                        <div class="alert alert-warning" role="alert">
                          <small id="bidang" class="form-text text-muted"><b class="text-danger">NOTE : </b>Ubah Nama File <b>GAMBAR = G_UsernameAnda | SURAT LAMARAN = SR_UsernameAnda | CV PORTOFOLIO = CV_UsernameAnda</b></small>
                        </div>
                          <div class="form-group">
                            <label for="foto">Foto</label>
                            <input id="foto" name="foto" type="file" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input required="" id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" value="<?=$peserta->nama_lengkap; ?>">
                          </div>
                          <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input required="" id="tgl_lahir" type="date" name="tgl_lahir" class="form-control" value="<?=$peserta->tgl_lahir; ?>">
                          </div>
                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input required="" id="alamat" name="alamat" type="text" class="form-control" value="<?=$peserta->alamat; ?>">
                          </div>
                          <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input required="" id="pendidikan" name="pendidikan" type="text" class="form-control" value="<?=$peserta->pendidikan; ?>">
                          </div>
                          <div class="form-group">
                            <label for="keahlihan">Keahlihan</label>
                            <textarea id="keahlihan" required="" name="keahlihan" type="text" class="form-control"><?=$peserta->keahlihan; ?></textarea>
                          </div>
                          <div class="form-group">
                            <label for="pengalaman">Pengalaman</label>
                            <textarea id="pengalaman" required="" name="pengalaman" type="text" class="form-control"><?=$peserta->pengalaman; ?></textarea>
                          </div>
                          <div class="form-group">
                            <label for="surat_lamaran">Surat Lamaran (<i>Wajib dalam bentuk file PDF</i>)</label>
                            <input id="surat_lamaran" required="" name="surat_lamaran" type="file" class="form-control" value="<?=$peserta->surat_lamaran; ?>">
                          </div>
                          <div class="form-group">
                            <label for="cv_portofolio">CV Portfolio (<i>jika ada dalam bentuk file PDF</i>)</label>
                            <input id="cv_portofolio" name="cv_portofolio" type="file" class="form-control" value="<?=$peserta->cv_portofolio; ?>">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              