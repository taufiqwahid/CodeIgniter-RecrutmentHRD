	


<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary">Data Peserta</h4>
      <br>
      <center>
      	<button type="button" class="justify-content-center btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>
      	<input type="number" min="1" max="30" name="jumlahSoal" value="1">
      	 Tambah Soal Lagi</button>
      </center>
      
    </div>
<?php for ($i=0; $i < 4; $i++) ?> 
    <div class="card-body">
		<form method="post" action="<?=base_url('test/menambahSoal/') ?>">
		

		  <div class="form-group">
		    <label for="bidang">Bidang atau Devisi Pekerjaan</label>
		    <input required type="text" class="form-control" id="bidang" placeholder="Masukkan Bidang / Devisi" name="bidang">
		    <small id="bidang" class="form-text text-muted">Semisal Bidang/Devisi : IT, Marketing, Engineering dll.</small>
		  </div>
		  <div class="form-group">
		    <label for="test">Soal/Test</label>
		    <textarea type="text" class="form-control" id="test" placeholder="Masukkan Soal Test" name="test" required=""></textarea>
		  </div>
		  <div class="form-group">
		    <label for="pilihan_a">Pilihan A</label>
		    <input required type="text" class="form-control" id="pilihan_a" placeholder="Masukkan Soal Pilihan A" name="pilihan_a">
		  </div>
		  <div class="form-group">
		    <label for="pilihan_b">Pilihan B</label>
		    <input required type="text" class="form-control" id="pilihan_b" placeholder="Masukkan Soal Pilihan B" name="pilihan_b">
		  </div>
		  <div class="form-group">
		    <label for="pilihan_c">Pilihan C</label>
		    <input required type="text" class="form-control" id="pilihan_c" placeholder="Masukkan Soal Pilihan C" name="pilihan_c">
		  </div>
		  <div class="form-group">
		    <label for="pilihan_d">Pilihan D</label>
		    <input required type="text" class="form-control" id="pilihan_d" placeholder="Masukkan Soal Pilihan D" name="pilihan_d">
		  </div>

		<div class="form-group">
			<label for="test">Jawaban Test</label>
		    <select class="custom-select" required name="kjawaban">
		      <option value="">-- Pilih Jawaban Test --</option>
		      <option value="a">Pilihan A</option>
		      <option value="b">Pilihan B</option>
		      <option value="c">Pilihan C</option>
		      <option value="d">Pilihan D</option>
		    </select>
		  </div>
		
      
		<div class="form-group">
		<center>
		  <button class="btn btn-success " type="submit">Buat dan Simpan Soal</button>
		</center>
		  </div>
		</form>
    </div>
<? endfor ?>
</div>