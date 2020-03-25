  <!-- // DASHBOARD LIST TEST -->
<div class="row">
  <h2 class="mx-auto text-primary"><b>Hasil Test Soal</b></h2>
</div>
  

  <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300 mr-3"></i>
                    </div>
                    <div class="col mr-2">
                      <a href="<?=base_url('admin/hasilSeleksi/') ?>" class="text-decoration-none">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Semua Data Hasil Peserta </div>
                    </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
          </div>

          <div class="row">
           <?php foreach ($bidang as $bidang): ?>
            <?php $bidangTest = $bidang->bidang; ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300 mr-3"></i>
                    </div>
                    <div class="col mr-2">
                      <a href="<?=base_url('test/hasilBidang/'.$bidangTest) ?>" class="text-decoration-none">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Test Bidang <?=ucfirst($bidang->bidang) ?> </div>
                    </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach ?>
          </div>