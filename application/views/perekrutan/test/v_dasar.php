<!-- Page Heading -->
	  <div class="d-sm-flex align-items-center justify-content-between mb-4">
	    <h1 class="h3 mb-0 text-gray-800"><b>TEST KEMAMPUAN DASAR</b></h1>
	    <a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Simpan</a>
	  </div>
	  <hr>
	<form action="<?=base_url('perekrutan/jtestDasar/') ?>" method="post">
	<?php foreach ($soal as $no => $soal): ?>
		<div class="row border-left-info">		
			<div class="col-sm-6">
				<?php $no=$no+1 ?>
				<b class="text-dark"><?= $no ?>. <?= $soal->test ?></b>			
				<div class="custom-control custom-radio text-black">
				  <input type="radio" id="jawaban<?="$no"."a";?>" name="jawaban<?=$no?>" class="custom-control-input" required value="a">
				  <label class="custom-control-label " for="jawaban<?="$no"."a"?>"><?= $soal->pilihan_a ?></label>
				</div>
				<div class="custom-control custom-radio text-black">
				  <input type="radio" id="jawaban<?="$no"."b";?>" name="jawaban<?=$no?>" class="custom-control-input" required value="b">
				  <label class="custom-control-label " for="jawaban<?="$no"."b"?>"><?= $soal->pilihan_b ?></label>
				</div>
				<div class="custom-control custom-radio text-black">
				  <input type="radio" id="jawaban<?="$no"."c";?>" name="jawaban<?=$no?>" class="custom-control-input" required value="c">
				  <label class="custom-control-label " for="jawaban<?="$no"."c"?>"><?= $soal->pilihan_c ?></label>
				</div>
				<div class="custom-control custom-radio text-black">
				  <input type="radio" id="jawaban<?="$no"."d";?>" name="jawaban<?=$no?>" class="custom-control-input" required value="d">
				  <label class="custom-control-label " for="jawaban<?="$no"."d"?>"><?= $soal->pilihan_d ?></label>
				</div>
			</div>
		</div>
	<br>
	<?php endforeach ?>
	<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fa fa-save"></i> Simpan Jawaban</button>
	</form>
<br>