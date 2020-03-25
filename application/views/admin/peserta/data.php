
        <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Data Peserta</h4>
              <button type="button" class="float-right btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th>OPSI</th>
                      <th>Foto</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Nama Lengkap</th>
                      <th>Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Bidang</th>
                      <th>Jumlah Jawaban</th>
                      <th>Pendidikan</th>
                      <th>Keahlihan</th>
                      <th>Pengalaman</th>
                      <th>CV Portfolio</th>
                      <th>Surat Lamaran</th>
                    </tr>
                  </thead>
                  <tbody class="table table-sm table-hover">
                    <?php foreach ($peserta as $no => $peserta): ?>
                    <tr>
                      <td><?=$no+1;?></td>
                      <td>
                        <a href="<?=base_url("admin/hapusDataPeserta/$peserta->id_peserta/");?>" title="Hapus"><button type="button" class="btn rounded btn-danger btn-sm mx-1 mb-1"><i class="fas fa-trash"></i></button></a>
                          <!-- <input type="hidden" value="<?=$peserta->id_peserta ?>"> -->
                        <a href="<?= base_url("admin/dataPeserta/$peserta->id_peserta/#")?>" title="Edit"><button type="button" name="aaa" class="rounded btn btn-warning btn-sm mx-1" data-toggle="modal" data-target="#updateDataPeserta"><i class="fas fa-edit"></i></button></a>
                      </td>
                      <td><?=$peserta->foto; ?></td>
                      <td><?=$peserta->username; ?></td>
                      <td><?=$peserta->password; ?></td>
                      <td><?=$peserta->nama_lengkap; ?></td>
                      <td><?=$peserta->tgl_lahir; ?></td>
                      <td><?=$peserta->alamat; ?></td>
                      <td><?=$peserta->bidang; ?></td>
                      <td><?=$peserta->jml_jwb; ?></td>
                      <td><?=$peserta->pendidikan; ?></td>
                      <td><?=$peserta->keahlihan; ?></td>
                      <td><?=$peserta->pengalaman; ?></td>
                      <td>
                        <a href="<?=base_url('temp/surat_lamaran/'.$peserta->surat_lamaran) ?>"><button class="btn btn-primary"><i class="fas fa-file"></i><?=$peserta->cv_portofolio; ?></button></a>
                      </td>
                      <td>
                        <a href="<?=base_url('temp/surat_lamaran/'.$peserta->surat_lamaran) ?>"><button class="btn btn-primary"><i class="fas fa-file"></i><?=$peserta->surat_lamaran; ?></button></a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>                  
                </table>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Peserta</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url('admin/dataPeserta/') ?>" method="post">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input required="" id="username" name="username" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input id="password" name="password" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input id="foto" name="foto" type="file" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap</label>
                      <input required="" id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input required="" id="tgl_lahir" type="date" name="tgl_lahir" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input required="" id="alamat" name="alamat" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="bidang">Bidang</label>
                      <input required="" id="bidang" name="bidang" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="pendidikan">Pendidikan</label>
                      <input required="" id="pendidikan" name="pendidikan" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="keahlihan">Keahlihan</label>
                      <textarea id="keahlihan" required="" name="keahlihan" type="text" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="pengalaman">Pengalaman</label>
                      <textarea id="pengalaman" name="pengalaman" type="text" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                      <label for="surat_lamaran">Surat Lamaran (<i>Wajib</i>)</label>
                      <input id="surat_lamaran" required="" name="surat_lamaran" type="file" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="cv_portofolio">CV Portfolio (<i>jika ada</i>)</label>
                      <input id="cv_portofolio" name="cv_portofolio" type="file" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>

          <!-- UPDATE DATA PESERTA -->
          <!-- Modal -->
      <?php if ($this->uri->segment(3)): ?>
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
                  <form action="<?=base_url("admin/editPeserta/$updatePeserta->id_peserta") ?>" method="post">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input id="username" name="username" type="text" class="form-control" value="<?=$updatePeserta->username; ?>" disabled required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input id="password" name="password" type="text" class="form-control" value="<?=$updatePeserta->password; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input id="foto" name="foto" type="text" class="form-control" value="<?=$updatePeserta->foto; ?>" required disabled>
                    </div>
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap</label>
                      <input required="" id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" value="<?=$updatePeserta->nama_lengkap; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input required="" id="tgl_lahir" type="date" name="tgl_lahir" class="form-control" value="<?=$updatePeserta->tgl_lahir; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input required="" id="alamat" name="alamat" type="text" class="form-control" value="<?=$updatePeserta->alamat; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="bidang">Bidang</label>
                      <input required="" id="bidang" name="bidang" type="text" class="form-control" value="<?=$updatePeserta->bidang; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="pendidikan">Pendidikan</label>
                      <input required="" id="pendidikan" name="pendidikan" type="text" class="form-control" value="<?=$updatePeserta->pendidikan; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="keahlihan">Keahlihan</label>
                      <textarea id="keahlihan" required="" name="keahlihan" type="text" class="form-control" ><?=$updatePeserta->keahlihan; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="pengalaman">Pengalaman</label>
                      <textarea id="pengalaman" required="" name="pengalaman" type="text" class="form-control" ><?=$updatePeserta->pengalaman; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="surat_lamaran">Surat Lamaran (<i>Wajib</i>)</label>
                      <input id="surat_lamaran" name="surat_lamaran" type="text" class="form-control" value="<?=$updatePeserta->surat_lamaran; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="cv_portofolio">CV Portfolio (<i>jika ada</i>)</label>
                      <input id="cv_portofolio" name="cv_portofolio" type="text" class="form-control" value="<?=$updatePeserta->cv_portofolio; ?>" disabled>
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
<?php endif ?>