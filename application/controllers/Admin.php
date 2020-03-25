<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Admin extends CI_Controller {

	public function index()
	{
		$data['peserta'] = $this->m_admin->cekData();
		if ($this->session->userdata('level') =='admin') {
			$this->load->view('_Header');
			$this->load->view('_SidebarAdmin');
			$this->load->view('_ContentAdmin',$data);
			$this->load->view('_Footer');
		}elseif ($this->session->userdata('level')=='') {
			redirect('login','refresh');
		}else{
			redirect('login','refresh');
		}
	}
	public function dataPeserta()
	{

		$data['peserta'] = $this->m_admin->dataPeserta()->result();
		$id = $this->uri->segment(3);
		$data['updatePeserta'] = $this->m_admin->editData($id)->row();
	
		$this->load->view('_Header');
		$this->load->view('_SidebarAdmin');
		$this->load->view('admin/peserta/data', $data);
		$this->load->view('_Footer');

		// TAMBAH PESERTA
		if (isset($_POST['tambah'])==true) {
			$username = $this->input->post('username');
			$cekDataAkun = $this->m_login->cekDataAkun($username)->row();
			if ($username == $cekDataAkun->username) {
				echo "<script>alert('USERNAME TELAH ADA YANG PUNYA !! MOHON GUNAKAN USERNAME YANG LAIN !!');</script>";
				redirect('admin/dataPeserta/','refresh');
			}else{
				$id = Uuid::uuid4()->toString();
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$foto = $this->input->post('foto');
				$nama_lengkap = $this->input->post('nama_lengkap');
				$tgl_lahir = $this->input->post('tgl_lahir');
				$alamat = $this->input->post('alamat');
				$bidang = $this->input->post('bidang');
				$pendidikan = $this->input->post('pendidikan');
				$keahlihan = $this->input->post('keahlihan');
				$pengalaman = $this->input->post('pengalaman');
				$surat_lamaran = $this->input->post('surat_lamaran');
				$cv_portofolio = $this->input->post('cv_portofolio');
						
				$data = array(
					'id_peserta' => $id,
					'username' => $username,
					'password' => $password,
					'foto' => $foto,
					'nama_lengkap' => $nama_lengkap, 
					'tgl_lahir' => $tgl_lahir,
					'alamat' => $alamat,
					'bidang' => $bidang,
					'pendidikan' => $pendidikan,
					'keahlihan' => $keahlihan,
					'pengalaman' => $pengalaman,
					'surat_lamaran' => $surat_lamaran,
					'cv_portofolio' => $cv_portofolio,

				);
				if ($username=='admin') {
					$level='admin';
				}else{
					$level='peserta';
				}
				$akun = array(
						'nama_lengkap' => $nama_lengkap,
						'username' => $username,
						'password' => $password,
						'level' => $level );
				$this->m_admin->simpanDataPeserta($data);
				$this->m_login->membuatAkun($akun);
				redirect('admin/dataPeserta','refresh');	
			}
		}
}

	public function editPeserta()
	{
		// EDIT DATA PESERTA
		if ($this->uri->segment(3)==true) {
			$id = $this->uri->segment(3);
			$data['updatePeserta'] = $this->m_admin->editData($id)->row();

			if (isset($_POST['update'])==TRUE) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$foto = $this->input->post('foto');
				$nama_lengkap = $this->input->post('nama_lengkap');
				$tgl_lahir = $this->input->post('tgl_lahir');
				$alamat = $this->input->post('alamat');
				$bidang = $this->input->post('bidang');
				$pendidikan = $this->input->post('pendidikan');
				$keahlihan = $this->input->post('keahlihan');
				$pengalaman = $this->input->post('pengalaman');
				$surat_lamaran = $this->input->post('surat_lamaran');
				$cv_portofolio = $this->input->post('cv_portofolio');
						
				$data = array(
					'username' => $username,
					'password' => $password,
					'foto' => $foto,
					'nama_lengkap' => $nama_lengkap, 
					'tgl_lahir' => $tgl_lahir,
					'alamat' => $alamat,
					'bidang' => $bidang,
					'pendidikan' => $pendidikan,
					'keahlihan' => $keahlihan,
					'pengalaman' => $pengalaman,
					'surat_lamaran' => $surat_lamaran,
					'cv_portofolio' => $cv_portofolio
				);
				$id = array('id_peserta' => $id );
				$this->m_admin->updateDataPeserta($id,$data);
				redirect('admin/dataPeserta','refresh');
			}
		}
	}
	public function hapusDataPeserta($id)
	{
		$id = array('id_peserta' => $id);
		$this->m_admin->hapusDataPeserta($id);
		redirect('admin/dataPeserta','refresh');
	}


	//DATA HASIL SELEKSI PESERTA
	public function hasilSeleksi()
	{
		$data['peserta'] = $this->m_admin->hasilSeleksi()->result();
		$this->load->view('_Header');
		$this->load->view('_SidebarAdmin');
		$this->load->view('admin/hasil/data', $data);
		$this->load->view('_Footer');
	}

	public function dataAkun()
	{		
		$data['akun'] = $this->m_login->dataAkunLogin()->result();
		$this->load->view('_Header');
		$this->load->view('_SidebarAdmin');
		$this->load->view('admin/akun/data', $data);
		$this->load->view('_Footer');
	}


}

	