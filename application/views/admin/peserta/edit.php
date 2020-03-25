
          <button type="button" class="rounded btn btn-warning btn-sm mx-1" data-toggle="modal" data-target="#updateDataPeserta"><i class="fas fa-edit"></i></button>

          <!-- UPDATE DATA PESERTA -->
          <!-- Modal -->
          <div class="modal fade" id="updateDataPeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title font-weight-bold" id="exampleModalLabel">Update Peserta</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  <form action="<?=base_url("admin/editPeserta/$peserta->id_peserta") ?>" method="post">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input id="username" name="username" type="text" class="form-control" value="<?=$peserta->username ?>" >
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input id="foto" name="foto" type="text" class="form-control" value="<?=$peserta->foto ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap</label>
                      <input required="" id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" value="<?=$peserta->nama_lengkap ?>" >
                    </div>
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input required="" id="tgl_lahir" type="date" name="tgl_lahir" class="form-control" value="<?=$peserta->tgl_lahir ?>" >
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input required="" id="alamat" name="alamat" type="text" class="form-control" value="<?=$peserta->alamat ?>" >
                    </div>
                    <div class="form-group">
                      <label for="pendidikan">Pendidikan</label>
                      <input required="" id="pendidikan" name="pendidikan" type="text" class="form-control" value="<?=$peserta->pendidikan ?>" >
                    </div>
                    <div class="form-group">
                      <label for="keahlihan">Keahlihan</label>
                      <textarea id="keahlihan" required="" name="keahlihan" type="text" class="form-control" ><?=$peserta->keahlihan ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="pengalaman">Pengalaman</label>
                      <textarea id="pengalaman" required="" name="pengalaman" type="text" class="form-control" ><?=$peserta->pengalaman ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="surat_lamaran">Surat Lamaran (<i>Wajib</i>)</label>
                      <input id="surat_lamaran" name="surat_lamaran" type="text" class="form-control" value="<?=$peserta->surat_lamaran ?>" >
                    </div>
                    <div class="form-group">
                      <label for="cv_portofolio">CV Portfolio (<i>jika ada</i>)</label>
                      <input id="cv_portofolio" name="cv_portofolio" type="text" class="form-control" value="<?=$peserta->cv_portofolio ?>" >
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>