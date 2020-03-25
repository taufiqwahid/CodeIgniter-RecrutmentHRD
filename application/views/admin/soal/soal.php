<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Semua Soal</h4>
    <a href="<?=base_url('test/tambahSoal/') ?>">
      <button type="button" class="float-right btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Soal</button>
    </a>
  </div>
  <div class="card-body">
<div class="table-responsive">
  <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead class="table thead-dark ">
      <tr>
        <th title="Tekan Untuk Mengurutkan"><center>Bidang</center></th>
        <th><center>Test</center></th>
        <th><center>Pilihan A</center></th>
        <th><center>Pilihan B</center></th>
        <th><center>Pilihan C</center></th>
        <th><center>Pilihan D</center></th>
        <th><center>Jawaban</center></th>
      </tr>
    </thead>
    <tbody class="table table-sm">
      <?php foreach ($soal as $no => $soal): ?>
      <tr>
        <!-- <?php echo "<pre>", print_r($soal,1); ?> -->
        <td><?=$soal->bidang; ?></td>
        <td><?=$soal->test; ?></td>
        <td><?=$soal->pilihan_a; ?></td>
        <td><?=$soal->pilihan_b; ?></td>
        <td><?=$soal->pilihan_c; ?></td>
        <td><?=$soal->pilihan_d; ?></td>
        <td><?=$soal->kjawaban;?></td>
      </tr>
      <?php endforeach ?>
    </tbody>                  
  </table>
</div>
</div>
</div>