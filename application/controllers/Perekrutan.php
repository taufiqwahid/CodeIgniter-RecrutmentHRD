<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perekrutan extends CI_Controller {
	public function index()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {
			$username = $this->session->userdata('username');
			$data['peserta'] = $this->m_peserta->peserta($username)->result();
			$data['bidang'] = $this->m_test->bidang()->result();
			
			$this->load->view('_Header');
			$this->load->view('_SidebarPerekrutan');
			$this->load->view('_ContentPeserta',$data);
			$this->load->view('_Footer');
		}elseif ($this->session->userdata('level')=='' || $this->session->userdata('level')=='') {
			redirect('login','refresh');
		}else{
			redirect('login','refresh');
		}
	}

	public function profil()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {			
			$username = $this->session->userdata('username');
			$data['peserta'] = $this->m_peserta->dataPeserta($username)->row();
			$peserta = $data['peserta'];
			
			$this->load->view('_Header');
			$this->load->view('_SidebarPerekrutan');
			$this->load->view('perekrutan/profil',$data);
			$this->load->view('_Footer');

			if (isset($_POST['simpan'])==true) {
				$foto = $_FILES['foto'];
				if ($foto=='') {echo "<script>alert('KOSONGGGGGGGG')</script>";}else{
					$config['upload_path'] = './temp/gambar';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('foto')) {
						echo "<script>alert('Upload Gambar Foto  GAGAL!!')</script>";die();
					}else{
						$foto = $this->upload->data('file_name');
					}
				}
				// $foto = $this->input->post('foto');
				echo "<script>alert('Upload = ".$foto."')</script>";
				$nama_lengkap = $this->input->post('nama_lengkap');
				$tgl_lahir = $this->input->post('tgl_lahir');
				$alamat = $this->input->post('alamat');
				$pendidikan = $this->input->post('pendidikan');
				$keahlihan = $this->input->post('keahlihan');
				$pengalaman = $this->input->post('pengalaman');
				// $surat_lamaran = $this->input->post('surat_lamaran');
				$surat_lamaran = $_FILES['surat_lamaran'];
				if ($surat_lamaran=='') {echo "<script>alert('KOSONGGGGGGGG')</script>";}else{
					$config['upload_path'] = './temp/surat_lamaran';
					$config['allowed_types'] = 'pdf';
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('surat_lamaran')) {
						echo "<script>alert('Upload surat_lamaran  GAGAL!!')</script>";die();
					}else{
						$surat_lamaran = $this->upload->data('file_name');
					}
				}
				// $cv_portofolio = $this->input->post('cv_portofolio');
				$cv_portofolio = $_FILES['cv_portofolio'];
				if ($cv_portofolio=='') {echo "<script>alert('KOSONGGGGGGGG')</script>";}else{
					$config['upload_path'] = './temp/cv_portofolio';
					$config['allowed_types'] = 'pdf';
					$this->load->library('upload');
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('cv_portofolio')) {
						echo "<script>alert('Upload cv_portofolio  GAGAL!!')</script>";die();
					}else{
						$cv_portofolio = $this->upload->data('file_name');
					}
				}
				$profil = array(
					'foto' => $foto,
					'nama_lengkap' => $nama_lengkap,
					'tgl_lahir' => $tgl_lahir,
					'alamat' => $alamat,
					'pendidikan' => $pendidikan,
					'keahlihan' => $keahlihan,
					'pengalaman' => $pengalaman,
					'surat_lamaran' => $surat_lamaran,
					'cv_portofolio' => $cv_portofolio
				);
				$id = $peserta->id_peserta;
				$id = array('id_peserta' => $id);
				$this->m_peserta->simpanProfil($id,$profil);
				redirect('perekrutan/profil/','refresh');
			}


		}elseif ($this->session->userdata('level')=='' || $this->session->userdata('level')=='') {
			redirect('login','refresh');
		}else{
			redirect('login','refresh');
		}
	}

	public function testDasar()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {
			$data['soal'] = $this->m_dasar->tampil_soal()->result();
			$this->load->view('_Header');
			$this->load->view('_SidebarPerekrutan');
			$this->load->view('perekrutan/test/v_dasar',$data);
			$this->load->view('_Footer');
		}else{
			redirect('login','refresh');
		}
	}













	
	public function jtestDasar()
	{
		$data['soal'] = $this->m_dasar->tampil_soal()->result();
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
		echo "Jawaban benar : $benar";
		echo "<br>";
		echo "Jawaban Salah : $salah";
		redirect('perekrutan/test/v_dasar','refresh');
	}
	public function testKeahlihan()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {
			$this->load->view('_Header');
			$this->load->view('_SidebarPerekrutan');
			$this->load->view('perekrutan/test/v_keahlihan');
			$this->load->view('_Footer');
		}else{
			redirect('login','refresh');
		}
	}
	public function testPsikotes()
	{
		if ($this->session->userdata('level')=='peserta' || $this->session->userdata('level')=='admin') {
			$this->load->view('_Header');
			$this->load->view('_SidebarPerekrutan');
			$this->load->view('perekrutan/test/v_psikotes');
			$this->load->view('_Footer');
		}else{
			redirect('login','refresh');
		}
	}
}