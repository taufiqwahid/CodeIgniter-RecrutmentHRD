<?php
require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$data['bidang'] = $this->m_test->bidang()->result();
		$this->load->view('_Header');
		$this->load->view('_SidebarAdmin');
		$this->load->view('admin/test/listTest', $data);
		$this->load->view('_Footer');
	}

	public function hasilBidang()
	{
		$bidang = $this->uri->segment(3);
		$data['hasilTestBidang'] = $this->m_test->hasilBidang($bidang)->result();
		$this->load->view('_Header');
		$this->load->view('_SidebarAdmin');
		$this->load->view('admin/test/hasilTestBidang', $data);
		$this->load->view('_Footer');
	}



	// public function index()
	// {
	// 	if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {
	// 		$bidang = $this->uri->segment(3);
	// 		$data['test'] = $this->m_test->soalTest($bidang)->result();
	// 		$this->load->view('_Header');	
	// 		$this->load->view('_SidebarPerekrutan');
	// 		$this->load->view('perekrutan/test/v_test',$data);
	// 		$this->load->view('_Footer');
	// 		// redirect('Perekrutan/','refresh');
	// 	}elseif ($this->session->userdata('level')=='' || $this->session->userdata('level')=='') {
	// 		redirect('login','refresh');
	// 	}else{
	// 		redirect('login','refresh');
	// 	}
	// }
	public function bidang()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {

			$bidang = $this->uri->segment(3);
			$data['test'] = $this->m_test->soalTest($bidang)->result();
			$this->load->view('_Header');	
			$this->load->view('_SidebarPerekrutan');
			$this->load->view('perekrutan/test/v_test',$data);
			$this->load->view('_Footer');
			$array = array(
				'bidang' => $bidang
			);
			$this->session->set_userdata($array);

		}elseif ($this->session->userdata('level')=='' || $this->session->userdata('level')=='') {
			redirect('login','refresh');
		}else{
			redirect('login','refresh');
		}
	}

	public function hasilTest()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {

			$bidang = $this->uri->segment(3);
			$data['soal'] = $this->m_test->jawabanTest($bidang)->result();
			// echo "<pre>", print_r($data['soal'],1);
			$benar = 0;
			$salah = 0;
			foreach ($data['soal'] as $no => $kjawaban) {
				$no = $no+1;
				$jawaban = $this->input->post('jawaban'.$no); //jwaban peserta
				$kjawaban = $kjawaban->kjawaban;
				// echo $jawaban;
				// echo $kjawaban;
				// echo "<br>";
				if ($jawaban==$kjawaban) {
					$benar++;
				}else{
					$salah++;
				}
		}

		// echo "<pre>", print_r($this->session->all_userdata(),1);
		
		// echo "Jawaban benar : $benar";
		// echo "<br>";
		// echo "Jawaban Salah : $salah";

		$nama_lengkap = $this->session->userdata('nama_lengkap');
		$username = $this->session->userdata('username');
		$bidang = $this->session->userdata('bidang');
		$nilaiBenar = $benar;
		$nilaiSalah = $salah;
		$jumlahSoal = abs($benar)+abs($salah);
		$nilaiHasil = ($benar*100)/$jumlahSoal;

		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'username' => $username,
			'bidang' => $bidang,
			'jumlahSoal' => $jumlahSoal,
			'jbenar' => $nilaiBenar,
			'jsalah' => $nilaiSalah,
			'nilaiHasil' => $nilaiHasil
		);


		if ($this->session->userdata('bidang')==$bidang) {

			if ($this->m_test->cekTb_Hasil($nama_lengkap,$bidang,$username)->num_rows()>0)
			{
				echo"<script>alert('ANDA SUDAH MENJAWAB DAN TIDAK DAPAT DIUBAH KEMBALI !!!');</script>";
				redirect('Perekrutan/','refresh');
			}elseif ($this->m_test->cekTb_Hasil($nama_lengkap,$bidang,$username)->num_rows()==0) {
				if ($this->m_test->hasilTest($data)==true) {
					echo "<script>alert('JAWABAN ANDA TELAH DISIMPAN DAN TIDAK DAPAT DIUBAH KEMBALI');</script>";
					redirect('Perekrutan/','refresh');

				}else{
					redirect('Perekrutan/','refresh');
				}
			}else{
			}
		}else{
			echo "<script>alert('ANDA SUDAH TIDAK DAPAT MENJAWAB LAGI !!');</script>";
			echo "H1AAAAAAAA";
			redirect('Perekrutan/','refresh');
		}
		$this->session->unset_userdata('bidang');
		redirect('perekrutan/test/v_dasar','refresh');
		
		// echo "<pre>", print_r($this->session->all_userdata(),1);

		}elseif ($this->session->userdata('level')=='' || $this->session->userdata('level')=='') {
		redirect('login','refresh');
		}else{
			redirect('login','refresh');
		}

	}

	public function soalPeserta()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {

			$data['soal'] = $this->m_test->tampil_soal()->result();
			$this->load->view('_Header');
			$this->load->view('_SidebarAdmin');
			$this->load->view('admin/soal/soal',$data);
			$this->load->view('_Footer');
		}elseif ($this->session->userdata('level')=='' || $this->session->userdata('level')=='') {
			redirect('login','refresh');
		}else{
			redirect('login','refresh');
		}
	}

	public function tambahSoal()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {
			$this->load->view('_Header');
			$this->load->view('_SidebarAdmin');
			$this->load->view('admin/soal/tambah');
			$this->load->view('_Footer');	
		}elseif ($this->session->userdata('level')=='' || $this->session->userdata('level')=='') {
			redirect('login','refresh');
		}else{
			redirect('login','refresh');
		}
	}

	public function menambahSoal()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {
			
			$id_test = Uuid::uuid4()->toString();
			$bidang = $this->input->post('bidang');
			$test = $this->input->post('test');
			$pilihan_a = $this->input->post('pilihan_a');
			$pilihan_b = $this->input->post('pilihan_b');
			$pilihan_c = $this->input->post('pilihan_c');
			$pilihan_d = $this->input->post('pilihan_d');
			$kjawaban = $this->input->post('kjawaban');

			$soal = array(
				'id_test' => $id_test,
				'bidang' => $bidang,
				'test' => $test,
				'pilihan_a' => $pilihan_a,
				'pilihan_b' => $pilihan_b,
				'pilihan_c' => $pilihan_c,
				'pilihan_d' => $pilihan_d,
				'kjawaban' => $kjawaban
			);
			$data['soal'] = $this->m_test->tambah_soal($soal);
			$this->load->view('_Header');
			$this->load->view('_SidebarAdmin');
			$this->load->view('admin/soal/tambah',$data);
			$this->load->view('_Footer');	
			$jumlahSoal = $this->input->post('jumlahSoal');
			if ($this->db->affected_rows()) {
				echo "<script>alert(".$jumlahSoal." Jumlah Soal Test Telah Di Tambahkan..".")</script>";
				redirect('test/soalPeserta/','refresh');
			}

		}elseif ($this->session->userdata('level')=='' || $this->session->userdata('level')=='') {
			redirect('login','refresh');
		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */ ?>